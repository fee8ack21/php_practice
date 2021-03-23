$(document).ready(function () {
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
});
