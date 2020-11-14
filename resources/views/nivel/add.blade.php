@extends('layouts.app', ['activePage' => 'nivelAdd', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form name="formCad" id="formCad" method="post" action="{{ route('usuario.store') }}">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Novo Nivel</h4>
                            </div>

                            <div class="card-body ">
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Nome do Nivel') }}" required="true" aria-required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Criar Usuario') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="name" id="input-create_user" type="checkbox" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Editar Usuario') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="name" id="input-edit_user" type="checkbox" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Gerenciar Niveis') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="name" id="input-gerenciar_user" type="checkbox" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Gerar Relatorio') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="name" id="input-gerar_report" type="checkbox" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Visualizar Relatorio') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input name="name" id="input-view_report" type="checkbox" required="true"/>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
