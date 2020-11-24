<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Nivel;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $objNivel;

    public function __construct()
    {
        $this->objNivel = new Nivel();
    }

    public function index()
    {

        $nivel = $this->objNivel->all();

        return view('nivel.index', compact('nivel'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */

    public function create()
    {
        return view('nivel.add');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */

    public function store(Request $request)
    {
        $cad=$this->objNivel->create([
            'nome'=>$request->nome,
            'permissoes'=>$request->permissoes

        ]);
        if($cad){return redirect('nivel');}
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}
