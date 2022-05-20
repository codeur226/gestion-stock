<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\MailController;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\CategorieMaterielComp;
use App\Http\Livewire\MaterielComp;
use App\Http\Livewire\EntreeComp;
use App\Http\Livewire\SortieComp;
use App\Http\Livewire\FournisseurComp;

use App\Models\Materiel;
use App\Models\entree;
use App\Models\CategorieMateriel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// La route relative au super administrateur

Route::group([
    "middleware" => ["auth", "auth.superadmin"],
    'as' => 'superadmin.'
], function(){

    Route::group([
        "prefix" => "habilitation",
        'as' => 'habilitation.'
    ], function(){

        Route::get("/utilisateurs", utilisateurs::class)->name("users.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //

    });

   
    Route::group([
        "prefix" => "gestmateriel",
        'as' => 'gestmateriel.'
    ], function(){

        Route::get("/CategorieMateriels", categorieMaterielComp::class)->name("CategorieMateriels");
        Route::get("/materiels", MaterielComp::class)->name("materiels");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //
        Route::get("/entrees", EntreeComp::class)->name("entrees");
        Route::get("/sorties", SortieComp::class)->name("sorties");

    });

    Route::group([
        "prefix" => "gestfournisseur",
        'as' => 'gestfournisseur.'
    ], function(){

        Route::get("/Fournisseurs", FournisseurComp::class)->name("Fournisseurs");

    });
    

});



// Le groupe des routes relatives aux administrateurs uniquement
Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){

        Route::get("/utilisateurs", utilisateurs::class)->name("users.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //

    });

   


});

// Le groupe des routes uniquement le gestionnaires 
Route::group([
    "middleware" => ["auth", "auth.gestionnaire"],
    'as' => 'gestionnaire.'
], function(){

   

    Route::group([
        "prefix" => "gestmateriels",
        'as' => 'gestmateriels.'
    ], function(){

        Route::get("/CategorieMateriels", categorieMaterielComp::class)->name("CategorieMateriels");
        Route::get("/materiels", MaterielComp::class)->name("materiels");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //
        Route::get("/entrees", EntreeComp::class)->name("entrees");
        Route::get("/sorties", SortieComp::class)->name("sorties");

    });

    Route::group([
        "prefix" => "gestfournisseurs",
        'as' => 'gestfournisseurs.'
    ], function(){

        Route::get("/Fournisseurs", FournisseurComp::class)->name("Fournisseurs");

    });
    
});



  //Le groupe des routes relatives aux employe uniquement

  Route::group([
    "middleware" => ["auth", "auth.employe"],
    'as' => 'employe.'
], function(){

});

Route::get('livewire.entrees.add', EntreeComp::class)->name('goToAddEntree');


// Route Mail

Route::get('/send-email',[MailController::class,'sendEmail']);


//Route pour convertir PDF
Route::get("/exportpdf", [MaterielComp::class, 'exportpdf'])->name("exportpdf");

Route::get("/exportepdf", [SortieComp::class, 'exportepdf'])->name("exportepdf");
 





