@extends('layouts.app', ['activePage' => 'usuarioEdit', 'titlePage' => __(' ')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form name="formEdit" id="formEdit" method="post" action='{{ url("usuario/".$usuario->id) }}'>
                @method('PUT')
                @csrf
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Editar Usuario</h4>
                    </div>
                    <div class="card-body ">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Nome') }}"  value="{{$usuario->name ?? ''}}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{$usuario->email ?? ''}}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Senha') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="password" id="input-password" type="password" placeholder="{{ __('Password') }}" value="{{$usuario->password ?? ''}}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Prontuario') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="prontuario" id="input-prontuario" type="text" placeholder="{{ __('Prontuario') }}" value="{{$usuario->prontuario ?? ''}}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nivel') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control" name="nivel" id="input-nivel" required >
                                            @foreach ($niveis_acessos as $nivel)
                                                <option value="{{ $nivel->id }}" {{ $usuario->nivel == $nivel->id ? 'selected' : '' }}>{{ $nivel->nome }}</option>
                                            @endforeach;
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control" name="status" id="input-status" required>
                                            <option value="0" {{ $usuario->status == 0 ? 'selected' : '' }}>Desabilitado</option>
                                            <option value="1" {{ $usuario->status == 1 ? 'selected' : '' }}>Habilitado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Confirma') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection
