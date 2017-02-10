$(document).ready(function () {
    registrarEventos();
});

function registrarEventos() {
    $('select').material_select();
    $('.modal').modal();
    $("a[id^='candidato'").on('click', carregarDadosCandidato);
    $('#botaoEnviarEmail').on('click', enviarEmail);
    $('#botaoCancelarEmail').on('click', fecharModalEmail);
}

function carregarDadosCandidato() {
    var idCandidato = $(this).attr('id').split('-')[1];

    $.ajax("/api/candidatos/" + idCandidato, {
        method: "GET",
        success: function (dados) {
            $('#campoDestinatario').val(dados.nome + " - " + dados.email);
        }
    });
}

function enviarEmail() {


    var campoAssunto = $('#campoAssunto');
    var campoCorpo = $('#campoCorpo');

    if (!(campoAssunto.val() && campoCorpo.val())) {
        alert("Campos Assunto e Corpo são de preenchimento obrigatório");
    } else {
        var confirmacao = window.confirm("Deseja enviar o e-mail ?");
        if (confirmacao) {
            /**
            $.ajax('', {
               method: "POST",
            });
            **/
            console.log('E-mail enviado');
            $('.modal').modal('close');
            campoAssunto.val('');
            campoCorpo.val('');
        } else {
            console.log('E-mail cancelado');
        }
    }
}

function fecharModalEmail() { 
    $('.modal').modal('close');
    var campoAssunto = $('#campoAssunto');
    var campoCorpo = $('#campoCorpo');
    campoAssunto.val('');
    campoCorpo.val('');
}
