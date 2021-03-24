<?php
session_start();
require_once('db_connect.php');

// =========================

$state_get = isset($_GET["state"]) ? $_GET["state"] : "";
$state_post = isset($_POST["state"]) ? $_POST["state"] : "";

// =========================

// 登入功能
if ($state_get === 'login') {
    // 
    $login_account = isset($_POST["loginAccount"]) ? $_POST["loginAccount"] : '';
    $login_password = isset($_POST["loginPassword"]) ? $_POST["loginPassword"] : '';
    // 
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
// 登出功能
if ($state_get === 'logout') {
    // 
    unset($_SESSION['admin_state']);
    unset($_SESSION['admin_user']);
    header('Location:./dashboard_admin.php');
}
// 據點消息修改功能
if ($state_post === 'location_mod') {
    // 
    $location_mod_id = isset($_POST["location-mod-id"]) ? $_POST["location-mod-id"] : '';
    $location_mod_name = isset($_POST["location-mod-name"]) ? $_POST["location-mod-name"] : '';
    $location_mod_image = $_FILES['location-mod-image-upload']["name"];
    echo $_FILES['location-mod-image-upload']["name"];
    $location_mod_position = isset($_POST["location-mod-position"]) ? $_POST["location-mod-position"] : '';
    $location_mod_address = isset($_POST["location-mod-address"]) ? $_POST["location-mod-address"] : '';
    $location_mod_lng = isset($_POST["location-mod-lng"]) ? $_POST["location-mod-lng"] : '';
    $location_mod_lat = isset($_POST["location-mod-lat"]) ? $_POST["location-mod-lat"] : '';
    $location_mod_phone = isset($_POST["location-mod-phone"]) ? $_POST["location-mod-phone"] : '';
    $location_mod_description = isset($_POST["location-mod-description"]) ? $_POST["location-mod-description"] : '';
    // 
    $query1 = "update dashboard_location set name= '" . $location_mod_name . "' , position= '" . $location_mod_position . "' , address= '" . $location_mod_address . "' , lng = '" . $location_mod_lng . "' , lat = '" . $location_mod_lat . "' , phone = '" . $location_mod_phone . "' , description = '" . $location_mod_description . "' , image = '" . $location_mod_image . "' WHERE id = '" . $location_mod_id . "'";
    // 執行query，判斷返回值，$res 會是一物件內容
    $res1 = mysqli_query($link, $query1);
    if ($res1) {
        echo '語句1執行成功';
    } else {
        echo '語句1執行失敗';
    }
    // header('Location:./dashboard_location_mod.php?');
}
