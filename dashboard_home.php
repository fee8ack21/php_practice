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
                    <!-- <h2 style="font-size: 14px;">據點消息</h2> -->
                    <div class="">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">地圖</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">圖表</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="location-map" class="location-map rounded" style="height:500px"></div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <canvas id="location-chart" class="mb-5"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- google map -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXNIeO1IKw9_eE9JbvYyfqTJWYIyJ8zYw">
    </script>
    <script>
        function initMap(data) {
            let centerLat = 23.97565;
            let centerLng = 120.973882;
            let map;
            map = new google.maps.Map(document.getElementById("location-map"), {
                center: {
                    lat: centerLat,
                    lng: centerLng
                },
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false,
                zoom: 7,
                styles: [{
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "lightness": 33
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2e5d4"
                        }]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#c5dac6"
                        }]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                            "lightness": 20
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#c5c6c6"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#e4d7c6"
                        }]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#fbfaf7"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#acbcc9"
                            }
                        ]
                    }
                ]
            });
            for (let i = 0; i < data.length; i++) {

                // 
                const contentString =
                    '<div id="content' + data[i].id + '">' +
                    '<div id="siteNotice' + data[i].id + '">' +
                    "</div>" +
                    '<h1 id="firstHeading' + data[i].id + '" class="firstHeading text-center h6">' + data[i].name + '</h1>' +
                    '<div id="bodyContent' + data[i].id + '">' +
                    '<img src="./images/location/' + data[i].image + '" class="d-block rounded" style="width:303.48px !important;height:200px;object-fit:cover;margin-bottom:8px;"/>' +
                    "<p class='mb-1'>" + data[i].description + "</p>" +
                    "<p class='mb-1'>" + data[i].phone + "</p>" +
                    "</div>" +
                    "</div>";

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });
                // 
                let marker = new google.maps.Marker({
                    position: {
                        lat: Number(data[i].lat),
                        lng: Number(data[i].lng)
                    },
                    animation: google.maps.Animation.BOUNCE,
                    map,
                    title: data[i].name,
                });
                marker.setMap(map);
                marker.addListener("click", () => {
                    infowindow.open(map, marker);
                });
            }
        }
    </script>
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="./js/all.js"></script>
</body>

</html>