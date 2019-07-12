$(document).ready(function(){
  
    $("#changePasswordForm").validate({
        rules: {
            current_password: {
                required:true,
            },
            new_password: {
                required:true,
                minlength: 6,
            },
            confirm_password:{
                required:true,
                equalTo: '#new_password',
            },
          },
          messages: {
            current_password: "current password is required",
            new_password: {
                required:"new password is required",
                minlength:"enter atleast 6 characters",
            },
            confirm_password:{
                required:"confirm Password is required",
                equalTo:"new password and confirm password should be equal",
            },
          }
    });

    $("#updateProfileForm").validate({
      rules: {
        name: {
          required:true,
          minlength: 5,
          maxlength:30,
        },
        phone: {
          required:true,
          minlength:8,
          maxlength:12,
        },
      },
      messages: {
        name:{
          required:"name is required",
          minlength:"name atleast 5 characters",
          maxlength:"name max 30 characters"
        },
        phone:{
          required:"phone number is required",
          minlength:"phone atlest 8 digits",
          maxlength:"phone max 12 digits"
        },
      }
    })

    $("#loginForm").validate({
        rules: {
            email: "required",
            password: "required",
          },
          messages: {
            email: "email is required",
            password: "password is required",
          }
    });

    $("#createUserForm").validate({
        rules: {
            name:{
              required:true,
              minlength: 5,
              maxlength:30,
            },
            email: "required",
            phone:{
              required:true,
              minlength:8,
              maxlength:12,
            },
            password: {
              required:true,
              minlength:6,
            }
          },
          messages: {
            name:{
              required:"name is required",
              minlength:"name atleast 5 characters",
              maxlength:"name max 30 characters"
            },
            email: "Email is required",
            phone:{
              required:"phone number is required",
              minlength:"phone number atlest 8 digits",
              maxlength:"phone max 12 diigits"
            },
            password: {
              required:"password required",
              minlength:"password atleast 6 characters",
            },
          }
    });
    
    $("#editUserForm").validate({
      rules: {
        name:{
          required:true,
          minlength: 5,
          maxlength:30,
        },
        email: "required",
        phone:{
          required:true,
          minlength:8,
          maxlength:12,
        },
        
      },
      messages: {
        name:{
          required:"name is required",
          minlength:"name atleast 5 characters",
          maxlength:"name max 30 characters"
        },
        email: "email is required",
        phone:{
          required:"phoneNo is required",
          minlength:"Phone number atlest 8 digit",
          maxlength:"phone max 12 digit"
        },
       
      }
    });

    $("#createCategoryForm").validate({
      rules: {
        name:{
          required:true,
        },
        description:{
          required:true,
        },
      },
        messages: {
          name:{
            required:"category name is required",
          },
          description:{
            required:"category description is required",
          },
      }
    });

    $("#editCategoryForm").validate({
      rules: {
        name:{
          required:true,
        },
        description:{
          required:true,
        },
      },
        messages: {
          name:{
            required:"category name is required",
          },
          description:{
            required:"category description is required",
          },
      }
    });

    $("#createSubCategoryForm").validate({
      rules: {
        category_id:{
          required:true,
        },
        name:{
          required:true,
        },
        description:{
          required:true,
        },
      },
        messages: {
          category_id:{
            reuired:"category is required",
          },
          name:{
            required:"sub category name is required",
          },
          description:{
            required:"sub category description is required",
          },
      }
    });
});