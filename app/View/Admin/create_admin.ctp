<style type="text/css">
  .text-bold{color:#000000 ;}
</style>



    <div class="row" >
        <div class="col-md-12" style="margin-top:5px;" >
            <div>
                <h3 class="text-center">Create Admin Account</h3>
            </div>
            <div>
                <form id="regFormNew" method="POST" action="<?php echo ABSOLUTE_URL;?>/admin/createAdmin" data-toggle="validator" >
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="Name" class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" title="Please enter your password">
                        <span class="help-block"></span>
                    </div>
                    
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >Email</label>
                        <input type="text" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="mobile" class="control-label">mobile</label>
                        <input type="text" maxlength="11"  minlength="11" class="form-control" id="mobile" name="mobile" title="Please enter your mobile number">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="passwordFirsh" name="password" title="Please enter your password">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="password" class="control-label">Retype Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" title="Please re-enter your password">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="age" class="control-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required="" title="Please enter your location">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="bankName" class="control-label">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" title="Please enter your bank name">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="accountNumber" class="control-label" >Account Number</label>
                        <input type="text" maxlength="10"  minlength="10" class="form-control" id="account_number" name="account_number" title="Please enter you account number" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="ifsc" class="control-label">Account Name</label>
                        <input  class="form-control" id="act_name" name="act_name" title="Please enter your account name">
                        <span class="help-block"></span>
                    </div>                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                   <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="type_of_employment" class="control-label">&nbsp;</label>
                        <button type="submit" style="padding-top: 10px;padding-bottom: 10px;" class="btn btn-primary btn-block">Sign Up</button>
                   </div>
                </form>
                <div class="form-group hidden control-group" id="feedback">
                        <p id=feedbackblok class="control-label" ></p>
                </div>
            </div>
        </div>
    </div>

<script>

    $(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#regFormNew").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "name": {
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your complete name"
                        },
                        stringLength: {
                            enabled: true,
                            min: 1,
                            max: 40,
                            message: 'Please enter your complete name'
                        }
                    }
                },
                "email": {
                    message: "Please Enter emailid",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter an E-mail address'
                        },
                        emailAddress: {
                            message: 'Please enter a valid E-mail address'
                        },
                        remote: {
                            message: "This Email is already registered",
                            url: ABSOLUTE_URL + "/users/checkMemberShipByEmail",
                            trigger: 'blur'
                        }
                    }
                },
                "password": {
                    message: "Please chose a password with at least 7 chars",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your password'
                        },
                        password: {
                            message: 'The password is not valid'
                        },
                        stringLength: {
                            enabled: true,
                            min: 3,
                            max: 20,
                            message: 'Password should be at least 7 characters'
                        },
                    }
                },
                "password1": {
                    message: "Please chose a password with at least 7 chars",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please re-enter your password'
                        },
                        password: {
                            message: 'The password is not valid'
                        },
                        callback: {
                            message: 'password not matched',
                            callback: function (value, validator, $field) {
                                var pass = $("#passwordFirsh").val();
                                if (value === '') {
                                    return(true);
                                }
                                if (value == pass) {
                                    return {
                                        valid: true,
                                    };
                                }
                                return {
                                    valid: false,
                                    message: 'password not matched'
                                };
                            }
                        }//END CA
                    }
                },
                "account_number": {
                    message: "Please enter your bank account number",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank account number'
                        },
                        callback: {
                            message: 'Please enter valid bank account number',
                            callback: function (value, validator, $field) {
                                
                                if (value === '') {
                                    return(true);
                                }
                                if(isNaN(value)){
                                    return(false);
                                 }else{
                                    return(true);
                                 }
                                return {
                                    valid: false,
                                    message: 'Please enter valid bank account number'
                                };
                            }
                        }
                    }
                },
                "act_name": {
                    message: "Please enter your bank account name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank account name'
                        }
                    }
                },
                "bank_name": {
                    message: "Please enter your bank name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank name'
                        }
                    }
                },
                "donation": {
                    message: "Please select a donation plan",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please select a donation plan'
                        } 
                    }
                },
                "mobile": {
                    message: "Enter 11 digit phone number",
                    validators: {
                        notEmpty: {
                            message: 'Enter mobile number'
                        },
                        callback: {
                            message: 'Enter a valid mobile number',
                            callback: function (value, validator, $field) {

                                if (value === '') {
                                    return(true);
                                }
                                if(isNaN(value)){
                                    return(false);
                                 }else{
                                    return(true);
                                 }
                                myString = value.replace(/ /g, '');
                               if (((myString.length == 11))) {
                                    return {
                                        valid: true,
                                    };
                                } 
                                else {
                                    return {
                                        valid: false,
                                        message: 'Enter a valid mobile number'
                                    };
                                }
                                return {
                                    valid: false,
                                    message: 'Enter a valid mobile number'
                                };
                            }
                        }//END CALL BACK
                    }
                }
            }

        }).on('success.form.bv', function(e) {
                    
                    // Prevent form submission
                    e.preventDefault();

                   $('#regFormNew').unbind('submit').submit();
                });
    });
   function get_states(){
       var country = $("#country").val();
       $.ajax({
            url: ABSOLUTE_URL + "/Api/getStates",
            data: {country : country},
            type: "POST",
            success: function(res) {
                $("#states").html(res);
            } 
        });
   }
</script>
