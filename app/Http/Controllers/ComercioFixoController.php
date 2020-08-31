<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComercioFixo;
use App\User;

class ComercioFixoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objFixo;
    private $objUser;

    public function __construct()
    {
        $this->objFixo = new ComercioFixo();
        $this->objUser      = new User();
    }

    public function index()
    {
        $comerciofixo=$this->objFixo->all();
        return view('comerciofixo.index', compact('comerciofixo'));
        //dd($this->objFixo->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comerciofixo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objFixo->create([

            'date'=>$request->date,
            'vistoria_processos'=>$request->vistoria,
            'vistoria_vre'=>$request->vistoriavre,
            'viabilidade_vre'=>$request->viabilidade,
            'ciencia'=>$request->ciencia,
            'intimacao'=>$request->intimacao,
            'plantao_interno'=>$request->plantao,
            'atendimento_guiche'=>$request->guiche,
            'observacao'=>$request->observacao


        ]);
        if($cad){return redirect('comerciofixo');}
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
