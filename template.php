<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = 'Template';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/template.css';

// JavaScript desta página
$T['pageJS'] = '/js/template.js';

/********** Seus codigos PHP começam aqui **********/



/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

            <article>
                
                <h2>Título da página</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero, soluta, dolore adipisci impedit beatae nulla quaerat dicta alias illum nemo reiciendis provident quibusdam eaque odit. Provident ipsa nihil ullam blanditiis!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut voluptatibus eos explicabo? Minima molestiae, culpa quam nemo illo obcaecati rem facilis repudiandae? Qui aliquam aspernatur, voluptatem dolorum aperiam porro. Natus?</p>
                <img src="https://picsum.photos/400/200" alt="Imagem aleatória" style="width: 100%;max-width:auto">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quod velit aperiam aliquid voluptas repellendus sed libero necessitatibus consequuntur nisi ea quasi beatae nulla dolor, dolores eaque modi adipisci reprehenderit.</p>
                <h4>Lista de links:</h4>
                <ul>
                    <li><a href="http://luferat.net">Site do fessô</a></li>
                    <li><a href="http://github.com/luferat">GitHub</a></li>
                    <li><a href="http://php.net">Oficial do PHP</a></li>
                </ul>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio beatae id consequatur ullam expedita.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum fugit, repellendus impedit accusamus aut provident nisi tempore illum, laboriosam eaque illo beatae fuga adipisci nesciunt eius saepe? Impedit, possimus illo!</p>

            </article>

            <aside>
                <h3>Sidebar</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque inventore, perferendis autem officia hic ducimus recusandae neque aliquid ullam minima ex officiis cum velit modi, repudiandae consequuntur nulla laborum porro?</p>
            </aside>

<?php

require_once ('_footer.php');
