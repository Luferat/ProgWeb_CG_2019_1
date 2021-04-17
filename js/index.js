// Executa o JavaScript somente quando documento estiver pronto
$(document).ready(runApp);

// aplicativo principal
function runApp() {
    
    // Monitora cliques nas div.
    $(document).on('click', '.article', linkArticle);
}

// Acessa artigo completo
function linkArticle() {
    
    location.href = $(this).attr('data-link');
}