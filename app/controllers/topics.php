<?php

include_once SITE_ROOT . '/app/database/db.php';
$errorMessage = [];
$id = '';
$name = '';
$description = '';
$topics = selectAll('topics');
// Створення категорії
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['topic-create'])) {


    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if (empty($name) || empty($description)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($name, 'utf8') < 2) {
        $errorMessage[] = "Категорія має бути більше 2 символів";
    }
    else  {
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name) {
            $errorMessage[] = "Така категорія вже існує";
        }else {
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header('Location: ' . BASE_URL . 'admin/topics/index.php');
        }
    }

}
else{

    $name = '';
    $description = '';
}

// Редагування категорії
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id= $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['topic-edit'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if (empty($name) || empty($description)) {
        $errorMessage[] = "Не всі поля заповнені";
    }elseif (mb_strlen($name, 'utf8') < 2) {
        $errorMessage[] = "Категорія має бути більше 2 символів";
    }
    else
    {
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = $_POST['id'];
            $topic_id = update('topics', $id, $topic);
            header('Location: ' . BASE_URL . 'admin/topics/index.php');
    }

}

// Видалення категорії
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('Location: ' . BASE_URL . 'admin/topics/index.php');
}
