// Executa o JavaScript somente quando documento estiver pronto
$(document).ready(runApp);

// aplicativo principal
function runApp() {
    
    // Monitora cliques nas div.
    $(document).on('click', '.about', linkAbout);
}

// Acessa artigo completo
function linkAbout() {
    
    location.href = $(this).attr('data-link');
}