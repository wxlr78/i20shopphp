<?php
$sql = /** @lang text */
    "select p.title as product_title, s.title as product_main_section, s.id as product_main_section_id, i.link as product_main_image, i.alt as product_main_alt, p.current_price as product_price, p.old_price as product_old_price, p.promo_price as product_promo_price, p.short_description as product_short_description
    from product as p
	inner join product_image_main as pim join image as i on p.id = pim.product_id and pim.image_id = i.id
    inner join section_product_main as spm join section as s on p.id = spm.product_id and spm.section_id = s.id
    where p.id = :id;";
$product_info = get_prepare_query_result($connection, $sql, $product_id)[0];

$sql = /** @lang text */
    "select i.link as product_additional_image, i.alt as product_additional_alt
    from product_image_additional as pia
	inner join image as i on pia.image_id = i.id
    where pia.product_id = :id;";
$add_images_html = /** @lang text */
    "<div class=\"product__preview__miniature\">";
foreach (get_prepare_query_result($connection, $sql, $product_id) as $row) {
    $add_images_html .= /** @lang text */
        "<img src=\"images/$row[product_additional_image]\" alt=\"$row[product_additional_alt]\" data-full=\"images/$row[product_additional_image]\" class=\"mini_img\">";
}
$add_images_html .= /** @lang text */"</div>";

$sql = /** @lang text */
    "select s.id as product_additional_section_id, s.title as product_additional_section
    from section_product_additional as spa
	inner join section as s on spa.section_id = s.id
    where spa.product_id = :id;";
$add_sections = get_prepare_query_result($connection, $sql, $product_id);
$add_sections_html = "";
foreach ($add_sections as $row) {
    $add_sections_html .= /** @lang text */
        "<a href='products.php?cat_id=$row[product_additional_section_id]'>$row[product_additional_section]</a>";
}

$address = $_SERVER['HTTP_REFERER'];
$referer = parse_url($address);

$back_section_id = $product_info['product_main_section_id'];
if ($referer['host'] == 'i20shop'
    && $referer['path'] == '/products.php'
    && $referer['query'] != '')
{
    parse_str($referer['query'], $queries);
    foreach ($add_sections as $row)
    {
        if ($row['product_additional_section_id'] == clear_int($queries['cat_id']))
        {
            $back_section_id = $row['product_additional_section_id'];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="\styles\fonts.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="\styles\product.css">
    <title><?= $product_info['product_title'] ?></title>
</head>
<body>
<div class="product">
    <div class="product__preview">
        <div class="product__preview__miniatures">
            <div class="product__preview__miniature">
                <img src="images/<?= $product_info['product_main_image'] ?>" alt="<?= $product_info['product_main_alt'] ?>" data-full="images/<?= $product_info['product_main_image'] ?>" class="mini_img">
            </div>
            <?= $add_images_html ?>
        </div>
        <div class="product__preview__full">
            <img src="images/<?= $product_info['product_main_image'] ?>" alt="<?= $product_info['product_main_alt'] ?>" class="full_img">
        </div>
    </div>
    <div class="product__description">
        <label><a href='\products.php?cat_id=<?= $back_section_id ?>'>Назад</a></label>
        <h1 class="product_title"><?= mb_strtoupper($product_info['product_title']) ?></h1>
        <div class="product__categories">
            <a href="\products.php?cat_id=<?= $product_info['product_main_section_id'] ?>"><?= $product_info['product_main_section'] ?></a>
            <?= $add_sections_html ?>
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
                    <img src="\icons\Availability.png" alt="#">
                </div>
                <div>В наличии в магазине <a href="#">Lamoda</a></div>
            </div>
            <div class="product__info__item">
                <div class="product__info__img">
                    <img src="\icons\Delivery.png" alt="#">
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
        <div class="product__share">
            <div>ПОДЕЛИТЬСЯ:</div>
            <div class="product__share__buttons">
                <button class="share__button">
                    <img src="icons/ShareB.png">
                </button>
                <button class="share__button">
                    <img src="icons/ShareG.png">
                </button>
                <button class="share__button">
                    <img src="icons/ShareF.png">
                </button>
                <button class="share__button">
                    <img src="icons/ShareT.png">
                </button>
                <div class="share__count__triangle"></div>
                <div class="share__count">123</div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>