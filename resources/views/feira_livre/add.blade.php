@extends('layouts.app', ['activePage' => 'livreAdd', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('feira_livre.store') }}" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                    @csrf
                    <!-- Feira Livre -->
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Feira Livre') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label style="color: black" class="col-sm-2 col-form-label">{{ __('Data') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input class="form-control" name="data" id="input-data" type="date" value="{{ date('Y-m-d') }}" readonly/>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label">{{ __('Localização') }}</label>
                                    <div class="col-sm-2">
                                        <select style="color: black" class="form-control" name="valor_fl_01" id="input-valor_fl_01" required>
                                            <option value="">Selecione</option>
                                            <!-- Segunda-Feira -->
                                            <option value="1">R. dos Bandeirantes - Vila Rã</option>
                                            <!-- Terça-Feira -->
                                            <option value="2">R. Ceará - Jd Santence</option>
                                            <option value="3">R. Helena Correa dos Santos - Vila Zilda</option>
                                            <option value="4">R. Bidu Sayão - Perequê</option>
                                            <option value="5">R. Rubens de Sá - Jd Progresso</option>
                                            <!-- Quarta-Feira -->
                                            <option value="6">Av. Miguel Alonso Gonzalez - Jd Las Palmas </option>
                                            <option value="7">R. Romão Salgado - Vila Julia</option>
                                            <option value="8">Av. do Bosque - Pernambuco</option>
                                            <option value="9">R. Carmosina de Freitas - Sta. Cruz dos Navegantes</option>
                                            <option value="10">R. Afonso Nunes - Jd Boa Esperança</option>
                                            <!-- Quinta-Feira -->
                                            <option value="11">R. Manoel Domingos Cravo - Sta Rosa </option>
                                            <option value="12">Av. Odilon Maximiliano dos Santos - Morrinhos II</option>
                                            <!-- Sexta-Feira -->
                                            <option value="13">Alameda das Palmas - Sto Antonio</option>
                                            <option value="14">R. Argentina - Jd Praiano</option>
                                            <!-- Sábado -->
                                            <option value="15">R. Tambaú - Parque Estuário VC</option>
                                            <option value="16">Av. Atlantica - Enseada</option>
                                            <!-- Domingo -->
                                            <option value="17">Av. Santos Dumont - Monteiro da Cruz</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label style="color: black" class="col-sm-4 col-form-label">{{ __('Informação') }}</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control  text-center" name="valor_fl_02" id="input-valor_fl_02" required></textarea>
                                    </div>
                                </div>
                                <div class="text-center mt-3 mb-4">
                                   <button type="submit" class="btn btn-success ">{{ __('Gerar Ocorrencia') }}</button>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Dados -->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
