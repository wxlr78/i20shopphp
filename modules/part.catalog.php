<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="styles\catalog.css">
</head>
<body>
<div class="flex" id="container">
    <div class="flex" id="bottom">
        <?php
        $html = "";
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
        $table = execute_sql_command($sql);
        while ($row = mysqli_fetch_assoc($table))
        {
            $section_id = $row['section_id'];
            $section_title = $row['section_title'];
            $product_count = $row['product_count'];
            $html .= /** @lang text */
                "<div class='flex littlecard'>
                <div class='flex number' id='number3'>
                    <h1>$product_count</h1>
                </div>
                <div class='flex title'>
                    <label><a href='/products.php?cat_id=$section_id'>$section_title</a></label>
                </div>
            </div>";
        }
        echo $html;
        ?>
    </div>
</div>
</body>
</html>