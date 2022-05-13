<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithPagination;
use App\Models\entree;
use App\Http\Livewire\DB;
use App\Models\Fournisseur;
use App\Models\Materiel;

class EntreeComp extends Component
{
    protected $paginationTheme = "bootstrap";
    

    public $currentPage = PAGELIST;


    public $newEntree = [];
    public $editEntree = [];
    public $search = "";
    public $quantite_entree = [];
    public $stock_initial = [];


    public function render(){
        
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        $data = [
            "entrees" => entree::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "Fournisseurs" => Fournisseur::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "Materiels" => Materiel::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        ];

        return view('livewire.entrees.index', $data)
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            //'required|email|unique:users,email'
            return [
                'editEntree.nom' =>'required',
               'editEntree.materiels_id' =>'required',
                'editEntree.fournisseurs_id' =>'required',
                'editEntree.quantite_entree' =>'required',
                'editEntree.date_entree' =>'required',
                //'editEntree.stock_initial' =>'required',
                /*'newUser.telephone2' =>'required|numeric'*/
            ];
        }
        return [
            'newEntree.nom' =>'required',
            'newEntree.materiels_id' =>'required',
            'newEntree.fournisseurs_id' =>'required',
            'newEntree.quantite_entree' =>'required',
            'newEntree.date_entree' =>'required',
            //'newEntree.stock_initial' =>'required',
            /*'newUser.telephone2' =>'required|numeric'*/
              ];
        }
    
        public function goToAddEntree(){
            $this->currentPage = PAGECREATEFORM;
        }
    
    
        public function goToEditEntree($id){
            $this->editEntree = entree::find($id)->toArray();
           
            $this->currentPage = PAGEEDITFORM;
    
        }

        public function goToListEntree(){
            $this->currentPage = PAGELIST;
            $this->editEntree = [];
          }
      
          public function addEntree($id){
      
              // Vérifier que les informations envoyées par le formulaire sont correctes
              $validationAttributes = $this->validate();
              //dump($validationAttributes);
              // sortie::create($validationAttributes["newSortie"]);
             
              //Mise a jour du stock dans la table materiel
              $recharge = entree::create($validationAttributes["newEntree"]);

              $MaterialID = $recharge->materiels_id;
              $Montant = $recharge->quantite_entree;

                $ID = Materiel::where('id', $MaterialID)->first();
                $Stock = $ID->stock + $Montant;
                
                Materiel::where('id', $MaterialID)->update(['stock' => $Stock]);

              $this->newEntree = [];

              //$this->updateStock();
              // Mise a jour
              /*$stock= entree::whereId($id)->get('stock_initial');
              $quantite= entree::whereId($id)->get('quantite_entree');
              $res = $stock+ $quantite;
              entree::whereId($id)->update(['stock_initial' => $res]);
              //dump($validationAttributes");
              // Ajouter un nouvel utilisateur
              /*User::create($validationAttributes["newUser"]);*/
      
              $this->newUser = [];
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Entree créé avec succès!"]); 
          }

          
     
         
          public function updateEntree(){
              $validationAttributes = $this->validate();
              entree::find($this->editEntree["id"])->update($validationAttributes["editEntree"]);
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Entree mis a jour  
              avec succès!"]);
          }
         //public function updateMiseajour(){
           // DB::table('entrees')->increment('quantite_entree', 1, ['name' => 'John']);
        //->updateOrInsert(
           // ['quantite_entree' => '2'],
            //['stock_initial' => '2']);
        //}}


          public function confirmDelete($name, $id){
              $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
                  "text" => "Vous êtes sur le point de supprimer $name de la liste des entrees. 
                  Voulez-vous continuer?",
                  "title" => "Êtes-vous sûr de continuer?",
                  "type" => "warning",
                  "data" => [
                      "entrees_id" => $id
                  ]
              ]]);
          }
      
          public function deleteEntree($id){
              entree::destroy($id);
      
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Entree supprimé avec 
              succès!"]);
          }


}