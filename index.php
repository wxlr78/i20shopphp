<?php
require_once 'functions.php';

$connection = create_connection('localhost', 'i20shopdb', 'root', '');

if (isset($_GET['sect_id']) && isset($_GET['prod_id']))
{
    error_404();
}
else if (!isset($_GET['sect_id']) && !isset($_GET['prod_id']))
{
    require_once 'catalog.php';
}
else if (isset($_GET['sect_id']))
{
    $section_id = (int) $_GET['sect_id'];
    require_once 'section.php';
}
else if (isset($_GET['prod_id']))
{
    $product_id = (int) $_GET['prod_id'];
    require_once 'product.php';
}