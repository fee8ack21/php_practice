$(document).ready(function () {
  // 登入頁功能
  if (window.location.pathname === '/php_practice/dashboard_admin.php') {
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

          // Configuration options go here
          options: {},
        });
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
