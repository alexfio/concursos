(function () {
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

        var campoDestinatario = $('#campoDestinatario');
        var campoAssunto = $('#campoAssunto');
        var campoCorpo = $('#campoCorpo');

        if (!(campoAssunto.val() && campoCorpo.val())) {
            
            Materialize.toast('Campos Assunto e Corpo são obrigatórios!', 
            3000, 
            'yellow darken-3');
            
        } else {
            var confirmacao = window.confirm("Deseja enviar o e-mail ?");
            
            var preloader = $('#preloader');
            preloader.css({
                'display': 'block'
            });
            
            if (confirmacao) {
                $.ajax('/api/candidatos/email', {
                    method: "POST",
                    headers: {
                        'content-type': 'application/x-www-form-urlencoded'
                    },
                    data: {
                        destinatario: campoDestinatario.val().split(" - ")[1],
                        assunto: campoAssunto.val(),
                        corpo: campoCorpo.val(),
                    },
                    success: function (dados) {
                        preloader.css({
                            'display': 'none'
                        });
                        
                        Materialize.toast(
                        'E-mail Enviado com sucesso !', 
                        3000, 
                        'teal');
                        
                        $('.modal').modal('close');
                        campoAssunto.val('');
                        campoCorpo.val('');

                    },
                    error: function (dados) {
                        
                        preloader.css({
                            'display': 'none'
                        });
                        
                        Materialize.toast(
                        'Problema ao enviar o E-mail !', 
                        3000, 
                        'red darken-4');
                    }

                });


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
}())