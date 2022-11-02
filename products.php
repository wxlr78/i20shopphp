<?php
require_once 'modules/functions.php';
$connection = create_connection('localhost', 'i20shopdb', 'root', '');

if ($_SERVER['REQUEST_URI'] == $_SERVER['SCRIPT_NAME'])
{
    require_once 'modules/part.catalog.php';
}
else if (isset($_GET['cat_id']))
{
    $section_id = clear_int($_GET['cat_id']);
    require_once 'modules/part.section.php';
}
else if (isset($_GET['id']))
{
    $product_id = clear_int($_GET['id']);
    require_once 'modules/part.product.php';
}
else
{
    error_404();
}