<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i> Change Your Password</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
            <li><i class="fa fa-table"></i>Change Your Password</li>
          </ol>
        </div>
      </div>
       <div class="col-sm-10 col-md-offset-1">
          <section class="panel">	
                <div class="table-responsive border-2">
                	<div class="">
                		<form class="" method="post" action="<?php echo ABSOLUTE_URL;?>/users/savePass" id="r1Form">
                			
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
                			<div class="form-group control-group" style="margin-top:30px; ">
                				<button type="submit"  class="btn btn-primary btn-block ">Submit</button>
                			</div>
                		</form>
                	</div>
                </div>
            </section>
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