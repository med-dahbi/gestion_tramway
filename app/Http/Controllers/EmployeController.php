<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmployeController extends Controller
{
    function AjouterEmploye(Request $req)
    {
        $employe = new Employe;
        $employe->cin = $req->cin;
        $employe->password = Hash::make($req->password);
        $employe->nom = $req->nom;
        $employe->prenom = $req->prenom;
        $employe->id_fonction = $req->id_fonction;
        $employe->save();
        $user = new user;
        $user->cin = $req->cin;
        $user->nom = $req->nom;
        $user->password = Hash::make($req->password);
        $user->fonction = $req->id_fonction;
        $user->save();
    }

    function SupprimerEmploye($cin)
    {
        $employe = Employe::find($cin);
        $result = $employe->delete();
        if ($result) {
            return ["l employe numero " . $cin . " est supprime"];
        } else {
            return ["la suppression de employe numero" . $cin . "est echouee"];
        }
    }
    function ModifierEmploye(Request $req)
    {
        $employe = Employe::find($req->cin);
        $employe->cin = $req->cin;
        $employe->password = $req->password;
        $employe->nom = $req->nom;
        $employe->prenom = $req->prenom;
        $employe->id_function = $req->id_function;
        $employe->save();
    }
    function ListerEmploye($cin = null)
    {
        return $cin ? Employe::find($cin) : Employe::all();
    }
    function ListerEmployeWithFunction($id_function = null)
    {
        return Employe::where('id_function', $id_function)->get();
    }
    function ListerEmployeWithNomFunction($fonction = null)
    {
        return Employe::where('fonction', $fonction)->get();
    }
    function CountEmploye()
    {
        return     Employe::count();
      
    }

    function RechercherEmploye($cin)
    {
        return Employe::where("cin", "like", "%" . $cin . "%")->get();
    }

    /*function search(Request $request){

   $result = Employe::query();

if (!empty($cin)) {
    $result = $result->where('text', 'like', '%'.$cin.'%');
}

if (!empty($nom)) {
    $result = $result->where('nom', $nom);
}

if (!empty($prenom)) {
    $result = $result->where('prenom', $prenom);
}

if (!empty($fonction)) {
    $result = $result->where('fonction', 'like', '%'.$fonction.'%');
}*/

    function UpdateEmploye(Request $req, $cin)
    {
        $employe = Employe::find($cin);
        if (is_null($employe)) {
            return response()->json(['message' => 'Employe not found'], 404);
        }
        $employe->cin = $req->cin;

        $employe->nom = $req->nom;
        $employe->prenom = $req->prenom;
        $employe->save();
        return response($employe, 200);
    }
}
