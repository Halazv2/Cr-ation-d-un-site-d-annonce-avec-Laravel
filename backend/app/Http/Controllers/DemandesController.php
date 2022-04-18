<?php

namespace App\Http\Controllers;

use App\Models\Demandes;


use Illuminate\Http\Request;

class DemandesController extends Controller
{

    public function index()
    {
        return Demandes::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Sujet' => 'required',
            'Description' => 'required',

        ]);
        return Demandes::create($request->all());
    }

    public function show($id)
    {
        return Demandes::find($id);
    }

    public function update(Request $request, $id)
    {
        $offre = Demandes::find($id);
        $offre->update($request->all());
        return $offre;
    }

    public function destroy($id)
    {
        return Demandes::destroy($id);
    }

    public function search($sujet)
    {
        return Demandes::Where('Sujet', 'like', '%' . $sujet . '%')->get();
    }
}
