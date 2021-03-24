$(document).ready(function () {
  // $('input').attr('autocomplete','off');

  // dashboard
  $('.accordion-burger').on('click', function () {
    $('aside').toggleClass('active');
    $('main').toggleClass('active');
  });
  //
  $('.accordion-item').on('click', function () {
    $(this).toggleClass('active');
    $(this).siblings('.accordion-item-list').toggleClass('active');
  });
  // dashboard_admin
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
      url: 'doAction_dashboard.php?state=login', // url位置
      type: 'post', // post/get
      data: { loginAccount: loginAccVal, loginPassword: loginPwdVal }, // 輸入的資料
      error: function (xhr) {
        console.log(xhr);
      }, // 錯誤後執行的函數
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
      }, // 成功後要執行的函數
    });
  });
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
  // location mod form validation
  // $('#location-mod-name').keydown(function () {
  //   console.log(123)
  //   alert('123');
  // });
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
});
