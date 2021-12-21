<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\Ligne;


class StationController extends Controller
{
    function ListerStations($id_station=null){
   	return $id_station?Station::find($id_station):Station::all();
   }
   function ListerStationWithLigne($id_ligne=null){
    return Station::where('id_ligne',$id_ligne)->get();
   }
 function AjouterStation(Request $req){
   	$station= new Station ;
    $station->id_ligne=$req->id_ligne;
   	$station->nom=$req->nom;
    $station->longitude=$req->longitude;
    $station->latitude=$req->latitude;
   	$result=$station->save();
}
function ModifierStation(Request $req){
   	$station = Station::find($req->id_station);
    $station->id_ligne=$req->id_ligne;
   	$station->nom=$req->nom;
   	$result=$station->save();

   	if ($result) {
   	return ["Result"=>"station has been updated"];
   	}
   	else {
   	return ["Result"=>"station has been failed"];
   	}
   }
   function SupprimerStation($id_station){
   	$station = Station::find($id_station);
   	$result=$station->delete();
   	if ($result) {
   	return ["le station numero ".$id_station." est supprime"];
   	}
   	else {
   	return ["la suppression de station numero".$id_station."est echouee"];
   	}	
   }

   public function CountStation() {
	return Station::count();



}


    

}
