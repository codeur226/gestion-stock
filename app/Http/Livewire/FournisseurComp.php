<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fournisseur;
use Illuminate\Validation\Rule;




class FournisseurComp extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    

    public $currentPage = PAGELIST;


    public $newFournisseur = [];
    public $editFournisseur = [];
    public $search = "";

    public function render(){
        
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        $data = [
            "fournisseurs" => Fournisseur::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        ];

        return view('livewire.Fournisseurs.index', $data)
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            //'required|email|unique:users,email'
            return [
                'editFournisseur.nom' =>'required',
                'editFournisseur.prenom' =>'required',
                'editFournisseur.email' => ['required', 'email', Rule::unique("fournisseurs","email")->ignore($this->editFournisseur['id'])],
                'editFournisseur.telephone1' =>'required',
            ];
        }
        return [
            'newFournisseur.nom' =>'required',
            'newFournisseur.prenom' =>'required',
            'newFournisseur.email' =>'required|email|unique:fournisseurs,email',
            'newFournisseur.telephone1' =>'required',
              ];
        }
    
        public function goToAddFournisseur(){
            $this->currentPage = PAGECREATEFORM;
        }
    
    
        public function goToEditFournisseur($id){
            $this->editFournisseur = fournisseur::find($id)->toArray();
           
            $this->currentPage = PAGEEDITFORM;
    
        }

        public function goToListFournisseur(){
            $this->currentPage = PAGELIST;
            $this->editFournisseur = [];
          }
      
          public function addFournisseur(){
      
              // Vérifier que les informations envoyées par le formulaire sont correctes
              $validationAttributes = $this->validate();
              //dump($validationAttributes);
              fournisseur::create($validationAttributes["newFournisseur"]);
              $this->newFournisseur = [];
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"fournisseur créé avec succès!"]);
              //dump($validationAttributes);
              // Ajouter un nouvel utilisateur
              /*User::create($validationAttributes["newUser"]);
      
              $this->newUser = [];
      
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);*/  
          }
      
          public function updateFournisseur(){
              $validationAttributes = $this->validate();
              fournisseur::find($this->editFournisseur["id"])->update($validationAttributes["editFournisseur"]);
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"fournisseur mis a jour  
              avec succès!"]);
          }
      
          public function confirmDelete($name, $id){
              $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
                  "text" => "Vous êtes sur le point de supprimer $name de la liste des fournisseurs. 
                  Voulez-vous continuer?",
                  "title" => "Êtes-vous sûr de continuer?",
                  "type" => "warning",
                  "data" => [
                      "fournisseurs_id" => $id
                  ]
              ]]);
          }
      
          public function deleteFournisseur($id){
              fournisseur::destroy($id);
      
              $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Fournisseur supprimé avec 
              succès!"]);
          }


}