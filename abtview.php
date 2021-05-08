<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = 'Sobre';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/abtview.css';

// JavaScript desta página
$T['pageJS'] = '';

/********** Seus codigos PHP começam aqui **********/

// Obtém o id do 'sobre' da URL
$id = 0;
if (isset($_SERVER['QUERY_STRING'])) {
    $id = intval($_SERVER['QUERY_STRING']);
}

// Volta para a 'sobre' se a requisição estiver errada
if ($id == 0) header('Location: /about.php');

// Obtém o 'sobre' completo
$sql = "
SELECT *
FROM `about` 
WHERE abt_id = '{$id}' AND abt_status = 'ativo'
";
$res = $conn->query($sql);
$abt = $res->fetch_assoc();

// Gera view em HTML
$about = <<<HTML

<h2>{$abt['abt_title']}</h2>
{$abt['abt_text']}

<p class="btn-abts"><a href="/about.php">Voltar para Sobre</a></p>

HTML;

// Atualiza o título da página
$T['pageTitle'] = $abt['abt_title'];

/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>

    <?php echo $about ?>

</article>

<aside>

    <h3>Sidebar</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In blanditiis, sed sint quasi id dolorum quis. Iste quidem perferendis et, eius ab doloribus doloremque totam dolores inventore rerum sunt ipsa.</p>

</aside>

<?php

require_once ('_footer.php');
