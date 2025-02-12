<?php include '../../path.php';
include '../../app/controllers/users.php';

//$login = isset($_POST['login']) ? $_POST['login'] : '';
//$email = isset($_POST['email']) ? $_POST['email'] : '';

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
    <?php include("../../app/include/sidebar-admin.php");?>
        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/users/create.php"?>" class="col-2 btn btn-success">Створити </a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php"?>" class="col-3 btn btn-warning">Керування </a>
            </div>
            <div class="row title-table">
                <h2>Створення користувача</h2>
            </div>
            <div class="row add-post">
                <div class=" mb-12 col-12 col-md-12 err">
                    <!-- vivod oshubok -->
                    <?php include "../../app/helps/errorinfo.php"?>
                </div>
                <form action="create.php" method="post">
                    <div class="col mt-4">
                        <label for="formGroupExampleInput" class="form-label">Введіть логін</label>
                        <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введіть логін...">
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Введіть пошту</label>
                        <input name="email" value="<?=$email?>"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть пошту...">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Введіть пароль</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введіть пароль...">
                    </div>
                    <div class="col mt-4">
                        <label for="exampleInputPassword2" class="form-label">Повторіть пароль</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторыть пароль...">
                    </div>
                    <label class="form-label ">Виберіть роль</label>
                    <input class="form-check-input" type="checkbox" value="1"  id="flexCheckChecked" name="admin">
                    <label class="form-check-label" for="flexCheckChecked">
                        Admin?
                    </label>
                    <div class="col">
                        <button name="create-user" class="btn btn-primary mt-4" type="submit">Створити</button>
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
