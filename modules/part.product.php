<?php
$product_info = get_product_main($product_id);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/fonts.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="../styles/product.css">
    <title><?= $product_info['product_title'] ?></title>
</head>
<body>
<div class="product">
    <div class="product__preview">
        <div class="product__preview__miniatures">
            <div class="product__preview__miniature">
                <img src="../images/<?= $product_info['product_main_image'] ?>" alt="<?= $product_info['product_main_alt'] ?>" data-full="../images/<?= $product_info['product_main_image'] ?>" class="mini_img">
            </div>
            <?= get_product_add_image($product_id) ?>
        </div>
        <div class="product__preview__full">
            <img src="../images/<?= $product_info['product_main_image'] ?>" alt="<?= $product_info['product_main_alt'] ?>" class="full_img">
        </div>
    </div>
    <div class="product__description">
        <h1 class="product_title"><?= mb_strtoupper($product_info['product_title']) ?></h1>
        <div class="product__categories">
            <a href="/products.php?cat_id=<?= $product_info['product_main_section_id'] ?>"><?= $product_info['product_main_section'] ?></a>
            <? $product_additional_sections_id = get_product_add_section($product_id) ?>
        </div>
        <div class="product__price">
            <div class="product__price__old"><?= $product_info['product_old_price'] ?></div>
            <div class="product__price__new"><?= $product_info['product_price'] ?> ₽</div>
            <div class="product__price__promo"><?= $product_info['product_promo_price'] ?> ₽</div>
            <div class="product__price__promo__text"> — с промокодом</div>
        </div>
        <div class="product__info">
            <div class="product__info__item">
                <div class="product__info__img">
                    <img src="./icons/Availability.png" alt="#">
                </div>
                <div>В наличии в магазине <a href="#">Lamoda</a></div>
            </div>
            <div class="product__info__item">
                <div class="product__info__img">
                    <img src="./icons/Delivery.png" alt="#">
                </div>
                Бесплатная доставка
            </div>
        </div>
        <div class="product__count">
            <button class="product__count__btn decrease__btn">-</button>
            <div class="product__count__text">1</div>
            <button class="product__count__btn increase__btn">+</button>
        </div>
        <div class="product__actions">
            <button class="custom__btn blue__btn">КУПИТЬ</button>
            <button class="custom__btn">В ИЗБРАННОЕ</button>
        </div>
        <div class="product__text">
            <p><?= $product_info['product_short_description'] ?></p>
        </div>
        <?php
        $main_section_id = $product_info['product_main_section_id'];
        $cookie_section_id = $_COOKIE['section'];
        $link = $main_section_id;
        if ($main_section_id != $cookie_section_id)
        {
            foreach ($product_additional_sections_id as $additional_section_id)
            {
                if ($cookie_section_id == $additional_section_id)
                {
                    $link = $cookie_section_id;
                }
            }
        }
        ?>
        <label><a href='/products.php?cat_id=<?= $link ?>'>Назад</a></label>
        <div class="product__share">
            <div>ПОДЕЛИТЬСЯ:</div>
            <div class="product__share__buttons">
                <button class="share__button">
                    <img src="../icons/ShareB.png">
                </button>
                <button class="share__button">
                    <img src="../icons/ShareG.png">
                </button>
                <button class="share__button">
                    <img src="../icons/ShareF.png">
                </button>
                <button class="share__button">
                    <img src="../icons/ShareT.png">
                </button>
                <div class="share__count__triangle"></div>
                <div class="share__count">123</div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../scripts/script.js"></script>
</body>
</html>