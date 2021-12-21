<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement_carte;
use Illuminate\Support\Facades\Hash;



class Paiment_carte_controller extends Controller
{

     function PayerCarte(Request $req){

     $paiment_carte = new Paiement_carte;
     $paiment_carte->CIN=$req->CIN;
     $paiment_carte->numero_de_carte=$req->numero_de_carte;
     $paiment_carte->VCC= Hash::make($req->VCC);
     $paiment_carte->date_expiration=$req->date_expiration;
     $result=$paiment_carte->save();

      }
    
}
