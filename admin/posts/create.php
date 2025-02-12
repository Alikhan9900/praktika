<?php include '../../path.php';
include '../../app/controllers/posts.php';
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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />

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
            <a href="<?php echo BASE_URL . "admin/posts/create.php"?>" class="col-2 btn btn-success">Створити</a>
            <span class="col-1"></span>
            <a href="<?php echo BASE_URL . "admin/posts/index.php"?>" class="col-3 btn btn-warning">Редагувати</a>
        </div>
            <div class="row title-table">
                <h2>Додати пост</h2>
            </div>
            <div class="row add-post">
                <div class=" mb-12 col-12 col-md-12 err">
                    <!-- vivod oshubok -->
                    <?php include "../../app/helps/errorinfo.php"?>
                </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <input value="<?=$title;?>"  name="title" type="text" class="form-control" placeholder="Title" aria-label="name">
                    </div>


                    <div class="col">
                        <label for="editor" class="form-label">Вміст поста</label>
                        <textarea name="content" id="editor" class="form-control" rows="3"><?=$content;?></textarea>
                    </div>

                    <div class="input-group col mb-4 mt-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <option selected>Категорія поста:</option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id']?>"><?=$topic['name']?></option>

                        <?php endforeach; ?>
                    </select>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="publish" checked>
                        <label class="form-check-label" for="flexCheckChecked">Publish</label>
                    </div>
                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- footer start-->
<?php include("../../app/include/footer.php") ?>
<!-- footer end-->
<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } = CKEDITOR;

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3Njk5OTAzOTksImp0aSI6IjBjYzk3ODM1LTZmMDItNDA3Yi1hMjc4LTdhNzQ3MTRjZGJjNSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCJdLCJ2YyI6ImY5ZTJiYjE5In0.877-KvPZRs3YzBOzPAQxDMe6eRF1Pd9vBkqY3UPTPcRoPI8uL4XPvbZOTh8UexDh4IDMqE2xkWQzy6cOGdJpTw',
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>
<script src="../../assets/js/script.js"

</body>
</html>
