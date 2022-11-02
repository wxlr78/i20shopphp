<?php

setcookie('success', "1", time()-1);

if (preg_match("/^[а-яА-Я ]{2,30}+$/u", $_POST['full_name']))
{
    $full_name = $_POST['full_name'];
    setcookie('full_name', $full_name);
    setcookie('full_name_error', "1", time()-1);
}
else
{
    setcookie('full_name', "", time()-1);
    setcookie('full_name_error', "1");
}

if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,30}$/", $_POST['email']))
{
    $email = $_POST['email'];
    setcookie('email', $email);
    setcookie('email_error', "1", time()-1);
}
else
{
    setcookie('email', "", time()-1);
    setcookie('email_error', "1");
}

if (preg_match("/^[а-яА-Я !?,.]{1,30}+$/u", $_POST['theme']))
{
    $theme = $_POST['theme'];
    setcookie('theme_error', "1", time()-1);
}
else
{
    setcookie('theme_error', "1");
}

if (preg_match("/^[а-яА-Я !?,.]{1,100}+$/su", $_POST['core']))
{
    $core = $_POST['core'];
    setcookie('core_error', "1", time()-1);
}
else
{
    setcookie('core_error', "1");
}

if (isset($_POST['acquainted']))
{
    $acquainted = $_POST['acquainted'];
    setcookie('acquainted_error', "1", time()-1);
}
else
{
    setcookie('acquainted_error', "1");
}

if (
    isset($full_name) &&
    isset($email) &&
    isset($theme) &&
    isset($core) &&
    isset($acquainted)
)
{
    require_once 'functions.php';
    $feedback = create_connection('localhost', 'feedback', 'root', '');
    insert_prepare_query(
        $feedback,
        $full_name,
        $email,
        (int) $_POST['year_of_birth'],
        $_POST['sex'],
        $theme,
        $core,
        true);
    setcookie('success', "1");
}

header('Location: http://i20shop/modules/part.feedback.php');
