@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Pagina Inicial')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">computer</i>
              </div>
              <p class="card-category">Entrada no Laboratorio</p><br>
              <h4 class="card-title">Analisados: 08/ { 20 }</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">update</i> Ultimos 20 Minutos
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
              <i class="material-icons">computer</i>
              </div>
              <p class="card-category">Recuperados</p>
              <br>
              <br>
              <h4 class="card-title">Recuperados: 05/ { 20 }</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">update</i> Ultimos 20 Minutos
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Laudos PT (Diário)</p>
              <br>
              <h4 class="card-title">Problemas: 03/ { 20 }</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">update</i> Ultimos 20 Minutos
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
              <i class="material-icons">storage</i>
              </div>
              <p class="card-category">Capacidade do Servidor</p>
              <br>
              <h4 class="card-title">Armazenamento: 245
              <small>GB</small>
              <br>
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">update</i> Ultimos 20 Minutos
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
            <h4 class="card-title">Computadores Recuperados</h4>
              <input type="radio" name="semana" value="semana"/> Semana<br />
              <input type="radio" name="mes" value="mes"/> Mes<br />
              <input type="radio" name="ano" value="ano"/> Ano
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">access_time</i> ultima atualização a 2 horas
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
            <h4 class="card-title">Emails Enviados</h4>
              <input type="radio" name="semana" value="semana"/> Semana<br />
              <input type="radio" name="mes" value="mes"/> Mes<br />
              <input type="radio" name="ano" value="ano"/> Ano
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">access_time</i> ultima atualização a 2 horas
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Laudos Perda Total</h4>
              <input type="radio" name="semana" value="semana"/> Semana<br />
              <input type="radio" name="mes" value="mes"/> Mes<br />
              <input type="radio" name="ano" value="ano"/> Ano
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons">access_time</i> ultima atualização a 2 horas
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Informativo:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Bugs
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                      <i class="material-icons">email</i> Webmail
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                            </label>
                          </div>
                        </td>
                        <td>Aqui vai devolver erros para se formar um registro.</td>
                        <td class="td-actions text-right">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                            </label>
                          </div>
                        </td>
                        <td>Aqui vai ter um controle dos e-mails enviados(mostrando a aba send da nossa conta de e-mail)</td>
                        <td class="td-actions text-right">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                            </label>
                          </div>
                        </td>
                        <td>Aqui vai ter um controle da capacidade do servidor</td>
                        <td class="td-actions text-right">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
            <h4 class="card-title">Quantidade de Laudo por Secretaria</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Secretaria</th>
                  <th>Total</th>
                  <th>Recuperados</th>
                  <th>Perda Total</th>
                </thead>
                <tbody>
                  <tr>
                    <td>ADM</td>
                    <td>07</td>
                    <td>02/07</td>
                    <td>05/07</td>
                  </tr>
                  <tr>
                    <td>SESAU</td>
                    <td>07</td>
                    <td>01/07</td>
                    <td>05/07</td>
                  </tr>
                  <tr>
                    <td>SEDEAS</td>
                    <td>07</td>
                    <td>03/07</td>
                    <td>04/07</td>
                  </tr>
                  <tr>
                    <td>AGM</td>
                    <td>07</td>
                    <td>06/07</td>
                    <td>01/07</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush