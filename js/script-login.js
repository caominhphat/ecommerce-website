$(".signup-form").validate({
    rules: {
      // simple rule, converted to {required:true}
      name: {
        required: true,
        regex:
          /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i,
      },
      phone: {
        required: true,
        regex: /^0([0-9]{9,9})$/,
        maxlength: 11,
      },

      address: {
        required: true,
      },

      password: {
        required: true,
        regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
      },

      password_confirmation: {
      required: true,
      equalTo: "[name=password]",
      },

      email: {
      required: true,
      maxlength: 50,
      email: true,
      remote: "checkEmail.php",
      },
    },
  
    messages: {
        name: {
        required: "Input username",
        regex: "Dont use number and special char",
        },

        phone: {
        required: 'Input number',
        regex: 'Input 11 numbers with 0 first',
        },

        address: {
            required: 'Input address',
        },

        password: {
          required: "Input password",
          regex:"At least 8 chars,1 number, 1 special char,1 Uppercase",
        },

        password_confirmation: {
          required: "Re-input Password",
          equalTo: "Password does not match",
        },
        
        email: {
            required: "Input email",
            email: "Input right format email(a@gmail.com)",
            remote:"Email has been existed",
          },
     
    },
    errorClass: "invalid-feedback d-block",
    highlight: function (element) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid");
    },
  });
  
  $.validator.addMethod(
    "regex",
    function (value, element, regexp) {
      if (regexp.constructor != RegExp) regexp = new RegExp(regexp);
      else if (regexp.global) regexp.lastIndex = 0;
      return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
  );


  $("#update_form").validate({
    rules: {
      // simple rule, converted to {required:true}
      name: {
        required: true,
        regex:
          /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i,
      },

      phone: {
        required: true,
        regex: /^0([0-9]{9,9})$/,
        maxlength: 11,
      },

      address: {
        required: true,
      },

      email: {
        required: true,
        maxlength: 50,
        email: true,
       
        },

        password: {
          regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
        },

        password_confirmation: {
          equalTo: "[name=password]",
          },
    },
  
    messages: {
        name: {
        required: "Input username",
        regex: "Dont use number and special char",
        },

        phone: {
        required: 'Input number',
        regex: 'Input 11 numbers with 0 first',
        },

        address: {
          required: 'Input address',
      },

      email: {
        required: "Input email",
        email: "Input right format email(a@gmail.com)",
       
      },

      password: {
       
        regex:"At least 8 chars,1 number, 1 special char,1 Uppercase",
      },

      password_confirmation: {
      
        equalTo: "Password does not match",
      },
     
    },
    errorClass: "invalid-feedback d-block",
    highlight: function (element) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid");
    },
  });
  
  $.validator.addMethod(
    "regex",
    function (value, element, regexp) {
      if (regexp.constructor != RegExp) regexp = new RegExp(regexp);
      else if (regexp.global) regexp.lastIndex = 0;
      return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
  );
  