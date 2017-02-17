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
        
        var clone = $('div[id-cargo]:nth-child(1)').clone();
        var divCargos = $('#cargos');
        clone.appendTo(divCargos);
        if($('div[id-cargo]').length > 1) {
           
            var last = clone.find('.btnAdicionarCargo');
            last.on('click', adicionarNovoCargo);
                
            var last = clone.find('.btnRemoverCargo');
            last.on('click', removerCargo);
            last.removeClass('hide');
            
        }
        
        
    }
    
    function removerCargo() {
        $(this).parents('div[id-cargo]').remove();
    }
    
}());