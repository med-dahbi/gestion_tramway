<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ligne;
use Carbon\Carbon;

class LigneController extends Controller
{
  function ListerLignes($id_ligne=null){
    return $id_ligne?Ligne::find($id_ligne):Ligne::all();
  }
  
 /*   function ListerLignes($id_ligne=null){
    return Ligne::where('id_ligne',$id_ligne)->get();
  } */
function AjouterLigne(Request $req){
	$ligne = new ligne;
	$ligne->nom=$req->nom;
  $ligne->premier_depart=$req->premier_depart;
  $ligne->dernier_depart=$req->dernier_depart;
  $ligne->station_depart=$req->station_depart;
  $ligne->station_arrive=$req->station_arrive;
  $ligne->date_creation=Carbon::now();
	$result = $ligne->save();
	if ($result) {
   	return ["Result"=>"Ligne added with succes"];
   	}
   	else {
   	return ["Result"=>"failed"];
   	}


}
function ModifierLigne(Request $req){
  $ligne = Ligne::find($req->id_ligne);
  $ligne->nom=$req->nom;
  $result=$ligne->save();

}

function SupprimerLigne($id_ligne){
    $ligne = Ligne::find($id_ligne);
    $result=$ligne->delete();
}


public function CountLigne() {
  return Ligne::count();

}


}