<?php

$full_name = '';
if (isset($_COOKIE['full_name'])) {
    $full_name = $_COOKIE['full_name'];
}

function is_full_name_error() {
    if (isset($_COOKIE['full_name_error'])) {
        return true;
    }
    return false;
}

$email = '';
if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
}

function is_email_error() {
    if (isset($_COOKIE['email_error'])) {
        return true;
    }
    return false;
}

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

$theme = '';
if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
}

function is_theme_error() {
    if (isset($_COOKIE['theme_error'])) {
        return true;
    }
    return false;
}

$core = '';
if (isset($_COOKIE['core'])) {
    $email = $_COOKIE['core'];
}

function is_core_error() {
    if (isset($_COOKIE['core_error'])) {
        return true;
    }
    return false;
}

function is_acquainted_error() {
    if (isset($_COOKIE['acquainted_error'])) {
        return true;
    }
    return false;
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
            <h1>Форма обратной связи</h1>
            <label class="title">Имя</label>
            <input name="full_name" type="text" value="<?= $full_name ?>" <?php if (is_full_name_error()) echo "class='error'" ?>>
            <?php if (is_full_name_error()) echo "<p>Имя должно состоять из русских букв и пробелов.</p>Длина имени должна быть от 3 до 30 символов.</p>" ?>
            <label class="title">E-mail</label>
            <input name="email" type="text" value="<?= $email ?>" <?php if (is_email_error()) echo "class='error'" ?>>
            <?php if (is_email_error()) echo "<p>Укажите почту в правильном формате.</p>Длина почты должна быть от 3 до 30 символов.</p>" ?>
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
            <input name="theme" type="text" <?php if (is_theme_error()) echo "class='error'" ?>>
            <?php if (is_theme_error()) echo "<p>Используйте только русские буквы, цифры и знаки препинания.</p>Длина темы должна быть от 1 до 30 символов.</p>" ?>
            <label class="title">Суть вопроса</label>
            <textarea name="core" <?php if (is_core_error()) echo "class='error'" ?>></textarea>
            <?php if (is_core_error()) echo "<p>Используйте только русские буквы, цифры и знаки препинания.</p>Длина вопроса должна быть от 1 до 100 символов.</p>" ?>
            <div class="flex center">
                <input name="acquainted" type="checkbox" id="acquainted">
                <label for="acquainted" <?php if (is_acquainted_error()) echo "class='error'" ?>>С контрактом ознакомлен(а)</label>
            </div>
            <?php if (is_acquainted_error()) echo "<p>Необходимо подтвердить.</p>" ?>
            <input id="button" type="submit" value="Отправить">
            <?php if(isset($_COOKIE['success'])) echo "<p class='success'>Форма успешно отправлена</p>" ?>
        </form>
    </div>
</div>
</body>
</html>
