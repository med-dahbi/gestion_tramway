<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\PointDeVenteController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\PaimentController;
//use App\Http\Controllers\MailController;
use App\Http\Controllers\SimpleQRcodeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\Paiment_carte_controller;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\AuthController;



//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});
Route::post("AjouterClient",[ClientController::class,'AjouterClient']);
Route::put("ModifierClient",[ClientController::class,'ModifierClient']);
Route::delete("SupprimerClient/{CIN}",[ClientController::class,'supprimerClient']);
Route::get("ListerClients/{cin?}",[ClientController::class,'ListerClients']);

Route::get("Rechercher/{CIN?}",[ClientController::class,'Rechercher']);
Route::get("ListerCartes/{id_carte?}",[CarteController::class,'ListerCartes']);
Route::get("ListerLignes/{id_ligne?}",[LigneController::class,'ListerLignes']);
Route::get("ListerStations/{id_station?}",[StationController::class,'ListerStations']);
Route::get("ListerVoyagesWithLigne/{id_ligne?}",[VoyageController::class,'ListerVoyagesWithLigne']);
Route::get("ListerPv/{id?}",[PointDeVenteController::class,'ListerPv']);
Route::post("AcheterBillet",[BilletController::class,'AcheterBillet']);
Route::get("ListerBillet/{CIN?}",[BilletController::class,'ListerBillet']);
Route::post("InscrireAbonnement",[CarteController::class,'InscrireAbonnement']);
Route::post("AjouterStation",[StationController::class,'AjouterStation']);
Route::post("AjouterLigne",[LigneController::class,'AjouterLigne']);
Route::post("AjouterVente",[PointDeVenteController::class,'AjouterVente']);
Route::put("ModifierStation",[StationController::class,'ModifierStation']);
Route::delete("SupprimerStation/{id_station?}",[StationController::class,'SupprimerStation']);
Route::put("ModifierLigne",[LigneController::class,'ModifierLigne']);
Route::delete("SupprimerLigne/{id_ligne?}",[LigneController::class,'SupprimerLigne']);
Route::put("ModifierVente",[PointDeVenteController::class,'ModifierVente']);
Route::delete("SupprimerVente/{id?}",[PointDeVenteController::class,'SupprimerVente']);
Route::post("AjouterVoyage",[VoyageController::class,'AjouterVoyage']);
Route::put("ModifierVoyage",[VoyageController::class,'ModifierVoyage']);
Route::delete("SupprimerVoyage/{id_voyage?}",[VoyageController::class,'SupprimerVoyage']);
Route::get("ajouterBillet ",[SimpleQRcodeController::class,'ajouterBillet']);


Route::post("AjouterEmploye",[EmployeController::class,'AjouterEmploye']);
Route::put("ModifierEmploye",[EmployeController::class,'ModifierEmploye']);
Route::delete("SupprimerEmploye/{cin?}",[EmployeController::class,'SupprimerEmploye']);
Route::get("ListerEmploye/{cin?}",[EmployeController::class,'ListerEmploye']);
Route::get("RechercherEmploye/{cin?}",[EmployeController::class,'RechercherEmploye']);
Route::get("search",[EmployeController::class,'search']);

Route::post("PayerCarte",[Paiment_carte_controller::class,'PayerCarte']);
Route::get("ListerVoyages/{cin?}",[VoyageController::class,'ListerVoyages']);

Route::get("ListerStationWithLigne/{id_ligne?}",[StationController::class,'ListerStationWithLigne']);

Route::get("ListerCartesWithCIN/{ListerCartesWithCIN?}",[CarteController::class,'ListerCartesWithCIN']);
Route::post("AjouterTache",[TacheController::class,'AjouterTache']);
Route::get("ListerTacheCIN/{cin?}",[TacheController::class,'ListerTacheCIN']);

Route::delete("SupprimerTache/{id?}",[TacheController::class,'SupprimerTache']);
Route::get("ListerTache/{id?}",[TacheController::class,'ListerTache']);

Route::put("ModifierTache",[TacheController::class,'ModifierTache']);


Route::post("AjouterFonction",[FunctionController::class,'AjouterFonction']);
Route::put("ModifierFonction",[FunctionController::class,'ModifierFonction']);
Route::delete("SupprimerFonction/{id}",[FunctionController::class,'SupprimerFonction']);
Route::get("ListerFonction/{id?}",[FunctionController::class,'ListerFonction']);
Route::get("ListerFonctionWithnom/{nom?}",[FunctionController::class,'ListerFonctionWithNom']);

Route::get("ListerEmployeWithFunction/{id_function?}",[EmployeController::class,'ListerEmployeWithFunction']);


Route::get("ListerEmployeWithNomFunction/{fonction?}",[EmployeController::class,'ListerEmployeWithNomFunction']);


Route::get("CountEmploye",[EmployeController::class,'CountEmploye']);
Route::get("CountVoyage",[VoyageController::class,'CountVoyage']);
Route::get("CountVente",[PointDeVenteController::class,'CountVente']);
Route::get("CountLigne",[LigneController::class,'CountLigne']);
Route::get("CountClient",[ClientController::class,'CountClient']);
Route::get("CountCarte",[CarteController::class,'CountCarte']);
Route::get("CountBillet",[BilletController::class,'CountBillet']);
Route::get("CountStation",[StationController::class,'CountStation']);
Route::get("UpdateStatus/{id}",[TacheController::class,'UpdateStatus']);


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get("ListerClientNormaux",[ClientController::class,'ListerClientNormaux']);

Route::get("ListerClientAbonnes",[ClientController::class,'ListerClientAbonnes']);

//taches 
/* Route::get("ListerTacheFinalisé",[TacheController::class,'ListerTacheFinalisé']);

Route::get("ListerTache0",[TacheController::class,'ListerTache0']); */

Route::get("ListerTacheFinalisé/{cin}",[TacheController::class,'ListerTacheFinalisé']);
Route::get("ListerTache0/{cin}",[TacheController::class,'ListerTache0']);

Route::put("UpdateEmploye/{cin}", [EmployeController::class,'UpdateEmploye']);








































	


