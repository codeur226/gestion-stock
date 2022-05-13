<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\CategorieMateriel;
use App\Models\ProprieteMateriel;


class CategorieMaterielComp extends Component
{
    use WithPagination;


    public $search = "";
    public $isAddCategorieMateriel = false;
    public $newCategorieMaterielName= "";
    public $newPropModel = [];
    public $editPropModel = [];
    public $newValue = "";
    public $selectedCategorieMateriel;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%".$this->search."%";
        $data = [
            "CategorieMateriels" => CategorieMateriel::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "proprietesMateriels" => ProprieteMateriel::where("categorie_materiels_id", optional($this->selectedCategorieMateriel)->id)->get()
            
        ];
        return view('livewire.CategorieMateriels.index', $data)
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function toggleShowAddCategorieMaterielForm(){
        if($this->isAddCategorieMateriel){
           $this->isAddCategorieMateriel = false;
           $this->newCategorieMaterielName = "";
           $this->resetErrorBag(["newCategorieMaterielName"]);
        }else{
           $this->isAddCategorieMateriel= true;
        }
   }
   
   public function addNewCategorieMateriel(){
    $validated = $this->validate([
        "newCategorieMaterielName" => "required|max:50|unique:categorie_materiels,nom"
    ]);

    CategorieMateriel::create(["nom"=> $validated["newCategorieMaterielName"]]);

    $this->toggleShowAddCategorieMaterielForm();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Categorie materiel ajouté à jour avec succès!"]);

}

    public function editCategorieMateriel(CategorieMateriel $categoriemateriel){
    $this->dispatchBrowserEvent("showEditForm", ["CategorieMateriel" => $categoriemateriel]);
    }

  public function updateCategorieMateriel(CategorieMateriel $categorieMateriel, $valueFromJS){
   $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("categorie_materiels", "nom")->ignore($categorieMateriel->id)]
        ]);

        $categorieMateriel->update(["nom"=> $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Categorie materiel mis à jour avec succès!"]);

   }

   public function confirmDelete($name, $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer $name de la liste des categories de materiels. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "categorie_materiels_id" => $id
        ]
    ]]);
   }

public function deleteCategorieMateriel(CategorieMateriel $categorieMateriel){
    $categorieMateriel->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Categorie materiel supprimé avec succès!"]);
   }

   public function showProp(CategorieMateriel $categorieMateriel){

    $this->selectedCategorieMateriel= $categorieMateriel;

    $this->dispatchBrowserEvent("showModal", []);

}

public function addProp(){
    $validated = $this->validate([
        "newPropModel.nom" => [
            "required",
            Rule::unique("propriete_materiels", "nom")->where("categorie_materiels_id", $this->selectedCategorieMateriel->id)
        ],
        "newPropModel.estObligatoire" => "required"
    ]);

    ProprieteMateriel::create([
        "nom" => $this->newPropModel["nom"],
        "estObligatoire" => $this->newPropModel["estObligatoire"],
        "categorie_materiels_id" => $this->selectedCategorieMateriel->id,
    ]);

    $this->newPropModel = [];
    $this->resetErrorBag();

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Propriété ajoutée avec succès!"]);
}


function showDeletePrompt($name , $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer '$name' de la liste des propriétés d'articles. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "propriete_materiels_id" => $id
        ]
    ]]);
}

public function deleteProp(ProprieteMateriel $proprieteMateriel){

    $proprieteMateriel->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Propriété supprimée avec succès!"]);
}

public function editProp(ProprieteMateriel $proprieteMateriel){

    $this->editPropModel["nom"] = $proprieteMateriel->nom;
    $this->editPropModel["estObligatoire"] =  $proprieteMateriel->estObligatoire;
    $this->editPropModel["id"] =  $proprieteMateriel->id;

    $this->dispatchBrowserEvent("showEditModal", []);
}

public function updateProp(){   
    $this->validate([
        "editPropModel.nom" => [
            "required",
            Rule::unique("propriete_materiels", "nom")->ignore($this->editPropModel["id"])
        ],
        "editPropModel.estObligatoire" => "required"
        
    ]);

    ProprieteMateriel::find($this->editPropModel["id"])->update([
        "nom" => $this->editPropModel["nom"],
        "estObligatoire" => $this->editPropModel["estObligatoire"]
    ]);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Propriété mise à jour avec succès!"]);
    $this->closeEditModal();
}

public function closeModal(){
    $this->dispatchBrowserEvent("closeModal", []);
}

public function closeEditModal(){
    $this->editPropModel = [];
    $this->resetErrorBag();
    $this->dispatchBrowserEvent("closeEditModal", []);
}


}