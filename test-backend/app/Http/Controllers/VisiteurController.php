<?php

namespace App\Http\Controllers;

use App\Models\visiteurs;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiteur = visiteurs::all();
        $data = [
            'visiteurs' => $visiteur
        ];
        return response()->json($data, 200);
    }




    public function create(Request $request)
    {
        $visiteur = visiteurs::create([
            'nom' => $request->nom,
            'age' => $request->age,
            
        ]);
    }


    public function show($id)
    {
        $visiteur = visiteurs::find($id);
        if ($visiteur) {
            return response()->json([
                'status' => 200,
                'visiteurs' => $visiteur
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Il n'y a pas de visiteur "
            ], 404);
        }
    }


    public function edit($id)
    {
        $visiteur = visiteurs::find($id);
        if ($visiteur) {
            return response()->json([
                'status' => 200,
                'visiteurs' => $visiteur
            ], 404);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Il n'y a pas de classe "
            ], 404);
        }
    }


    public function update(Request $request, int $id)
    {
        $visiteur = visiteurs::find($id);
        if ($visiteur) {
            $visiteur->update([
                'nom' => $request->nom,
                'age' => $request->age,
                'statut' => $request->statut,
            ]);
            return response()->json([
                'status' => 200,
                'message' => "Visiteur modifié "
            ], 200);
        }
    }


    public function destroy($id)
    {
        $visiteur = visiteurs::find($id);
        if ($visiteur) {
            $visiteur->delete();
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Il n'y a pas de visiteur "
            ], 404);
        }
    }
}
