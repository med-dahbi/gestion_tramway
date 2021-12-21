<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
	 
   function ModifierClient(Request $req){
   	$client = Client::find($req->CIN);
      $client->CIN=$req->CIN;
      $client->nom=$req->nom;
      $client->prenom=$req->prenom;
      $client->type=$req->type;
   	$result=$client->save();
   	if ($result) {
   	return ["Result"=>"data has been updated"];
   	}
   	else {
   	return ["Result"=>"data has been failed"];
   	}
   }
   function SupprimerClient($CIN){
   	$client = Client::find($CIN);
   	$result=$client->delete();
   	if ($result) {
   	return ["le client numero".$CIN."est supprime"];
   	}
   	else {
   	return ["la suppression de client numero".$CIN."est echouee"];
   	}	
   }
   function ListerClients($CIN=null){
   	return $CIN?Client::find($CIN):Client::all();
   }
   function Rechercher($CIN){
   	return Client::where("CIN","like","%".$CIN."%")->get();
   }


   public function CountClient() { 
	return 	Client::count();

}
function ListerClientNormaux(){
    return Client::where('type','normal')->get();
   }
   function ListerClientAbonnes(){
    return Client::where('type','abonné')->get();

   }
 
}
   
