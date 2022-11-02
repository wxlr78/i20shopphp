<?php
$sql = /** @lang text */
    "select s.id as section_id, s.title as section_title, sum(product.is_active) as product_count
            from section as s
            inner join (
                select section_id, product_id from section_product_main
                union
                select section_id, product_id from section_product_additional
            ) as section_product
            on s.id = section_product.section_id
            inner join product
            on section_product.product_id = product.id and product.is_active
            group by s.id order by product_count desc;";
$html = "";
foreach (get_query_result($connection, $sql) as $row) {
    $html .= /** @lang text */
        "<div class='flex littlecard'>
                <div class='flex number' id='number3'>
                    <h1>$row[product_count]</h1>
                </div>
                <div class='flex title'>
                    <label><a href='products.php?cat_id=$row[section_id]'>$row[section_title]</a></label>
                </div>
            </div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="\styles\catalog.css">
</head>
<body>
<div class="flex" id="container">
    <div class="flex formlink"><a href="\modules\part.feedback.php">Форма обратной связи</a></div>
    <div class="flex" id="bottom">
        <?= $html ?>
    </div>
</div>
</body>
</html>