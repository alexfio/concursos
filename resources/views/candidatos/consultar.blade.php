@extends('commons.template')

@section('titulo')
Sistema de Gerenciamento de Concursos
@endsection

@section('conteudo')
<div class ="container">
    <br>
    <div class ="row">
        <div class ='col s12 m12 l12 teal white-text'>
            <h4>
                Consultar Candidato
            </h4>
        </div>
    </div>
    <div class ="row card-panel">
        <div class ="col s12 m12 l12">
            <div class = "row">
                <div class = 'input-field col s6 m6 l6'>
                    <label for = "campoNome">Nome</label>
                    <input id = "campoNome" type = "text">
                </div>
                <div class = 'input-field col s3 m3 l3'>
                    <label for = "campoCPF">CPF</label>
                    <input id = "campoCPF" type = "text">
                </div>
                <div class = 'input-field col s2 m2 l2' >
                    <input name="group1" type="radio" id="test1" />
                    <label for="test1">Masculino</label>
                    <input name="group1" type="radio" id="test2" />
                    <label for="test2">Feminino</label>
                </div>
            </div>
            <div class = "row">
                <div class = "input-field col s4 m4 l4">
                    <select name = "estado">
                    <option  value="" disabled selected ></option>
                    @foreach($componentes['estados'] as $estado)
                       <option  value = "{{$estado['id']}}">{{$estado['nome']}}</option>
                    @endforeach
                    </select>
                <label>Estado</label>
                </div>
            </div>
        </div>
    </div>
    <div class = 'row'>
        <div class ='col s12 m12 l12'>
            <button class = 'btn waves-effect right'>
                 <i class="material-icons left">search</i>
                Consultar
            </button>
        </div>
    </div>

    <!--  
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

@section('scripts')
@parent
<script type = 'text/javascript'>
     $(document).ready(function() {
    $('select').material_select();
  });
</script>
@endsection