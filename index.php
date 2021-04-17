<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = '';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/index.css';

// JavaScript desta página
$T['pageJS'] = '/js/index.js';

/********** Seus codigos PHP começam aqui **********/

// Obter os artigos do database
$sql = "
    SELECT `art_id`, `art_image`, `art_title`, `art_intro` 
    FROM `articles` 
    WHERE `art_status` = 'ativo' AND art_date <= NOW()
    ORDER BY art_date DESC
";
$res = $conn->query($sql);

// Variável com a lista (view) dos artigos
$articles = '';

while ($art = $res->fetch_assoc()) :

    $articles .= <<<HTML
    
    <div class="article" data-link="/view.php?{$art['art_id']}">
        <img src="{$art['art_image']}" alt="{$art['art_title']}">
        <div>
            <h3>{$art['art_title']}</h3>
            {$art['art_intro']}
        </div>
    </div>
    
HTML;

endwhile;

/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>

    <h2>Artigos Recentes</h2>
    <small>Mais recentes primeiro.</small>
    
    <?php echo $articles ?>

</article>

<aside>
    <h3>Sidebar</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque inventore, perferendis autem officia hic ducimus recusandae neque aliquid ullam minima ex officiis cum velit modi, repudiandae consequuntur nulla laborum porro?</p>
</aside>

<?php

require_once ('_footer.php');
