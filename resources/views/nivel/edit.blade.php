@extends('layouts.app', ['activePage' => 'nivelAdd', 'titlePage' => __('Editar Nivel de Acesso')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form name="formEdit" id="formEdit" method="post" action="{{ url('nivel/'.$nivel->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Editar Nivel</h4>
                            </div>

                            <div class="card-body ">
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input class="form-control" name="nome" id="input-name" type="text" value="{{ $nivel->nome }}" placeholder="{{ __('Nome do Nivel') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Criar Usuario') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="criar_usuario" id="input-create_user" type="checkbox" {{ $nivel->permissoes->criar_usuario ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Editar Usuario') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="editar_usuario" id="input-edit_user" type="checkbox" {{ $nivel->permissoes->editar_usuario ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Gerenciar Niveis') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="gerenciar_niveis" id="input-gerenciar_user" type="checkbox" {{ $nivel->permissoes->gerenciar_niveis ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Gerar Relatorio') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="gerar_relatorio" id="input-gerar_report" type="checkbox" {{ $nivel->permissoes->gerar_relatorio ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Visualizar Relatorio') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="visualizar_relatorio" id="input-view_report" type="checkbox" {{ $nivel->permissoes->visualizar_relatorio ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Imprimir Relatorio') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="imprimir_relatorio" id="input-view_report" type="checkbox" {{ $nivel->permissoes->imprimir_relatorio ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">{{ __('Confirma') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
