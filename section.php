<?php
$sql = /** @lang text */
    "select title, short_description
    from section as s
    where s.id = :id;";
$section_info = get_prepare_query_result($connection, $sql, $section_id)[0];

setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = iconv("windows-1251", "UTF-8", strftime('%b'));
$year = strftime('%Y');

$sql = /** @lang text */
    "select count(*) as products_count
    from (
		select section_id, product_id
		from section_product_main
		union
		select section_id, product_id
		from section_product_additional
	) as section_product
    join product as p
	on section_product.product_id = p.id and p.is_active
    where section_product.section_id = :id;";
$products_count = (int) get_prepare_query_result($connection, $sql, $section_id)[0]['products_count'];
$products_on_page = 12;
if ($products_count > $products_on_page)
{
    $pages_count = round($products_count/$products_on_page);
}
else
{
    $pages_count = 1;
}
if (isset($_GET['page']) && (int) $_GET['page'] <= $pages_count)
{
    $page = (int) $_GET['page'];
}
else
{
    $page = 1;
}

$nav_html = /** @lang text */
    "<div class='flex nav'>
            <span>Страницы:</span>";
for ($i = 1; $i <= $pages_count; $i++)
{
    if ($i == $page)
    {
        $nav_html .= /** @lang text */
            "<span>$i</span>";
    }
    else
    {
        $nav_html .= /** @lang text */
            "<span><a href='index.php?sect_id=$section_id&page=$i'>$i</a></span>";
    }
}
$nav_html .= /** @lang text */
    "</div>";

$offset = $products_on_page * ($page - 1);
$sql = /** @lang text */
    "select p.id as product_id, s.id as main_section_id, s.title as main_section_title, p.title as product_title, i.link as product_image, i.alt as product_alt
    from (select section_id, product_id from section_product_main union select section_id, product_id from section_product_additional) as section_product
    join product as p on section_product.product_id = p.id and p.is_active
    join section_product_main as spm on p.id = spm.product_id
    join section as s on spm.section_id = s.id
    join product_image_main as pim on section_product.product_id = pim.product_id
    join image as i on pim.image_id = i.id
    where section_product.section_id = $section_id
    limit $offset, $products_on_page;";
$products_html = "";
foreach (get_query_result($connection, $sql) as $row)
{
    $products_html .= /** @lang text */
        "<div class='flex littlecard'>
            <div class='flex image'>
                <img src='images/$row[product_image]' alt='$row[product_alt]'>
            </div>
            <div class='flex title'>
                <label>
                    <a href='index.php?prod_id=$row[product_id]'>$row[product_title]</a>
                </label>
                <div class='flex circle'>
                    <a href='index.php?sect_id=$row[main_section_id]'>$row[main_section_title]</a>
                </div>
            </div>
        </div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $section_info['title'] ?></title>
    <link rel="stylesheet" href="styles/section.css">
</head>
<body>
<div class="flex" id="container">
    <div class="flex" id="top">
        <div class="flex" id="bigcard">
            <div class="flex" id="date">
                <p class="flex" ><?= "$day $mon $year" ?></p>
            </div>
            <h1><?= $section_info['title']?></h1>
            <p><?= $section_info['short_description'] ?></p>
            <label><a href="index.php">Назад</a></label>
        </div>
    </div>
    <?= $nav_html ?>
    <div class="flex" id="bottom">
    <?= $products_html ?>
    </div>
</div>
</body>
</html>