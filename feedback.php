<?php
require_once 'functions.php';

/*echo $_SERVER['REQUEST_METHOD'] . '<br>';
echo 'POST: ';
print_r($_POST);
echo '<br>';
echo 'COOKIE: ';
print_r($_COOKIE);*/

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $full_name = $_COOKIE['full_name'] ?? '';
    $full_name_error_class  = '';
    $full_name_error_message = '';
    $email = $_COOKIE['email'] ?? '';
    $email_error_class  = '';
    $email_error_message = '';
    $year_of_birth = $_COOKIE['year_of_birth'] ?? '';
    $year_of_birth_html = '';
    $year = ($year_of_birth != '') ? $year_of_birth : '2020';
    for ($i = 1970; $i <= 2020; $i++) {
        $selected = ($i == $year) ? 'selected' : '';
        $year_of_birth_html .= /** @lang text */
            "<option value='$i' $selected>$i</option>";
    }
    $sex = $_COOKIE['sex'] ?? '';;
    $sex_html = '';
    switch ($sex) {
        case 'male':
            $sex_html = /** @lang text */
                "<input type='radio' name='sex' value='male' checked='checked'>
             <label for='sex' id='margin' >Мужской</label>
             <input type='radio' name='sex' value='female'>
             <label for='sex'>Женский</label>";
            break;
        case 'female':
            $sex_html = /** @lang text */
                "<input type='radio' name='sex' value='male'>
             <label for='sex' id='margin' >Мужской</label>
             <input type='radio' name='sex' value='female' checked='checked'>
             <label for='sex'>Женский</label>";
            break;
        default:
            $sex_html = /** @lang text */
                "<input type='radio' name='sex' value='male'>
             <label for='sex' id='margin'>Мужской</label>
             <input type='radio' name='sex' value='female'>
             <label for='sex'>Женский</label>";
    }
    $sex_error_class = '';
    $sex_error_message = '';
    $theme = '';
    $theme_error_class = '';
    $theme_error_message = '';
    $core = '';
    $core_error_class = '';
    $core_error_message = '';
    $acquainted = '';
    $acquainted_error_class = '';
    $acquainted_error_message = '';
    $success_message = '';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['full_name']))
        setcookie('full_name', $_POST['full_name']);
    if (isset($_POST['email']))
        setcookie('email', $_POST['email']);
    if (isset($_POST['year_of_birth']))
        setcookie('year_of_birth', $_POST['year_of_birth']);
    if (isset($_POST['sex']))
        setcookie('sex', $_POST['sex']);

    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $year_of_birth = $_POST['year_of_birth'] ?? '';
    $year_of_birth_html = '';
    $year = ($year_of_birth != '') ? $year_of_birth : '2020';
    for ($i = 1970; $i <= 2020; $i++) {
        $selected = ($i == $year) ? 'selected' : '';
        $year_of_birth_html .= /** @lang text */
            "<option value='$i' $selected>$i</option>";
    }
    $sex = $_POST['sex'] ?? '';
    $sex_html = '';
    switch ($sex) {
        case 'male':
            $sex_html = /** @lang text */
                "<input type='radio' name='sex' value='male' checked='checked'>
             <label for='sex' id='margin' >Мужской</label>
             <input type='radio' name='sex' value='female'>
             <label for='sex'>Женский</label>";
            break;
        case 'female':
            $sex_html = /** @lang text */
                "<input type='radio' name='sex' value='male'>
             <label for='sex' id='margin' >Мужской</label>
             <input type='radio' name='sex' value='female' checked='checked'>
             <label for='sex'>Женский</label>";
            break;
        default:
            $sex_html = /** @lang text */
                "<input type='radio' name='sex' value='male'>
             <label for='sex' id='margin'>Мужской</label>
             <input type='radio' name='sex' value='female'>
             <label for='sex'>Женский</label>";
    }
    $theme = $_POST['theme'] ?? '';
    $core = $_POST['core'] ?? '';
    $acquainted = $_POST['acquainted'] ?? '';
    $full_name_error_class = !preg_match("/^[а-яА-Я ]{2,30}+$/u", $full_name) ?
        "class='error'" : '';

    $full_name_error_message = !preg_match("/^[а-яА-Я ]{2,30}+$/u", $full_name) ?
        '<p>Имя должно состоять из русских букв и пробелов.</p>Длина имени должна быть от 3 до 30 символов.</p>' : '';

    $email_error_class = !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,30}$/", $email) ?
        "class='error'" : '';

    $email_error_message = !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,30}$/", $email) ?
        '<p>Укажите почту в правильном формате.</p>Длина почты должна быть от 3 до 30 символов.</p>' : '';

    $sex_error_class = ($sex == '') ?
        'error' : '';

    $sex_error_message = ($sex == '') ?
        '<p>Укажите пол</p>' : '';

    $theme_error_class = !preg_match("/^[а-яА-Я !?,.]{3,30}+$/u", $theme) ?
        "class='error'" : '';

    $theme_error_message = !preg_match("/^[а-яА-Я !?,.]{3,30}+$/u", $theme) ?
        '<p>Используйте только русские буквы и знаки препинания.</p>Длина вопроса должна быть от 3 до 30 символов.</p>' : '';

    $core_error_class = !preg_match("/^[а-яА-Я !?,.]{1,100}+$/su", $core) ?
        "class='error'" : '';

    $core_error_message = !preg_match("/^[а-яА-Я !?,.]{1,100}+$/su", $core) ?
        '<p>Используйте только русские буквы и знаки препинания.</p>Длина вопроса должна быть от 1 до 100 символов.</p>' : '';

    $acquainted_error_class = $acquainted != 'on' ?
        'error' : '';

    $acquainted_error_message = $acquainted != 'on' ?
        '<p>Ознакомление обязательно.</p>' : '';

    if (
        $full_name_error_message == '' &&
        $email_error_message == '' &&
        $sex_error_message == '' &&
        $theme_error_message == '' &&
        $core_error_message == '' &&
        $acquainted_error_message == ''
    )
    {
        $success_message = "<p class='success'>Форма успешно отправлена</p>";

        $feedback = create_connection('localhost', 'feedback', 'root', '');
        insert_feedback_message(
            $feedback,
            (string) $full_name,
            (string) $email,
            (int) $year_of_birth,
            (string) $sex,
            (string) $theme,
            (string) $core,
            true);
    }
    else
    {
        $success_message = '';
    };

    /*
    if (
        isset($full_name) &&
        isset($email) &&
        isset($theme) &&
        isset($core) &&
        isset($acquainted)
    )
    {
        $feedback = create_connection('localhost', 'feedback', 'root', '');
        insert_feedback_message(
            $feedback,
            $full_name,
            $email,
            (int) $_POST['year_of_birth'],
            $_POST['sex'],
            $theme,
            $core,
            true);
        setcookie('success', "1");
    }*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/feedback.css">
    <title>Форма обратной связи</title>
</head>
<body>
<div class="flex" id="container">
    <div class="flex" id="form">
        <form action="feedback.php" method="post" class="flex" id="content">
            <label><a href="index.php">Назад</a></label>
            <h1>Форма обратной связи</h1>
            <label class="title">Имя</label>
            <input name="full_name" type="text" value="<?= $full_name ?>" <?= $full_name_error_class ?>>
            <?= $full_name_error_message ?>
            <label class="title">E-mail</label>
            <input name="email" type="text" value="<?= $email ?>" <?= $email_error_class ?>>
            <?= $email_error_message ?>
            <label class="title">Год рождения</label>
            <select name="year_of_birth" size="1">
                <?= $year_of_birth_html ?>
            </select>
            <label class="title">Пол</label>
            <div class="flex width center <?= $sex_error_class ?>" >
                <?= $sex_html ?>
            </div>
            <?= $sex_error_message ?>
            <label class="title">Тема обращения</label>
            <input name="theme" type="text" <?= $theme_error_class ?>>
            <?= $theme_error_message ?>
            <label class="title">Суть вопроса</label>
            <textarea name="core" <?= $core_error_class ?>></textarea>
            <?= $core_error_message ?>
            <div class="flex width center <?= $acquainted_error_class ?>">
                <input name="acquainted" type="checkbox" id="acquainted">
                <label for="acquainted">С контрактом ознакомлен(а)</label>
            </div>
            <?= $acquainted_error_message ?>
            <input id="button" type="submit" value="Отправить">
            <?= $success_message ?>
        </form>
    </div>
</div>
</body>
</html>