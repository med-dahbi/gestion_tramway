<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carte;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Validator;



class CarteController extends Controller
{


  function ListerCartes($id_carte = null)
  {
    return $id_carte ? Carte::find($id_carte) : Carte::all();
  }
  function ListerCartesWithCIN($CIN = null)
  {
    return Carte::where('CIN', $CIN)->get();
  }

  function InscrireAbonnement(Request $req)
  {
    $client = new Client;
    $client->CIN=$req->CIN;
    $client->nom = $req->nom;
    $client->prenom = $req->prenom;
    $client->type ='abonné';
    $client->save();
    
    $carte = new Carte;
    $carte->CIN = $req->CIN;
    $carte->nom = $req->nom;
    $carte->prenom = $req->prenom;
    $carte->type_carte = $req->type_carte;
    $carte->date_debut_abonnement = Carbon::now();
    switch ($carte->type_carte) {
      case 'mensuelle':
        $carte->date_fin_abonnement = Carbon::now()->addDays(30);

        break;
      case 'trimestrielle':
        $carte->date_fin_abonnement = Carbon::now()->addDays(90);
        break;
      case 'semi annuelle':
        $carte->date_fin_abonnement = Carbon::now()->addDays(180);
        break;
      case 'annuelle':
        $carte->date_fin_abonnement = Carbon::now()->addDays(365);
        break;
    }
    $carte->numero_de_carte = $req->numero_de_carte;
    $carte->VCC = Hash::make($req->VCC);
    $carte->date_expiration = $req->date_expiration;
    $result = $carte->save();
  
    
  }

  public function CountCarte()
  {
    return Carte::count();
  }
}
