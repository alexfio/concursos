@extends('commons.template')

@section('titulo')
Sistema de Gerenciamento de Concursos
@endsection

@section('conteudo')
<div class ="container">
    <br>

    <div class ="row">
        <div class = "col s12 m12 l12 right-align">
            <a  href ="{{action('CandidatosController@carregarViewCadastrar')}}"
                class = "btn btn-large waves-effect waves-light">
                <i class="material-icons left">mode_edit</i>
                Novo Concurso
            </a>
            <a  href ="#!"
                class = "btn btn-large waves-effect waves-light">
                <i class="material-icons left">search</i>
                Consultar Concurso
            </a>
            <a  href ="#!"
                class = "btn btn-large waves-effect waves-light">
                <i class="material-icons left">spellcheck</i>
                Respostas
            </a>
            <a  href ="#!"
                class = "btn btn-large waves-effect waves-light">
                <i class="material-icons left">library_books</i>
                Disciplinas
            </a>
        </div>
    </div>

    <!--  <div class ="row">
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
     </div> -->
</div>
@endsection