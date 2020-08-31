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
      <li class="nav-item {{ ($activePage == 'user_management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <p>{{ __('Controle de Usuários') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'user_management') ? 'show' : '' }}" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user_management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('usuario.index') }}">
                <i class="material-icons">persons</i>
                <span class="sidebar-normal"> {{ __('Usuarios Cadastrados') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ ($activePage == 'comerciofixoIndex' || $activePage == 'addCFixo') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#hardwares" aria-expanded="true">
          <p>{{ __('Nova Ocorrencia') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'comerciofixoIndex' || $activePage == 'ComercioFixoAdd') ? 'show' : '' }}" id="hardwares">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'ComercioFixoAdd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('comerciofixo.create') }}">
                <i class="material-icons">add</i>
                <span class="sidebar-normal">{{ __('Comercio Fixo') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'comerciofixoIndex') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laudos" aria-expanded="true">
          <p>{{ __('Relatorios Semanais') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'comerciofixoIndex') ? 'show' : '' }}" id="laudos">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'comerciofixoIndex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('comerciofixo.index') }}">
                <i class="material-icons">list</i>
                <span class="sidebar-normal"> {{ __('Relatorio - Comercio Fixo') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
