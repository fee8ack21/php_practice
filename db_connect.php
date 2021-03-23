<?php
// header("content-type:text/html;charset=utf-8");
// 建立連接，參數(host, user, password, database, port, socket)，變數$link 接收返回物件，若連接失敗，使用error函數查看資訊
$link = mysqli_connect('localhost', 'root', '12345') or die("連接失敗</br>" . mysqli_connect_errno() . ":" . mysqli_connect_error());
// 確認編碼，參數(連接對象, 編碼格式)
mysqli_set_charset($link, 'utf8');
// 打開指定資料庫
mysqli_select_db($link, 'php_practice') or die("資料庫指定錯誤" . mysqli_errno($link) . ":" . mysqli_error($link));
