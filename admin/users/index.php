<?php include '../../path.php';
include '../../app/controllers/users.php';
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
                <a href="<?php echo BASE_URL . "admin/users/create.php"?>" class="col-2 btn btn-success">Створити </a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php"?>" class="col-3 btn btn-warning">Керування </a>
            </div>
            <div class="row title-table">
                <h2> Користувачі</h2>
                <div  class="col-1">ID</div>
                <div  class="col-2">Логін</div>
                <div  class="col-3">Пошта</div>
                <div  class="col-2">Роль</div>
                <div  class="col-4">Керування</div>
            </div>
            <?php foreach ($users as $key => $user): ?>
            <div class="row post">
                <div  class="col-1"><?=$user['id'];?></div>
                <div  class="col-2"><?=$user['username'];?></div>
                <div  class="col-3"><?=$user['email'];?></div>
                <?php if ($user['admin'] == 1): ?>
                <div  class="col-2">Admin</div>
                <?php else:  ?>
                <div  class="col-2">User</div>
                <?php endif; ?>
                <div  class="red col-2"><a href="edit.php?edit_id=<?=$user['id']?>">edit</a> </div>
                <div  class="del col-2"><a href="index.php?delete_id=<?=$user['id']?>">delete</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<!-- footer start-->
<?php include("../../app/include/footer.php") ?>
<!-- footer end-->
</body>
</html>
