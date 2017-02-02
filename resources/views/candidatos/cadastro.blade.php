

@extends('candidatos.template')

@section('titulo', 'SGC - Cadastro de Candidato') 

@section('conteudo')
    <div class = 'container'>
    <br>
       <div class = "row">
            <div class = "col l12">
                <nav>
                    <div class="nav-wrapper teal lighten-2">
                        <div class="col s12">
                            <a href="#!" class="breadcrumb">Home</a>
                            <a href="#!" class="breadcrumb">Candidatos</a>
                            <a href="#!" class="breadcrumb">Cadastro</a>
                        </div>
                    </div>
                </nav>
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
          <div class = "col l12">  
            <form action = "{{action('CandidatosController@cadastrar')}}" method = "post" >
                <input type ="hidden" name = "_token" value = "{{csrf_token()}}">
                <fieldset>
                    <div class = "row">
                        <div class = "input-field col l8">
                            <label for = "campoNome">Nome</label>
                            <input id = "campoNome" type = "text" name = "nome" value = "{{old('nome')}}">
                        </div>
                        <div class = "input-field col l2">
                            <label for = "campoNascimento">Nascimento</label>
                            <input id = "campoNascimento" name = "nascimento" type = "text" value = "{{old('nascimento')}}" >
                        </div>
                        <div class = "input-field col l2">
                            <label for = "campoCPF">CPF</label>
                            <input id = "campoCPF" type = "text" name = "cpf" value = "{{old('cpf')}}">
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "input-field col l2">
                            <label for = "campoTelefoneResidencial">Telefone Residencial</label>
                            <input id = "campoTelefoneResidencial" type = "text" name = "telefone_residencial" value = "{{old('telefone_residencial')}}" >
                        </div>
                        <div class = "input-field col l2">
                            <label for = "campoTelefoneCelular">Telefone Celular</label>
                            <input id = "campoTelefoneCelular" type = "text" name = "telefone_celular" value = "{{old('telefone_celular')}}" >
                        </div>
                    
                        <div class = "input-field col l2">
                            <label for = "campoRG">RG</label>
                            <input id = "campoRG" type = "text" name = "rg"  value = "{{old('rg')}}" >
                        </div>
                        <div class = "input-field col l1">
                            <label title = "RG - Órgão Expedidor"
                            for = "campoRGOrgExp">Org.Exp</label>
                            
                            <input id = "campoRGOrgExp" type = "text" 
                            title = "RG - Órgão Expedidor"
                            name = "rg_org_exp" 
                            value = "{{old('rg_org_exp')}}">

                        </div>
                        <div class = "input-field col l3">
                            
                            <select name = "rg_uf" >
                                <option  value="" disabled selected ></option>
                                @foreach($componentes['estados'] as $estado)
                                    <option <?= old('rg_uf') == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}">{{$estado['nome']}}</option>
                                @endforeach
                            </select>
                            <label>RG - UF</label>
                        </div>
                        <div class = "input-field col l2">
                            <label for = "campoRGData">RG - Data Expedição</label>
                            <input id = "campoRGData" name = "rg_data_expedicao" type = "text" value = "{{old('rg_data_expedicao')}}">
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "input-field col l3">
                            <select name = "estado" >
                                <option  value="" disabled selected ></option>
                                @foreach($componentes['estados'] as $estado)
                                    <option <?= old('estado') == $estado['id'] ? "selected" : "" ?> value = "{{$estado['id']}}"> {{$estado['nome']}}</option>
                                @endforeach
                            </select>
                            <label>Estado</label>
                        </div>
                        <div class = "input-field col l3">
                            <select name = "cidade" >
                                <option  value="" disabled selected ></option>
                                <option <?= old('cidade') == 1 ? "selected" : "" ?> value = "1">Fortaleza</option>
                                <option <?= old('cidade') == 2 ? "selected" : "" ?> value = "2">São Paulo</option>
                                <option <?= old('cidade') == 3 ? "selected" : "" ?> value = "3">Salvador</option> 
                                <option <?= old('cidade') == 4 ? "selected" : "" ?> value = "4">Rio de Janeiro</option>
                            </select>
                            <label>Cidade</label>
                        </div>
                        <div class = "input-field col l3">
                            <label for = "campoCEP">CEP</label>
                            <input id = "campoCEP" name = "cep" type = "text" value = "{{old('cep')}}">
                        </div>
                        <div class = "input-field col l3">
                            <label for = "campoBairro">Bairro</label>
                            <input id = "campoBairro" name = "bairro" type = "text" value = "{{old('bairro')}}">
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "input-field col l2">
                            <select name = "tipo_logradouro" >
                                <option  value="" disabled selected ></option>
                                @foreach($componentes['logradouros'] as $logradouro)
                                    <option <?= old('tipo_logradouro') == $logradouro['id'] ? "selected" : "" ?> value = "{{$logradouro['id']}}">{{$logradouro['nome']}}</option>
                                @endforeach
                            </select>
                            <label>Tipo Logradouro</label>
                        </div>
                        <div class = "input-field col l5">
                            <label for = "campoLogradouro">Logradouro</label>
                            <input id = "campoLogradouro" name = "logradouro" type = "text" value = "{{old('logradouro')}}" >
                        </div>
                        <div class = "input-field col l2">
                            <label for = "campoNumero">Número</label>
                            <input id = "campoNumero" name = "numero" type = "text" value = "{{old('numero')}}">
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <div class = "row">
                        <div class = "input-field col l4">
                            <label for = "campoEmail">E-mail</label>
                            <input id = "campoEmail" type = "text" name = "email" value = "{{old('email')}}"  >
                        </div>
                        <div class = "input-field col l4">
                            <label for = "campoSenha1">Senha</label>
                            <input id = "campoSenha1" type = "password" name = "senha1">
                        </div>
                        <div class = "input-field col l4">
                            <label for = "campoSenha2">Confirme a senha</label>
                            <input id = "campoSenha2" type = "password" name = "senha2">
                        </div>  
                    </div>
                </fieldset>
                <br>
                <div class = "row" >
                    <div class = "col l12">
                        <button class="btn waves-effect waves-light btn col l12" type = "submit" >
                            <i class="material-icons right">send</i>
                            Realizar Cadastro
                            
                        </button>     
                    </div>
                </div>

            </form>
          </div>
       </div>   
    </div>
@endsection

@section('scripts')
    @parent
    <script type = "text/javascript">
         $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection
    
