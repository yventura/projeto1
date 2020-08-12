<?php

namespace App\Http\Controllers;

use App\Laudo;
use App\TipoLaudo;
use App\LaudosEquipamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaudoController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['laudos'] = Laudo::all();

        foreach ($data['laudos'] as $laudo) {
            $tipo_laudo =  DB::table('tipo_laudos')
                                    ->select('nome', 'sigla')
                                    ->where('id', $laudo->tipo_laudo_id)
                                    ->first();
                                    
            $laudo->tipo_laudo_nome = $tipo_laudo->nome;
            $laudo->tipo_laudo_sigla = $tipo_laudo->sigla;
        }
        //dd($data);
        return view('laudos.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laudos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laudos = DB::table('laudos')  
            ->select('num_laudo', 'ano_laudo')
            ->where('ano_laudo', date('Y'))
            ->orderByDesc('num_laudo')
            ->limit(1)
            ->get();
            
        $numero_novo = 1;
        foreach ($laudos as $laudo) {
            if (!empty($laudo)) {
                $numero_novo = $laudo->num_laudo + 1;
            }
        }

        $laudoData = new Laudo();
        $laudoData->created_user_id = auth()->user()->id;
        $laudoData->departamento_id = $request->departamento;
        $laudoData->secretaria_id = $request->secretaria;
        $laudoData->tipo_laudo_id = $request->tipo_laudo;
        $laudoData->num_chamado = $request->chamado;
        $laudoData->num_laudo = $numero_novo;
        $laudoData->ano_laudo = date('Y');
        $laudoData->tipo_identificacao = $request->tipo_identificacao;
        $laudoData->identificacao = $request->identificacao;
        $laudoData->email_solicitante = $request->email;

        if ($laudoData->save()) {
            $problemas_json = $request->problemas;
            //$problemas = json_decode($problemas_json, true);

            $laudosEquipamentos = new LaudosEquipamento();
            $laudosEquipamentos->laudo_id = $laudoData->id;
            $laudosEquipamentos->equipamentos = $problemas_json;
            
            if ($laudosEquipamentos->save()) {
                return redirect('laudos')
                ->withStatus(__('Profile successfully updated.'));
            } else {
                return redirect()
                    ->back()
                    ->withStatus(__('Erro ao salvar problemas'))
                    ->withInput();
            }
        } else {
            return redirect()
                ->back()
                ->withStatus(__('Erro ao criar o laudo.'))
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function show(Laudo $laudo)
    {
        $tipoLaudo =  DB::table('tipo_laudos')
                                ->select('nome', 'sigla')
                                ->where('id', $laudo->tipo_laudo_id)
                                ->first();

        $laudosEquipamentos = DB::table('laudos_equipamentos')
                                ->select('equipamentos', 'created_at')
                                ->where('laudo_id', $laudo->id)
                                ->get();

        $_equipamentos = null;
        foreach ($laudosEquipamentos as $laudoEquipamento) {
            $equipamentosDecode = json_decode($laudoEquipamento->equipamentos);
            // Padrão do JSON 
            // 0 = Componente | 1 = Descrição | 2 = Solução
            foreach ($equipamentosDecode as $equipamentoDecode) {
                $_equipamentos = DB::table('equipamentos')
                                    ->select('tipo_equipamento', 'modelo', 'nome', 'observacao')
                                    ->where('id', $equipamentoDecode[0])
                                    ->first();

                $equipamentos[] = array(
                    'componente' => array(
                        'tipo_equipamento' => $_equipamentos->tipo_equipamento,
                        'modelo' => $_equipamentos->modelo,
                        'nome' => $_equipamentos->nome,
                        'observacao' => $_equipamentos->observacao
                    ),
                    'descricao' => $equipamentoDecode[1],
                    'solucao' => $equipamentoDecode[2]
                );
            }
        }                 
        $laudo->tipo_laudo_nome = $tipoLaudo->nome;
        $laudo->tipo_laudo_sigla = $tipoLaudo->sigla;

        return view('laudos.show')->with('laudo', $laudo)->with('equipamentos', $equipamentos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Laudo $laudo)
    {
        
        return view('laudos.edit')->with('laudo', $laudo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laudo $laudo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laudo $laudo)
    {
        //
    }
}
