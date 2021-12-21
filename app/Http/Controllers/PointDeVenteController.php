<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointDeVente;


class PointDeVenteController extends Controller
{
  //Map -- 
     function ListerPv($id=null){
   	return $id?PointDeVente::find($id):PointDeVente::all();
   }
   function AjouterVente(Request $req){
	$vente = new PointDeVente;
	$vente->nom=$req->nom;
  $vente->longitude=$req->longitude;
  $vente->latitude=$req->latitude;
  $vente->address=$req->address;

	$result = $vente->save();
	if ($result) {
   	return ["Result"=>"added with succes"];
   	}
   	else {
   	return ["Result"=>"failed"];
   	}


}
function ModifierVente(Request $req){
  $vente = PointDeVente::find($req->id);
  $vente->nom=$req->nom;
  $vente->longitude=$req->longitude;
  $vente->latitude=$req->latitude;
  $result=$vente->save();

}

function SupprimerVente($id){
    $vente = PointDeVente::find($id);
    $result=$vente->delete();
}

public function CountVente() {
	return PointDeVente::count();
}


}
