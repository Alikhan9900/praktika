<?php

session_start();
require 'connect.php';

// функції для тестування
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
function tte($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
//проверка запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo  $errInfo[2];
        exit();
    }
    return true;
}

// запрос на получение данних з одной таблици
function selectAll($table, $params =[])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql =$sql . " WHERE $key = $value";
            }else{
                $sql =$sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}

// запрос на получение данних з вибраной таблици
function selectOne($table, $params =[])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql =$sql . " WHERE $key = $value";
            }else{
                $sql =$sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetch();
}

// запись в БД


function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach($params as $key => $value){
        if($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value" . "'";
        }else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'" ;
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}
// Оновлення строки в таблиці

function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = '';
    foreach($params as $key => $value){
        if($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else {
            $str = $str . ", " . $key .  " = '" . $value . "'";        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// Видалення строки с таблиці

function delete($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE id =". $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// vuborka zapisey s avtorom v glavnu
function selectAllFromPostsWithUsers($table1, $table2)
{
    global $pdo;
    $sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.status, t1.id_topic, t1.created_date, t2.username FROM $table1 as t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}
function selectAllFromPostsWithUsersOnIndex($table1, $table2 , $limit, $offset)
{
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 as p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}
function selectTopTopicFromPostsOnIndex($table1)
{
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic = 10";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}
// Функція пошуку
function searchInTitleAncContent($text, $table1, $table2)
{
    $text=trim(strip_tags(stripslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 as p  JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}

function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id)
{
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 as p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetch();
}
function countRow($table)
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table WHERE status = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchColumn();
}