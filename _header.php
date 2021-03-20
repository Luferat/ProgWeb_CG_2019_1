<?php

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

?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/global.css">
    <?php echo $tagCSS ?>
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
            <a href="/"><i class="fas fa-home fa-fw"></i><span>Início</span></a>
            <a href="/"><i class="fas fa-newspaper fa-fw"></i><span>Notícias</span></a>
            <a href="/"><i class="fas fa-comments fa-fw"></i><span>Contatos</span></a>
            <a href="/"><i class="fas fa-info-circle fa-fw"></i><span>Sobre</span></a>
        </nav>

        <main>