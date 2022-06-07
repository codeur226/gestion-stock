<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\sortie;
use App\Models\Fournisseur;
use App\Models\Materiel;
use PDF;




class SortieComp extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    

    public $currentPage = PAGELIST;


    public $newSortie = [];
    public $editSortie = [];
    public $search = "";

    public function render(){
        
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        $data = [
            "sorties" => sortie::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            /*"Fournisseurs" => Fournisseur::where("nom", "like", $searchCriteria)->latest()->paginate(5),*/
            "Materiels" => Materiel::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        ];

        return view('livewire.sorties.index', $data)
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            //'required|email|unique:users,email'
            return [
                'editSortie.nom' =>'required',
                'editSortie.imputable' =>'required',
                'editSortie.destination' =>'required',
                'editSortie.reference' =>'required',
                //'editSortie.destinations_id' =>'required',
                'editSortie.materiels_id' =>'required',
                /*'editSortie.fournisseurs_id' =>'required',*/
                'editSortie.quantite_sortie' =>'required',
                'editSortie.date_sortie' =>'required',
                /*'newUser.telephone2' =>'required|numeric'*/
            ];
        }
        return [
            'newSortie.nom' =>'required',
            'newSortie.imputable' =>'required',
            'newSortie.reference' =>'required',
             'newSortie.destination' =>'required',
            //'newSortie.destinations_id' =>'required',
            'newSortie.materiels_id' =>'required',
            /*'newSortie.fournisseurs_id' =>'required',*/
            'newSortie.quantite_sortie' =>'required',
            'newSortie.date_sortie' =>'required',
            /*'newUser.telephone2' =>'required|numeric'*/
              ];
        }
    
        public function goToAddSortie(){
            $this->currentPage = PAGECREATEFORM;
        }
    
    
        public function goToEditSortie($id){
            $this->editSortie = sortie::find($id)->toArray();
           
            $this->currentPage = PAGEEDITFORM;
    
        }

        public function goToListSortie(){
            $this->currentPage = PAGELIST;
            $this->editSortie = [];
          }
      
          public function addSortie(){
      
              // Vérifier que les informations envoyées par le formulaire sont correctes
              $validationAttributes = $this->validate();
            
              //dump($validationAttributes);
             // sortie::create($validationAttributes["newSortie"]);

             //Mise a jour du stock dans la table materiel
              $recharge = sortie::create($validationAttributes["newSortie"]);

              $MaterialID = $recharge->materiels_id;
              $Montant = $recharge->quantite_sortie;

                $ID = Materiel::where('id', $MaterialID)->first();
                if ( $Montant > 0) {

                    if ( $ID->stock >= $Montant) {

                        $Stock = $ID->stock - $Montant;
                    Materiel::where('id', $MaterialID)->update(['stock' => $Stock]);

                    $this->newSortie = [];

                    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Sortie c'est realiser avec succès!"]);
                        
                    }
                    else {
                        $this->dispatchBrowserEvent("showErrorMessage", ["message"=>" Quantité Superieur au Stock !! "]);
                        
                    }
                    
                }
                else {
                    $this->dispatchBrowserEvent("showErrorMessage", ["message"=>" Quantité Incorrecte  "]);
                }
                
                
                

             
              //dump($validationAttributes);
              // Ajouter un nouvel utilisateur
              /*User::create($validationAttributes["newUser"]);
      
              $this->newUser = [];
      
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);*/  
          }
      
          public function updateSortie(){
                $validationAttributes = $this->validate();
                sortie::find($this->editSortie["id"])->update($validationAttributes["editSortie"]);
                $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Sortie c'est mise a jour  
                avec succès!"]);
          }
      
          public function confirmDelete($name, $id){
              $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
                  "text" => "Vous êtes sur le point de supprimer $name de la liste des sorties. 
                  Voulez-vous continuer?",
                  "title" => "Êtes-vous sûr de continuer?",
                  "type" => "warning",
                  "data" => [
                      "sorties_id" => $id
                  ]
              ]]);
          }
      
          public function deleteSortie($id){
              sortie::destroy($id);
      
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Sortie supprimé avec 
              succès!"]);
          }
           //Fonction pour exportee fichier pdf
    public function exportepdf(){
        $data = sortie::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('export');
        return $pdf->download('data.pdf');

    }

}