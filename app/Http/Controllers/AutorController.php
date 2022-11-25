<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\LlibreController;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Models\Autor;

class AutorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function list()
    {
        $autors = Autor::all();
        return view('autor.list', ['autors' => $autors]);
    }

    function new(Request $request)
    {

        if ($request->isMethod('post')) {

            $request->validate([
                'nom' => 'required|max:20',
                'cognoms' => 'required|max:30'
            ]);
            $autor = new Autor();
            $autor->nom = $request->nom;
            $autor->cognoms = $request->cognoms;
            if ($request->file('imatge')) {
                $file = $request->file('imatge');
                $filename = $request->nom . '_' . $request->cognoms . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(env('RUTA_IMATGES', true)), $filename);
                $autor->imatge = $filename;
            }
            $autor->save();
            return redirect()->route('autor_list')->with('status', 'Nou autor ' . $autor->nomCognoms() . ' creat!');
        }

        $autors = Autor::all();

        return view('autor.new', ['autors' => $autors]);
    }

    function edit(Request $request, $id)
    {
        $autor = Autor::find($id);
        if ($request->isMethod('post')) {
            $request->validate([
                'nom' => 'required|max:20',
                'cognoms' => 'required|max:30'
            ]);
            $autor->nom = $request->nom;
            $autor->cognoms = $request->cognoms;
           
            if ($request->file('imatge')) {
                $file = $request->file('imatge');
                $filename = $request->nom . '_' . $request->cognoms . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(env('RUTA_IMATGES', true)), $filename);
                $autor->imatge = $filename;                
            }
            if (isset($request->deleteImage)) {                
                Storage::delete(public_path(env('RUTA_IMATGES', true) . $autor->imatge));
                $autor->imatge = null;
            }
            $autor->save();

            return redirect()->route('autor_list')->with('status', 'Edit autor ' . $autor->nomCognoms() . ' done!');
        }

        return view('autor.edit', ['autor' => $autor]);
    }

    function delete($id)
    {
        $autor = Autor::find($id);

        (new LlibreController)->deleteWithAutor($id);

        $autor->delete();

        return redirect()->route('autor_list')->with('status', 'Autor ' . $autor->nomCognoms() . ' eliminat!');
    }
}
