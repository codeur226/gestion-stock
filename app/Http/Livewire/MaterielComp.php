<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\entree;
use Livewire\Component;
use App\Models\Materiel;
//use Barryvdh\DomPDF\PDF;
use App\Models\Fournisseur;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\CategorieMateriel;
use App\Models\MaterielPropriete;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use PDF;

class MaterielComp extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = "bootstrap";

    public $search = "";
    public $filtreCategorie = "", $filtreEtat = "";
    public $addMateriel = [];
    public $editMateriel = [];
    public $proprietesMateriels = null;
    public $addPhoto = null;
    public $editPhoto = null;
    public $inputFileIterator = 0;
    public $inputEditFileIterator = 0;
    public $editHasChanged;
    public $editArticleOldValues = [];


    protected function rules () {
        return [
            'editMateriel.nom' => ["required", Rule::unique("materiels", "nom")->ignore($this->editMateriel["id"])],
            'editMateriel.noSerie' => ["required", Rule::unique("materiels", "noSerie")->ignore($this->editMateriel["id"])],
            //'editMateriel.Categorie' => 'required|exists:App\Models\CategorieMateriel,id',
            'editMateriel.materiel_proprietes.*.valeur' => 'required',
            //'editMateriel.fournisseurs_id' =>'required',
            //'editMateriel.quantite_entree' =>'required',
           // 'editMateriel.date_entree' =>'required',
           // 'editMateriel.stock_initial' =>'required',
           //'editMateriel.disponible' =>'required',
        
        ];
    } 

    

    function showUpdateButton(){
        $this->editHasChanged = false;

        /*foreach ($this->editArticleOldValues["materiels_propriete"] as $index => $editArticleOld) {
            if($this->editMateriel["materiel_propriete"][$index]["valeur"] != $editArticleOld["valeur"]){
                $this->editHasChanged = true;
            }
        }*/

        if(
            $this->editMateriel["nom"] != $this->editArticleOldValues["nom"] ||
            $this->editMateriel["noSerie"] != $this->editArticleOldValues["noSerie"] ||
            $this->editMateriel["noSerie"] != $this->editArticleOldValues["noSerie"] ||
            $this->editPhoto != null
        ){
            $this->editHasChanged = true;
        }

    }


    public function render()
    {

        Carbon::setLocale("fr");

        $materielQuery = Materiel::query();

        
        if($this->search != ""){
            $this->resetPage();
            $materielQuery->where("nom", "LIKE",  "%". $this->search ."%")
                         ->orWhere("noSerie","LIKE",  "%". $this->search ."%");
        }

        if($this->filtreCategorie != ""){
            $materielQuery->where("categorie_materiels_id", $this->filtreCategorie);
        }

        if($this->filtreEtat != ""){
            $materielQuery->where("estDisponible", $this->filtreEtat);
        }

        return view('livewire.materiels.index', [
            "materiels" => $materielQuery->latest()->paginate(5),
            "CategorieMateriels"=> CategorieMateriel::orderBy("nom", "ASC")->get(),
            "Fournisseurs" => Fournisseur::orderBy("nom", "ASC")->get(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
    
    public function updated($property){
        if($property == "addMateriel.categorie"){
            $this->proprietesMateriels = optional(CategorieMateriel::find($this->addMateriel["categorie"]))->proprietes;
        }
      //dump($this->proprietesMateriels );
    }

    public function updateMateriel(){
        $this->validate();

        $materiel = Materiel::find($this->editMateriel["id"]);

        $materiel->fill($this->editMateriel);

        if($this->editPhoto != null){
            $path = $this->editPhoto->store("upload", "public");
            $imagePath = "storage/".$path;
            $image = Image::make(public_path($imagePath))->fit(200, 200);

            $image->save();

            Storage::disk("local")->delete(str_replace("storage/", "public/", $materiel->imageUrl));

            $materiel->imageUrl = $imagePath;
        }

        $materiel->save();

       // ($this->editMatriel["materiel_propriete"])
        //->each(
                /*fn($item) => MaterielPropriete::where([
                    "materiels_id" => $item["materiels_id"],
                    "propriete_materiels_id" => $item["propriete_materiels_id"]
                ])->update(["valeur" => $item["valeur"]])*/
           // );

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Materiel mis à jour avec succès!"]);
        $this->dispatchBrowserEvent("closeEditModal");
        
       
    }

    public function showAddMaterielModal(){
        $this->resetValidation();
        $this->addMateriel = [];
        //$this->proprietesMateriels= [];
        $this->addPhoto = null;
        $this->inputFileIterator++;
        $this->dispatchBrowserEvent("showModal");
    }

    public function showConsulter(){
       
        $this->dispatchBrowserEvent("showModalConsulter");
    }


    public function closeModalConsulter(){
        $this->dispatchBrowserEvent("closeModalConsulter");
    }
    
       /* public function goToAddEntree(){
           return Redirect::route('goToAddEntree');
        }*/

    public function closeModal(){
        $this->dispatchBrowserEvent("closeModal");
    }
    public function closeModalEntree(){
        $this->dispatchBrowserEvent("closeModalEntree");
    }


    public function closeEditModal(){
        
        $this->dispatchBrowserEvent("closeEditModal");
    }

    public function editMateriel($materielId){
        $this->editMateriel = Materiel::with("categorie")->find($materielId)->toArray();

        $this->editArticleOldValues = $this->editMateriel;

        $this->editPhoto = null;
        $this->inputEditFileIterator++;
       
        $this->dispatchBrowserEvent("showEditModal");
    }

    public function confirmDelete(Materiel $materiel){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer ". $materiel->nom ." de la liste des materiels. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "materiels_id" => $materiel
            ]
        ]]); 
    }

    public function ajoutMateriel(){
        //dd();

        $validateArr = [
            'addMateriel.nom' => "string|min:3|required|unique:materiels,nom",
            'addMateriel.noSerie' => "string|max:50|min:3|required|unique:materiels,noSerie",
            'addMateriel.Categorie' => "required",
            'addPhoto' => "image|max:10240", 
            //'addMateriel.disponible' => 'required',
           // 'addMateriel.fournisseurs_id' =>'required',
            //'addMateriel.quantite_entree' =>'required',
            //'addMateriel.date_entree' =>'required',
            //'addMateriel.stock_initial' =>'required',

        ];
      

       $customErrMessages = [];
        $propIds = [];



       foreach ($this->proprietesMateriels?: [] as $propriete) {

            $field = "addMateriel.prop.".$propriete->nom;

            $propIds[$propriete->nom] = $propriete->id;


            if($propriete->estObligatoire == 1){
                $validateArr[$field] = "required";
                $customErrMessages["$field.required"] = "Le champ <<".$propriete->nom.">> est obligatoire.";
            }else{
                $validateArr[$field] = "nullable";
            }


        }

        // Validation des erreurs
        $validatedData = $this->validate($validateArr, $customErrMessages);
       // dd($validatedData["addMateriel"]["Categorie_materiels_id"]);

        // par défaut notre image est une placeholder
        $imagePath = "images/imageplaceholder.png";

        if($this->addPhoto != null){

            $path = $this->addPhoto->store('upload', 'public');
            $imagePath = "storage/".$path;

            $image = Image::make(public_path($imagePath))->fit(200, 200);
            $image->save();

        }

        $materiel = materiel::create([
            "nom" => $validatedData["addMateriel"]["nom"],
            "noSerie" => $validatedData["addMateriel"]["noSerie"],
            "categorie_materiels_id" => $validatedData["addMateriel"]["Categorie"],
            //"estDisponible" => $validatedData["addMateriel"]["disponible"],
            "imageUrl" => $imagePath,
            //"quantite_entree" => $validatedData["addMateriel"]["quantite_entree"],
            //"date_entree" => $validatedData["addMateriel"]["date_entree"],
            //"stock_initial" => $validatedData["addMateriel"]["stock_initial"],
            //"fournisseurs_id" => $validatedData["addMateriel"]["fournisseurs_id"],
        ]);
       


        /*foreach($validatedData["addMateriel"]["prop"]?: [] as $key => $prop){
            MaterielPropriete::create([
                "materiels_id" => $materiel->id,
                "propriete_materiels_id" => $propIds[$key],
                "valeur"=> $prop
            ]);
        }*/
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Materiel ajouté avec succès!"]);

        $this->closeModal();


    }
    
    protected function cleanupOldUploads(){

        $storage = Storage::disk("local");

        foreach($storage->allFiles("livewire-tmp") as $pathFileName){

            if(! $storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(5)->timestamp;

            if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }

    public function deleteMateriel($materiel){
        materiel::destroy($materiel);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Materiel supprimé avec 
        succès!"]);
    }

    //Fonction pour exportee fichier pdf
    public function exportpdf(){
        $data = materiel::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('export-pdf');
        return $pdf->download('data.pdf');

    }

}
