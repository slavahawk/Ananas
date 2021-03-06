<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Личный кабинет — Ананас Shop-sharing';
?>

<main class="cabinet">
    <section class="personal">
        <div class="personal-title title__page">Персональные данные</div>
        <div class="personal-inputs">
            <input type="text" placeholder="<?= Html::encode(Yii::$app->user->identity->name); ?>" disabled>
            <input type="text" placeholder="<?= Html::encode(Yii::$app->user->identity->email); ?>" disabled>
            <input type="text" placeholder="<?= Html::encode(Yii::$app->user->identity->username); ?>" disabled>
        </div>
        <div class="personal-button button__page">
            <a href="<?= Url::to(['cabinet/edit']); ?>" class="personal-button__link">Редактировать</a>
            <!--            <a href="#" class="personal-button__link">Изменить пароль</a>-->
        </div>
    </section>
    <section class="ticket">
        <div class="ticket-title title__page">Действующий абонемент</div>
        <div class="ticket-info">
            <div class="ticket__not">
                <i class="far fa-times-circle ticket__icon fa-spin"></i>
                <p>У вас нет абонемента :(</p>
            </div>
            <!-- <div class="ticket-info__title">Абонемент <span>Gold</span></div>
            <div class="ticket-info__text">действует до</div>
            <div class="ticket-info__date">01.04.2020</div>
            <div class="ticket-info__next">Следующий Sharing <span>12.12.2020</span></div> -->
        </div>
        <div class="ticket-button button__page">
            <!-- <a href="season-ticket.php" class="ticket-button__link">Посмотреть все</a> -->
            <div class="ticket__not">
                <a href="<?= Url::to(['abonement/index']) ?>" class="ticket-button__link">Приобрести</a>
            </div>
        </div>
    </section>
    <section class="goodies">
        <div class="goodies-title title__page">Ништяки</div>
        <div class="goodies-text">При использовании приложения «Выгода 2.0» вам будут начисляться бонусные балы, которые являются своеобразной валютой, за которые в дальнейшем вы можете приобрести в нашем магазине множество чудесных подарков!</div>
        <div class="goodies-button button__page">
            <a href="<?= Url::to(['site/index', '#' => 'vigoda']) ?>" class="goodies-button__link">Подробнее</a>
        </div>
    </section>
    <section class="favorite">
        <div class="favorite-title title__page">Закладки</div>

        <!-- Когда закладки есть -->
        <?php if ($user && $user->getLimitFavorites()) : ?>
        <div class="favorite-items">

            <?php foreach ($user->getLimitFavorites() as $favorite) : ?>
            <div class="favorite-items__item">
                <img src="<?= Yii::getAlias('@imgFrontEnd'); ?>/catalog_jpg/<?= $favorite['image']; ?>" alt="">
                <span><?= $favorite['name']; ?></span>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="favorite-button button__page">
            <a href="<?php echo Url::to(['favorite/index']); ?>" class="favorite-button__link">Подробнее</a>
        </div>
        <!-- Когда закладок нет -->
        <?php else: ?>

        <div class="favorite__not">
            <i class="far fa-sad-tear favorite__icon"></i>
            <p>У вас нет закладок</p>
        <?php endif; ?>

        </div>
    </section>
</main>


