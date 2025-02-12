<?php include ("path.php");
include 'app/controllers/topics.php';

$post = selectPostFromPostsWithUsersOnSingle('posts', 'users' , $_GET['post']);
$topTopic = selectTopTopicFromPostsOnIndex('posts');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- boostrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- FOnt  -->
    <script src="https://kit.fontawesome.com/9e388b07b7.js" crossorigin="anonymous"></script>
    <!-- Own steel -->
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
        <div class="main-content col-md-9 col-12">
            <h2><?php echo $post['title']?></h2>
            <div class="single_post row">
                <div class="img col-12">
                    <img src ="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-user"> <?=$post['username']?> </i>
                    <i class="far fa-calendar"> <?=$post['created_date']?> </i>
                </div>
                <div class="single_post-text col-12 ">
                    <?=$post['content']?>
                </div>
                <!-- include bloka s komentariyamu -->
                <?php include("app/include/comments.php");?>

            </div>


        </div>
        <!--sidebar content-->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Пошук</h3>
                <form action="search.php" method="post">
                    <input  type="text" name="search-term" class="text-input" placeholder="Пошук">
                </form>
            </div>

            <div class="section topic">
                <h3>Категорії</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li>
                            <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>


        </div>

    </div>
</div>
<!--Main end-->

<!-- footer start-->
<?php include("app/include/footer.php") ?>
<!-- footer end-->

</body>
</html>