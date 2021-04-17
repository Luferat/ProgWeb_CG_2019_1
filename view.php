<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = '';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/view.css';

// JavaScript desta página
$T['pageJS'] = '';

/********** Seus codigos PHP começam aqui **********/

// Obtém o id do artigo da URL
$id = 0;
if (isset($_SERVER['QUERY_STRING'])) {
    $id = intval($_SERVER['QUERY_STRING']);
}

// Volta para a index se a requisição estiver errada
if ($id == 0) header('Location: /index.php');

// Obtém o artigo completo
$sql = "
SELECT *, DATE_FORMAT(art_date, '%d de %M de %Y às %H:%i') AS dataBr 
FROM `articles` 
INNER JOIN `authors` ON art_author = aut_id 
WHERE art_id = {$id} AND art_status = 'ativo' AND art_date <= NOW()
";

print_r($sql);
exit();

/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>
    

</article>

<aside>
    <h3>Sidebar</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque inventore, perferendis autem officia hic ducimus recusandae neque aliquid ullam minima ex officiis cum velit modi, repudiandae consequuntur nulla laborum porro?</p>
</aside>

<?php

require_once ('_footer.php');
