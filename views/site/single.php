<?php
use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="<?= $article->getImage(); ?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]); ?>"><?= $article->category->title; ?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><?= $article->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?= $article->content ?>
                        </div>

                        <div>

                            <h5>Теги: </h5>
                            <?php foreach ($tags as $tag): ?>
                            <a href="<?= Url::toRoute(['site/tag', 'id' => $tag->id]); ?>"><?= $tag->title; ?> </a>

                            <?php endforeach; ?>
                        </div>

                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">By <?= $article->author->name; ?> On <?= $article->date ?></span>

                        </div>
                    </div>
                </article>

                <?php if (!empty($comments)): ?>

                    <?php foreach ($comments as $comment): ?>
                        <div class="bottom-comment"><!--bottom comment-->

                            <div class="comment-text">

                                <h5><?= $comment->user->name; ?></h5>

                                <p class="comment-date">
                                    <?= $comment->getDate(); ?>
                                </p>


                                <p class="para"><?= $comment->text; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>

<?php if (!Yii::$app->user->isGuest): ?>
                <div class="leave comment">
                    <h4>Leave a reply</h4>

                    <?php $form=\yii\widgets\ActiveForm::begin([
                            'action' => ['site/comment', 'id' => $article->id],
                            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']]) ?>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <?= $form->field($commentForm, 'comment')->textarea(['class' => 'form-control',
                                        'placeholder' => 'Write Message'])->label(false); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info"">Post Comment</button>
                            <?php \yii\widgets\ActiveForm::end() ?>
                </div><!--end leave comment-->



<?php endif; ?>


            </div>
            <?= $this->render('/partials/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories,
            ]); ?>
        </div>
    </div>
</div>
<!-- end main content-->