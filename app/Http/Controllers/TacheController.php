<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;


class TacheController extends Controller
{
	function AjouterTache(Request $req)
	{
		$tache = new Tache;
		$tache->cin = $req->cin;
		$tache->nom = $req->nom;
		$tache->description = $req->description;
		$tache->date = $req->date;
		$tache->heure = $req->heure;
		$result = $tache->save();
	}

	function ListerTacheCIN($cin = null)
	{
		return Tache::where('cin', $cin)->get();
	}

	function SupprimerTache($id)
	{
		$tache = tache::find($id);
		$result = $tache->delete();
	}
	function ListerTache($id = null)
	{
		return $id ? Tache::find($id) : Tache::all();
	}


	function ModifierTache(Request $req)
	{
		$tache = Tache::find($req->id);
		$tache->cin = $req->cin;
		$tache->nom = $req->nom;
		$tache->description = $req->description;
		$tache->date = $req->date;
		$tache->heure = $req->heure;
		$result = $tache->save();
	}
	function UpdateStatus($id = null)
	{
		return Tache::where('id', $id)->update(array('status' => '1'));
	}

/* 	function ListerTacheFinalisé()
	{
		return Tache::where('status', '1')->get();
	}
	function ListerTache0()
	{
		return Tache::where('status', '0')->get();
	} */
	function ListerTacheFinalisé($cin)
	{
		return Tache::select('*')->where('status', '=', 1)->where('CIN', '=', $cin)->get();
	}
	function ListerTache0($cin)
	{
		return Tache::select('*')->where('status', '=', 0)->where('CIN', '=', $cin)->get();
	}
}
