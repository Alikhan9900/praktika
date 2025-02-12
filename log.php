<?php include ("path.php")?>
<?php include ("app/controllers/users.php")?>


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
  <!-- Own steel -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
<!-- HEADER START -->
<?php include("app/include/header.php");?>
<!-- HEADER END -->

<!-- FORm START -->
<div class="container reg_form">
  <form class="row justify-content-center" method="post" action="log.php">
    <h2 class="col-12">Авторизація</h2>
      <div class=" mb-12 col-12 col-md-4 err">
          <!-- vivod oshubok -->
          <?php include "app/helps/errorinfo.php"?>
      </div>
      <div class="w-100"></div>

      <div class="mb-3 col-12 col-md-4">
      <label for="formGroupExampleInput" class="form-label">Введіть пошту</label>
          <input name="email" value="<?=$email?>"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть пошту...">
    </div>

    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword1" class="form-label">Введіть пароль</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введіть пароль...">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <button type="submit" name="button-log" class="btn btn-secondary">Ввійти</button>
      <a href="reg.php">Зареєструватися</a>
    </div>
  </form>
</div>
<!-- FORM START -->

<!-- footer start-->
<?php include("app/include/footer.php") ?>
<!-- footer end-->

</body>
</html>