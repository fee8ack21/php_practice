<?php
// 封裝型式 1
function connect1($host, $user, $password, $charset, $database)
{
    $link = mysqli_connect($host, $user, $password) or die("連接失敗</br>" . mysqli_connect_errno() . ":" . mysqli_connect_error());
    mysqli_set_charset($link, $charset);
    mysqli_select_db($link, $database) or die("資料庫指定錯誤" . mysqli_errno($link) . ":" . mysqli_error($link));
    return $link;
}
// 封裝型式 2 (陣列參數)
function connect2($config)
{
    $link = mysqli_connect($config['host'], $config['user'], $config['password']) or die("連接失敗</br>" . mysqli_connect_errno() . ":" . mysqli_connect_error());
    mysqli_set_charset($link, $config['charset']);
    mysqli_select_db($link, $config['database']) or die("資料庫指定錯誤" . mysqli_errno($link) . ":" . mysqli_error($link));
    return $link;
}
// 封裝型式 3 (常量)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_CHARSET', 'utf8');
define('DB_DATABASE', 'coolshop');
function connect3($config)
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("連接失敗</br>" . mysqli_connect_errno() . ":" . mysqli_connect_error());
    mysqli_set_charset($link, DB_CHARSET);
    mysqli_select_db($link, DB_DATABASE) or die("資料庫指定錯誤" . mysqli_errno($link) . ":" . mysqli_error($link));
    return $link;
}
