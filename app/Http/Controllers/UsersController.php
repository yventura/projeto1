<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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

    public function index()
    {


        $data['users'] = User::all();
        return view('usuario.index')->with($data);

        }


    public function create()
    {
        $usuario=$this->objUser->all();
        return view(('usuario.create'), compact('usuario'));
    }

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

    public function show(User $usuario)
    {
        return view('usuario.show')->with('usuario', $usuario);
    }

    public function edit(int $id)
    {
        $usuario=$this->objUser->find($id);
        $niveis_acessos = DB::table('users_niveis')->get();
        return view('usuario.edit', compact('usuario','niveis_acessos'));
    }

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
}
