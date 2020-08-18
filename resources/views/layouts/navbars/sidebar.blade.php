<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('SOF') }}
    </a>
    
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ ($activePage == 'usuarioCreate' || $activePage == 'user_management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <p>{{ __('Controle de Usuários') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'usuarioCreate' || $activePage == 'user_management') ? 'show' : '' }}" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'usuarioCreate' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('usuario.create') }}">
                <i class="material-icons">add_user</i>
                <span class="sidebar-normal">{{ __('Criar Usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user_management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('usuario.index') }}">
                <i class="material-icons">persons</i>
                <span class="sidebar-normal"> {{ __('Usuarios Cadastrados') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'equipamentosIndex' || $activePage == 'equipamentosAdd') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#hardwares" aria-expanded="true">
          <p>{{ __('Nova Ocorrencia') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'equipamentosIndex' || $activePage == 'equipamentosAdd') ? 'show' : '' }}" id="hardwares">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'equipamentosAdd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('equipamentos.create') }}">
                <i class="material-icons">add</i>
                <span class="sidebar-normal">{{ __('Comercio Fixo') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'equipamentosIndex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('equipamentos.index') }}">
                <i class="material-icons">add</i>
                <span class="sidebar-normal"> {{ __('Item 2') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'laudosIndex' || $activePage == 'laudoAdd') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laudos" aria-expanded="true">
          <p>{{ __('Relatorios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'laudoAdd' || $activePage == 'laudosIndex') ? 'show' : '' }}" id="laudos">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'laudoAdd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('laudos.create') }}">
                <i class="material-icons">list</i>
                <span class="sidebar-normal">{{ __('Relatorio Diario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'laudosIndex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('laudos.index') }}">
                <i class="material-icons">list</i>
                <span class="sidebar-normal"> {{ __('Relatorio Semanal') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'laudosIndex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('laudos.index') }}">
                <i class="material-icons">list</i>
                <span class="sidebar-normal"> {{ __('Todos os Relatorios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>