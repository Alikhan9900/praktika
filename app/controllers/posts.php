<?php

include  SITE_ROOT . '/app/database/db.php';
if(!$_SESSION){
    header("location: " . BASE_URL  . "log.php");
}


$errorMessage = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');


// Додавання поста
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_post'])) {

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\". $imgName;

        if(strpos($fileType, 'image') === false){
            $errorMessage[] = "Загружати можна тільки зображення";
        }else {

            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                $errorMessage[] = "Ошибка загрузки изображение на сервер";

            }
        }
    }else{
        $errorMessage[] = "Ошибка получение зображення";

    }
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if (empty($title) || empty($content) || empty($topic)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($title, 'utf8') < 2) {
        $errorMessage[] = "Назва поста маєї бути більше 2 символів ";
    }
    else  {
        $post  = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('Location: ' . BASE_URL . 'admin/posts/index.php');
    }

}
else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}

// Редагування поста
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_post'])) {

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = addslashes(trim($_POST['content']));
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];

        $destination = ROOT_PATH . "\assets\images\posts\\". $imgName;

        if(strpos($fileType, 'image') === false){
            $errorMessage[] = "Загружати можна тільки зображення";
        }


        $result = move_uploaded_file($fileTmpName, $destination);
        if($result){
            $_POST['img'] = $imgName;
        }else{
            $errorMessage[] = "Ошибка загрузки изображение на сервер";

        }
    }else{
        $errorMessage[] = "Ошибка получение зображення";

    }

    if (empty($title) || empty($content) || empty($topic)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($title, 'utf8') < 2) {
        $errorMessage[] = "Назва поста маєї бути більше 2 символів ";
    }
    else  {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];
        $post = update('posts', $id ,$post );
        header('Location: ' . BASE_URL . 'admin/posts/index.php');
    }

}
else{
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $publish = isset($_POST['publish']) ? 1 : 0;
    $id_topic = isset($_POST['id_topic']) ? $_POST['id_topic'] : '';
}
// статус поста
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('posts', $id, ['status' => $publish]);
    header('Location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}


// Видалення поста
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('Location: ' . BASE_URL . 'admin/posts/index.php');
}
