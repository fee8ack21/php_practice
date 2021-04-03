$(document).ready(function () {
  // 路徑設定
  let adminURL = '';
  let adminAJAX = '';
  let homeURL = '';
  let homeAJAX = '';
  let homeMemberAJAX = '';
  let locationURL = '';
  if (window.location.host === 'pin-jui-php-dashboard.herokuapp.com') {
    adminURL = '/';
    adminAJAX = 'https://pin-jui-php-dashboard.herokuapp.com/doAction_dashboard.php?state=login';
    homeURL = '/dashboard_home.php';
    homeAJAX = 'https://pin-jui-php-dashboard.herokuapp.com/doAction_dashboard.php?state=home';
    homeMemberAJAX =
      'https://pin-jui-php-dashboard.herokuapp.com/doAction_dashboard.php?state=homeMember';
    locationURL = '/dashboard_location.php';
  } else {
    adminURL = '/php_practice/web/';
    adminAJAX = 'http://localhost/php_practice/web/doAction_dashboard.php?state=login';
    homeURL = '/php_practice/web/dashboard_home.php';
    homeAJAX = 'http://localhost/php_practice/web/doAction_dashboard.php?state=home';
    homeMemberAJAX = 'http://localhost/php_practice/web/doAction_dashboard.php?state=homeMember';
    locationURL = '/php_practice/web/dashboard_location.php';
  }
  // 登入頁功能
  if (window.location.pathname === adminURL || window.location.pathname === '/index.php') {
    // 登入狀態互動及提示消除
    // $('#loginAccount').val('')
    // $('#loginPassword').val('');
    // $('#loginAccount').keydown(function () {
    //   $(this).removeClass('is-invalid');
    //   $(this).removeClass('is-valid');
    //   $('#loginAccountHint').text('');
    // });
    // $('#loginPassword').keydown(function () {
    //   $(this).removeClass('is-invalid');
    //   $(this).removeClass('is-valid');
    //   $('#loginPasswordHint').text('');
    // });
    //
    // 登入AJAX及驗證
    $('#loginSend').on('click', function () {
      // 取得帳號及密碼欄位
      let loginAccVal = $('#loginAccount').val();
      let loginPwdVal = $('#loginPassword').val();

      //
      $.ajax({
        url: adminAJAX,
        type: 'post',
        data: { loginAccount: loginAccVal, loginPassword: loginPwdVal },
        error: function (xhr) {
          console.log(xhr);
        },
        success: function (response) {
          // 登入提醒訊息函式
          function warningMessage(text) {
            $('.warning-message').remove();
            $('.warning-message-wrap').append(
              '<div class="text-center warning-message alert alert-danger alert-dismissible fade show position-fixed" style="opacity:0;width:100%;top: 0px;left:50%;transform:translate(-50%,0);border-radius:0 0 0.25rem 0.25rem" role="alert"><strong>提醒：</strong ><span class="message-content">' +
                text +
                '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div > '
            );
            setTimeout(function () {
              $('.warning-message').css('opacity', '100');
            }, 50);
            $('.close').on('click', function () {
              $('.warning-message').fadeOut(150, function () {
                $(this).remove();
              });
            });
          }
          if (response === '無此帳號') {
            $('#loginAccount').focus();
            // 登入狀態互動及提示
            // $('#loginAccount').addClass('is-invalid');
            // $('#loginAccountHint').text('無此帳號');
            warningMessage('請再次確認您的帳號！');
          } else if (response === '密碼錯誤') {
            $('#loginPassword').focus();
            // 登入狀態互動及提示
            // $('#loginAccount').removeClass('is-invalid');
            // $('#loginAccount').addClass('is-valid');
            // $('#loginAccountHint').text('');
            // $('#loginPassword').addClass('is-invalid');
            // $('#loginPasswordHint').text('密碼錯誤');
            warningMessage('請再次確認您的密碼！');
          } else if (response === '登入成功') {
            window.location = './dashboard_home.php';
          }
        },
      });
    });
  }

  // 全域佈局 - 手風琴效果
  $('.accordion-burger').on('click', function () {
    $('aside').toggleClass('active');
    $('main').toggleClass('active');
  });
  $('.accordion-item').on('click', function () {
    $(this).toggleClass('active');
    $(this).siblings('.accordion-item-list').toggleClass('active');
  });
  // 首頁
  if (window.location.pathname === homeURL) {
    $.ajax({
      url: homeAJAX,
      type: 'get',
      error: function (xhr) {
        console.log(xhr);
      },
      success: function (response) {
        let data = JSON.parse(response);
        initMap(data);
        //
        let locationChartList = '';
        for (let i = 0; i < data.length; i++) {
          locationChartList +=
            '<li style="font-size:14px" class="list-group-item bg-light">' + data[i].name + '</li>';
        }
        $('#location-list').append(locationChartList);
        $('#location-list-title').append('總覽');
        //
        let northLength = 0,
          centralLength = 0,
          southLength = 0,
          eastLength = 0;
        for (let i = 0; i < data.length; i++) {
          switch (data[i].position) {
            case '北部':
              northLength += 1;
              break;
            case '中部':
              centralLength += 1;
              break;
            case '南部':
              southLength += 1;
              break;
            case '東部':
              eastLength += 1;
              break;
          }
        }
        //
        function chartContentChange(position, positionLength, color) {
          chart.data.labels.splice(0, 4);
          chart.data.datasets.forEach((dataset) => {
            dataset.data.splice(0, 4);
          });
          chart.data.labels.push(position);
          chart.data.datasets.forEach((dataset) => {
            dataset.data.push(positionLength);
          });
          chart.data.datasets[0].backgroundColor[0] = color;
          //
          chart.update();
          let locationChartStrDetail = '';
          for (let i = 0; i < data.length; i++) {
            if (data[i].position === position) {
              locationChartStrDetail +=
                '<li style="font-size:14px" class="list-group-item bg-light">' +
                data[i].name +
                '</li>';
            }
          }
          $('#location-list').text('').append(locationChartStrDetail);
          $('#location-list-title')
            .text('')
            .append(position + '<i id = "back-chart-icon" class= "fas fa-arrow-left" ></i > ');
        }
        //
        let ctx = document.getElementById('location-chart').getContext('2d');
        let labelPosition = 'left';
        let chart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['北部', '中部', '南部', '東部'],
            datasets: [
              {
                // label: 'My First dataset',
                backgroundColor: [
                  'rgba(255, 99, 132,0.8)',
                  'rgba(54, 162, 235,0.8)',
                  'rgba(255, 205, 86,0.8)',
                  'rgba(75, 192, 192,0.8)',
                ],
                data: [northLength, centralLength, southLength, eastLength],
              },
            ],
          },
          options: {
            legend: {
              position: labelPosition,
              align: 'center',
              onClick: function (e, legendItem) {
                if (legendItem.text === '北部') {
                  chartContentChange('北部', northLength, 'rgba(255, 99, 132,0.8)');
                } else if (legendItem.text === '中部') {
                  chartContentChange('中部', centralLength, 'rgba(54, 162, 235,0.8)');
                } else if (legendItem.text === '南部') {
                  chartContentChange('南部', northLength, 'rgba(255, 205, 86,0.8)');
                } else if (legendItem.text === '東部') {
                  chartContentChange('東部', eastLength, 'rgba(75, 192, 192,0.8)');
                }
              },
            },
          },
        });
        //
        $('#location-chart').on('click', function (e) {
          let firstPoint = chart.getElementAtEvent(e)[0];
          let label, value;
          if (firstPoint) {
            label = chart.data.labels[firstPoint._index];
            value = chart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
          }
          if (label === '北部') {
            chartContentChange('北部', northLength, 'rgba(255, 99, 132,0.8)');
          } else if (label === '中部') {
            chartContentChange('中部', centralLength, 'rgba(54, 162, 235,0.8)');
          } else if (label === '南部') {
            chartContentChange('南部', northLength, 'rgba(255, 205, 86,0.8)');
          } else if (label === '東部') {
            chartContentChange('東部', eastLength, 'rgba(75, 192, 192,0.8)');
          }
        });
        //
        $('#location-list-title').on('click', function (e) {
          if (e.target.id === 'back-chart-icon') {
            chart.data.labels.splice(0, 4);
            chart.data.datasets.forEach((dataset) => {
              dataset.data.splice(0, 4);
            });
            //
            chart.data.labels.push('北部', '中部', '南部', '東部');
            chart.data.datasets.forEach((dataset) => {
              dataset.data.push(northLength, centralLength, southLength, eastLength);
            });
            chart.data.datasets[0].backgroundColor = [
              'rgba(255, 99, 132,0.8)',
              'rgba(54, 162, 235,0.8)',
              'rgba(255, 205, 86,0.8)',
              'rgba(75, 192, 192,0.8)',
            ];
            chart.update();
            let locationChartStrDetail = '';
            for (let i = 0; i < data.length; i++) {
              locationChartStrDetail +=
                '<li style="font-size:14px" class="list-group-item bg-light">' +
                data[i].name +
                '</li>';
            }
            $('#location-list').text('').append(locationChartStrDetail);
            $('#location-list-title').text('').append('總覽');
          }
        });
        
        function chartListRWD() {
          let chart = document.getElementById('location-chart');
          let chartHeight = chart.offsetHeight;
          // let totalLastHeight = 337 + chartHeight; // test
          let totalLastHeight = 327 + chartHeight;
          let chartList = document.getElementById('location-list');
          if ($(window).width() < 992) {
            chartList.style['height'] = 'calc(100vh - ' + totalLastHeight + 'px)';
          } else {
            chartList.style['height'] = '500px';
          }
        }
        chartListRWD();
        window.onresize = function () {
          chartListRWD();
        };
      },
    });
    //
    $.ajax({
      url: homeMemberAJAX,
      type: 'get',
      error: function (xhr) {
        console.log(xhr);
      },
      success: function (response) {
        let jsonResponse = JSON.parse(response);
        let targetYear = String(new Date().getFullYear());
        let janLen,
          febLen,
          marLen,
          aprLen,
          mayLen,
          junLen,
          julLen,
          augLen,
          sepLen,
          octLen,
          novLen,
          decLen,
          dataArr;
        //
        function yearChange(changeState = 'init') {
          janLen = 0;
          febLen = 0;
          marLen = 0;
          aprLen = 0;
          mayLen = 0;
          junLen = 0;
          julLen = 0;
          augLen = 0;
          sepLen = 0;
          octLen = 0;
          novLen = 0;
          decLen = 0;
          if (changeState === 'minus') {
            targetYear = String(Number(targetYear) - 1);
          } else if (changeState === 'add') {
            targetYear = String(Number(targetYear) + 1);
          } else if (changeState === 'init') {
            targetYear = '2021';
          }
          for (let i = 0; i < jsonResponse.length; i++) {
            registrationTimeArr = jsonResponse[i].registrationTime.split('-', 3);
            if (registrationTimeArr[0] === targetYear) {
              switch (registrationTimeArr[1]) {
                case '01':
                  janLen += 1;
                  break;
                case '02':
                  febLen += 1;
                  break;
                case '03':
                  marLen += 1;
                  break;
                case '04':
                  aprLen += 1;
                  break;
                case '05':
                  mayLen += 1;
                  break;
                case '06':
                  junLen += 1;
                  break;
                case '07':
                  julLen += 1;
                  break;
                case '08':
                  augLen += 1;
                  break;
                case '09':
                  sepLen += 1;
                  break;
                case '10':
                  octLen += 1;
                  break;
                case '11':
                  novLen += 1;
                  break;
                case '12':
                  decLen += 1;
                  break;
              }
            }
          }
          dataArr = [
            janLen,
            febLen,
            marLen,
            aprLen,
            mayLen,
            junLen,
            julLen,
            augLen,
            sepLen,
            octLen,
            novLen,
            decLen,
          ]; //
          let totalDataLenth = dataArr.reduce(function (a, b) {
            return a + b;
          });
          if (changeState === 'minus' || changeState === 'add') {
            memberChart.data.datasets.label = targetYear;
            memberChart.data.datasets[0].data.splice(0, 12);
            memberChart.data.datasets.forEach((dataset) => {
              dataset.data = dataArr;
            });
            memberChart.update();
          }
          //
          $('#member-chart-year').text(targetYear);
          $('#member-chart-detail-number').text(totalDataLenth);
        }
        //
        yearChange();
        //
        var ctx = document.getElementById('member-chart').getContext('2d');
        var memberChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: [
              '一月',
              '二月',
              '三月',
              '四月',
              '五月',
              '六月',
              '七月',
              '八月',
              '九月',
              '十月',
              '十一月',
              '十二月',
            ],
            datasets: [
              {
                // label: targetYear,
                data: dataArr,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1,
              },
            ],
          },
          options: {
            legend: {
              display: false,
            },
            tooltips: {
              titleAlign: 'center',
              bodyAlign: 'center',
              callbacks: {
                // label: function (tooltipItems, data) {
                //   var i = tooltipItems.index;
                //   return data.datasets[0].data[i] + '人';
                // },
              },
            },
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                    stepSize: 1
                  },
                },
              ],
            },
          },
        });
        //
        $('#member-chart-year-minus').on('click', function () {
          yearChange('minus');
        });
        $('#member-chart-year-add').on('click', function () {
          if (new Date().getFullYear() > Number(targetYear)) {
            yearChange('add');
          }
        });
      },
    });
  }
  // 據點消息首頁 RWD
  if (window.location.pathname === locationURL) {
    function locationHomeRWD() {
      if ($(window).width() < 500) {
        $('#location-add-btn').text('').append('<i class="fas fa-plus"></i>');
        $('#location-delete-btn').text('').append('<i class="fas fa-trash-alt"></i>');
        $('#location-clear-btn').text('').append('<i class="fas fa-redo"></i>');
      } else {
        $('#location-add-btn').text('').append('<i class="fas fa-plus mr-1"></i>新增據點');
        $('#location-delete-btn').text('').append('<i class="fas fa-trash-alt mr-1"></i>刪除據點');
        $('#location-clear-btn').text('').append('<i class="fas fa-redo mr-1"></i>清除條件');
      }
    }
    locationHomeRWD();
    window.onresize = function () {
      locationHomeRWD();
    };
  }
  // 據點消息 修改/修改 功能
  // 圖片上傳顯示
  function imgUploadDisplay(uploadEle, DisplayEle) {
    $(uploadEle).change(function () {
      let selectedFile = $(this)[0].files[0];
      var reader = new FileReader();
      reader.readAsDataURL(selectedFile);
      reader.onload = function (e) {
        $(DisplayEle).attr('src', e.target.result);
      };
    });
  }
  //
  $('#location-mod-confirm-btn').on('click', function () {
    let imageVal = $('#location-mod-image').attr('src');
    let nameVal = $('#location-mod-name').val();
    let positionVal = $('#location-mod-position').val();
    let addressVal = $('#location-mod-address').val();
    let lngVal = $('#location-mod-lng').val();
    let latVal = $('#location-mod-lat').val();
    let phoneVal = $('#location-mod-phone').val();
    let descriptionVal = $('#location-mod-description').val();
    //
    $('#location-mod-image-confirm').attr('src', imageVal);
    $('#location-mod-name-confirm').text(nameVal);
    $('#location-mod-position-confirm').text(positionVal);
    $('#location-mod-address-confirm').text(addressVal);
    $('#location-mod-lng-confirm').text(lngVal);
    $('#location-mod-lat-confirm').text(latVal);
    $('#location-mod-phone-confirm').text(phoneVal);
    $('#location-mod-description-confirm').text(descriptionVal);
  });
  imgUploadDisplay('#location-mod-image-upload', '#location-mod-image');
  // 據點消息上傳功能
  $('#location-add-confirm-btn').on('click', function () {
    let imageVal = $('#location-add-image').attr('src');
    let nameVal = $('#location-add-name').val();
    let positionVal = $('#location-add-position').val();
    let addressVal = $('#location-add-address').val();
    let lngVal = $('#location-add-lng').val();
    let latVal = $('#location-add-lat').val();
    let phoneVal = $('#location-add-phone').val();
    let descriptionVal = $('#location-add-description').val();
    //
    $('#location-add-image-confirm').attr('src', imageVal);
    $('#location-add-name-confirm').text(nameVal);
    $('#location-add-position-confirm').text(positionVal);
    $('#location-add-address-confirm').text(addressVal);
    $('#location-add-lng-confirm').text(lngVal);
    $('#location-add-lat-confirm').text(latVal);
    $('#location-add-phone-confirm').text(phoneVal);
    $('#location-add-description-confirm').text(descriptionVal);
  });
  imgUploadDisplay('#location-add-image-upload', '#location-add-image');
  // 據點消息刪除功能
  $('.table-wrap input[type=checkbox]').change(function () {
    let checkboxArr = $('.table-wrap input[type=checkbox]');
    for (let i = 0; i < checkboxArr.length; i++) {
      if (checkboxArr[i].checked) {
        $('#location-delete-btn').removeClass('delete-disabled');
        break;
      } else {
        $('#location-delete-btn').addClass('delete-disabled');
      }
    }
  });
  $('#location-delete-btn').on('click', function () {
    let checkedArr = $('.table-wrap input[type=checkbox]:checked');
    let modalStr = '';
    let dataArr = [];
    for (let i = 0; i < checkedArr.length; i++) {
      modalStr +=
        '<p>ID：' +
        checkedArr[i].dataset.id +
        ' 名稱：' +
        checkedArr[i].dataset.name +
        '</p><input type="hidden" name="location-delete-id[]" value="' +
        checkedArr[i].dataset.id +
        '">';
      dataArr[i] = checkedArr[i].dataset.id;
    }
    $('#location-add-modal-body').text('').append(modalStr);
  });
});
