<?php
/***** RODAPÉ DO TEMPLATE DAS PÁGINAS *****/
?>

</main>

<footer>
    <div class="license">
        <a href="/"><i class="fas fa-home fa-fw"></i></a>
        <div>&copy; Copyright <?php echo $T['siteYear'] ?> <?php echo $T['siteOwner'] ?></div>
        <a href="#top"><i class="fas fa-arrow-alt-circle-up fa-fw"></i></a>
    </div>
    <div class="footer-menus">

        <div class="menu-social">
            <ul>
<?php

// Obtém lista de redes sociais, uma por vez
foreach($T['social_'] as $socialName => $socialLink ) :

    // Formata ícone do item
    $socialIcon = "<i class=\"fab fa-{$socialName} fa-fw\"></i>";

    // Formata nome do item
    $socialFaceName = ucfirst($socialName);

    // Exibe item na lista
    echo "\t<li><a href=\"{$socialLink}\" target=\"_blank\">{$socialIcon}<span>{$socialFaceName}</span></a></li>\n";

endforeach;
?>
            </ul>
        </div>
        <div class="menu-tools">
            <ul>
                <li><a href="/"><i class="fas fa-info-circle fa-fw"></i><span>Sobre <?php echo lcfirst($T['siteFullName']) ?></span></a></li>
                <li><a href="/"><i class="fas fa-user-cog fa-fw"></i><span>Sobre o autor</span></a></li>
                <li><a href="/"><i class="fas fa-comments fa-fw"></i><span>Faça contato</span></a></li>
                <li><a href="/"><i class="fas fa-user-lock fa-fw"></i><span>Sua privacidade</span></a></li>
            </ul>
        </div>

    </div>
</footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/js/global.js"></script>
<?php echo $tagJS ?>

</body>

</html>