

@extends('commons.template')

@section('titulo', 'SGC - Cadastro de Candidato') 

@section('conteudo')
<br>
<div class = 'container'> 
    <div class ="row">
        <div class ='col s12 m12 l12 teal white-text'>
            
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
        <form action = "{{action('CandidatosController@cadastrar')}}" method = "post" >
            <div class = "col m12 s12 l12 card-panel">    

                <input type ="hidden" name = "_token" value = "{{csrf_token()}}">
                <!--  <fieldset> -->

                <div class = "row">
                    <div class = "input-field col s12 m12 l4">

                        <label for = "campoNome">Nome</label>
                        <input id = "campoNome" type = "text" name = "nome" value = "{{old('nome')}}" 
                               <?= $errors->has('nome') ? "class = 'validate invalid'" : '' ?>  >

                    </div>
                    <div class = "input-field  col s6 m3 l2">
                        <label for = "campoNascimento">Nascimento</label>
                        <input id = "campoNascimento" name = "nascimento" 
                               type = "text" value = "{{old('nascimento')}}" 
                               <?= $errors->has('nascimento') ? "class = 'validate invalid'" : '' ?>  >
                    </div>
                    <div class = "input-field col s6 m3">

                        <select name = "sexo">

                            <option  value="" disabled selected ></option>
                            @foreach($componentes['sexo'] as $sexo)
                            <option <?= old('sexo') == $sexo['id'] ? "selected" : "" ?> value = "{{$sexo['id']}}">{{$sexo['nome']}}</option>
                            @endforeach
                        </select>
                        <label>Sexo</label>
                    </div>
                    <div class = "input-field col s6  m3 l3">
                        <label for = "campoCPF">CPF</label>
                        <input id = "campoCPF" type = "text" name = "cpf" 
                               value = "{{old('cpf')}}"
                               <?= $errors->has('cpf') || old('jaCadastrado') ? "class = 'validate invalid'" : '' ?> >
                    </div>
                    <div class = "input-field col s6 m3 l2">
                        <label for = "campoTelefoneResidencial">Tel. Residencial</label>
                        <input id = "campoTelefoneResidencial" type = "text" 
                               name = "telefone_residencial" value = "{{old('telefone_residencial')}}" 
                               <?= $errors->has('telefone_residencial') ? "class = 'validate invalid'" : '' ?> >
                    </div>
                    <div class = "input-field col s6 m3 l2">
                        <label for = "campoTelefoneCelular">Tel. Celular</label>
                        <input id = "campoTelefoneCelular" type = "text" name = "telefone_celular"
                               value = "{{old('telefone_celular')}}" 
                               <?= $errors->has('telefone_celular') ? "class = 'validate invalid'" : '' ?>  >
                    </div>

                    <div class = "input-field col s6 m3 l2">
                        <label for = "campoRG">RG</label>
                        <input id = "campoRG" type = "text" name = "rg"  value = "{{old('rg')}}" 
                               <?= $errors->has('rg') ? "class = 'validate invalid'" : '' ?> >
                    </div>
                    <div class = "input-field col s6 m3 l1">
                        <label title = "RG - Órgão Expedidor"
                               for = "campoRGOrgExp">Org.Exp</label>

                        <input id = "campoRGOrgExp" type = "text" 
                               title = "RG - Órgão Expedidor"
                               name = "rg_org_exp" 
                               value = "{{old('rg_org_exp')}}"
                               <?= $errors->has('rg_org_exp') ? "class = 'validate invalid'" : '' ?> >

                    </div>
                    <div class = "input-field col s6 m3 l2">

                        <select name = "rg_uf">

                            <option  value="" disabled selected ></option>
                            @foreach($componentes['estados'] as $estado)
                            <option <?= old('rg_uf') == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}">{{$estado['nome']}}</option>
                            @endforeach
                        </select>
                        <label>RG - UF</label>
                    </div>
                    <div class = "input-field col s12 m3">
                        <label for = "campoRGData">RG - Data Expedição</label>
                        <input id = "campoRGData" name = "rg_data_expedicao" type = "text" value = "{{old('rg_data_expedicao')}}"
                               <?= $errors->has('rg_data_expedicao') ? "class = 'validate invalid'" : '' ?> >
                    </div>

                    <div class = "input-field col s12 m4 l2">
                        <select name = "estado" >
                            <option  value="" disabled selected ></option>
                            @foreach($componentes['estados'] as $estado)
                            <option <?= old('estado') == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}"> {{$estado['nome']}}</option>
                            @endforeach
                        </select>
                        <label>Estado</label>
                    </div>
                    <div class = "input-field col s12 m4 l2">
                        <select name = "cidade" >
                            <option  value="" disabled selected ></option>
                            <option <?= old('cidade') == 1831 ? "selected" : "" ?> value = "1831">Fortaleza</option>
                            <option <?= old('cidade') == 2 ? "selected" : "" ?> value = "2">São Paulo</option>
                            <option <?= old('cidade') == 3 ? "selected" : "" ?> value = "3">Salvador</option> 
                            <option <?= old('cidade') == 4 ? "selected" : "" ?> value = "4">Rio de Janeiro</option>
                        </select>
                        <label>Cidade</label>
                    </div>
                    <div class = "input-field col s12 m4 l2">
                        <label for = "campoCEP">CEP</label>
                        <input id = "campoCEP" name = "cep" type = "text" value = "{{old('cep')}}"
                               <?= $errors->has('cep') ? "class = 'validate invalid'" : '' ?> >
                    </div>
                    <div class = "input-field col s12 m3 l2">
                        <label for = "campoBairro">Bairro</label>
                        <input id = "campoBairro" name = "bairro" type = "text" value = "{{old('bairro')}}"
                               <?= $errors->has('bairro') ? "class = 'validate invalid'" : '' ?>>
                    </div>


                    <div class = "input-field col s12 m3 l4">
                        <select name = "tipo_logradouro" >
                            <option  value="" disabled selected ></option>
                            @foreach($componentes['logradouros'] as $logradouro)
                            <option <?= old('tipo_logradouro') == $logradouro['id'] ? "selected" : "" ?> value = "{{$logradouro['id']}}">{{$logradouro['nome']}}</option>
                            @endforeach
                        </select>
                        <label>Tipo Logradouro</label>
                    </div>
                    <div class = "input-field col s8 m4 l3">
                        <label for = "campoLogradouro">Logradouro</label>
                        <input id = "campoLogradouro" name = "logradouro" type = "text" value = "{{old('logradouro')}}" 
                               <?= $errors->has('logradouro') ? "class = 'validate invalid'" : '' ?>>
                    </div>
                    <div class = "input-field col s4 m2">
                        <label for = "campoNumero">Número</label>
                        <input id = "campoNumero" name = "numero" type = "text" value = "{{old('numero')}}"
                               <?= $errors->has('numero') ? "class = 'validate invalid'" : '' ?>>
                    </div>
                    <div class = "input-field col s12 l3">
                        <label for = "campoEmail">E-mail</label>
                        <input id = "campoEmail" type = "text" name = "email" value = "{{old('email')}}" 
                               <?= $errors->has('email') ? "class = 'validate invalid'" : '' ?> >
                    </div>
                    <div class = "input-field col s12 l2">
                        <label for = "campoSenha1">Senha</label>
                        <input id = "campoSenha1" type = "password" name = "senha1"
                               <?= $errors->has('senha1') || $errors->has('senha2') || old('senha1') || old('senha2') ? "class = 'validate invalid'" : '' ?>>
                    </div>
                    <div class = "input-field col s12 l2">
                        <label for = "campoSenha2">Confirme a senha</label>
                        <input id = "campoSenha2" type = "password" name = "senha2"
                               <?= $errors->has('senha1') || $errors->has('senha2') || old('senha1') || old('senha2') ? "class = 'validate invalid'" : '' ?>>
                    </div>  


                </div>


            </div>
            <button class="btn teal waves-effect waves-light btn col s12 m12 l12" type = "submit" >
                <i class="material-icons right">send</i>
                Realizar Cadastro

            </button> 
        </form> 
    </div>   
</div>
@endsection

@section('scripts')
@parent
<script type = "text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });
</script>
@endsection

