<?php
session_start();
require_once('db_connect.php');

// =========================

$state = $_GET["state"];
$login_account = isset($_POST["loginAccount"]) ? $_POST["loginAccount"] : '';
$login_password = isset($_POST["loginPassword"]) ? $_POST["loginPassword"] : '';

// =========================

// 準備執行語句
if ($state === 'login') {
    $query1 = "select * from dashboard_admin WHERE account = '" . $login_account . "'";
    $query2 = "select * from dashboard_admin WHERE account = '" . $login_account . "' AND password = '" . $login_password . "'";
    // 執行query，判斷返回值，$res 會是一物件內容
    $res1 = mysqli_query($link, $query1);
    if ($res1) {
        // echo '語句1執行成功';
        // 判斷是否有內容
        if (mysqli_num_rows($res1) > 0) {
            // $rows 為詳細每筆資料，mysqli_fetch_all()若不加第二個參數MYSQLI_ASSOC，回傳資料會是索引陣列
            // $rows = mysqli_fetch_all($res1, MYSQLI_ASSOC);
            // print_r($rows);
            // 
            $res2 = mysqli_query($link, $query2);
            if ($res2) {
                // echo '語句2執行成功';
                // 判斷是否有內容
                if (mysqli_num_rows($res2) > 0) {
                    // $rows 為詳細每筆資料，mysqli_fetch_all()若不加第二個參數MYSQLI_ASSOC，回傳資料會是索引陣列
                    // $rows = mysqli_fetch_all($res2, MYSQLI_ASSOC);
                    // print_r($rows);
                    // 
                    $_SESSION['admin_state'] = 'success';
                    $_SESSION['admin_user'] = $login_account;
                    echo '登入成功';
                } else {
                    echo '密碼錯誤';
                }
            } else {
                // echo '語句2執行失敗';
            }
        } else {
            echo '無此帳號';
        }
    } else {
        // echo '語句1執行失敗';
    }
}
// 
if ($state === 'logout') {
    unset($_SESSION['admin_state']);
    unset($_SESSION['admin_user']);
    header('Location:./dashboard_admin.php');
}
