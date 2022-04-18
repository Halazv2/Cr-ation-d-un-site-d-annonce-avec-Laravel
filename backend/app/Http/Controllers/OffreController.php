<?php

namespace App\Http\Controllers;

use App\Models\Offres;

use Illuminate\Http\Request;

class OffreController extends Controller
{

    public function index()
    {
        return Offres::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Sujet' => 'required',
            'Description' => 'required',

        ]);
        return Offres::create($request->all());
    }

    public function show($id)
    {
        return Offres::find($id);
    }

    public function update(Request $request, $id)
    {
        $offre = Offres::find($id);
        $offre->update($request->all());
        return $offre;
    }

    public function destroy($id)
    {
        return Offres::destroy($id);
    }

    public function search($sujet)
    {
        return Offres::Where('Sujet', 'like', '%' . $sujet . '%')->get();
    }
}
