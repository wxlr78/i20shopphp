<?php

function get_product_add_image($id) {
    $html = /** @lang text */
    "<div class=\"product__preview__miniature\">";
    $sql = /** @lang text */
    "select i.link as product_additional_image, i.alt as product_additional_alt
    from product_image_additional as pia
	inner join image as i on pia.image_id = i.id
    where pia.product_id = $id;";
    $table = execute_sql_command($sql);
    while ($row = mysqli_fetch_assoc($table))
    {
        $product_additional_image = $row['product_additional_image'];
        $product_additional_alt = $row['product_additional_alt'];
        $html .= /** @lang text */
            "<img src=\"../images/$product_additional_image\" alt=\"$product_additional_alt\" data-full=\"../images/$product_additional_image\" class=\"mini_img\">";
    }
    return $html . /** @lang text */"</div>";
}

function get_product_add_section($id) {
    $html = "";
    $sql = /** @lang text */
    "select s.id as product_additional_section_id, s.title as product_additional_section
    from section_product_additional as spa
	inner join section as s on spa.section_id = s.id
    where spa.product_id = $id;";
    $table = execute_sql_command($sql);
    $additional_section_id_array = array();
    while ($row = mysqli_fetch_assoc($table))
    {
        $product_additional_section_id = $row['product_additional_section_id'];
        $product_additional_section = $row['product_additional_section'];
        $html .= /** @lang text */
            "<a href=\"/products.php?cat_id=$product_additional_section_id\">$product_additional_section</a>";
        array_push($additional_section_id_array, $product_additional_section_id);
    }
    echo $html;
    return $additional_section_id_array;
}

function get_product_main($id)
{
    $sql = /** @lang text */
    "select p.title as product_title, s.title as product_main_section, s.id as product_main_section_id, i.link as product_main_image, i.alt as product_main_alt, p.current_price as product_price, p.old_price as product_old_price, p.promo_price as product_promo_price, p.short_description as product_short_description
    from product as p
	inner join product_image_main as pim join image as i on p.id = pim.product_id and pim.image_id = i.id
    inner join section_product_main as spm join section as s on p.id = spm.product_id and spm.section_id = s.id
    where p.id = $id;";
    $table = execute_sql_command($sql);
    $row = mysqli_fetch_assoc($table);
    return array(
        'product_title' => $row['product_title'],
        'product_main_section' => $row['product_main_section'],
        'product_main_section_id' => $row['product_main_section_id'],
        'product_main_image' => $row['product_main_image'],
        'product_main_alt' => $row['product_main_alt'],
        'product_price' => $row['product_price'],
        'product_old_price' => $row['product_old_price'],
        'product_promo_price' => $row['product_promo_price'],
        'product_short_description' => $row['product_short_description']
    );
}

function is_product_exist($id)
{
    $sql = /** @lang text */
        "select count(*) as exist
        from product as p
        where p.is_active and p.id = $id;";
    return is_exist($sql);
}

function is_section_exist($id)
{
    $sql = /** @lang text */
        "select count(*) as exist
        from section as s
        join (
            select section_id, product_id from section_product_main
            union
            select section_id, product_id from section_product_additional
        ) as section_product
        on s.id = section_product.section_id
        where s.id = $id;";
    return is_exist($sql);
}

function is_exist($sql) {
    $row = mysqli_fetch_assoc(execute_sql_command($sql));
    return $row['exist'];
}

function execute_sql_command(string $sql)
{
    $link = mysqli_connect('localhost', 'root', '', 'i20shopdb');
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    return $result;
}

function clear_int($input) {
    return abs(intval(trim(strip_tags($input))));
}
