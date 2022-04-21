<?php

namespace App\Http\Controllers;

use App\Models\Demandes;
use App\Models\User;

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
            'user_id' => 'required',
            'Sujet' => 'required',
            'Description' => 'required',
            'image' => 'required',
        ]);
        // verfy if request has image 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // give it an unique id + extention
            $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            // move the image to public/images file 
            $file->move(public_path('images/Demands'), $uniqueFileName);
        }
        // save all information we got + save image in data base with name we create with uniquid 
        return Demandes::create([...$request->all(), "image" => $uniqueFileName]);
    }

    public function show($id)
    {
        return Demandes::find($id);
    }

    public function update(Request $request, $id)
    {
        $offre = Demandes::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/Demands'), $uniqueFileName);
        }
        $offre->update([...$request->all(), "image" => $uniqueFileName]);
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
