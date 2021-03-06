<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Permissions;
use App\Models\Roles;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\User;
use App\Models\departement;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    

    public $currentPage = PAGELIST;


    public $newUser = [];
    public $editUser = [];
    public $search = "";

    public $rolePermissions = [];
    


    /*protected $messages = [
        'newUser.nom.required' =>"le nom de l'utilisateur est requis.",
        'newUser.prenom.required' =>"le prenom de l'utilisateur est requis.",
        'newUser.email.required' =>"l'email de l'utilisateur est requis.",
        'newUser.departement_Id.required' =>"le departement de l'utilisateur est requis.",
        'newUser.telephone1.required' =>"le telephone 1 de l'utilisateur est requis.",
        'newUser.telephone2.required' =>"le telephone 2 de l'utilisateur est requis."
    ];*/
    /*protected $validationAttributes = [
        'newUser.telephone1' =>'numero de telephone 1',
        'newUser.prenom' =>'firstname',
        'newUser.email' =>'email',
        'newUser.IdDepartement' =>'Departement',
    ];*/
    
    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        $data = [
            "users" => user::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "departements"=> departement::orderBy("libelle", "ASC")->get(),
        ];

        return view('livewire.utilisateurs.index', $data)
        ->extends("layouts.master")
        ->section("contenu");
    }


    public function rules(){
    if($this->currentPage == PAGEEDITFORM){
        //'required|email|unique:users,email'
        return [
            'editUser.nom' =>'required',
            'editUser.sexe' =>'required',
            'editUser.prenom' =>'required',
            'editUser.email' => ['required', 'email', Rule::unique("users","email")->ignore($this->editUser['id'])],
            'editUser.departement_Id' =>'required',
            'editUser.telephone1' => ['required', 'numeric', Rule::unique("users","telephone1")->ignore($this->editUser['id'])],
            /*'newUser.telephone2' =>'required|numeric'*/
        ];
    }
    return [
        'newUser.nom' =>'required',
        'newUser.prenom' =>'required',
        'newUser.sexe' =>'required',
        'newUser.email' =>'required|email|unique:users,email',
        'newUser.departement_Id' =>'required',
        'newUser.telephone1' =>'required|numeric|unique:users,telephone1',
        /*'newUser.telephone2' =>'required|numeric'*/
          ];
    }

    public function goToAddUser(){
        $this->currentPage = PAGECREATEFORM;
    }


    public function goToEditUser($id){
        $this->editUser = User::find($id)->toArray();
       
        $this->currentPage = PAGEEDITFORM;
        $this->populateRolePermissions();

    }

   
        public function populateRolePermissions(){
            $this->rolePermissions["roles"] = [];
            $this->rolePermissions["permissions"] = [];
    
            $mapForCB = function($value){
                return $value["id"];
            };
    
            $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray()); // [1, 2, 4]
            $permissionIds = array_map($mapForCB, User::find($this->editUser["id"])->permissions->toArray()); // [1, 2, 4]
    
            foreach(Roles::all() as $role){
                if(in_array($role->id, $roleIds)){
                    array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
                }else{
                    array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
                }
            }
    
            foreach(Permissions::all() as $permission){
                if(in_array($permission->id, $permissionIds)){
                    array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>true]);
                }else{
                    array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>false]);
                }
            }
    
          //dump($this->rolePermissions);
        // La logique pour charger les roles et les permissions
    }

    public function updateRoleAndPermissions(){
        DB::table("users_roles")->where("users_id", $this->editUser["id"])->delete();
        DB::table("users_permissions")->where("users_id", $this->editUser["id"])->delete();

        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }

        foreach($this->rolePermissions["permissions"] as $permission){
            if($permission["active"]){
                User::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Roles et permissions mis ?? jour avec succ??s!"]);
    }

    public function goToListUser(){
      $this->currentPage = PAGELIST;
      $this->editUser = [];
    }

    public function addUser(){

        // V??rifier que les informations envoy??es par le formulaire sont correctes
        $validationAttributes = $this->validate();
        $validationAttributes["newUser"]["password"] = "password";
        //dump($validationAttributes);
        User::create($validationAttributes["newUser"]);
        $this->newUser = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur cr???? avec succ??s!"]);
        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        /*User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur cr???? avec succ??s!"]);*/  
    }

    public function updateUser(){
        $validationAttributes = $this->validate();
        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis a jour  
        avec succ??s!"]);
    }


    public function confirmPwdReset(){
        $this->dispatchBrowserEvent("showConfirmMessages", ["message"=> [
            "text" => "Vous ??tes sur le point de r??initialis?? le mot de passe de cet  utilisateur. 
            Voulez-vous continuer?",
            "title" => "??tes-vous s??r de continuer?",
            "type" => "warning"
        
        ]]);
    }
  
    public function resetPassword(){
        User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe utilisateur reinitialis??  
        avec succ??s!"]);
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous ??tes sur le point de supprimer $name de la liste des utilisateurs. 
            Voulez-vous continuer?",
            "title" => "??tes-vous s??r de continuer?",
            "type" => "warning",
            "data" => [
                "users_id" => $id
            ]
        ]]);
    }

    public function deleteUser($id){
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprim?? avec 
        succ??s!"]);
    }
}
