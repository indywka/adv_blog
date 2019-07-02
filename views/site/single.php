<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Blog;

?>


<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                       <img src="<?= $blog->getImage(); ?>" alt="">
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">


                            <h1 class="entry-title"><?= $blog->nazv;?></h1>


                        </header>
                        <div class="entry-content">
                            <p> <?=$blog->opis;?></p>
                        </div>


                        <div class="social-share">

                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>


                <?php if(!empty($comments)):?>

                    <?php foreach($comments as $comment):?>
                        <div class="bottom-comment"><!--bottom comment-->


                            <div class="comment-text">

                                <h5><?= $comment->user->login;?></h5>

                                <p class="para"><?= $comment->comment; ?></p>
                            </div>
                        </div>
                    <?php endforeach;?>

                <?php endif;?>


                <div class="leave-comment"><!--leave comment-->



                    <form class="form-horizontal contact-form" role="form" method="post" action="#">

                         <?php $form = \yii\widgets\ActiveForm::begin([
                            'action'=>['site/comment', 'id'=>$blog->id],
                            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Write Message'])->label(false)?>
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Post Comment</button>
                        <?php \yii\widgets\ActiveForm::end();?>
                    </form>
                </div><!--end leave comment-->
            </div>
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">


                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                        <div class="thumb-latest-posts">

                            <?php foreach ($recent as $blog):?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?=Url::toRoute(['site/view', 'id'=>$blog->id]);?>" class="popular-img"><img src="<?= $blog->getImage();?>" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="<?=Url::toRoute(['site/view', 'id'=>$blog->id]);?>" class="text-uppercase"><?=$blog->nazv;?></a>

                                </div>
                            </div>
                        </div>

                        <?php endforeach;?>
                    </aside>

                </div>
            </div>
        </div>
    </div>
</div>