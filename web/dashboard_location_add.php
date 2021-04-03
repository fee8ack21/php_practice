<?php
session_start();
if (isset($_SESSION['admin_state'])) {
    if ($_SESSION['admin_state'] !== 'success') {
        header('Location:./index.php');
    }
} else {
    header('Location:./index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>後台 - 據點消息/新增</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="bookmark" href="./images/favicon.ico" />
</head>

<body>
    <div class="dashboard-wrap">
        <header class="position-fixed d-flex justify-content-between justify-content-md-end bg-dark py-3 px-3 px-md-5" style="top:0px;width:100vw;height: 60px;">
            <div class="header-icon-wrap d-flex align-items-center d-md-none">
                <a href="#" class="accordion-burger d-flex align-items-center text-decoration-none">
                    <i class="fas fa-bars text-white"></i>
                </a>
            </div>
            <div class="header-icon-wrap d-flex align-items-center">
                <p class="d-flex align-items-center mb-0 mx-3">
                    <i class="far fa-user-circle text-white" style="font-size: 16px;"></i>
                    <span class="admin-user text-white ml-1 text-capitalize"><?php echo $_SESSION['admin_user'] ?></span>
                </p>
                <a href="./doAction_dashboard.php?state=logout" class="btn btn-danger" style="font-size: 14px;"><i class="fas fa-power-off mr-1"></i>登出
                </a>
            </div>
        </header>
        <div class="d-flex position-absolute" style="top:60px">
            <aside class="position-fixed" style="width: 250px;">
                <ul class="accordion bg-secondary p-2 mb-0 list-unstyled" style="height: calc(100vh - 60px);overflow-y:scroll;">
                    <li>
                        <a href="./dashboard_home.php" class="accordion-item d-flex align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                            <i class="fas fa-home"></i>
                            首頁
                            <i class="fas fa-angle-down d-flex justify-content-center align-items-center" style="color: transparent;"></i>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_location.php" class="accordion-item d-flex align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                            <i class="fas fa-map-marked-alt"></i>據點消息
                            <i class="fas fa-angle-down d-flex justify-content-center align-items-center" style="color: transparent;"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="accordion-item d-flex align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                            <i class="fas fa-tshirt"></i>
                            商品
                            <i class="fas fa-angle-down d-flex justify-content-center align-items-center ml-auto"></i>
                        </a>
                        <ul class="accordion-item-list list-unstyled">
                            <li>
                                <a href="#" class="px-4 text-decoration-none">未開放</a>
                            </li>
                            <li>
                                <a href="#" class="px-4 text-decoration-none">未開放</a>
                            </li>
                            <li>
                                <a href="#" class="px-4 text-decoration-none">未開放</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="accordion-item d-flex justify-content-between align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                            <i class="fas fa-users"></i>
                            會員
                            <i class="fas fa-angle-down d-flex justify-content-center align-items-center ml-auto"></i>
                        </a>
                        <ul class="accordion-item-list list-unstyled">
                            <li>
                                <a href="#" class="px-4 text-decoration-none">未開放</a>
                            </li>
                            <li>
                                <a href="#" class="px-4 text-decoration-none">未開放</a>
                            </li>
                            <li>
                                <a href="#" class="px-4 text-decoration-none">未開放</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <main class="position-absolute px-0 px-md-4 py-2">
                <nav style="--bs-breadcrumb-divider: '>';font-size:12px;font-weight:bold;" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: transparent;">
                        <li class="breadcrumb-item"><a href="./dashboard_home.php">首頁</a></li>
                        <li class="breadcrumb-item"><a href="./dashboard_location.php">據點消息</a></li>
                        <li class="breadcrumb-item active" aria-current="page">新增據點</li>
                    </ol>
                </nav>
                <div class="location-add-wrap px-3 mb-3">
                    <form action="doAction_dashboard.php" method="POST" enctype="multipart/form-data">
                        <div class="d-flex">
                            <div style="width:60%">
                                <div class="form-group">
                                    <label for="location-add-name" class="font-weight-bold">名稱：</label>
                                    <input type="text" class="form-control" id="location-add-name" name="location-add-name" value="" maxlength="15" placeholder="名稱限制15字" required>
                                </div>
                                <div class="form-group">
                                    <label for="location-add-position" class="font-weight-bold">區域：</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="location-add-position" name="location-add-position" required>
                                            <option selected disabled>選擇</option>
                                            <option value="北部">北部</option>
                                            <option value="中部">中部</option>
                                            <option value="南部">南部</option>
                                            <option value="東部">東部</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="width:40%" class="d-flex flex-column align-items-center ml-3">
                                <img id="location-add-image" src="./images/location/location_add_default_image.jpeg" class="mb-3" style="height:97px;max-width:140px;object-fit:cover;" />
                                <input type="hidden" name="location-add-image-origin" value="location_add_default_image.jpeg" required />
                                <label class="btn btn-warning mb-3">
                                    <input id="location-add-image-upload" name="location-add-image-upload" style="display:none;" type="file" accept=".jpg,.jpeg,.png" />
                                    <i class="fa fa-images"></i> 上傳圖片
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location-add-address" class="font-weight-bold">地址：</label>
                            <input type="text" class="form-control" name="location-add-address" id="location-add-address" value="" maxlength="50" placeholder="地址限制50字" required>
                        </div>
                        <div class="form-group">
                            <label for="location-add-lng" class="font-weight-bold">經度：</label>
                            <input type="text" class="form-control" name="location-add-lng" id="location-add-lng" value="" placeholder="小數點後最多可填寫二十位" maxlength="25" pattern="^(-?[1-9][0-9]{0,4}\.[0-9]{1,20}|0)$" required>
                        </div>
                        <div class="form-group">
                            <label for="location-add-lat" class="font-weight-bold">緯度：</label>
                            <input type="text" class="form-control" name="location-add-lat" id="location-add-lat" value="" placeholder="小數點後最多可填寫二十位" maxlength="25" pattern="^(-?[1-9][0-9]{0,4}\.[0-9]{1,20}|0)$" required>
                        </div>
                        <div class="form-group">
                            <label for="location-add-phone" class="font-weight-bold">電話：</label>
                            <input type="text" class="form-control" name="location-add-phone" id="location-add-phone" value="" maxlength="15" placeholder="電話限制15字" required>
                        </div>
                        <div class="form-group">
                            <label for="location-add-description" class="font-weight-bold">描述：</label>
                            <textarea class="form-control" style="resize:none;" name="location-add-description" id="location-add-description" rows="10" maxlength="150" placeholder="描述限制150字"></textarea>
                        </div>
                        <input type="hidden" name="location-add-id" value="">
                        <input type="hidden" name="state" value="location_add">
                        <div class="form-group">
                            <button id="location-add-confirm-btn" type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus mr-1"></i>
                                新增
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">確定要新增嗎？</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="add-modal-img img-fluid mb-3 d-block mx-auto" id="location-add-image-confirm" src="" alt="">
                                        <p class="font-weight-bold">名稱：<span id="location-add-name-confirm" style="font-weight:400"></span></p>
                                        <p class="font-weight-bold">區域：<span id="location-add-position-confirm" style="font-weight:400"></span></p>
                                        <p class="font-weight-bold">地址：<span id="location-add-address-confirm" style="font-weight:400"></span></p>
                                        <p class="font-weight-bold">經度：<span id="location-add-lng-confirm" style="font-weight:400"></span></p>
                                        <p class="font-weight-bold">緯度：<span id="location-add-lat-confirm" style="font-weight:400"></span></p>
                                        <p class="font-weight-bold">電話：<span id="location-add-phone-confirm" style="font-weight:400"></span></p>
                                        <p class="font-weight-bold">描述：</p>
                                        <p id="location-add-description-confirm"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                        <input type="submit" class="btn btn-primary" value="確定"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./js/all.js"></script>
</body>

</html>