<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fonction;


class FunctionController extends Controller
{
    
    function AjouterFonction(Request $req){
     $fonction= new Fonction;
     $fonction->nom=$req->nom;
     $fonction->nombre_employe=$req->nombre_employe;
     $result=$fonction->save();
 }
 
    function SupprimerFonction($id){
        $fonction =Fonction::find($id);
        $result=$fonction->delete();
    }
    function ModifierFonction(Request $req){
        $fonction = Fonction::find($req->id);
        $fonction->nom=$req->nom;
        $fonction->nombre_employe=$req->nombre_employe;
        $result=$fonction->save();
 
    }
      function ListerFonction($id=null){
     return $id?Fonction::find($id):Fonction::all();
    }
    function ListerFonctionWithnom($nom=null){
    return Fonction::where('nom',$nom)->get();
          
    }
}
