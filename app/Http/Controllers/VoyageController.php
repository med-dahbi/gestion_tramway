<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;


class VoyageController extends Controller
{
    function ListerVoyagesWithLigne($id_ligne=null){
   	return Voyage::where('id_ligne',$id_ligne)->get();
   }
   function ListerVoyages($id_voyage=null){
    return $id_voyage?Voyage::find($id_voyage):Voyage::all();
   }
   function AjouterVoyage(Request $req){
   	$voyage= new Voyage ;
	$voyage->nom_voyage=$req->nom_voyage;
    $voyage->id_ligne=$req->id_ligne;
   	$voyage->heure_de_depart=$req->heure_de_depart;
   	$voyage->heure_arrive=$req->heure_arrive;
   	$result=$voyage->save();
}

   function SupprimerVoyage($id_voyage){
   	$voyage = voyage::find($id_voyage);
   	$result=$voyage->delete();
   	if ($result) {
   	return ["le voyage numero ".$id_voyage." est supprime"];
   	}
   	else {
   	return ["la suppression de voyage numero".$id_voyage."est echouee"];
   	}	
   }
   function ModifierVoyage(Request $req){
   	$voyage = Voyage::find($req->id_voyage);
   	$voyage->id_ligne=$req->id_ligne;
    $voyage->heure_de_depart=$req->heure_de_depart;
    $voyage->heure_arrive=$req->heure_de_depart;
    $voyage->save();

   }

   function CountVoyage() {
	return Voyage::count();
 }

}
