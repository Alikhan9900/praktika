<?php
include SITE_ROOT . "/app/controllers/commentaries.php";
?>
<div class="col-md-12 col-12 comments">
    <h3>Залишити коментар</h3>
    <form action="<?=BASE_URL . "single.php?post=$page" ?>" method="post">
        <input name="page" value="<?=$page ?> " type="hidden">
<!--        <div class="mb-3">-->
<!--            <label for="exampleFormControlInput1" class="form-label">Email адресса</label>-->
<!--            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">-->
<!--        </div>-->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Залиште свій коментар</label>
            <div class=" mb-12 col-12 col-md-12 err">
                <!-- vivod oshubok -->
                <?php include SITE_ROOT .  "/app/helps/errorinfo.php"?>
            </div>
            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" name="goComment" class="btn btn-primary">Відправити</button>
        </div>
    </form>
    <?php if(count($comments) > 0): ?>
        <div class="row all-comments">
            <h3 class="col-12">Коментарі до поста</h3>
                <?php foreach($comments as $comment): ?>
                    <div class="one-comment col-12">
                        <span><i class="far fa-user"></i><?= $comment['username']?></span>
                        <span><i class="far fa-calendar-check"></i> <?= $comment['created_date']?></span>
                        <div class="col-12 text">
                        <span><?= $comment['comment']?></span>
                        </div>
                    </div>

                <?php endforeach; ?>
        </div>

    <?php endif;?>
</div>
