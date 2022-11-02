<?php

if (isset($_COOKIE['full_name']))
{
    $full_name = $_COOKIE['full_name'];
}
else
{
    $full_name = '';
}

if (isset($_COOKIE['email']))
{
    $email = $_COOKIE['email'];
}
else
{
    $email = '';
}

$full_name_error_message = isset($_COOKIE['full_name_error']) ? '<p>Имя должно состоять из русских букв и пробелов.</p>Длина имени должна быть от 3 до 30 символов.</p>' : '';
$full_name_error_class = isset($_COOKIE['full_name_error']) ? "class='error'" : '';

$email_error_message = isset($_COOKIE['email_error']) ? '<p>Укажите почту в правильном формате.</p>Длина почты должна быть от 3 до 30 символов.</p>' : '';
$email_error_class = isset($_COOKIE['email_error']) ? "class='error'" : '';

$theme_error_message = isset($_COOKIE['theme_error']) ? '<p>Используйте только русские буквы и знаки препинания.</p>Длина вопроса должна быть от 1 до 30 символов.</p>' : '';
$theme_error_class = isset($_COOKIE['theme_error']) ? "class='error'" : '';

$core_error_message = isset($_COOKIE['core_error']) ? '<p>Используйте только русские буквы и знаки препинания.</p>Длина вопроса должна быть от 1 до 100 символов.</p>' : '';
$core_error_class = isset($_COOKIE['core_error']) ? "class='error'" : '';

$acquainted_error_message = isset($_COOKIE['acquainted_error']) ? '<p>Обязательно к ознакомлению.</p>' : '';
$acquainted_error_class = isset($_COOKIE['acquainted_error']) ? "class='error'" : '';

$success_message = isset($_COOKIE['success']) ? "<p class='success'>Форма успешно отправлена</p>" : '';

function is_selected_year_of_birth($y) {
    if (isset($_COOKIE['year_of_birth'])) {
        $year_of_birth = $_COOKIE['year_of_birth'];
        if ($year_of_birth == $y) {
            return 'selected';
        }
    } else if ($y == '1998') {
        return 'selected';
    }
}

function is_checked_match_sex($s) {
    if (isset($_COOKIE['sex'])) {
        $sex = $_COOKIE['sex'];
        if ($sex == $s) {
            return 'checked';
        }
    } else if ($s == 'male') {
        return 'checked';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="\styles\feedback.css">
    <title>Форма обратной связи</title>
</head>
<body>
<div class="flex" id="container">
    <div class="flex" id="form">
        <form action="\modules\send.php" method="post" class="flex" id="content">
            <label><a href="\products.php">Назад</a></label>
            <h1>Форма обратной связи</h1>
            <label class="title">Имя</label>
            <input name="full_name" type="text" value="<?= $full_name ?>" <?= $full_name_error_class ?>>
            <?= $full_name_error_message ?>
            <label class="title">E-mail</label>
            <input name="email" type="text" value="<?= $email ?>" <?= $email_error_class ?>>
            <?= $email_error_message ?>
            <label class="title">Год рождения</label>
            <select name="year_of_birth" size="1">
                <option value="1998" <?= is_selected_year_of_birth('1998') ?>>1998</option>
                <option value="1999" <?= is_selected_year_of_birth('1999') ?>>1999</option>
                <option value="2000" <?= is_selected_year_of_birth('2000') ?>>2000</option>
                <option value="2001" <?= is_selected_year_of_birth('2001') ?>>2001</option>
                <option value="2002" <?= is_selected_year_of_birth('2002') ?>>2002</option>
            </select>
            <label class="title">Пол</label>
            <div class="flex center">
                <input type="radio" name="sex" value="male" <?= is_checked_match_sex('male') ?>>
                <label for="sex" id="margin">Мужской</label>
                <input type="radio" name="sex" value="female" <?= is_checked_match_sex('female') ?>>
                <label for="sex">Женский</label>
            </div>
            <label class="title">Тема обращения</label>
            <input name="theme" type="text" <?= $theme_error_class ?>>
            <?= $theme_error_message ?>
            <label class="title">Суть вопроса</label>
            <textarea name="core" <?= $core_error_class ?>></textarea>
            <?= $core_error_message ?>
            <div class="flex center">
                <input name="acquainted" type="checkbox" id="acquainted">
                <label for="acquainted" <?= $acquainted_error_class ?>>С контрактом ознакомлен(а)</label>
            </div>
            <?= $acquainted_error_message ?>
            <input id="button" type="submit" value="Отправить">
            <?php if(isset($_COOKIE['success'])) echo "<p class='success'>Форма успешно отправлена</p>" ?>
        </form>
    </div>
</div>
</body>
</html>