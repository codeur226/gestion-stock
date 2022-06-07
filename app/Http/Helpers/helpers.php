<?php
use Illuminate\Support\Str; 
use App\Models\Materiel;

define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");

define("DEFAULTPASSWORD", "password");

function userFullName(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

    function setMenuClass($route, $classe){
        $routeActuel = request()->route()->getName();

        if(contains($routeActuel, $route) ){
            return $classe;
        }
        return "";
    }

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route ){
        return "active";
    }
    return "";
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}

function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nom;

        //
        if($i < sizeof(auth()->user()->roles) - 1 ){
            $rolesName .= ",";
        }

        $i++;

    }

    return $rolesName;

}
//recuperer le champ Nom dans la table sortie
if (!function_exists('getNomMateriel')) {
    function getNomMateriel($id)
    {
        $record = Materiel::where('id', $id)->first();
        if ($record != null) {
            return $record['nom'];
        } else {
            return '';
        }
    }
}