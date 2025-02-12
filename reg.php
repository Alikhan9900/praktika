<?php include ("path.php")?>
<?php include ("app/controllers/users.php")?>


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
<!-- HEADER START -->
<?php include("app/include/header.php");?>
<!-- HEADER END -->

<!-- FORm START -->
<div class="container reg_form">
  <form class="row justify-content-center" method="post" action="reg.php">
    <h2>Форма регістрації</h2>
      <div class=" mb-12 col-12 col-md-4 err">
          <!-- vivod oshubok -->
          <?php include "app/helps/errorinfo.php"?>
      </div>
      <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
        <label for="formGroupExampleInput" class="form-label">Введіть логін</label>
        <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введіть логін...">
      </div>
    <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputEmail1" class="form-label">Введіть пошту</label>
        <input name="email" value="<?=$email?>"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть пошту...">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
    <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputPassword1" class="form-label">Введіть пароль</label>
        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введіть пароль...">
      </div>
    <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputPassword2" class="form-label">Повторіть пароль</label>
        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторыть пароль...">
      </div>
    <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
      <button name="button-reg" type="submit" class="btn btn-secondary">Зареєструватися</button>
        <a href="log.php">Ввійти</a>
      </div>
    </form>
</div>
<!-- FORM END -->

<!-- footer start-->
<?php include("app/include/footer.php") ?>
<!-- footer end-->

</body>
</html>