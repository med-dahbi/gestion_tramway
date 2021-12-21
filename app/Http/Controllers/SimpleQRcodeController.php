<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Paiment;
use App\Http\Controllers\PaimentController;
use App\Models\Billet;
use Illuminate\Support\Facades\Storage;






class SimpleQRcodeController extends Controller
{
        // L'action "generate" de la route "simple-qrcode" (GET)
    public function ajouterBillet () {
    	$number = rand(1,1000);
    	# 2. On génère un QR code de taille 200 x 200 px
    	
    	# 3. On envoie le QR code généré à la vue "simple-qrcode"
    	
    	$qrcode = QrCode::size(200)->generate("votre numero de billeet est".$number);
    	$output_file = '/img/qr-code/img-' . time() . '.svg';
        Storage::disk('local')->put($output_file, $qrcode); 
    	return view("simple-qrcode", compact('qrcode'));
    	




}
}