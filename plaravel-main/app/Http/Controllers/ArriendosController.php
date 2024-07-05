<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Arriendo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Carbon\Carbon;

class ArriendosController extends Controller
{
    public function index()
    {
        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        } 
        $vehiculos = Vehiculo::all();
        return view('arriendos.index',compact('vehiculos'));
    }



    // public function create(Request $request)
    // {
    //     $clientes = Cliente::all();
    //     $vehiculo = $request->vehiculo;

    //     return view('arriendos.create', compact(['vehiculo','clientes']));

    // }


    public function store(Request $request)
    {   

        
        $fechainicio = Carbon::parse($request->fecha_ini);
        $fechatermino = Carbon::parse($request->fecha_ter);

        if($fechatermino>$fechainicio){
            $arriendo = new Arriendo();

            $arriendo->rut_cliente = $request->rut_cliente;
            $arriendo->patente_vehiculo = $request->patente_vehiculo;
            $arriendo->fecha_inicio = $fechainicio;
            $arriendo->hora_inicio  = now()->format('H:i:s');
            $arriendo->fecha_termino = $fechatermino;
            $arriendo->imagen_entrega = $request->img_ent;

            $arriendo->save();

            $vehiculo = Vehiculo::where('patente', $request->patente_vehiculo)->first();
            $vehiculo->estado = 'Arrendado';

            $vehiculo->save();

            return redirect()->route('arriendos.index');

        }else{
        
        return back()->withErrors('La fecha de devolucion es incorrecta!!')->onlyInput('fecha_ter');
        }
            //return back()->withErrors('La fecha de devolucion es incorrecta!!')->onlyInput('fecha_ter');
           
    }



    public function devolustore(Request $request)
    {
        $arriendo = Arriendo::where('patente_vehiculo', $request->patente_vehiculo)->latest('fecha_inicio')->first();
        //dd($arriendo->rut_cliente);
        if ($arriendo) {
            // Actualizar la hora de término y la imagen de recepción
            $arriendo->hora_termino = now()->format('H:i:s');
            $arriendo->imagen_recepcion = $request->img_rec;
            $arriendo->save();
        } else {
            // Manejar el caso en que no se encuentre el arriendo
            return redirect()->route('arriendos.index')->withErrors('Arriendo no encontrado.');
        }
    
        // Buscar el vehículo con la patente correspondiente
        $vehiculo = Vehiculo::where('patente', $request->patente_vehiculo)->first();
    
        if ($vehiculo) {
            // Actualizar el estado del vehículo
            $vehiculo->estado = 'Disponible';
            $vehiculo->save();
        } else {
            // Manejar el caso en que no se encuentre el vehículo
            return redirect()->route('arriendos.index')->withErrors('Vehículo no encontrado.');
        }
        return redirect()->route('arriendos.index');
    }



    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function arrendar(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all();

        return view('arriendos.arrendar', compact(['vehiculo','clientes']));
    }

    public function devolucion(Vehiculo $vehiculo)
    {
        return view('arriendos.devolucion', compact('vehiculo'));
    }


    public function update(Request $request, string $id)
    {
        
    }


    public function destroy(string $id)
    {
        //
    }
}
