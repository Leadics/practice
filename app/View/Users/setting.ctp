<section id="main-content">
    <section class="wrapper">
        <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> My Profile</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
                        <li><i class="fa fa-files-o"></i>My Profile</li>
                    </ol>
                </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                     Update Your Profile
                  </header>
                  <div class="panel-body">
                      <div class="form">
                          <form class="form-validate form-horizontal " id="register_form" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/editProfileSave" data-toggle="validator" >
                              <div class="form-group ">
                                  <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class=" form-control" value="<?php echo $userInfo['name'];?>"  id="name" name="name" type="text" />
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="address" class="control-label col-lg-2">Mobile  <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class=" form-control" value="<?php echo $userInfo['mobile'];?>" id="mobile" name="mobile" type="text" />
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="username" class="control-label col-lg-2">Bank <span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control " value="<?php echo $UserBank['bank_name'];?>"  id="bank_name" name="bank_name"  type="text" />
                                  </div>
                              </div>
                              <div class="form-group ">
                                    <label for="accountNumber"  class="control-label col-lg-2" >Account Number</label>
                                    <div class="col-lg-10">
                                        <input type="text" maxlength="20" value="<?php echo $UserBank['account_number'];?>" class="form-control" id="account_number" name="account_number" title="Please enter you account number" required="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="age"  class="control-label col-lg-2">IFSC Code</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="<?php echo $UserBank['ifsc'];?>" class="form-control" id="ifsc_code" name="ifsc_code" required="" title="Please enter your location">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="age"  class="control-label col-lg-2">Branch</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="<?php echo $UserBank['branch'];?>" class="form-control" id="branch" name="branch" required="" title="Please enter your location">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ifsc"  class="control-label col-lg-2">Account Name</label>
                                    <div class="col-lg-10">
                                        <input  class="form-control" value="<?php echo $UserBank['act_name'];?>" id="act_name" name="act_name" title="Please enter your account name">
                                         <input  class="form-control hidden" hidden value="<?php echo $UserBank['id'];?>" id="bank_id" name="bank_id" title="Please enter your account name">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="type_of_employment"  class="control-label col-lg-2">Country</label>
                                    <div class="col-lg-10">
                                        <select value="<?php echo $userInfo['country'];?>" onchange="getAjax(this.id,'state');" class="form-control" id="country" name="country"  title="Please enter your country">
                                            <option value="">Please select your country</option>
                                            <?php foreach ($country as $key => $value) {?>
                                                <option value="<?php echo $value['Country']['id'];?>"><?php echo $value['Country']['name'];?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="type_of_employment"  class="control-label col-lg-2">State</label>
                                    <div class="col-lg-10">
                                        <select value="<?php echo $userInfo['state'];?>" onchange="getAjax(this.id,'city');" class="form-control" id="state" name="state"  title="Please enter your state">
                                            <option value="">Please select your state</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="type_of_employment"  class="control-label col-lg-2">City</label>
                                    <div class="col-lg-10">
                                        <select  value="<?php echo $userInfo['city'];?>" class="form-control" id="city" name="city"  title="Please enter your city">
                                            <option value="">Please select your city</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-primary" type="submit">Update</button>
                                      <button class="btn btn-default" type="button">Cancel</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </section>
          </div>
        </div>
    </section>
</section>
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
