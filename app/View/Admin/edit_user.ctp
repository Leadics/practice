<style type="text/css">
  .text-bold{color:#000000 ;}
</style>
        <div class=" col-md-12"  style="margin-top: 20px;">
            <div>
                <h3 class="text-center" >Update User Profile</h3>
            </div>
            <div>
                <form id="editProfileForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/admin/editProfileSave" data-toggle="validator" >
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="Name" class="control-label">Full Name</label>
                        <input type="text" value="<?php echo $user['User']['name'];?>" class="form-control" id="name" name="name" >
                        <input type="text" value="<?php echo $user['User']['id'];?>" class="form-control hidden" id="user_id" name="user_id" >
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >Email</label>
                        <input type="text" value="<?php echo $user['User']['email'];?>" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="mobile" class="control-label">mobile</label>
                        <input type="text" maxlength="11"  minlength="11" value="<?php echo $user['User']['mobile'];?>" class="form-control" id="mobile" name="mobile" title="Please enter your mobile number">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="age" class="control-label">Location</label>
                        <input type="text" value="<?php echo $user['User']['location'];?>" class="form-control" id="location" name="location" required="" title="Please enter your location">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="bankName" class="control-label">Bank Name</label>
                        <input type="text" value="<?php echo $bank['UserBank']['bank_name'];?>" class="form-control" id="bank_name" name="bank_name" title="Please enter your bank name">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="accountNumber" class="control-label" >Account Number</label>
                        <input  type="text" maxlength="10"  minlength="10" value="<?php echo $bank['UserBank']['account_number'];?>" class="form-control" id="account_number" name="account_number" title="Please enter you account number" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="ifsc" class="control-label">Account Name</label>
                        <input  class="form-control" value="<?php echo $bank['UserBank']['act_name'];?>" id="act_name" name="act_name" title="Please enter your account name">
                         <input  class="form-control hidden" hidden value="<?php echo $bank['UserBank']['id'];?>" id="bank_id" name="bank_id" title="Please enter your account name">
                        <span class="help-block"></span>
                    </div>
                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                   <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="type_of_employment" class="control-label">&nbsp;</label>
                        <button type="submit" style="padding-top: 10px;padding-bottom: 10px;" class="btn btn-primary btn-block">Update</button>
                   </div>
                </form>
                <div class="form-group hidden control-group" id="feedback">
                        <p id=feedbackblok class="control-label" ></p>
                </div>
            </div>
        </div>


<script>

    $(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#editProfileForm").bootstrapValidator({
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
                        }
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
                "state": {
                    message: "Please enter your state",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your state'
                        },
                        stringLength: {
                            enabled: true,
                            min: 1,
                            max: 40,
                            message: 'State should be at least 1 characters'
                        }
                    }
                },
                "mobile": {
                    message: "Enter 11 digit phone number",
                    validators: {
                        notEmpty: {
                            message: 'Enter mobile number'
                        },
                        stringLength: {
                            enabled: true,
                            min: 11,
                            max: 11,
                            message: 'Enter 11 digit phone number'
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

                   $('#editProfileForm').unbind('submit').submit();
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
