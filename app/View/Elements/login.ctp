<div id="login"  style="margin-top: 100px;"  role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to <?php echo COMPANY_NAME;?></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12 " id="classdiv">
                      <div class="well">
                          <form id="loginForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/logins" data-toggle="validator" >
                              <div class="form-group control-group" id="emailid">
                                  <label for="email" class="control-label" >Email</label>
                                  <input type="text" class="form-control"  id="email" name="email" title="Email or user name" description="user email or username" placeholder="example@gmail.com" required="">
                                  
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group" id="pass">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" title="password" description="user password" class="form-control" id="password" name="password" value="" required=" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginNotifications" class="alert alert-danger hide"  role="alert"></div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="javascript:openClose('login');" class="btn btn-default btn-block">Help to login</a>
                          </form>
                          <form id="forgotForm" class="hidden" method="POST" action="javascript:void(0);" data-toggle="validator" >
                              <div class="form-group control-group" id="emailid">
                                  <label for="email" class="control-label" >Please Enter Your Email Here..</label>
                                  <input type="text" class="form-control" id="email" name="email" title="User Email or username" placeholder="example@gmail.com" required="">
                                  
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Submit</button>
                          </form>
                          
                      </div>
                  </div>
                  
                  
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">
    function openClose(){
      $("#loginForm").addClass('hidden');
      $("#addDiv").addClass('hidden');
      $("#forgotForm").removeClass('hidden');
    }
        $(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
      
         $("#forgotForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
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
                            message: "This Email is not registered",
                            url: ABSOLUTE_URL + "/users/isRegisteredEmail",
                            trigger: 'blur'
                        }
                    }
                }
            }

        })   .on('success.form.bv', function(e) {
                    // Prevent form submission
                    e.preventDefault();
                    $.ajax({
                        dataType: "JSON",
                        url: ABSOLUTE_URL + "/users/forgatePass",
                        data: $('#forgotForm').serialize(),
                        type: "POST",
                        success: function(res) {
                            if (res.hasError === true) {
                                $("#loginForm").html(res.messages).show().removeClass('hide');
                            } else {
                                window.location.href = res.redirect;
                            }

                        }
                    });
                    alert("Please check your email for your password");
                    $("#login .close").click();
                    $('#forgotForm')[0].reset();
                    $('#loginForm')[0].reset();
                    $('#loginForm').removeClass('hidden');
                    $('#forgotForm').addClass('hidden');
                    $("#addDiv").removeClass('hidden');
                });
    });
  </script>