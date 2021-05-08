<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = 'Sobre';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/about.css';

// JavaScript desta página
$T['pageJS'] = '/js/about.js';

/********** Seus codigos PHP começam aqui **********/

// Obter os 'sobre' (about) do database
$sql = "
SELECT `abt_id`, `abt_image`, `abt_title`, `abt_intro`
FROM `about` 
WHERE `abt_status` = 'ativo'
ORDER BY `abt_order` ASC
";
$res = $conn->query($sql);

// Variável com a lista (view) dos "sobre"
$abouts = '';

while ($abt = $res->fetch_assoc()) :

    // print_r($abt);

    $abouts .= <<<HTML
    
    <div class="about" data-link="/abtview.php?{$abt['abt_id']}">
        <img src="{$abt['abt_image']}" alt="{$abt['abt_title']}">
        <div>
            <h3>{$abt['abt_title']}</h3>
            {$abt['abt_intro']}
        </div>
    </div>
    
HTML;

endwhile;

/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>

    <h2>Sobre</h2>
    <p>Saiba mais sobre agente.</p>
    <?php echo $abouts ?>

</article>

<aside>
    <h3>Sidebar</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque inventore, perferendis autem officia hic ducimus recusandae neque aliquid ullam minima ex officiis cum velit modi, repudiandae consequuntur nulla laborum porro?</p>
</aside>

<?php

require_once ('_footer.php');
