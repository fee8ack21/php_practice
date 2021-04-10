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
    <title>後台 - 登入</title>
    <!--  -->
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="bookmark" href="./images/favicon.ico" />
    <?php include_once("analyticstracking.php") ?>
</head>

<body>
    <div class="admin-wrap container position-relative" style="height: 100vh;">
        <div class="warning-message-wrap">
        </div>
        <form action="" class="rounded bg-white py-5 px-4 position-fixed" style="top: 50%;left:50%;transform:translate(-50%,-50%)" autocomplete="off">
            <div class="form-group">
                <label for="loginAccount">帳號：root</label>
                <div class="position-relative">
                    <i class="fas fa-user position-absolute" style="color: #495057;top:50%;left:10px;transform:translate(0,-50%)"></i>
                    <input type="text" style="padding-left: 32px;" class="form-control" id="loginAccount" name="loginAccount" placeholder="請輸入帳號">
                </div>
                <small class=" text-danger" id="loginAccountHint"></small>
            </div>
            <div class="form-group">
                <label for="loginPassword">密碼：12345</label>
                <div class="position-relative">
                    <i class="fa fa-lock position-absolute" style="color:#495057;top:50%;left:10px;transform:translate(0,-50%)"></i>
                    <input type="password" style="padding-left: 32px;" class="form-control" id="loginPassword" name="loginPassword" placeholder="請輸入密碼" autocomplete="new-password">
                </div>
                <small class="text-danger" id="loginPasswordHint"></small>
            </div>
            <div class="form-btn-group d-flex justify-content-center">
                <input type="button" id="loginSend" class="btn btn-dark mx-2" value="登入">
            </div>
        </form>
    </div>
    <!--  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./js/all.js"></script>
</body>

</html>