<?php

function insert_feedback_message($feedback, $full_name, $email, $year_of_birth, $sex, $theme, $core, $acquainted)
{
    $sql = /** @lang text */
        "insert into messages (full_name, email, year_of_birth, sex, theme, core, acquainted) 
        values (:full_name, :email, :year_of_birth, :sex, :theme, :core, :acquainted);";
    $query = $feedback->prepare($sql);
    $query->execute([
        'full_name'=>$full_name,
        'email'=>$email,
        'year_of_birth'=>$year_of_birth,
        'sex'=>$sex,
        'theme'=>$theme,
        'core'=>$core,
        'acquainted'=>$acquainted
    ]);
}

function get_prepare_query_result($connection, $sql, $id)
{
    $query = $connection->prepare($sql);
    $query->execute(['id'=>$id]);
    $result = $query->fetchAll();
    if (count($result))
    {
        return $result;
    }
    error_404();
}

function get_query_result($connection, $sql)
{
    $query = $connection->query($sql);
    return $query->fetchAll();
}

function create_connection($host, $dbname, $username, $password) {
    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

function error_404() {
    header("HTTP/1.0 404 Not Found");
    include("404.php");
    die();
}
