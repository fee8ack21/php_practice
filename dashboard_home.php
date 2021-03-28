<?php
session_start();
if (isset($_SESSION['admin_state'])) {
    if ($_SESSION['admin_state'] !== 'success') {
        header('Location:./dashboard_admin.php');
    }
} else {
    header('Location:./dashboard_admin.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>後台</title>
    <!--  -->
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="dashboard-wrap">
        <header class="d-flex justify-content-between justify-content-md-end bg-dark py-3 px-3" style="height: 60px;">
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
        <div class="d-flex position-relative">
            <aside style="width: 250px;">
                <ul class="accordion bg-secondary p-2 mb-0 list-unstyled" style="height: calc(100vh - 60px);overflow-y:scroll;">
                    <li>
                        <a href="./dashboard_home.php" class="accordion-item d-flex align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                            <i class="fas fa-home"></i>
                            首頁
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
                                <a href="./dashboard_product.php" class="px-4 text-decoration-none">商品列表</a>
                            </li>
                            <li>
                                <a href="#" class="px-4 text-decoration-none">商品列表</a>
                            </li>
                            <li>
                                <a href="#" class="px-4 text-decoration-none">商品列表</a>
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
                                <a href="#" class="px-4 text-decoration-none">List2-1</a>
                            </li>
                            <a href="#" class="px-4 text-decoration-none">List2-2</a>
                    </li>
                    <li>
                        <a href="#" class="px-4 text-decoration-none">List2-3</a>
                    </li>
                </ul>
                </li>
                <li>
                    <a href="./dashboard_location.php" class="accordion-item d-flex align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                        <i class="fas fa-map-marked-alt"></i>據點消息
                        <i class="fas fa-angle-down d-flex justify-content-center align-items-center" style="color: transparent;"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="accordion-item d-flex justify-content-between align-items-center bg-secondary px-3 mb-0 text-decoration-none text-white rounded">
                        <i class="fas fa-users"></i>
                        會員
                        <i class="fas fa-angle-down d-flex justify-content-center align-items-center ml-auto"></i>
                    </a>
                    <ul class="accordion-item-list list-unstyled">
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-1</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-2</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-3</a>
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
                            <a href="#" class="px-4 text-decoration-none">List2-1</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-2</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-3</a>
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
                            <a href="#" class="px-4 text-decoration-none">List2-1</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-2</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 text-decoration-none">List2-3</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </aside>
            <main class="position-absolute px-0 px-md-4 py-2">
                <nav style="--bs-breadcrumb-divider: '>';font-size:12px;font-weight:bold;" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: transparent;">
                        <li class="breadcrumb-item active" aria-current="page">首頁</li>
                    </ol>
                </nav>
                <div class="home-page-wrap px-3">
                    <h2 style="font-size: 14px;">據點消息</h2>
                    <div id="map" style="height:500px"></div>
                </div>
            </main>
        </div>
    </div>
    <!--  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXNIeO1IKw9_eE9JbvYyfqTJWYIyJ8zYw&callback=initMap">
    </script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                fullscreenControl: false,
                zoom: 8,
            });
            // 
            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
                '<div id="bodyContent">' +
                "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
                "sandstone rock formation in the southern part of the " +
                "rock caves and ancient paintings. Uluru is listed as a World " +
                "Heritage Site.</p>" +
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
                "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
                "(last visited June 22, 2009).</p>" +
                "</div>" +
                "</div>";

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            // 
            let marker = new google.maps.Marker({
                position: {
                    lat: -34.397,
                    lng: 150.644
                },
                animation: google.maps.Animation.DROP,
                map,
                title: "Hello World!",
            });
            marker.setMap(map);
            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }
    </script>
    <script src="./js/all.js"></script>
</body>

</html>