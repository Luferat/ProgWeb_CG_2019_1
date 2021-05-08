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

$res = $conn->query($sql);
$art = $res->fetch_assoc();

// Gera view em HTML
$article = <<<HTML

<h2>{$art['art_title']}</h2>
<small class="autor-date">Por {$art['aut_name']} em {$art['dataBr']}.</small>
{$art['art_text']}

<p class="btn-arts"><a href="/index.php">Lista de Artigos</a></p>

HTML;

// Altera o título da página
$T['pageTitle'] = $art['art_title'];

// Formata autor na sidebar
$artAuthor = <<<HTML

<h4 class="art-autor">
    <a href="{$art['aut_link']}" target="_blank">
        <img class="flush" src="{$art['aut_image']}" alt="{$art['aut_name']}">
        {$art['aut_name']}
    </a>
</h4>

HTML;

// Obtém outros artigos do mesmo autor
$sql = "
SELECT `art_id`, `art_title`
FROM `articles` 
WHERE `art_status` = 'ativo' AND art_date <= NOW() AND art_author = '{$art['aut_id']}' AND art_id != '{$art['art_id']}'
ORDER BY art_date DESC
";
$res = $conn->query($sql);
if ($res->num_rows > 0) {

    $artAuthor .= "<h4>Artigos do autor</h4><ul class=\"autor-articles\">";

    while ($more = $res->fetch_assoc()) {

        $artAuthor .= "<li><a href=\"/view.php?{$more['art_id']}\">{$more['art_title']}</a></li>";
    }
    
    $artAuthor .= "</ul>";
}

/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>

    <?php echo $article ?>

</article>

<aside>
<?php echo $artAuthor ?>
</aside>

<?php

require_once ('_footer.php');
