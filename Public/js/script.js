$(document).ready(function () {
  const convertPriceToNumber = (price) => {
    const result = price.replace(/\D/g, "");
    return Number(result);
  };

  const convertNumberToPrice = (number) => {
    return number.toLocaleString("vi", { style: "currency", currency: "VND" });
  };

  $("#signupFormvalid").validate({
    rules: {
      fullname: "required",
      username: {
        required: true,
        minlength: 6,
        maxlength: 16,
      },
      password: {
        required: true,
        minlength: 9,
        maxlength: 16,
      },
      confirm_password: {
        required: true,
        minlength: 5,
        maxlength: 16,
        equalTo: "#password",
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 10,
        digits: true,
      },
      address: "required",
    },
    messages: {
      fullname: "Bạn chưa nhập họ và tên của bạn",
      username: {
        required: "Bạn chưa nhập tên đăng nhập",
        minlength: "Tên đăng nhập phải có ít nhất 6 ký tự ",
        maxlength: "Tên đăng nhập phải có tối đa 16 ký tự",
      },
      password: {
        required: "Bạn chưa nhập mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 9 ký tự ",
        maxlength: "Mật khẩu phải có tối đa 16 ký tự",
      },
      confirm_password: {
        required: "Bạn chưa nhập mật khẩu",
        minlength: "Mật khẩu phải có ít nhất 5 ký tự ",
        equalTo: "Mật khẩu không trùng với mật khẩu đã nhập ",
      },
      email: {
        required: "Bạn chưa nhập email",
        email: "Email không hợp lệ",
      },
      phone: {
        required: "Bạn chưa nhập số điện thoại",
        minlength: "Số điện thoại phải có 10 ký tự",
        maxlength: "Số điện thoại phải có 10 ký tự",
        digits: "Số điện thoại chỉ được chứa chữ số",
      },
      address: "Bạn chưa nhập địa chỉ",
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.siblings("label"));
      } else {
        error.insertAfter(element);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    },
  });
});
$("#dangky").click(function (e) {
  console.log(this);
});
