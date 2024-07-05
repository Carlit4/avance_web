<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use Illuminate\Support\Facades\Gate;



class TiposController extends Controller
{

    public function index()
    {   

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $tipo = new Tipo();

        $tipo->nom_tipo = $request->nom_tipo;
        $tipo->precio = $request->precio;

        $tipo->save();
        return redirect()->route('tipos.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Tipo $tipo)
    {

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        return view('tipos.edit', compact('tipo'));
    }


    public function update(Request $request, Tipo $tipo)
    {
        $tipo->nom_tipo = $request->nom_tipo;
        $tipo->precio = $request->precio;
        $tipo->save();
        return redirect()->route('tipos.index');
    }

    
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
