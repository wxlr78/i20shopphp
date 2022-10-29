<?php
require_once 'modules/functions.php';
        if ($_SERVER['QUERY_STRING'] == '')
        {
            require_once 'modules/part.catalog.php';
        } else
        {
            if (isset($_GET['cat_id']))
                $section_id = clear_int($_GET['cat_id']);

            if (isset($_GET['id']))
                $product_id = clear_int($_GET['id']);

            if (isset($section_id) && is_section_exist($section_id))
            {
                setcookie("section", $section_id);
                require_once 'modules/part.section.php';
            }
            elseif (isset($product_id) && is_product_exist($product_id))
            {
                require_once 'modules/part.product.php';
            }
            else
            {
                require_once '404.php';
            }
        }