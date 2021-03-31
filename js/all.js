$(document).ready(function () {
  // 登入頁功能
  if (window.location.pathname === '/php_practice/dashboard_admin.php') {
      $('#loginAccount').val('')
      $('#loginPassword').val('');
    $('#loginAccount').keydown(function () {
      $(this).removeClass('is-invalid');
      $(this).removeClass('is-valid');
      $('#loginAccountHint').text('');
    });
    $('#loginPassword').keydown(function () {
      $(this).removeClass('is-invalid');
      $(this).removeClass('is-valid');
      $('#loginPasswordHint').text('');
    });
    //
    $('#loginSend').on('click', function () {
      let loginAccVal = $('#loginAccount').val();
      let loginPwdVal = $('#loginPassword').val();
      //
      $.ajax({
        url: 'doAction_dashboard.php?state=login',
        type: 'post',
        data: { loginAccount: loginAccVal, loginPassword: loginPwdVal },
        error: function (xhr) {
          console.log(xhr);
        },
        success: function (response) {
          if (response === '無此帳號') {
            $('#loginAccount').addClass('is-invalid');
            $('#loginAccountHint').text('無此帳號');
          } else if (response === '密碼錯誤') {
            $('#loginAccount').removeClass('is-invalid');
            $('#loginAccount').addClass('is-valid');
            $('#loginAccountHint').text('');
            //
            $('#loginPassword').addClass('is-invalid');
            $('#loginPasswordHint').text('密碼錯誤');
          } else if (response === '登入成功') {
            window.location = './dashboard_home.php';
          }
        },
      });
    });
  }

  // Layout 手風琴效果
  $('.accordion-burger').on('click', function () {
    $('aside').toggleClass('active');
    $('main').toggleClass('active');
  });
  $('.accordion-item').on('click', function () {
    $(this).toggleClass('active');
    $(this).siblings('.accordion-item-list').toggleClass('active');
  });
  // 首頁
  if (window.location.pathname === '/php_practice/dashboard_home.php') {
    $.ajax({
      url: 'doAction_dashboard.php?state=home',
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
        let northLength = 0;
        let centralLength = 0;
        let southLength = 0;
        let eastLength = 0;
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
        let ctx = document.getElementById('location-chart').getContext('2d');
        // let labelPosition = $(window).width() < 1200 ? 'left' : 'top';
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
                  chart.data.labels.splice(0, 4);
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.splice(0, 4);
                  });
                  chart.data.labels.push('北部');
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(northLength);
                  });
                  chart.data.datasets[0].backgroundColor[0] = 'rgba(255, 99, 132,0.8)';
                  //
                  chart.update();
                  let locationChartStrDetail = '';
                  for (let i = 0; i < data.length; i++) {
                    if (data[i].position === '北部') {
                      locationChartStrDetail +=
                        '<li style="font-size:14px" class="list-group-item bg-light">' +
                        data[i].name +
                        '</li>';
                    }
                  }
                  $('#location-list').text('');
                  $('#location-list').append(locationChartStrDetail);
                  $('#location-list-title').text('');
                  $('#location-list-title').append(
                    '北部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
                  );
                } else if (legendItem.text === '中部') {
                  chart.data.labels.splice(0, 4);
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.splice(0, 4);
                  });
                  chart.data.labels.push('中部');
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(centralLength);
                  });
                  chart.data.datasets[0].backgroundColor[0] = 'rgba(54, 162, 235,0.8)';
                  //
                  chart.update();
                  let locationChartStrDetail = '';
                  for (let i = 0; i < data.length; i++) {
                    if (data[i].position === '中部') {
                      locationChartStrDetail +=
                        '<li style="font-size:14px" class="list-group-item bg-light">' +
                        data[i].name +
                        '</li>';
                    }
                  }
                  $('#location-list').text('');
                  $('#location-list').append(locationChartStrDetail);
                  $('#location-list-title').text('');
                  $('#location-list-title').append(
                    '中部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
                  );
                } else if (legendItem.text === '南部') {
                  chart.data.labels.splice(0, 4);
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.splice(0, 4);
                  });
                  chart.data.labels.push('南部');
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(southLength);
                  });
                  chart.data.datasets[0].backgroundColor[0] = 'rgba(255, 205, 86,0.8)';
                  //
                  chart.update();
                  let locationChartStrDetail = '';
                  for (let i = 0; i < data.length; i++) {
                    if (data[i].position === '南部') {
                      locationChartStrDetail +=
                        '<li style="font-size:14px" class="list-group-item bg-light">' +
                        data[i].name +
                        '</li>';
                    }
                  }
                  $('#location-list').text('');
                  $('#location-list').append(locationChartStrDetail);
                  $('#location-list-title').text('');
                  $('#location-list-title').append(
                    '南部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
                  );
                } else if (legendItem.text === '東部') {
                  chart.data.labels.splice(0, 4);
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.splice(0, 4);
                  });
                  chart.data.labels.push('東部');
                  chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(eastLength);
                  });
                  chart.data.datasets[0].backgroundColor[0] = 'rgba(75, 192, 192,0.8)';
                  chart.update();
                  let locationChartStrDetail = '';
                  for (let i = 0; i < data.length; i++) {
                    if (data[i].position === '東部') {
                      locationChartStrDetail +=
                        '<li style="font-size:14px" class="list-group-item bg-light">' +
                        data[i].name +
                        '</li>';
                    }
                  }
                  $('#location-list').text('');
                  $('#location-list').append(locationChartStrDetail);
                  $('#location-list-title').text('');
                  $('#location-list-title').append(
                    '東部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
                  );
                }
              },
            },
          },
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
            $('#location-list').text('');
            $('#location-list').append(locationChartStrDetail);
            $('#location-list-title').text('');
            $('#location-list-title').append('總覽');
          }
        });
        //
        $('#location-chart').on('click', function (e) {
          let firstPoint = chart.getElementAtEvent(e)[0];
          let label;
          let value;
          if (firstPoint) {
            label = chart.data.labels[firstPoint._index];
            value = chart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
          }
          if (label === '北部') {
            chart.data.labels.splice(0, 4);
            chart.data.datasets.forEach((dataset) => {
              dataset.data.splice(0, 4);
            });
            chart.data.labels.push('北部');
            chart.data.datasets.forEach((dataset) => {
              dataset.data.push(northLength);
            });
            chart.data.datasets[0].backgroundColor[0] = 'rgba(255, 99, 132,0.8)';
            chart.update();
            let locationChartStrDetail = '';
            for (let i = 0; i < data.length; i++) {
              if (data[i].position === '北部') {
                locationChartStrDetail +=
                  '<li style="font-size:14px" class="list-group-item bg-light">' +
                  data[i].name +
                  '</li>';
              }
            }
            $('#location-list').text('');
            $('#location-list').append(locationChartStrDetail);
            $('#location-list-title').text('');
            $('#location-list-title').append(
              '北部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
            );
          } else if (label === '中部') {
            chart.data.labels.splice(0, 4);
            chart.data.datasets.forEach((dataset) => {
              dataset.data.splice(0, 4);
            });
            chart.data.labels.push('中部');
            chart.data.datasets.forEach((dataset) => {
              dataset.data.push(centralLength);
            });
            chart.data.datasets[0].backgroundColor[0] = 'rgba(54, 162, 235,0.8)';
            chart.update();
            let locationChartStrDetail = '';
            for (let i = 0; i < data.length; i++) {
              if (data[i].position === '中部') {
                locationChartStrDetail +=
                  '<li style="font-size:14px" class="list-group-item bg-light">' +
                  data[i].name +
                  '</li>';
              }
            }
            $('#location-list').text('');
            $('#location-list').append(locationChartStrDetail);
            $('#location-list-title').text('');
            $('#location-list-title').append(
              '中部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
            );
          } else if (label === '南部') {
            chart.data.labels.splice(0, 4);
            chart.data.datasets.forEach((dataset) => {
              dataset.data.splice(0, 4);
            });
            chart.data.labels.push('南部');
            chart.data.datasets.forEach((dataset) => {
              dataset.data.push(southLength);
            });
            chart.data.datasets[0].backgroundColor[0] = 'rgba(255, 205, 86,0.8)';
            chart.update();
            let locationChartStrDetail = '';
            for (let i = 0; i < data.length; i++) {
              if (data[i].position === '南部') {
                locationChartStrDetail +=
                  '<li style="font-size:14px" class="list-group-item bg-light">' +
                  data[i].name +
                  '</li>';
              }
            }
            $('#location-list').text('');
            $('#location-list').append(locationChartStrDetail);
            $('#location-list-title').text('');
            $('#location-list-title').append(
              '南部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
            );
          } else if (label === '東部') {
            chart.data.labels.splice(0, 4);
            chart.data.datasets.forEach((dataset) => {
              dataset.data.splice(0, 4);
            });
            chart.data.labels.push('東部');
            chart.data.datasets.forEach((dataset) => {
              dataset.data.push(eastLength);
            });
            chart.data.datasets[0].backgroundColor[0] = 'rgba(75, 192, 192,0.8)';
            chart.update();
            let locationChartStrDetail = '';
            for (let i = 0; i < data.length; i++) {
              if (data[i].position === '東部') {
                locationChartStrDetail +=
                  '<li style="font-size:14px" class="list-group-item bg-light">' +
                  data[i].name +
                  '</li>';
              }
            }
            $('#location-list').text('');
            $('#location-list').append(locationChartStrDetail);
            $('#location-list-title').text('');
            $('#location-list-title').append(
              '東部<i id="back-chart-icon" class="fas fa-arrow-left"></i>'
            );
          }
        });
        //
        function chartListRWD() {
          if ($(window).width() < 992) {
            let chart = document.getElementById('location-chart');
            let chartHeight = chart.offsetHeight;
            let totalLastHeight = 327 + chartHeight;
            let chartList = document.getElementById('location-list');
            console.log(chartList);
            chartList.style['height'] = 'calc(100vh - ' + totalLastHeight + 'px)';
          }
        }
        window.onresize = function () {
          chartListRWD();
        };
        chartListRWD();
      },
    });
    //
  }
  // 據點消息首頁 RWD
  if (window.location.pathname === '/php_practice/dashboard_location.php') {
    function locationHomeRWD() {
      if ($(window).width() < 500) {
        $('#location-add-btn').text('');
        $('#location-add-btn').append('<i class="fas fa-plus"></i>');
        $('#location-delete-btn').text('');
        $('#location-delete-btn').append('<i class="fas fa-trash-alt"></i>');
        $('#location-clear-btn').text('');
        $('#location-clear-btn').append('<i class="fas fa-redo"></i>');
      } else {
        $('#location-add-btn').text('');
        $('#location-add-btn').append('<i class="fas fa-plus mr-1"></i>新增據點');
        $('#location-delete-btn').text('');
        $('#location-delete-btn').append('<i class="fas fa-trash-alt mr-1"></i>刪除據點');
        $('#location-clear-btn').text('');
        $('#location-clear-btn').append('<i class="fas fa-redo mr-1"></i>清除條件');
      }
    }
    locationHomeRWD();
    window.onresize = function () {
      locationHomeRWD();
    };
  }
  // 據點消息修改功能
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
  $('#location-mod-image-upload').change(function () {
    let selectedFile = $(this)[0].files[0];
    console.log($(this)[0].files[0]);
    console.log($(this)[0].files[0].name);
    var reader = new FileReader();
    reader.readAsDataURL(selectedFile);
    reader.onload = function (e) {
      $('#location-mod-image').attr('src', e.target.result);
    };
  });
  // 據點消息上傳功能
  $('#location-add-confirm-btn').on('click', function () {
    console.log('123');
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
  //
  $('#location-add-image-upload').change(function () {
    let selectedFile = $(this)[0].files[0];
    console.log($(this)[0].files[0]);
    console.log($(this)[0].files[0].name);
    var reader = new FileReader();
    reader.readAsDataURL(selectedFile);
    reader.onload = function (e) {
      $('#location-add-image').attr('src', e.target.result);
    };
  });
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
    $('#location-add-modal-body').text('');
    $('#location-add-modal-body').append(modalStr);
  });
});
