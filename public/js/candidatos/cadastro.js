(function () {

    $(document).ready(function () {
        registrarMascaras();
        registrarEventos();
        $('select').material_select();
    });


    function registrarMascaras() {
        $(document).ready(function () {
            $('#campoNascimento').mask('00/00/0000');
            $('#campoRGData').mask('00/00/0000');
            $('#campoCPF').mask('000.000.000-00');
            $('#campoTelefoneResidencial').mask('(00)0000-0000');
            $('#campoTelefoneCelular').mask('(00)00000-0000');
            $('#campoCEP').mask('00000-000');
        });
    }

    function registrarEventos() {
        $('#campoEstado').on('change', function () {
            var campoEstado = $(this);
            carregarCidades(campoEstado);
        });
       
    }

    function carregarCidades(campoEstado) {
        var campoOpcaoSelecionada = campoEstado.find('option:selected');
        var idEstado = campoOpcaoSelecionada.val();
        
        $.ajax('/api/estados/'+ idEstado +'/cidades', {
            method: 'GET',
            success: function (dados) {
                var campoCidades = $('#campoCidades');
                var cidadesAssociadas = dados;
                campoCidades.find('option').remove();
                cidadesAssociadas.forEach(function (cidade) {
                    var novaOption = $("<option>");
                    novaOption.val(cidade.id);
                    novaOption.text(cidade.nome);
                    campoCidades.append(novaOption);
                });

                //Renderizar novamente o select(materialize)
                $('select').material_select();
            }
        });





    }
}());