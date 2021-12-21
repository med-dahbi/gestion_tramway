<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Billet;
use App\Models\Paiment;
use App\Models\client;
use App\Models\station;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;





class BilletController extends Controller
{

      function AcheterBillet(Request $req)
      {

            $paiment = new Paiment;
            $paiment->CIN = $req->CIN;
            $paiment->quantity = $req->quantity;
            $paiment->numero_de_carte = $req->numero_de_carte;
            $paiment->VCC = Hash::make($req->VCC);
            $paiment->date_expiration = $req->date_expiration;
            $result = $paiment->save();
            $client= new Client;
            $client->CIN = $req->CIN;
            $client->nom='';
            $client->prenom='';
            $client->type='normal';
            $client->save();

            $billet = new Billet;
            $qrcode = QrCode::size(200)->generate("Vous avez achetez " . $req->quantity . " billet , votre numéro de transaction est " . $req->CIN);
            $billet->CIN = $req->CIN;
            $billet->code_qr = '/img/qr-code/img-' . $req->CIN . '.svg';
            Storage::disk('local')->put($billet->code_qr, $qrcode);
            $billet->save();
          //  return view("simple-qrcode", compact('qrcode'));
        

      }

      public function CountBillet()
      {
            $billet = Billet::count();
      }
      function ListerBillet($CIN = null)
      {
    return Billet::where('CIN',$CIN)->get();
 
      }
}
