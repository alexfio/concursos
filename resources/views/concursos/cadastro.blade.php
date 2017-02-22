

@extends('commons.template')

@section('titulo', 'SGC - Cadastro de Candidato') 

@section('conteudo')
<br>
<div class = 'container'> 
    <div class ="row">
        <div class ='card-panel col s12 m12 l12 teal white-text'>
            <h4>
                Dados de Concurso
            </h4>
        </div>
    </div>

    @if(count($errors->all()))
    <div class="row">
        <div class="col l12">
            <div class="card red darken-3">
                <div class="card-content white-text">
                    <span class="card-title">O Formulário submetido apresenta erros</span>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(old('jaCadastrado'))
    <div class="row">
        <div class="col l12">
            <div class="card red darken-3">
                <div class="card-content white-text">
                    <span class="card-title">O Formulário submetido apresenta erros:</span>
                    <p>O CPF fornecido já está sendo utilizado.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(old('excecaoGenerica'))
    <div class="row">
        <div class="col l12">
            <div class="card red darken-3">
                <div class="card-content white-text">
                    <span class="card-title">O Formulário submetido apresenta erros:</span>
                    <p>Problema ao submeter dados do candidato. Tente novamento mais tarde.</p>
                    <p>Persistindo o problema, o suporte deve ser contato.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <form action = '{{action('ConcursosController@cadastrar')}}' method = 'post'>
        <input type = 'hidden' name ='_token' value = '{{csrf_token()}}'  >  
        <div class ="row">
            <div class ='input-field col s12 m12 l12'>
                <label for ='campoNome' >Nome</label>
                <input id = "campoNome" 
                       name = 'nome' 
                       type = "text" value = "{{old('nome')}}">
            </div>
        </div>
        <div class = "row">
            <div class="input-field col s12">
                
                <select name = "situacao_concurso" >
                    
                    @foreach($componentes['situacoes'] as $situacao)
                        <option 
                            <?= old('situacao_concurso') == $situacao['id'] 
                                  ? "selected" : ""  ?>
                             value="{{$situacao['id']}}"
                             
                             >{{$situacao['nome']}}</option>
                       
                    @endforeach
                </select>
                <label>Situação Concurso</label>
            </div>
        </div>
        
        <div class = "row">
            <div class ="input-field col s12 m12 l12">
                <textarea 
                    id="campoDescricao" 
                    name = "descricao"
                    class="materialize-textarea">{{old('descricao')}}</textarea>
                <label for="campoDescricao">Descrição</label>
            </div>
        </div>

        <div class = "row">
            <div class ="input-field col s4 m4 l3">
                <label for ="campoEdital" >Edital</label>
                <input id = "campoEdital" 
                       type ="text" 
                       name = "edital"
                       value = "{{old('edital')}}">
            </div>
            <div class ="input-field col s4 m4 l3">            
                <label for ="campoDataInicioInscricoes" >Data Início Inscrições</label>
                <input id = "campoDataInicioInscricoes" 
                       type ="text" 
                       name = "data_inicio_inscricoes"
                       value = "{{old('data_inicio_inscricoes')}}">
            </div>
            <div class ="input-field col s4 m4 l3">
                <label for ="campoDataTerminoInscricoes" >Data Término Inscrições</label>
                <input id = "campoDataTerminoInscricoes" type ="text" 
                       name = "data_termino_inscricoes"
                       value = "{{old('data_termino_inscricoes')}}" >
            </div>
            <div class ="col s4 m4 l3">
                <label for = "campoZero">Zero em Alguma Prova Elimina Candidato</label>
                <br><br>
                <div class="switch">
                    <label>
                        Não
                        <input id ="campoZero" type="checkbox" 
                               value ='true'
                               name = "zerar_alguma_prova_elimina_candidato"
                               <?= old('zerar_alguma_prova_elimina_candidato') ? 'checked' :  ''  ?>>
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
            </div>
        </div>


        <div class ="row">
            <div class ='card-panel col s12 m12 l12 teal white-text'>
                <h4>
                    Definição de Cargos
                </h4>
            </div>
        </div>
         
        <div id ="cargos" class = "row">
          @if(old('cargos'))   
           @for($c = 0; $c < count(old('cargos')['nome_cargo']); $c++)
            <div id-cargo="{{$c + 1}}" class ="row animated fadeIn" >
                <div class ="col s12 m12 l12">
                    <div class="card grey lighten-5">
                        <div class="card-content black-text">
                            <span class="card-title">Novo Cargo</span>
                            <div class ="row">
                                <div class = "col s12 m12 l6">
                                    <div class ="input-field input-group">
                                        <label for = "campoNomeCargo">Nome</label>
                                        <input
                                            id = "campoNomeCargo"
                                            class ="campoNomeCargo"
                                            type = "text" 
                                            name = "cargos[nome_cargo][]"
                                            value = '{{old('cargos')['nome_cargo'][$c]}}'
                                            required>
                                    </div>
                                </div>
                                <div class = "col s12 m12 l3">
                                    <div class ="input-field input-group">
                                        <label for = "campoVagasAmpla">Vagas Ampla Concorrência</label>
                                        <input 
                                            id ="campoVagasAmpla"
                                            class = "campoVagasAmpla" 
                                            type = "number" 
                                            min ="1"
                                            name = "cargos[vagas_ampla][]"
                                            value = '{{old('cargos')['vagas_ampla'][$c]}}'
                                            required>
                                    </div>
                                </div>
                                <div class = "col s12 m12 l3">
                                    <div class ="input-field input-group">
                                        <label for = "campoVagasPCD">Vagas Deficientes</label>
                                        <input
                                            id ="campoVagasPCD"
                                            class = "campoVagasPCD" 
                                            type = "number" 
                                            min ="0"
                                            name = "cargos[vagas_pcd][]"
                                            value = '{{old('cargos')['vagas_pcd'][$c]}}'
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class ="col s12 m12 l6">
                                    <div class ="input-field input-group">
                                        <label for = "campoQtdAprovadosAmpla">
                                            Quantidade Aprovados p/ Ampla Concorrência
                                        </label>
                                        <input 
                                            id = "campoQtdAprovadosAmpla"
                                            class = "campoQtdAprovadosAmpla" 
                                            type = "number" 
                                            min ="1"
                                            name = "cargos[qtd_aprovados_ampla][]"
                                            value = '{{old('cargos')['qtd_aprovados_ampla'][$c]}}'
                                            required>
                                    </div>
                                </div>
                                <div class ="col s12 m12 l6">
                                    <div class ="input-field input-group">
                                        <label for = "campoQtdAprovadosPCD">
                                            Quantidade Aprovados p/ Deficientes
                                        </label>
                                        <input 
                                            id = "campoQtdAprovadosPCD"
                                            class = "campoQtdAprovadosPCD" 
                                            type = "number" 
                                            min ="0"
                                            name = "cargos[qtd_aprovados_pcd][]" 
                                            value = '{{old('cargos')['qtd_aprovados_pcd'][$c]}}'
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class ="col s12 m12 l12">
                    <a class="waves-effect waves-light btn btnRemoverCargo  {{$c == 0 ? 'hide' : '' }}"" >
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        Remover Cargo
                    </a>
                    <a class ="btn teal right btnAdicionarCargo show">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Adicionar Cargo
                    </a>
                </div>

            </div>
           @endfor
          @else
            <div id-cargo="1" class ="row animated fadeIn" >
                <div class ="col s12 m12 l12">
                    <div class="card grey lighten-5">
                        <div class="card-content black-text">
                            <span class="card-title">Novo Cargo</span>
                            <div class ="row">
                                <div class = "col s12 m12 l6">
                                    <div class ="input-field input-group">
                                        <label for = "campoNomeCargo">Nome</label>
                                        <input
                                            id = "campoNomeCargo"
                                            class ="campoNomeCargo"
                                            type = "text" 
                                            name = "cargos[nome_cargo][]"
                                            required>
                                    </div>
                                </div>
                                <div class = "col s12 m12 l3">
                                    <div class ="input-field input-group">
                                        <label for = "campoVagasAmpla">Vagas Ampla Concorrência</label>
                                        <input 
                                            id ="campoVagasAmpla"
                                            class = "campoVagasAmpla" 
                                            type = "number" 
                                            min ="1"
                                            name = "cargos[vagas_ampla][]"
                                            required>
                                    </div>
                                </div>
                                <div class = "col s12 m12 l3">
                                    <div class ="input-field input-group">
                                        <label for = "campoVagasPCD">Vagas Deficientes</label>
                                        <input
                                            id ="campoVagasPCD"
                                            class = "campoVagasPCD" 
                                            type = "number" 
                                            min ="0"
                                            name = "cargos[vagas_pcd][]"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class ="col s12 m12 l6">
                                    <div class ="input-field input-group">
                                        <label for = "campoQtdAprovadosAmpla">
                                            Quantidade Aprovados p/ Ampla Concorrência
                                        </label>
                                        <input 
                                            id = "campoQtdAprovadosAmpla"
                                            class = "campoQtdAprovadosAmpla" 
                                            type = "number" 
                                            min ="1"
                                            name = "cargos[qtd_aprovados_ampla][]"
                                            required>
                                    </div>
                                </div>
                                <div class ="col s12 m12 l6">
                                    <div class ="input-field input-group">
                                        <label for = "campoQtdAprovadosPCD">
                                            Quantidade Aprovados p/ Deficientes
                                        </label>
                                        <input 
                                            id = "campoQtdAprovadosPCD"
                                            class = "campoQtdAprovadosPCD" 
                                            type = "number" 
                                            min ="0"
                                            name = "cargos[qtd_aprovados_pcd][]" 
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class ="col s12 m12 l12">
                    <a class="waves-effect waves-light btn btnRemoverCargo hide" >
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        Remover Cargo
                    </a>
                    <a class ="btn teal right btnAdicionarCargo">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Adicionar Cargo
                    </a>
                </div>

            </div>
          @endif
        </div>
        <div class = 'row' >
            <div class = 'col s12 m12 l12'>
                <button id = 'btnSubmit' type ='submit' class = 'btn teal right'>
                    Salvar Dados
                </button>
            </div>
        </div>
    </form>    


  <!-- Modal Structure -->
  <div id="modalConfirmacao" class="modal">
    <div class="modal-content">
      <h4>Confirmação</h4>
      <p>DESEJA REMOVER O CARGO ?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" 
         class=" 
         modal-action 
         modal-close 
         waves-effect 
         waves-green btn-flat">
          Não
      </a>
        <a 
         id ="btnSimModal"   
         href="#!" 
         class=" 
         modal-action 
         modal-close 
         waves-effect 
         waves-green btn-flat">
          Sim
      </a>
    </div>
  </div>

</div>
@endsection

@section('scripts')
@parent
<script src="{{url('js/concursos/cadastro.js')}}"></script>


@endsection

