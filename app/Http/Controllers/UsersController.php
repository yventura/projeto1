<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;

class UsersController extends Controller
{
    private $objUser;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'prontuario' => ['required', 'string', 'min:8'],
            'nivel' => ['required', 'int'],
            'status' => ['required', 'int'],
        ]);
    }


    public function __construct()
    {
        $this->objUser = new User();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {


        $data['users'] = User::all();
        return view('usuario.index')->with($data);

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $usuario=$this->objUser->all();
        return view(('usuario.create'), compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */


    public function store(Request $request)
    {
        $cad=$this->objUser->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request['password']),
            'prontuario'=>$request->prontuario,
            'nivel'=>$request->nivel,
            'status'=>$request->status
        ]);
        if($cad){return redirect('usuario');}
    }

    /**
     * Display the specified resource.
     *
     * @param User $usuario
     * @return Application|Factory|Response|View
     */
    public function show(User $usuario)
    {
        return view('usuario.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit(int $id)
    {
        $usuario=$this->objUser->find($id);
        $niveis_acessos = DB::table('users_niveis')->get();
        return view('usuario.edit', compact('usuario','niveis_acessos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, int $id)
    {
        $this->objUser->where(['id'=>$id])->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request['password']),
            'prontuario'=>$request->prontuario,
            'nivel'=>$request->nivel,
            'status'=>$request->status
        ]);
        return redirect('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {

    }
}
