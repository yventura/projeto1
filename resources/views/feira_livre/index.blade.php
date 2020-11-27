@extends('layouts.app', ['activePage' => 'livreIndex', 'titlePage' => __(' ')])

@section('content')
    <br>
    <br>
    <div>
        <div class ="text-center mt-3 mb-4">
            <a href="{{url('feira_livre/create')}}">
                <button class="btn btn-success">Novo Relatorio</button>
            </a>
        </div>
        <div class="col-lg-12 col-md-20">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Feira Livre</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                            <tr>
                                <th>Data</th>
                                <th>Localidade</th>
                                <th>Informação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($feira_livre))
                                @foreach ($feira_livre as $feira)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($feira->data))}}</td>
                                        <td>{{$feira->Desc01($feira->valor_fl_01)}}</td>
                                        <td>{{$feira->valor_fl_02}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Feira Livre - Soma Diária</h4>
                </div>
                <div class="card-body table-responsive">
                    @if($errors->any())
                        <h4 style="color: red;">Erro: {{$errors->first()}}</h4>
                    @endif
                    <form action="{{ route('livre.createPDF') }}" method="POST">
                    @csrf
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Data De Busca:') }}</label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input class="form-control" name="data1" id="input-data-inicial" type="date" max="{{ date('Y-m-d') }}" required />
                                </div>
                            </div>
                            <button type="submit" id="imprimirRelatorio" class="btn btn-warning">Imprimir</button>
                        </div>
                    </form>
                    <table class="table table-hover">
                        <thead class="text">
                            <tr>
                                <th>Data</th>
                                <th>Localidade</th>
                                <th>Informação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($feira_livreTotal))
                                @foreach($feira_livreTotal as $feira)
                                    @foreach($feira->informacoes as $local => $informacoes)
                                        <tr>
                                            <td>{{$feira->data}}</td>
                                            <td>{{App\Livre::Desc01($local)}}</td>
                                            <td>{{ implode('', $informacoes) }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
