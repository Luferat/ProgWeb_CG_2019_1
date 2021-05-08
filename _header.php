<?php

/***** CABEÇALHO DO TEMPLATE DAS PÁGINAS *****/

// Processa tag <title></title>
if ($T['pageTitle'] == '') {

    // Se o título está em branco (Ex. index)
    $tagTitle = "{$T['siteName']} - {$T['siteSlogan']}";
} else {

    // Se definiu um título
    $tagTitle = "{$T['siteName']} - {$T['pageTitle']}";
}

// Processa CSS da página
if ($T['pageCSS'] == '') {
    $tagCSS = '';
} else {
    $tagCSS = "<link rel=\"stylesheet\" href=\"{$T['pageCSS']}\">\n";
}

// Processa JavaSCript da página
if ($T['pageJS'] == '') {
    $tagJS = '';
} else {
    $tagJS = "<script src=\"{$T['pageJS']}\"></script>\n";
}

// Processa meta tags, uma por vez
$metaTags = '';
foreach($T['meta_'] as $metaName => $metaContent ) :

    $metaTags .= "\t<meta name=\"{$metaName}\" content=\"{$metaContent}\">\n";

endforeach;

?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo $metaTags ?>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $T['templateCSS'] ?>">
    <link rel="icon" href="<?php echo $T['favicon'] ?>">
    <?php echo $tagCSS ?>
    <style>
        /* Altera a fonte padrão conforme tabela 'config' */
        html, body {
            font-family: <?php echo $T['siteFont'] ?>;
        }

        /* Altera a imagem de fundo conforme a tabela 'config' */
        body {
            background-image: url('<?php echo $T['siteBackground'] ?>');
        }
    </style>
    <title><?php echo $tagTitle ?></title>
</head>

<body>

    <a id="top" name="top"></a>

    <div class="wrap">

        <header>
            
            <a href="/"><img src="<?php echo $T['siteLogo'] ?>" alt="Fuinhas - Arte por toda parte."></a>
            <h1>
                <?php echo $T['siteName'] ?>
                <small><?php echo $T['siteSlogan'] ?></small>
            </h1>

        </header>

        <nav>
            <a href="/index.php"><i class="fas fa-home fa-fw"></i><span>Início</span></a>
            <a href="/news.php"><i class="fas fa-newspaper fa-fw"></i><span>Notícias</span></a>
            <a href="/contacts.php"><i class="fas fa-comments fa-fw"></i><span>Contatos</span></a>
            <a href="/about.php"><i class="fas fa-info-circle fa-fw"></i><span>Sobre</span></a>
        </nav>

        <main>