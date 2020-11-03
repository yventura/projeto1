@extends('layouts.app', ['activePage' => 'comercio_ambulante_Add', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('comercio_ambulante.store') }}" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                    @csrf
                    <!-- Comercio Ambulante -->
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Comercio Ambulante') }}</h4>
                            </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Data') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input class="form-control" name="data" id="input-data" type="date" value="{{ date('Y-m-d') }}" readonly/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Orientação Retirada de cadeiras e Guarda-Sóis') }}</label>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <input class="form-control  text-center" name="valor_ca_01" id="input-valor_ca_01" placeholder="Qtd" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Orientação Retirada de Animais') }}</label>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <input class="form-control  text-center" name="valor_ca_02" id="input-valor_ca_02" placeholder="Qtd" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Orientação Retirada tendas, camping, churrasco') }}</label>
                                    <div class="col-sm-1">
                                            <input class="form-control  text-center" name="valor_ca_03" id="input-valor_ca_03" placeholder="Qtd"/>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="desc_03" id="input-desc_03" required>
                                            <option value="">Selecione</option>
                                            <option value="1">Tendas</option>
                                            <option value="2">Camping</option>
                                            <option value="3">Churrasco</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Orientação Som abusivo') }}</label>
                                    <div class="col-sm-1">
                                        <input class="form-control  text-center" name="valor_ca_04" id="input-valor_ca_04" placeholder="Qtd" required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Orientação Paralisação Esporte') }}</label>
                                    <div class="col-sm-1">
                                        <input class="form-control  text-center" name="valor_ca_05" id="input-valor_ca_05" placeholder="Qtd" required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Orientação Ambulante Irregular - Praias e VC') }}</label>
                                    <div class="col-sm-1">
                                        <input class="form-control  text-center" name="valor_ca_06" id="input-valor_ca_06" placeholder="Qtd" required/>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="desc_06" id="input-desc_06" required>
                                            <option value="">Selecione</option>
                                            <option value="1">Praias</option>
                                            <option value="2">VC</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Vistorias/Cientificações/Apreensão - Praias') }}</label>
                                    <div class="col-sm-1">
                                        <input class="form-control  text-center" name="valor_ca_07" id="input-valor_ca_07" placeholder="Qtd" required/>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="desc_07" id="input-desc_07" required>
                                            <option value="">Selecione</option>
                                            <option value="1">Vistorias</option>
                                            <option value="2">Ciências</option>
                                            <option value="3">Apreensão</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Vistorias/Cientificações/Apreensão - VC') }}</label>
                                    <div class="col-sm-1">
                                        <input class="form-control  text-center" name="valor_ca_08" id="input-valor_ca_08" placeholder="Qtd" required/>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="desc_08" id="input-desc_08" required>
                                            <option value="">Selecione</option>
                                            <option value="1">Vistorias</option>
                                            <option value="2">Ciências</option>
                                            <option value="3">Apreensão</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label m-3">{{ __('Denuncias') }}</label>
                                    <div class="col-sm-1">
                                       <input class="form-control  text-center" name="valor_ca_09" id="input-valor_ca_09" placeholder="Qtd" required/>
                                    </div>
                                </div>

                                <div class="text-center mt-3 mb-4">
                                    <button type="submit" class="btn btn-success ">{{ __('Gerar Ocorrencia') }}</button>
                                </div>
                                <!-- Fim Dados -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
