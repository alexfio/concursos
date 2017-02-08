
<nav>
  <div class="nav-wrapper teal">
    <a href="{{action('AdminController@index')}}" class="brand-logo">Painel Administrativo</a>
    
   
        <ul class="right hide-on-med-and-down">
      <li>
          <a href="{{action('CandidatosController@index')}}">
              <i class="material-icons left">supervisor_account</i>
              Candidatos
          </a>
      </li>
      <li>
          <a href="{{action('ConcursosController@index')}}">
              <i class="material-icons left">reorder</i>
              Concursos
          </a>
      </li>
      <!-- Dropdown Trigger -->
      
      <li>
          
          <a class="dropdown-button" href="#!" data-activates="dropdown1">
              <i class="material-icons left">settings</i>
              Alexandre Filho
              <i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
   
    
  </div>
</nav>


<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!"> Alterar Dados</a></li>
  <li class="divider"></li>
  <li><a href="#!">Sair</a></li>
</ul>
