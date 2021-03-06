<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->title = 'Мои закладки — Ананас Shop-sharing';
?>
<main class="marker">
    <div class="catalog__wrapper">
        <div class="marker__title">
            <h1>Мои закладки</h1>
        </div>

        <?php if ($user && $user->getFavorites()) : ?>
            <div class="catalog__item">
                <div class="catalog__products">

                    <?php foreach ($user->getFavorites() as $favorite) : ?>
                        <div class="catalog__box" id="catalog__box__<?= $favorite['id'] ?>">
                            <div class="img__product">
                                <img src="<?= Yii::getAlias('@imgFrontEnd'); ?>/catalog_jpg/<?= $favorite['image']; ?>" alt="">
                            </div>
                            <h3><?php echo $favorite['name']; ?></h3>
                            <p class="textforproduct">Размер: <?= $favorite['size']; ?> | Цвет: <?php echo $favorite['color']; ?></p>
                            <div class="product__button1">
                                <a href="<?= Url::to(['favorite/delete', 'id' =>$favorite['id'] ]); ?>" class="mark btn__delete" data-id="<?= $favorite['id']; ?>"><i class="fas fa-star"></i><span class="button__text"> Удалить из закладок</span></a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        <?php else: ?>
            <div class="marker__title">
                <h2>У вас нет закладок :(</h2>   <!-- Для случая, когда нет заладок -->
            </div>
        <?php endif; ?>

    </div>
</main>

<?php $this->registerJsFile('js/deleteFromFavorite.js', [
    'depends' => JqueryAsset::className()
]);