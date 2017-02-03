@extends('commons.template')

@section('titulo')
Sistema de Gerenciamento de Concursos
@endsection

@section('conteudo')
<div class ="container">
    <br>
    <div class = "row">
        <div class = "col s12 m12 l12">
            <nav>
                <div class="nav-wrapper teal lighten-2">
                    <div class="col s12 m12 l12">
                        <a href="{{action('AdminController@index')}}" class="breadcrumb">Home</a>
                        <a href="{{action('CandidatosController@index')}}" class="breadcrumb">Candidatos</a>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class ="row">
        <div class = "col s12 m12 l12">
            <a  href ="{{action('CandidatosController@carregarViewCadastrar')}}"
                class = "btn btn-large waves-effect waves-light col s12 m12 l12">
                <i class="material-icons left">perm_identity</i>
                Cadastrar Candidato
            </a>
        </div>
    </div>
    <div class ="row">
        <div class ="col s12 m12 l12 ">
            <nav>
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field teal lighten-2">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class ="row">
        <div class = "col s12 m12 l12">
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active teal"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
    </div>
    <div class ='row'>
        <div class = "col s12 m12 l12">
            <table class = "bordered striped responsive-table card-panel">
                <thead>
                    <tr>
                        <th data-field="id">Identificador</th>
                        <th data-field="name">Nome</th>
                        <th data-field="price">CPF</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>00001</td>
                        <td>Francisco Chagas Alexandre de Souza Filho</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00002</td>
                        <td>Juarez de Souza Cabrito</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00003</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00004</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00005</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00006</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00007</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00008</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                    <tr>
                        <td>00009</td>
                        <td>Fulana da Silva Sauro</td>
                        <td>024.666.123-99</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection