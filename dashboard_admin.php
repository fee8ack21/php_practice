<?php
session_start();
if (isset($_SESSION['admin_state'])) {
    if ($_SESSION['admin_state'] === 'success') {
        header('Location:./dashboard_home.php');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>後台登入</title>
    <!--  -->
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="admin-wrap container d-flex align-items-center" style="height: 100vh;">
        <form action="" class="rounded py-5 px-3" autocomplete="off">
            <h1 class="text-center h5">
                後台登入
            </h1>
            <div class="form-group">
                <label for="loginAccount">帳號</label>
                <input type="text" class="form-control" id="loginAccount" name="loginAccount" placeholder="請輸入帳號" autocomplete="off">
                <small class="text-danger" id="loginAccountHint"></small>
            </div>
            <div class="form-group mb-5">
                <label for="loginPassword">密碼</label>
                <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="請輸入密碼" autocomplete="off">
                <small class="text-danger" id="loginPasswordHint"></small>
            </div>
            <div class="form-btn-group d-flex justify-content-center">
                <input type="button" id="loginSend" class="btn btn-primary mx-2" value="登入">
            </div>
        </form>
    </div>
    <!--  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./js/all.js"></script>
</body>

</html>