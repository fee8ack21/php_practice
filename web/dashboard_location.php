<?php
session_start();
if (isset($_SESSION['admin_state'])) {
    if ($_SESSION['admin_state'] !== 'success') {
        header('Location:./index.php');
    }
} else {
    header('Location:./index.php');
}
// 
require_once('db_connect.php');
$searchKeyword = isset($_GET["location_search"]) ? $_GET["location_search"] : "";
$location_order = isset($_GET["location_order"]) ? $_GET["location_order"] : 'id';
// 
if (isset($_GET["location_search"])) {
    $query1 = "select * from dashboard_location WHERE valid = 1 AND id LIKE '%" . $searchKeyword . "%' OR name LIKE '%" . $searchKeyword . "%' OR position LIKE '%" . $searchKeyword . "%' OR address LIKE '%" . $searchKeyword . "%' OR phone LIKE '%" . $searchKeyword . "%' OR description LIKE '%" . $searchKeyword . "%' ORDER BY " . $location_order . "";
} else {
    $query1 = "select * from dashboard_location WHERE valid = 1 ORDER BY " . $location_order . "";
}
// 執行query，判斷返回值，$res1 會是一物件內容
$res1 = mysqli_query($link, $query1);
$currentPage = (isset($_GET["location_page"]) && is_numeric($_GET["location_page"])) ? $_GET["location_page"] : 1;
$pageLength = 1;
$dataLength = 0;
$itemPerPage = 5;
$whetherHasData = false;
// 
if ($res1) {
    // 判斷是否有內容
    if (mysqli_num_rows($res1) > 0) {
        // $rows 為詳細每筆資料，mysqli_fetch_all()若不加第二個參數MYSQLI_ASSOC，回傳資料會是索引陣列
        $rows = mysqli_fetch_all($res1, MYSQLI_ASSOC);
        $dataLength = count($rows);
        $pageLength = ceil($dataLength / $itemPerPage);
        $whetherHasData = true;
    } else {
        // echo '查無內容';
    }
} else {
    // echo '語句1執行失敗';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>後台 - 據點消息</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="bookmark" href="./images/favicon.ico" />
</head>

<body>
    <div class="dashboard-wrap">
        <header class="position-fixed d-flex justify-content-between justify-content-md-end bg-dark py-3 px-3" style="top:0px;width:100vw;height: 60px;">
            <div class="header-icon-wrap d-flex align-items-center d-md-none">
                <a href="#" class="accordion-burger d-flex align-items-center text-decoration-none">
                    <i class="fas fa-bars text-white"></i>
                </a>
            </div>
            <div class="header-icon-wrap d-flex align-items-center px-0 px-md-4">
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
                        <li class="breadcrumb-item active" aria-current="page">據點消息</li>
                    </ol>
                </nav>
                <div class="location-page-wrap px-3">
                    <div class="d-flex mb-3">
                        <p class="mb-0 mr-2" style="font-size: 14px;">總共筆數：<?php echo '<span class="text-danger">' . $dataLength . '</span>'; ?></p>
                        <p class="mb-0 mr-2" style="font-size: 14px;">總共頁數：<?php echo '<span class="text-danger">' . $pageLength . '</span>'; ?></p>
                        <p class="mb-0" style="font-size: 14px;">目前查詢：<?php echo '<span class="text-danger">' . (isset($_GET["location_search"]) ? $_GET["location_search"] : '') . '</span>'; ?></p>
                    </div>
                    <div class="d-lg-flex justify-content-between mb-3">
                        <div class="d-flex mb-3 mb-lg-0">
                            <a href="./dashboard_location_add.php" id="location-add-btn" class="btn btn-primary" style="font-size: 14px;">
                                <i class="fas fa-plus mr-1"></i>新增據點</a>
                            <form action="./doAction_dashboard.php" method="POST">
                                <button type="button" id="location-delete-btn" class="location-delete-btn btn btn-danger mx-2 delete-disabled" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt mr-1"></i>刪除據點
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">確定要刪除嗎？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div id="location-add-modal-body" class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="state" value="location_delete" />
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                <input type="submit" class="btn btn-primary" value="確定" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <a href="?" id="location-clear-btn" class="btn btn-info" style="font-size: 14px;">
                                <i class="fas fa-redo mr-1"></i>清除條件</a>
                        </div>
                        <div class="">
                            <form action="" class="d-flex justify-content-lg-end">
                                <input name="location_search" style="font-size:14px;width:calc(100% - 90px);" class="form-control mr-2" type="search" placeholder="請輸入關鍵字" aria-label="Search">
                                <button id="search-btn" style="font-size:14px;height:35px;letter-spacing:0.2rem;" class="btn btn-outline-success" type="submit"><i class="fas fa-search mr-1"></i>搜尋</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap mb-3">
                        <table class="table w-100">
                            <thead>
                                <?php
                                if (isset($_GET["location_search"])) {
                                    if (isset($_GET["location_page"])) {
                                        $id_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=id';
                                        $name_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=name';
                                        $position_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=position';
                                        $address_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=address';
                                        $lng_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=lng';
                                        $lat_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=lat';
                                        $phone_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=phone';
                                        $description_order_str = '?location_search=' . $_GET["location_search"] . '&location_page=' . $_GET["location_page"] . '&location_order=description';
                                    } else {
                                        $id_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=id';
                                        $name_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=name';
                                        $position_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=position';
                                        $address_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=address';
                                        $lng_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=lng';
                                        $lat_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=lat';
                                        $phone_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=phone';
                                        $description_order_str = '?location_search=' . $_GET["location_search"] . '&location_order=description';
                                    }
                                } else {
                                    if (isset($_GET["location_page"])) {
                                        $id_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=id';
                                        $name_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=name';
                                        $position_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=position';
                                        $address_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=address';
                                        $lng_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=lng';
                                        $lat_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=lat';
                                        $phone_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=phone';
                                        $description_order_str = '?location_page=' . $_GET["location_page"] . '&location_order=description';
                                    } else {
                                        $id_order_str = '?location_order=id';
                                        $name_order_str = '?location_order=name';
                                        $position_order_str = '?location_order=position';
                                        $address_order_str = '?location_order=address';
                                        $lng_order_str = '?location_order=lng';
                                        $lat_order_str = '?location_order=lat';
                                        $phone_order_str = '?location_order=phone';
                                        $description_order_str = '?location_order=description';
                                    }
                                }
                                ?>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="min-width: 90px;">
                                        <a href="<?php echo $id_order_str ?>" class="d-block text-decoration-none" style="color: black;">編號
                                            <?php if ($location_order === 'id') {
                                                echo '<i class="fas fa-caret-down"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th scope="col" style="min-width: 200px;">
                                        <a href="<?php echo $name_order_str ?>" class="d-block text-decoration-none" style="color: black;">名稱
                                            <?php if ($location_order === 'name') {
                                                echo '<i class="fas fa-caret-down"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th scope="col" style="min-width: 90px;">
                                        <a href="<?php echo $position_order_str ?>" class="d-block text-decoration-none" style="color: black;">區域
                                            <?php if ($location_order === 'position') {
                                                echo '<i class="fas fa-caret-down"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="<?php echo $address_order_str ?>" class="d-block text-decoration-none" style="color: black;">地址
                                            <?php if ($location_order === 'address') {
                                                echo '<i class="fas fa-caret-down"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="<?php echo $lng_order_str ?>" class="d-block text-decoration-none" style="color: black;">經度
                                            <?php if ($location_order === 'lng') {
                                                echo '<i class="fas fa-caret-down"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="<?php echo $lat_order_str ?>" class="d-block text-decoration-none" style="color: black;">緯度
                                            <?php if ($location_order === 'lat') {
                                                echo '<i class="fas fa-caret-down"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th scope="col" style="min-width: 170px;">
                                        <a href="<?php echo $phone_order_str ?>" class="d-block text-decoration-none" style="color: black;">
                                            電話<?php if ($location_order === 'phone') {
                                                    echo '<i class="fas fa-caret-down"></i>';
                                                } ?>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="<?php echo $description_order_str ?>" class="d-block text-decoration-none" style="color: black;">
                                            描述<?php if ($location_order === 'description') {
                                                    echo '<i class="fas fa-caret-down"></i>';
                                                } ?>
                                        </a>
                                    </th>
                                    <th scope="col">圖片</th>
                                    <th scope="col">修改</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($whetherHasData) {
                                    for ($i = $itemPerPage * ($currentPage - 1); $i < $itemPerPage * $currentPage; $i++) {
                                        if (isset($rows[$i])) {
                                            echo
                                                '<tr>
                                                    <td><input type="checkbox" name="" data-name="' . $rows[$i]["name"] . '" data-id="' . $rows[$i]["id"] . '" class="position-relative" style="top:3.5px;width:18px;height:18px;"/></td>
                                                    <td>' . $rows[$i]["id"] . '</td>
                                                    <td style="min-width:200px">' . $rows[$i]["name"] . '</td>
                                                    <td>' . $rows[$i]["position"] . '</td>
                                                    <td>' . $rows[$i]["address"] . '</td>
                                                    <td>' . $rows[$i]["lng"] . '</td>
                                                    <td>' . $rows[$i]["lat"] . '</td>
                                                    <td>' . $rows[$i]["phone"] . '</td>
                                                    <td>' . $rows[$i]["description"] . '</td>
                                                    <td><img src="./images/location/' . $rows[$i]["image"] . '" style="height:40px;"></td>
                                                    <td>
                                                        <a href="./dashboard_location_mod.php?location_id=' . $rows[$i]["id"] . '" class="btn btn-warning w-100">
                                                            <i class="fas fa-cogs"></i>
                                                        </a>
                                                    </td>
                                                </tr>';
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php echo $whetherHasData ? '' : '<p style="font-size:14px">查無內容</p>'  ?>
                    </div>
                    <nav>
                        <ul class="pagination d-flex justify-content-center">
                            <?php
                            if (isset($_GET["location_search"])) {
                                if (isset($_GET["location_order"])) {
                                    $PrevPageStr = '?location_search=' . $_GET["location_search"] . '&location_page=' . ($currentPage - 1) . '&location_order=' . $_GET["location_order"] . '';
                                    $NextPageStr = '?location_search=' . $_GET["location_search"] . '&location_page=' . ($currentPage + 1) . '&location_order=' . $_GET["location_order"] . '';
                                    $PageStr = '?location_search=' . $_GET["location_search"] . '&location_page=';;
                                    $PageStrAfter = '&location_order=' . $_GET["location_order"] . '';
                                } else {
                                    $PrevPageStr = '?location_search=' . $_GET["location_search"] . '&location_page=' . ($currentPage - 1) . '';;
                                    $NextPageStr = '?location_search=' . $_GET["location_search"] . '&location_page=' . ($currentPage + 1) . '';
                                    $PageStr = '?location_search=' . $_GET["location_search"] . '&location_page=';;
                                    $PageStrAfter = '';
                                }
                            } else {
                                if (isset($_GET["location_order"])) {
                                    $PrevPageStr = '?location_page=' . ($currentPage - 1) . '&location_order=' . $_GET["location_order"] . '';
                                    $NextPageStr = '?location_page=' . ($currentPage + 1) . '&location_order=' . $_GET["location_order"] . '';
                                    $PageStr = '?location_page=';
                                    $PageStrAfter = '&location_order=' . $_GET["location_order"] . '';
                                } else {
                                    $PrevPageStr = '?location_page=' . ($currentPage - 1) . '';
                                    $NextPageStr = '?location_page=' . ($currentPage + 1) . '';
                                    $PageStr = '?location_page=';
                                    $PageStrAfter = '';
                                }
                            }
                            ?>
                            <li class="page-item">
                                <a style="border-radius: 0.25rem 0 0 0.25rem;" class="btn page-link text-dark <?php echo ($currentPage == 1) ? 'disabled' : '' ?>" href="<?php echo $PrevPageStr ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $pageLength; $i++) {
                                $currentDisabled = ($currentPage == $i) ? "disabled text-white bg-dark" : "text-dark";
                                echo '<li class="page-item"><a class="btn page-link rounded-0 ' . $currentDisabled . '" href="' . $PageStr . $i . $PageStrAfter . '">' . $i . '</a></li>';
                            }
                            ?>
                            <li class="page-item">
                                <a style="border-radius: 0 0.25rem 0.25rem 0;" class="btn page-link text-dark <?php echo ($currentPage == $pageLength) ? 'disabled' : '' ?>" href="<?php echo $NextPageStr ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
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