<?php

/* Configuração do site */
require_once ('_config.php');

/* Configurações desta página */

// Título da página. Se estiver em branco usa o padrão.
$T['pageTitle'] = 'Faça Contato';

// Folhas de estilo desta página
$T['pageCSS'] = '/css/contacts.css';

// JavaScript desta página
$T['pageJS'] = '';

/********** Seus codigos PHP começam aqui **********/

// Desliga feedback
$feedback = '';

// Um formulário está sendo enviado
if (isset($_POST['send'])) :

    // Recebe e sanitiza os campos
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

    // Salva contato no banco de dados
    $sql = "
        INSERT INTO contacts (name, email, subject, message)
        VALUES (
            '{$name}',
            '{$email}',
            '{$subject}',
            '{$message}'
        );    
    ";
    $res = $conn->query($sql);
    
    // Envia aviso por e-mail ao admin do site
    $mailMessage = <<<TXT
Olá {$T['siteOwner']}!

Um contato foi enviado por "{$T['siteName']}":

    Nome: {$name}
    E-mail: {$email}
    Assunto: {$subject}

{$message}

Obrigado...
        
TXT;

    @mail(
        $T['siteOwnerEmail'],
        'Contato enviado de "Fuinhas".',
        $mailMessage
    );

    // Feedback
    $feedback = <<<HTML

<strong>Olá {$name}!</strong>
<p>Seu contato foi enviado para a equipe do {$T['siteName']}.</p>
<em>Obrigado!</em>

HTML;


    // exit("foi");

endif;

/********** Seus codigos PHP terminam aqui **********/

// Inclui cabeçalho do HTML
require_once ('_header.php');

?>

<article>

    <h2>Faça Contato</h2>

<?php if ($feedback == ''): ?>    

    <form method="post" id="contact" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="send" value="ok">

        <p>Preencha os campos abaixo para entrar em contato conosco.</p>
        <p class="advise">Todos os campos são obrigatórios.</p>

        <p>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required minlength="3" class="valid">
        </p>

        <p>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required class="valid">
        </p>

        <p>
            <label for="subject">Assunto:</label>
            <input type="text" name="subject" id="subject" required minlength="3" class="valid">
        </p>

        <p>
            <label for="message">Mensagem:</label>
            <textarea name="message" id="message" required minlength="5" class="valid"></textarea>
        </p>

        <p>
            <label></label>
            <button type="submit" name="submit" class="primary">Enviar</button>
        </p>

    </form>

<?php else: ?>

    <div class="feedback"><?php echo $feedback ?></div>

<?php endif; ?>

</article>

<aside>
    <h3>Sidebar</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque inventore, perferendis autem officia hic ducimus recusandae neque aliquid ullam minima ex officiis cum velit modi, repudiandae consequuntur nulla laborum porro?</p>
</aside>

<?php

require_once ('_footer.php');
