<?php
include(__DIR__ . '/../database/db.php');

$errorMessage = [];

// функція додавання користувача до бд
function userAuth($user){

    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']) {
        header('Location: ' . BASE_URL . 'admin/posts/index.php');
    }else {

        header('Location: ' . BASE_URL);
    }
}


$users =selectAll('users');

// код для регістрації користувача
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['button-reg'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passwordF = trim($_POST['pass-first']);
    $passwordS = trim($_POST['pass-second']);
    if (empty($login) || empty($email) || empty($passwordF) || empty($passwordS)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($login, 'utf8') < 2) {
        $errorMessage[] = "Логин має бути більше 2 символів";
    }elseif ($passwordF !== $passwordS) {
        $errorMessage[] = "Паролі мають бути однакові";
    }
    else  {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            $errorMessage[] = "Користувач с такою поштою вже існує";
        }else {
            $pass = password_hash($passwordF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }
    }

}
else{

    $login = '';
    $email = '';
}
// код для авторизації

if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['button-log'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    if (empty($email) || empty($pass)) {
        $errorMessage[] = "Не всі поля заповнені";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])) {
            userAuth($existence);
        }else{
            $errorMessage[] = "Почта чи пароль не правильно";
        }
    }
}else{
    $email = '';
}
// код для админ панелі для створення користувача
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['create-user'])) {


    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passwordF = trim($_POST['pass-first']);
    $passwordS = trim($_POST['pass-second']);
    if (empty($login) || empty($email) || empty($passwordF) || empty($passwordS)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($login, 'utf8') < 2) {
        $errorMessage[] = "Логин має бути більше 2 символів";
    }elseif ($passwordF !== $passwordS) {
        $errorMessage[] = "Паролі мають бути однакові";
    }
    else  {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            $errorMessage[] = "Користувач с такою поштою вже існує";
        }else {
            $pass = password_hash($passwordF, PASSWORD_DEFAULT);
            if(isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            header('Location: ' . BASE_URL . 'admin/users/index.php');

        }
    }

}
else{

    $login = '';
    $email = '';
}
// Видалення користувача
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('Location: ' . BASE_URL . 'admin/users/index.php');
}

// Редагування користувача через админ панель
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update-user'])) {
    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $passwordF = trim($_POST['pass-first']);
    $passwordS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if (empty($login)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($login, 'utf8') < 2) {
        $errorMessage[] = "Логін має бути більше 2 символів ";
    }elseif ($passwordF !== $passwordS) {
    $errorMessage[] = "Паролі мають бути однакові";
    }
    else  {
        $pass = password_hash($passwordF, PASSWORD_DEFAULT);
        if(isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
//            'email' => $email,
            'password' => $pass
        ];

        $user = update('users', $id ,$user );
        header('Location: ' . BASE_URL . 'admin/users/index.php');
    }

}
else{
    $login = '';
    $email = '';
}



