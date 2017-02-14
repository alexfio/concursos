

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

    <div class = "row">
        <div class="input-field col s12">
            <select name = "situacao_concurso" >
                @foreach($componentes['situacoes'] as $situacao)
                <option value="{{$situacao['id']}}">{{ $situacao['nome']}}</option>
                @endforeach
            </select>
            <label>Situação Concurso</label>
        </div>
    </div>


    <div class = "row">
        <div class ="input-field col s12 m12 l12">
            <textarea id="campoDescricao" class="materialize-textarea"></textarea>
            <label for="campoDescricao">Descrição</label>
        </div>
    </div>

    <div class = "row">
        <div class ="input-field col s4 m4 l3">
            <label for ="campoEdital" >Edital</label>
            <input id = "campoEdital" type ="text" name = "edital">
        </div>
        <div class ="input-field col s4 m4 l3">            
            <label for ="campoDataInicioInscricoes" >Data Início Inscrições</label>
            <input id = "campoDataInicioInscricoes" 
                   type ="text" name = "data_inicio_inscricoes">
        </div>
        <div class ="input-field col s4 m4 l3">
            <label for ="campoDataTerminoInscricoes" >Data Término Inscrições</label>
            <input id = "campoDataTerminoInscricoes" type ="text" 
                   name = "data_termino_inscricoes">
        </div>
        <div class ="col s4 m4 l3">
            <label for = "campoZero">Zero em Alguma Prova Elimina Candidato</label>
            <br><br>
            <div class="switch">
                <label>
                    Não
                    <input id ="campoZero" type="checkbox" 
                           name = "zerar_alguma_prova_elimina_candidato">
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

    <div class = "row">
        <div class ="col s12 m12 l12">
            <a class ="btn teal waves-effect right">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Adicionar Cargo
            </a>
        </div>
        <br> <br> <br>
        <div class ="row">
            <div class ="col s12 m12 l12">
                <div class="card grey lighten-5">
                    <div class="card-content black-text">
                        <span class="card-title">Novo Cargo</span>
                        <div class ="row">
                            <div class = "col s12 m12 l6">
                                <div class ="input-field input-group">
                                    <label for = "campoNomeCargo">Nome</label>
                                    <input type = "text" name = "nome_cargo">
                                </div>
                            </div>
                            <div class = "col s12 m12 l3">
                                <div class ="input-field input-group">
                                    <label for = "campoVagasAmpla">Vagas Ampla Concorrência</label>
                                    <input id = "campoVagasAmpla" 
                                           type = "number" 
                                           min ="1"
                                           name = "vagas_ampla">
                                </div>
                            </div>
                            <div class = "col s12 m12 l3">
                                <div class ="input-field input-group">
                                    <label for = "campoVagasPCD">Vagas Deficientes</label>
                                    <input id = "campoVagasPCD" 
                                           type = "number" 
                                           min ="0"
                                           name = "vagas_pcd">
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class ="col s12 m12 l6">
                                <div class ="input-field input-group">
                                    <label for = "campoQtdAprovadosAmpla">
                                        Quantidade Aprovados p/ Ampla Concorrência
                                    </label>
                                    <input id = "campoQtdAprovadosAmpla" 
                                           type = "number" 
                                           min ="1"
                                           name = "qtd_aprovados_ampla">
                                </div>
                            </div>
                            <div class ="col s12 m12 l6">
                                <div class ="input-field input-group">
                                    <label for = "campoQtdAprovadosPCD">
                                        Quantidade Aprovados p/ Deficientes
                                    </label>
                                    <input id = "campoQtdAprovadosPCD" 
                                           type = "number" 
                                           min ="1"
                                           name = "qtd_aprovados_pcd">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
@parent
<script src="{{url('js/concursos/cadastro.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('select').material_select();
});
</script>
@endsection

