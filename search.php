<?php include 'path.php';
    include SITE_ROOT . "/app/database/db.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search-term"])) {
        $posts = searchInTitleAncContent($_POST["search-term"], 'posts',  'users');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- boostrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- FOnt  -->
    <script src="https://kit.fontawesome.com/9e388b07b7.js" crossorigin="anonymous"></script>
    <!-- Custom steel -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header start -->
<?php include("app/include/header.php");?>
<!-- Header end -->

<!--Main start-->
<div class="container">
    <div class="container row">
        <!--Main content-->
        <div class="main-content  col-12">
            <h2>Результат пошуку: <strong><?=$_POST['search-term']?></strong></h2>
            <?php foreach ($posts as $post): if ($post['status'] == 1): ?>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                </div>
                <div class="post-text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=mb_substr($post['title'], 0, 80, "UTF-8") . "..." ?>
                        </a>
                    </h3>
                    <i class="far fa-user"> <?=$post['username']?></i>
                    <i class="far fa-calendar"> <?=$post['created_date']?></i>
                    <p class="preview-text">
                        <?=mb_substr($post['content'], 0, 80, "UTF-8") . "..." ?>
                    </p>
                </div>
            </div>
            <?php endif; endforeach; ?>
        </div>
        <!--sidebar content-->
    </div>
</div>
<!--Main end-->

<!-- footer start-->
<?php include("app/include/footer.php") ?>
<!-- footer end-->
</body>
</html>