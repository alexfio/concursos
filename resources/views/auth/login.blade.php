@extends('commons.template')

@section('conteudo')
<div class = "container">
   <div class="row">
      <div class="col s6 m6 l8 offset-s2 offset-m2 offset-l2 ">
        <div class="card-panel white">
            <form action = "{{action('AdminController@index')}}" method="post">
                <input type="hidden" name = "_token" value ="{{csrf_token()}}">
                <div class = "row">
                    <div class = "input-field col s12 m12 l12">
                        <label for = "campoEmail" >E-mail</label>
                        <input id = "campoEmail" name = "email" type = "text" >    
                    </div>
                </div>
                <div class = "row">
                    <div class = "input-field col s12 m12 l12">
                        <label for = "campoSenha" >Senha</label>
                        <input id = "campoSenha" name = "senha" type = "text" >    
                    </div>
                </div>
                <div class = "row">
                    <div class = "col s12 m12 l12 text-left">
                        <a href="{{url('/register')}}" > Não sou Cadastrado </a>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col l12 m12 s12">
                        <button type = "submit" class = 'btn waves-effect waves-light right'>
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div> 
@endsection
