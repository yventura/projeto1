@extends('layouts.app', ['activePage' => 'edit', 'titlePage' => __('Controle de Usuario')])

@section('content')
<br>
<br>
<div class="col-lg-12 col-md-20">
          <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Usuarios Cadastrados</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
              <thead class="text-warning">
                <th>Usuario</th>
                <th>Cargo</th>
                <th>Setor</th>
                <th class="text-center">Edita</th>
                <th class="text-center">Deleta</th>
              </thead>
            <tbody>
              <tr>
                  <td>Admin</td>
                  <td>Administrador</td>
                  <td>ADM</td>
                  <td class="td-actions text-center">  
                  <button type="button" rel="tooltip" title="Edit User" class="btn btn-primary btn-link btn-sm">
                    <i class="material-icons">edit</i>
                  </button>
                </td>
                <td class="td-actions text-center">  
                  <button type="button" rel="tooltip" title="Remove User" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">close</i>
                  </button>
                </td>
              </tr>
              <tr>  
                <td>Yuri</td>
                <td>Dev</td>
                <td>TI</td>
                <td class="td-actions text-center">  
                  <button type="button" rel="tooltip" title="Edit User" class="btn btn-primary btn-link btn-sm">
                    <i class="material-icons">edit</i>
                  </button>
                </td>
                <td class="td-actions text-center">  
                  <button type="button" rel="tooltip" title="Remove User" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">close</i>
                  </button>
                </td>
              </tr>
              <tr>
                
                <td>Matheus</td>
                <td>Dev</td>
                <td>TI</td>
                <td class="td-actions text-center">  
                  <button type="button" rel="tooltip" title="Edit User" class="btn btn-primary btn-link btn-sm">
                    <i class="material-icons">edit</i>
                  </button>
                </td>
                <td class="td-actions text-center">  
                  <button type="button" rel="tooltip" title="Remove User" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">close</i>
                  </button>
                </td>
              </tr>
                </div>
            </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection