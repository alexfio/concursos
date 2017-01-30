

@extends('candidatos.template')

@section('titulo', 'SGC - Cadastro de Candidato') 

@section('conteudo')
    <div class = 'container'>
        <br>
        <div class = "" >
            <?php var_dump($errors->all()) ?>
        </div>
        <br>
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
                            <option <?= old('rg_uf') == 1 ? "selected" : "" ?>  value = "1"> Ceará</option>
                            <option <?= old('rg_uf') == 2 ? "selected" : "" ?>  value = "2">Mato Grosso</option>
                            <option <?= old('rg_uf') == 3 ? "selected" : "" ?> value = "3">Mato Grosso do Sul</option> 
                            <option <?= old('rg_uf') == 4 ? "selected" : "" ?> value = "4">Rio Grande do Sul</option>
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
                            <option  <?= old('estado') == 1 ? "selected" : "" ?>  value = "1">Ceará</option>
                            <option  <?= old('estado') == 2 ? "selected" : "" ?> value = "2">Mato Grosso</option>
                            <option  <?= old('estado') == 3 ? "selected" : "" ?>  value = "3">Mato Grosso do Sul</option> 
                            <option  <?= old('estado') == 4 ? "selected" : "" ?> value = "4">Rio Grande do Sul</option>
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
                            <option value = "1">Alameda</option>
                            <option value = "2">Avenida</option>
                            <option value = "3">Rua</option> 
                            <option value = "4">Travessa</option>
                        </select>
                        <label>Tipo Logradouro</label>
                    </div>
                    <div class = "input-field col l5">
                        <label for = "campoLogradouro">Logradouro</label>
                        <input id = "campoLogradouro" name = "logradouro" type = "text">
                    </div>
                    <div class = "input-field col l2">
                        <label for = "campoNumero">Número</label>
                        <input id = "campoNumero" name = "numero" type = "text">
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class = "row">
                    <div class = "input-field col l4">
                        <label for = "campoEmail">E-mail</label>
                        <input id = "campoEmail" type = "text" name = "email">
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
@endsection

@section('scripts')
    @parent
    <script type = "text/javascript">
         $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection
    
