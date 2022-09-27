<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactos;
class contactoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return contactos::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return contactos::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $cl = contactos::findOrfail($id);
        $cl -> connombre = $request -> connombre;
        $cl -> update();
        return $cl;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcontac)
    {
        $cl = contactos::findOrfail($idcontac);
        $cl -> connombre = $request -> connombre;
        $cl -> contelefono = $request -> contelefono;
        $cl -> condireccion = $request -> condireccion;
        $cl -> concorreo = $request -> concorreo;
        $cl -> conatendio = $request -> conatendio;
        $cl -> conestado = $request -> conestado;
        $cl -> connota = $request -> connota;
        $cl -> update();
        return $cl;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($opa_id)
    {
        $cl = contactos::findOrfail($opa_id);
        $cl -> delete();
    }

    public function buscarid($idcontac)
    {
        $contac = contactos::where("con_id","=",$idcontac)->get();
       
        return  $contac;
    }

    public function getEstadoContac(){
        $data = json_decode( file_get_contents('https://gelainbienestarlaboral.com/GELAIN/estados/dataEstados.json'), true );


        // Activo, Cerrado, En Proceso, Pendiente Contacto, Stand By Cliente
    // Cerrado con Éxito
    // No Aprobado

        return $data;
    }
}
