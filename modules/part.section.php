<?php
$sql = /** @lang text */
    "select title, short_description
    from section as s
    where s.id = $section_id;";
$row = mysqli_fetch_assoc(execute_sql_command($sql));
$section_title = $row['title'];
$section_description = $row['short_description'];

setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = iconv("windows-1251", "UTF-8", strftime('%b'));
$year = strftime('%Y');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $section_title ?></title>
    <link rel="stylesheet" href="styles\section.css">
</head>
<body>
<div class="flex" id="container">
    <div class="flex" id="top">
        <div class="flex" id="bigcard">
            <div class="flex" id="date">
                <p class="flex" ><?= "$day $mon $year" ?></p>
            </div>
            <h1><?= $section_title ?></h1>
            <p><?= $section_description ?></p>

            <label><a href="/products.php">Назад</a></label>
        </div>
    </div>
    <?php
    $sql = /** @lang text */
        "select p.id as product_id, s.id as main_section_id, s.title as main_section_title, p.title as product_title, i.link as product_image, i.alt as product_alt
        from (select section_id, product_id from section_product_main union select section_id, product_id from section_product_additional) as section_product
        inner join product as p on section_product.product_id = p.id and p.is_active
        inner join section_product_main as spm on p.id = spm.product_id
        inner join section as s on spm.section_id = s.id
        inner join product_image_main as pim on section_product.product_id = pim.product_id
        inner join image as i on pim.image_id = i.id
        where section_product.section_id = $section_id;";
    $table = execute_sql_command($sql);

    $products_count = $table->{'num_rows'};
    $products_on_page = 12;
    if ($products_count > $products_on_page)
    {
        $pages_count = round($products_count/$products_on_page);
    }
    else
    {
        $pages_count = 1;
    }
    if (isset($_GET['page']) && clear_int($_GET['page']) <= $pages_count)
    {
        $page = clear_int($_GET['page']);
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
        if ($i == $page) {
            $nav_html .= /** @lang text */
                "<span>$i</span>";
        }
        else {
            $nav_html .= /** @lang text */
                "<span><a href='products.php?cat_id=$section_id&page=$i'>$i</a></span>";
        }
    }
    echo $nav_html .= /** @lang text */
        "</div>";
    ?>
    <div class="flex" id="bottom">
    <?php
    $content = mysqli_fetch_all($table);
    $html = "";
    for ($i = $products_on_page * ($page - 1); $i < $products_on_page * $page && $i < $products_count; $i++)
    {
        $product_id = $content[$i][0];
        $main_section_id = $content[$i][1];
        $main_section_title = $content[$i][2];
        $product_title = $content[$i][3];
        $product_image = $content[$i][4];
        $product_alt = $content[$i][5];
        $html .= /** @lang text */
            "<div class='flex littlecard'>
                <div class='flex image'>
                    <img src='../images/$product_image' alt='$product_alt'>
                </div>
                <div class='flex title'>
                    <label><a href='/products.php?id=$product_id'>$product_title</a></label>
                    <div class='flex circle'><a href='/products.php?cat_id=$main_section_id'>$main_section_title</a></div>
                </div>
            </div>";
    }
    echo $html;
    ?>
    </div>
</div>
</body>
</html>