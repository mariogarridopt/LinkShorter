<?php
session_start();

require_once 'classes/Shortener.php';

$s = new Shortener;
$base = 'http://' . $_SERVER[HTTP_HOST];

if(isset($_POST['url'])) {
    $url = $_POST['url'];

    if($code = $s->makeCode($url)) {
        $_SESSION['feedback'] = "Generated! Your short URL is: <a href=\"{$base}/{$code}\">{$base}/{$code}</a>";
    }else {
        $_SESSION['feedback'] = 'There was a problem. Invalid URL.';
    }
}

header('Location: index.php');
