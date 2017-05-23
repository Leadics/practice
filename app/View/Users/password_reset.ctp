<div class="container" style="margin-top:100px;">
	<div class="col-md-8 col-md-offset-2  well">
	<div class="clearfix"></div> 
	<div class="text-center"><h3 class="text-info" style="margin-bottom:50px;"><strong>Change Your Password</strong></h3></div>
	<div class="clearfix"></div> 
		<div class="table-responsive border-2">
			<div class="">
				<form class="form-horizontal" method="post" action="<?php echo ABSOLUTE_URL;?>/users/savePass" id="r1Form">
					
					<div class="form-group control-group controls">
						<label for="gender" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" title="Please Enter Your new Password" name="password" id="password1" >
						</div>
					</div>
					<div class="form-group control-group ">
						<label for="input6" class="col-sm-3 control-label">Confirm Password</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" title="Please Enter Your new Password" name="password2" id="password2" >
                            <input type="password" class="form-control hidden" value="<?php echo $userId;?>" name="user_id" id="user_id" >
						</div>
					</div>
			       <div class="clearfix"></div> 
					<div class="form-group control-group" style="margin-top:20px;">
						<button type="submit" class="btn btn-primary btn-block ">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function () {

        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#r1Form").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "password": {
                    message: "Please enter your password",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your password'
                        }
                    }
                },
                "password2": {
                    message: "Retype your password",
                    validators: {
                        notEmpty: {
                            message: 'Retype your password'
                        },
                        callback: {
                            message: 'Enter a valid password',
                            callback: function (value, validator, $field) {
                                var pass = $("#password1").val();
                                if (value === '') {
                                    return(true);
                                }
                                if (value == pass) {
                                     return {
                                        valid: true,
                                    };
                                } else {
                                     return {
                                        valid: false,
                                        message: 'password not matched'
                                    };
                                }
                            }
                        }//END CALL BACK
                    }
                }
            }

        }).on('success.form.bv', function(e) {
            e.preventDefault();
            $('#r1Form').unbind('submit').submit();
    });
    });
</script>