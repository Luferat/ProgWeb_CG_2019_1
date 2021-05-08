<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = 'Notícias Atualizadas';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/news.css';

// JavaScript desta página
$T['pageJS'] = '/js/news.js';

/********** Seus codigos PHP começam aqui **********/



/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>
    
    <h3>Notícias Atualizadas</h3>
    <p>Últimas notícias do Brasil e do mundo no Google News sobre '<span id="keyword"></span>'.</p>
    <div id="news"></div>

</article>

<aside>
    <h3>Sidebar</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque inventore, perferendis autem officia hic ducimus recusandae neque aliquid ullam minima ex officiis cum velit modi, repudiandae consequuntur nulla laborum porro?</p>
</aside>

<?php

require_once ('_footer.php');
