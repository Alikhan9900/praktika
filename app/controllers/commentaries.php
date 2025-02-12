<?php
include_once SITE_ROOT . "/app/database/db.php";

$commentsForAdm = selectAll('comments');
$page = isset($_GET['post']) ? $_GET['post'] : '';
$login = isset($_SESSION['login'] )  ? $_SESSION['login'] : '';
$comment = '';
$errorMessage = [];
$status = 0;
$comments = [];


// Додавання коментарів
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['goComment'])) {
    $comment = trim($_POST['comment']);

    if (empty($comment)) {
        $errorMessage[] = "Не всі поля заповнені";
        $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
    } elseif (mb_strlen($comment, 'utf8') < 2) {
        $errorMessage[] = "Коментар має бути більше 2 символів ";
        $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
    } else {

        $user = selectOne('users', ['username' => $login]);
        if ($login == '') {
            $errorMessage[] = "Для того щоб залишити коментар треба зареєструватись";
            $comments = selectAll('comments', ['page' => $page, 'status' => 1]);

        } else {
            $status = 1;
            $comment = [
                'status' => $status,
                'page' => $page,
                'username' => $login,
                'comment' => $comment,
            ];
            $comment = insert('comments', $comment);
            $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
        }
    }

} else {
    $comment = '';
    $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
}

// Редагування коментарів
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $oneComment = selectOne('comments', ['id' => $_GET['id']]);
    $id =  $oneComment['id'];
    $login =  $oneComment['username'];
    $text1 = $oneComment['comment'];
    $pub = $oneComment['status'];
}


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_comment'])){
    $id =  $_POST['id'];
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish']) ? 1 : 0;
    if (empty($text)) {
        $errorMessage[] = "Коментар пустий";
    }elseif (mb_strlen($text, 'utf8') < 1) {
        $errorMessage[] = "Коментар має містити в собі більше 1 символів ";
    }
    else  {
        $com = [
            'comment' => $text,
            'status' => $publish,
        ];
        $comment = update('comments', $id, $com );
        header('Location: ' . BASE_URL . 'admin/comments/index.php');
    }

}
else{
    if (isset($_POST['content'])) {
        $text = trim($_POST['content']);
    } else {
        $text = '';
    }

    if (isset($_POST['publish'])) {
        $publish = 1;
    } else {
        $publish = 0;
    }
}
// Статус
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('comments', $id, ['status' => $publish]);
    header('Location: ' . BASE_URL . 'admin/comments/index.php');
    exit();
}
// Видалення поста
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header('Location: ' . BASE_URL . 'admin/comments/index.php');
}
