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
        $niveisAcesso = $this->objNivel->all();
        return view('nivel.index', compact('niveisAcesso'));
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
        //dd($request->criar_usuario);
        $permissoes_array[] = [
            'criar_usuario' => ($request->criar_usuario == 'on')? true : false,
            'editar_usuario' => ($request->editar_usuario == 'on')? true : false,
            'gerenciar_niveis' => ($request->gerenciar_niveis == 'on')? true : false,
            'gerar_relatorio' => ($request->gerar_relatorio == 'on')? true : false,
            'visualizar_relatorio' => ($request->visualizar_relatorio == 'on')? true : false,
            'imprimir_relatorio' => ($request->imprimir_relatorio == 'on')? true : false,
        ];

        $cad = $this->objNivel->create([
            'nome' => $request->nome,
            'permissoes'=> json_encode($permissoes_array)

        ]);

        if($cad){
            return redirect('nivel');
        }
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
        $nivel = $this->objNivel->find($id);
        $permissoes_temp = json_decode($nivel->permissoes);
        $nivel->permissoes = $permissoes_temp[0];

        return view('nivel.edit', compact('nivel'));
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
        //dd($request->criar_usuario);
        $permissoes_array[] = [
            'criar_usuario' => ($request->criar_usuario == 'on')? true : false,
            'editar_usuario' => ($request->editar_usuario == 'on')? true : false,
            'gerenciar_niveis' => ($request->gerenciar_niveis == 'on')? true : false,
            'gerar_relatorio' => ($request->gerar_relatorio == 'on')? true : false,
            'visualizar_relatorio' => ($request->visualizar_relatorio == 'on')? true : false,
            'imprimir_relatorio' => ($request->imprimir_relatorio == 'on')? true : false,
        ];

        $this->objNivel->where(['id'=>$id])->update([
            'nome' => $request->nome,
            'permissoes' => json_encode($permissoes_array)
        ]);
        return redirect('nivel');
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
