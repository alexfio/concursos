(function(){
    
    
    $(document).ready(function(){
        registrarEventos();
    });
    
    function registrarEventos() {
        var botoesAddCargo = $('.btnAdicionarCargo');
        botoesAddCargo.on('click', adicionarNovoCargo);
        var botoesRemover = $('.btnRemoverCargo');
        botoesRemover.on('click', removerCargo);
    }
    
    function adicionarNovoCargo() {
            
        var clone = $('div[id-cargo]:last-child').clone();
        var divCargos = $('#cargos');
        
        clone.attr('id-cargo', parseInt(clone.attr('id-cargo')) + 1);
        
        clone.find('.campoNomeCargo').attr('name', 'cargos[nome_cargo][]');
        clone.find('.campoNomeCargo').val('');
        clone.find('.campoVagasAmpla').attr('name', 'cargos[vagas_ampla][]');
        clone.find('.campoVagasAmpla').val('');
        clone.find('.campoVagasPCD').attr('name', 'cargos[vagas_pcd][]');
        clone.find('.campoVagasPCD').val('');
        clone.find('.campoQtdAprovadosAmpla').attr('name', 'cargos[qtd_aprovados_ampla][]');
        clone.find('.campoQtdAprovadosAmpla').val('');
        clone.find('.campoQtdAprovadosPCD').attr('name', 'cargos[qtd_aprovados_pcd][]');
        clone.find('.campoQtdAprovadosPCD').val('');
        
        clone.appendTo(divCargos);
        
        if($('div[id-cargo]').length > 1) {
           
            var last = clone.find('.btnAdicionarCargo');
            last.on('click', adicionarNovoCargo);
                
            var last = clone.find('.btnRemoverCargo');
            last.on('click', removerCargo);
            last.removeClass('hide');
            
        }
        
        $.smoothScroll({
           scrollTarget: '#btnSubmit'
        });
        
        
    }
    
    function removerCargo() {
        var confirmacao = confirm('Deseja Remover o Cargo ?');
        if(confirmacao) {
            $(this).parents('div[id-cargo]').remove();
        }
            
            
    }
    
}());