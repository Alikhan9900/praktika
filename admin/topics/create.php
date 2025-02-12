<?php include '../../path.php';
include '../../app/database/db.php';
include '../../app/controllers/topics.php';

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
    <!-- Custom steel -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header start -->
<?php include("../../app/include/header-admin.php");?>
<!-- Header end -->
<div class="container">
    <?php include "../../app/include/sidebar-admin.php"?>

    <div class="posts col-9">
        <div class="button row">
            <a href="<?php echo BASE_URL . "admin/topics/create.php"?>" class="col-2 btn btn-success">Добавити </a>
            <span class="col-1"></span>
            <a href="<?php echo BASE_URL . "admin/topics/index.php"?>" class="col-3 btn btn-warning">Керування</a>
        </div>
            <div class="row title-table">
                <h2>Створити категорію</h2>
            </div>
            <div class="row add-post">
                <div class=" mb-12 col-12 col-md-12 err">
                    <!-- vivod oshubok -->
                    <?php include "../../app/helps/errorinfo.php"?>
                </div>
                <form action="create.php" method="post">
                    <div class="col">
                        <input name="name" value="<?=$name?>" type="text" class="form-control" placeholder="імя категорії" aria-label="імя категорії">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Опис категорії</label>
                        <textarea name="description"  class="form-control" id="content" rows="3"><?=$description?></textarea>
                    </div>
                    <div class="col mt-2">
                        <button name="topic-create" class="btn btn-primary" type="submit">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- footer start-->
<?php include("../../app/include/footer.php") ?>
<!-- footer end-->
</body>
</html>
