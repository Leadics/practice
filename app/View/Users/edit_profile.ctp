<style type="text/css">
  .text-bold{color:#000000 ;}
</style>

<div class="intro-header" style="background-image: url('<?php echo ABSOLUTE_URL; ?>/img/settings.jpg');min-height: 225px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading" >
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-header">
    <div class="container">
    <div class="row" >
        <div class="drop-shadow col-md-12 col-md-offset-2"  >
            <div>
                <h3 >Update Your Profile</h3>
            </div>
            <div class="col-md-8 ">
                <form id="editProfileForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/editProfileSave" data-toggle="validator" >
                    <div class="form-group control-group controls col-xs-12">
                        <label for="Name" class="control-label">Full Name</label>
                        <input type="text" value="<?php echo $userInfo['name'];?>" class="form-control" id="name" name="name" title="Please enter your password">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="mobile" class="control-label">mobile</label>
                        <input type="text" maxlength="10"  minlength="10" value="<?php echo $userInfo['mobile'];?>" class="form-control" id="mobile" name="mobile" title="Please enter your mobile number">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="bankName" class="control-label">Bank Name</label>
                        <input type="text" value="<?php echo $UserBank['bank_name'];?>" class="form-control" id="bank_name" name="bank_name" title="Please enter your bank name">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="accountNumber" class="control-label" >Account Number</label>
                        <input type="text" maxlength="20" value="<?php echo $UserBank['account_number'];?>" class="form-control" id="account_number" name="account_number" title="Please enter you account number" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="age" class="control-label">IFSC Code</label>
                        <input type="text" value="<?php echo $UserBank['ifsc'];?>" class="form-control" id="ifsc_code" name="ifsc_code" required="" title="Please enter your location">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="age" class="control-label">Branch</label>
                        <input type="text" value="<?php echo $UserBank['branch'];?>" class="form-control" id="branch" name="branch" required="" title="Please enter your location">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="ifsc" class="control-label">Account Name</label>
                        <input  class="form-control" value="<?php echo $UserBank['act_name'];?>" id="act_name" name="act_name" title="Please enter your account name">
                         <input  class="form-control hidden" hidden value="<?php echo $UserBank['id'];?>" id="bank_id" name="bank_id" title="Please enter your account name">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="type_of_employment" class="control-label">Country</label>
                        
                        <select value="<?php echo $userInfo['country'];?>" onchange="getAjax(this.id,'state');" class="form-control" id="country" name="country"  title="Please enter your country">
                            <option value="">Please select your country</option>
                            <?php foreach ($country as $key => $value) {?>
                                <option value="<?php echo $value['Country']['id'];?>"><?php echo $value['Country']['name'];?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="type_of_employment" class="control-label">State</label>
                        <select value="<?php echo $userInfo['state'];?>" onchange="getAjax(this.id,'city');" class="form-control" id="state" name="state"  title="Please enter your state">
                            <option value="">Please select your state</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12">
                        <label for="type_of_employment" class="control-label">City</label>
                        <select  value="<?php echo $userInfo['city'];?>" class="form-control" id="city" name="city"  title="Please enter your city">
                            <option value="">Please select your city</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                   <div class="form-group control-group controls col-xs-12">
                        <label for="type_of_employment" class="control-label">&nbsp;</label>
                        <button type="submit" style="padding-top: 10px;padding-bottom: 10px; width:100%;" class="btn btn-primary btn-block">Update</button>
                   </div>
                </form>
                <div class="form-group hidden control-group" id="feedback">
                        <p id=feedbackblok class="control-label" ></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="clearfix"></div>
<script>
function getAjax(id,attr){
    var val = $("#"+id).val();
    $.ajax({
        url: ABSOLUTE_URL + "/Users/getAjax/"+val+'/'+attr,
        type: "POST",
        success: function(res) {
            $("#"+attr).html(res);
        } 
    });
}
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
                    message: "Enter 10 digit phone number",
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
                               if (((myString.length == 10))) {
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