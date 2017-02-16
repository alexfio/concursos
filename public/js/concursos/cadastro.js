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
        var clone = $($('div[id-cargo]')[0]).clone();
        
        var divCargos = $('#cargos');
        clone.appendTo(divCargos);
        registrarEventos(); 
        
    }
    
    function removerCargo() {
        console.log('oi');
        $(this).parents('div[id-cargo]').remove();
    }
    
}());