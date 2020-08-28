<?php

namespace App\Http\Controllers;
use App\User;
use App\UserModel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Providers\NivelServiceProvider;
use App\Providers\StatusServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class TesteController extends Controller
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
        $this->objUser      = new User();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   dd($this->objUser->all());

        $data['users'] = User::all();
        //$usuario=$this->objUser->all();
        //return view('index', compact('usuario'));
        return view('usuario.index')->with($data);

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario=$this->objUser->all();


        return view(('usuario.create'), compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=$this->objUser->find($id);
        return view('usuario.edit', compact('usuario'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
