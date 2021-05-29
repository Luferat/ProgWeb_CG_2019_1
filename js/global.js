// JavaScript do Aplicativo

// Monitora usuário logado
firebase.auth().onAuthStateChanged((user) => {

    // Se tem alguém logado
    if (user) {

        // Monta 'view' do usuário logado
        var html = `
<div id="userLogged">        
    <img src="${user.photoURL}" alt="${user.displayName}">
    <div>${user.displayName}</div>
</div>
        `;

        // Mostra usuário logado
        $('#userData').html(html);

        // Monitora click no usuário logado
        $(document).on('click', '#userLogged', logout);
    }
    // Não tem ninguém logado
    else {

        var html = `
<img src="/img/user.png" alt="Logue-se">
<button id="btnLogin"><i class="fab fa-fw fa-google"></i> Entrar / Login</button>        
        `;

        // Mostra botão de login
        $('#userData').html(html);

        // Monitora botão "login"
        $(document).on('click', '#btnLogin', login);
    }
});

// Define o provedor de login social
var provider = new firebase.auth.GoogleAuthProvider();

// Força seleção da conta no login
provider.setCustomParameters({ prompt: 'select_account' });

// Login de usuário
function login() {

    // Define a persistência ao logar
    // LOCAL, SESSION e NONE
    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.SESSION)
        .then(

            // Faz login usando janela pop-up
            firebase.auth().signInWithPopup(provider)
                .then()
                .catch((error) => { console.error('Erro: ', error); })
        )
        .catch((error) => { console.error('Erro: ', error); });

    return false;
}

// Logout de ususário
function logout() {

    // Confirmação
    var msg = `Tem certeza que deseja sair do aplicativo?`;

    if (confirm(msg)) {

        // Faz logout do usuário, mantendo-o cadastrado 
        firebase.auth().signOut();

        // Remove o usuário do aplicativo e perde o Id
        // firebase.auth().currentUser.delete();

    }
    return false;
}