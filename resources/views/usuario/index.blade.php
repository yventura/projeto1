@extends('layouts.app', ['activePage' => 'usuario', 'titlePage' => __(' ')])

@section('content')
<br>
<br>

<div class ="text-center mt-3 mb-4">
<a href="{{url('usuario/create')}}">
<button class="btn btn-success">Novo Usuario</button>
</a>
</div>
<div class="col-lg-12 col-md-20">
          <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Usuarios Cadastrados</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
              <thead class="text-warning">
                <th>Nome      </th>
                <th>E-mail    </th>
                <th>Prontuario</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Deleta</th>
              </thead>
            <tbody>
              @foreach($users as $usuarios)
              
              
              <tr>
                  <td scope="row">{{$usuarios->name}}</td>
                  <td scope="row">{{$usuarios->email}}</td>
                  <td scope="row">{{$usuarios->prontuario}}</td>
                </td>
                <td class="td-actions text-center">
                <a href="{{url("usuario/$usuarios->id/edit")}}"> 
                  <button class="btn btn-dark ">Editar</button>
                </a>   
                </td>
                <td class="td-actions text-center"> 
                <a  class="js-del" href="{{url("usuario/$usuarios->id")}}"> 
                  <button class="btn btn-dark ">Deletar</button>
                </a>  
                </td>
              </tr>
              @endforeach 
              
               
            </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection