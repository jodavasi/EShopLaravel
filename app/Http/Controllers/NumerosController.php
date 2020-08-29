<?php

namespace App\Http\Controllers;

use App\Numeros;
use App\User;
use Illuminate\Http\Request;

class NumerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numeros = Numeros::all();
        $users = User::all()->count();
        $users -= 1;
        if(count($numeros)){
            return view('estadisticasAdmin.index',compact('numeros','users'));
        }
        return view('estadisticasAdmin.index',compact('numeros','users'));
    
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Numeros  $numeros
     * @return \Illuminate\Http\Response
     */
    public function show(Numeros $numeros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Numeros  $numeros
     * @return \Illuminate\Http\Response
     */
    public function edit(Numeros $numeros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Numeros  $numeros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Numeros $numeros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Numeros  $numeros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Numeros $numeros)
    {
        //
    }
}
