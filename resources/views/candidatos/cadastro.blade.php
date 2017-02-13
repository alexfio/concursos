

@extends('commons.template')

@section('titulo', 'SGC - Cadastro de Candidato') 

@section('conteudo')
<br>
<div class = 'container'> 
    <div class ="row">
        <div class ='card-panel col s12 m12 l12 teal white-text'>
            <h4>
                Dados de Candidato
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

        @if(!isset($candidato))

        <form action = "{{action('CandidatosController@cadastrar')}}" method = "post" >

            @else

            <form action = "{{action('CandidatosController@atualizar')}}" method = "post" >

                @endif

                <div class = "col m12 s12 l12 card-panel">    

                    <input type ="hidden" name = "_token" value = "{{csrf_token()}}">

                    <!--Só coloca o id se for para edição de dados de candidato -->
                    @if(isset($candidato))
                    <input type ="hidden" name = "id" value = "{{$candidato['id']}}">
                    @endif

                    <div class = "row">
                        <div class = "input-field col s12 m12 l4">

                            <label for = "campoNome">Nome</label>
                            <input id = "campoNome" 
                                   type = "text" 
                                   name = "nome" 
                                   value = "{{$candidato['nome'] or old('nome') }}" 
                                   <?= $errors->has('nome') ? "class = 'validate invalid'" : '' ?>  
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?>
                                   required>

                        </div>
                        <div class = "input-field  col s6 m3 l2">
                            <label for = "campoNascimento">Nascimento</label>
                            <input id = "campoNascimento" 
                                   name = "nascimento" 
                                   type = "text" 
                                   value = "{{ isset($candidato['cpf']) ? app('transformador')->converterStringDateTimeParaDataBrasileira($candidato['nascimento']) : old('nascimento')}}"
                                   <?= $errors->has('nascimento') ? "class = 'validate invalid'" : '' ?>  
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> 
                                   required>
                        </div>
                        <div class = "input-field col s6 m3">

                            <select name = "sexo" <?= isset($apenasConsulta) ? "disabled" : "" ?> required >

                                <option  value="" disabled selected ></option>
                                @foreach($componentes['sexo'] as $sexo)
                                @if(!isset($candidato))
                                <option <?= old('sexo') == $sexo['id'] ? "selected" : "" ?> value = "{{$sexo['id']}}">{{$sexo['nome']}}</option>
                                @else
                                <option <?= $candidato['sexo_id'] == $sexo['id'] ? "selected" : "" ?> value = "{{$sexo['id']}}">{{$sexo['nome']}}</option>
                                @endif
                                @endforeach
                            </select>
                            <label>Sexo</label>
                        </div>
                        <div class = "input-field col s6  m3 l3">
                            <label for = "campoCPF">CPF</label>
                            <input id = "campoCPF" 
                                   type = "text" 
                                   name = "cpf" 
                                   value = "{{ isset($candidato['cpf']) ? app('transformador')->adicionarMascaraCPF($candidato['cpf']) : old('cpf')}}"
                                   <?= $errors->has('cpf') || old('jaCadastrado') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                        </div>
                        <div class = "input-field col s6 m3 l2">
                            <label for = "campoTelefoneResidencial">Tel. Residencial</label>
                            <input id = "campoTelefoneResidencial" 
                                   type = "text" 
                                   name = "telefone_residencial" 
                                   value = "{{ isset($candidato['telefone_residencial']) ? app('transformador')->adicionarMascaraTelefone($candidato['telefone_residencial']) : old('telefone_residencial')}}"
                                   <?= $errors->has('telefone_residencial') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                        </div>
                        <div class = "input-field col s6 m3 l2">
                            <label for = "campoTelefoneCelular">Tel. Celular</label>
                            <input id = "campoTelefoneCelular" 
                                   type = "text" 
                                   name = "telefone_celular"
                                   value = "{{ isset($candidato['telefone_celular']) ? app('transformador')->adicionarMascaraTelefone($candidato['telefone_celular']) : old('telefone_celular')}}"
                                   <?= $errors->has('telefone_celular') ? "class = 'validate invalid'" : '' ?>  
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                        </div>

                        <div class = "input-field col s6 m3 l2">
                            <label for = "campoRG">RG</label>
                            <input id = "campoRG" 
                                   type = "text" 
                                   name = "rg"  
                                   value = "{{$candidato['rg'] or old('rg')}}" 
                                   <?= $errors->has('rg') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                        </div>
                        <div class = "input-field col s6 m3 l1">
                            <label title = "RG - Órgão Expedidor"
                                   for = "campoRGOrgExp">Org.Exp</label>

                            <input id = "campoRGOrgExp" type = "text" 
                                   title = "RG - Órgão Expedidor"
                                   name = "rg_org_exp" 
                                   value = "{{$candidato['rg_org_exp'] or old('rg_org_exp')}}"
                                   <?= $errors->has('rg_org_exp') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> required>

                        </div>
                        <div class = "input-field col s6 m3 l2">

                            <select name = "rg_uf" <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                                <option  value="" disabled selected ></option>
                                @foreach($componentes['estados'] as $estado)
                                @if(!isset($candidato))
                                <option <?= old('rg_uf') == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}">{{$estado['nome']}}</option>
                                @else
                                <option <?= $candidato['rg_uf'] == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}">{{$estado['nome']}}</option>
                                @endif                  
                                @endforeach
                            </select>

                            <label>RG - UF</label>
                        </div>
                        <div class = "input-field col s12 m3">
                            <label for = "campoRGData">RG - Data Expedição</label>
                            <input id = "campoRGData" 
                                   name = "rg_data_expedicao" 
                                   type = "text" 
                                   value = "{{ isset($candidato['rg_data_expedicao']) ? app('transformador')->converterStringDateTimeParaDataBrasileira($candidato['rg_data_expedicao']) : old('rg_data_expedicao')}}"
                                   <?= $errors->has('rg_data_expedicao') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                        </div>



                        <div class = "input-field col s12 m4 l3">
                            <select id = "campoEstado" name = "estado" <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                                <option  value="" disabled selected ></option>
                                @foreach($componentes['estados'] as $estado)
                                @if(!isset($candidato))
                                <option <?= old('estado') == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}"> {{$estado['nome']}}</option> 
                                @else
                                <option <?= $candidato['estado']['id'] == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}"> {{$estado['nome']}}</option> 
                                @endif
                                @endforeach
                            </select>
                            <label>Estado</label>
                        </div>


                        <div class = "input-field col s12 m4 l2">
                            <select id = "campoCidades" name = "cidade" <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                                <option  value="" disabled selected >Escolha o Estado</option>
                                @if(isset($cidades))
                                    @foreach($cidades as $cidade)
                                        <option <?= $candidato['cidade_id'] == $cidade['id'] ? "selected" : "" ?> value = "{{$cidade['id']}}"> {{$cidade['nome']}}</option> 
                                    @endforeach   
                                @endif              
                            </select>
                            <label>Cidade</label>
                        </div>
                        <div class = "input-field col s12 m4 l2">
                            <label for = "campoCEP">CEP</label>
                            <input id = "campoCEP" 
                                   name = "cep" 
                                   type = "text" 
                                   required
                                   value = "{{ isset($candidato['cep']) ? app('transformador')->adicionarMascaraCEP($candidato['cep']) : old('cep')}}"
                                   <?= $errors->has('cep') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?>
                                   required>
                        </div>
                        <div class = "input-field col s12 m3 l2">
                            <label for = "campoBairro">Bairro</label>
                            <input id = "campoBairro" 
                                   name = "bairro" 
                                   type = "text" 
                                   value = "{{$candidato['bairro'] or old('bairro')}}"
                                   <?= $errors->has('bairro') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?> 
                                   required>
                        </div>


                        <div class = "input-field col s12 m3 l3">
                            <select name = "tipo_logradouro" <?= isset($apenasConsulta) ? "disabled" : "" ?> required>
                                <option  value="" disabled selected ></option>
                                @foreach($componentes['logradouros'] as $logradouro)
                                @if(!isset($candidato))
                                <option <?= old('tipo_logradouro') == $logradouro['id'] ? "selected" : "" ?> value = "{{$logradouro['id']}}">{{$logradouro['nome']}}</option>
                                @else
                                <option <?= $candidato['tipo_logradouro_id'] == $logradouro['id'] ? "selected" : "" ?> value = "{{$logradouro['id']}}">{{$logradouro['nome']}}</option>
                                @endif    
                                @endforeach
                            </select>
                            <label>Tipo Logradouro</label>
                        </div>
                        <div class = "input-field col s8 m4 l3">
                            <label for = "campoLogradouro">Logradouro</label>
                            <input id = "campoLogradouro" 
                                   name = "logradouro" 
                                   type = "text" 
                                   value = "{{$candidato['logradouro'] or old('logradouro')}}" 
                                   <?= $errors->has('logradouro') ? "class = 'validate invalid'" : '' ?>
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?>
                                   required>
                        </div>
                        <div class = "input-field col s4 m2">
                            <label for = "campoNumero">Número</label>
                            <input id = "campoNumero" 
                                   name = "numero" 
                                   type = "text" 
                                   value = "{{$candidato['numero'] or old('numero')}}"
                                   <?= $errors->has('numero') ? "class = 'validate invalid'" : '' ?>
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?>
                                   required>
                        </div>
                        <div class = "input-field col s12 l3">
                            <label for = "campoEmail">E-mail</label>
                            <input id = "campoEmail" 
                                   type = "text" 
                                   name = "email" 
                                   value = "{{$candidato['email'] or old('email')}}" 
                                   <?= $errors->has('email') ? "class = 'validate invalid'" : '' ?> 
                                   <?= isset($apenasConsulta) ? "disabled" : "" ?>
                                   required>
                        </div>

                        @if(!isset($candidato))
                        <div class = "input-field col s12 l2">
                            <label for = "campoSenha1">Senha</label>
                            <input id = "campoSenha1" type = "password" name = "senha1"
                                   <?= $errors->has('senha1') || $errors->has('senha2') || old('senha1') || old('senha2') ? "class = 'validate invalid'" : '' ?> required>
                        </div>
                        <div class = "input-field col s12 l2">
                            <label for = "campoSenha2">Confirme a senha</label>
                            <input id = "campoSenha2" type = "password" name = "senha2"
                                   <?= $errors->has('senha1') || $errors->has('senha2') || old('senha1') || old('senha2') ? "class = 'validate invalid'" : '' ?> required>
                        </div>  
                        @endif


                    </div>


                </div>

                <div class ="row">
                    <div class ='col s6 m6 l6'>
                        <a href = "javascript:history.back(-1)"
                           class = "btn teal waves-effect waves-light large col s6 m6 l6">
                            <i class="material-icons right"></i>
                            Voltar
                        </a>
                    </div>
                    @if(!isset($apenasConsulta))
                    <div class ='col s6 m6 l6'>
                        <button class="btn teal waves-effect waves-light btn col s6 m6 l6 right" type = "submit" >
                            <i class="material-icons right">send</i>
                            Realizar Cadastro
                        </button> 
                    </div>
                    @endif

                </div>


            </form> 
    </div>   
</div>
@endsection

@section('scripts')
@parent
<script src="{{url('js/candidatos/cadastro.js')}}"> </script>

@endsection

