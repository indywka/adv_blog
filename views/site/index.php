<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Blog;

?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php foreach ($blogs as $blog): ?>

                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?=Url::toRoute(['site/view', 'id'=>$blog->id]);?>"><img src="<?= $blog->getImage(); ?>" alt=""></a>

                            <a href="<?=Url::toRoute(['site/view', 'id'=>$blog->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">

                                <h1 class="entry-title"><a href="<?=Url::toRoute(['site/view', 'id'=>$blog->id]);?>"><?= $blog->nazv;?></a></h1>


                            </header>
                            <div class="entry-content">
                                <p><?=$blog->opis;?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?=Url::toRoute(['site/view', 'id'=>$blog->id]);?>" class="more-link">Continue Reading</a>
                                </div>
                            </div>

                        </div>
                    </article>
                <?php endforeach; ?>


                <?php

                echo LinkPager::widget([
                    'pagination' => $pagination,
                ])
                ?>
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