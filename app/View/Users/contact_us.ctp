<style type="text/css">

  .flex-item {
    display: flex;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
}
.job-card a:hover,
.job-card a:focus {
    text-decoration: none;
    padding: 10px;
}
.white-bg {
    background: #fff;
}
.job-card h4{
    margin-top: 20px;
}
.job-card{
    -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5)!important;
    box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5)!important;
    background-color: #fff!important;
    padding: 5px;
    min-height: 185px;
    max-height: 185px;
    margin-bottom: 10px;
    /*margin-left: 10px;*/
}

.card li{
    font-size: 22px;
}
.card{

    background-color: #fff!important;
    padding: 5px;
}
.job-card .job-title {
    color: inherit;
    font-size: 16px;
    font-weight: 600;
    line-height: 19px;
    word-break: break-word;
}

.job-card .job-subtitle {
    color: #222;
    font-size: 14px;
    font-weight: 300;
    line-height: 15px;
    word-break: break-word;
}

.job-card .link-btn:first-child {
    padding-right: 15px;
    font-weight: 600;
    opacity: 1;
}

.job-card .link-btn {
    padding-right: 15px;
    font-weight: 500;
    transition: all .5s ease;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    opacity: 0;
}

.job-card:hover .link-btn {
    opacity: 1;
}

</style>
<div class="intro-header" style="background-image: url('<?php echo ABSOLUTE_URL; ?>/Imperial/images/Bitcoin.png');min-height: 270px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading" >
                </div>
            </div>
        </div>
    </div>
</div>
<div id="breadcrumb" style="margin-top: 30px;">
    <div class="container"> 
        <div class="breadcrumb">                            
            <li><a href="<?php echo ABSOLUTE_URL;?>/pages/home">Home</a></li>
            <li>Contact Us</li>           
        </div>      
    </div>  
</div>
<section id="contact-page">
    <h3 class="text-center text-danger" style="margin-bottom: 50px;"><strong>We'd like to hear from you. Drop in your comments & queries and the <?php echo COMPANY_NAME;?> team will get back to you</strong></h3>
    <div class="clearfix"></div>
    <div class="container" style="padding-bottom: 30px;">
       <div id="contacts-us" class="row  text-white  widthmin">
          <div class="col-md-10  col-md-offset-1 margin-bottom-30 mobile drop-shadow">
          <div class="margin-top-30 margin-bottom-30">
              <form id="testiUsForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/pages/contactUs" enctype="multipart/form-data" data-toggle="validator" >
                      <div class="form-group control-group controls col-md-4">
                          <label for="Name" class="control-label">Full Name</label>
                          <input type="text" class="form-control" id="Name" name="name" required="" title="Please enter your full name">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group controls col-md-4">
                          <label for="email" class="control-label" >Email</label>
                          <input type="text" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group controls col-md-4">
                          <label for="mobile" class="control-label">Mobile</label>
                          <input type="text" maxlength="11"  minlength="11" class="form-control" id="mobile" name="mobile" value="" required="" title="Please enter your mobile number">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group col-md-12 controls">
                          <label for="comments" class="control-label">Comments or Queries</label>
                          <textarea type="integer" class="form-control" id="comments" name="comments" value="" required="" title="Please enter your Comments or Inquiry"></textarea>
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group  col-md-12">
                          <label for="comments" class="control-label">Attachment</label>
                          <input type="file" class="" id="File1" name="File1">
                          <span class="help-block"></span>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </form>
              </div>
          </div>
    </div>
    </div>
    </div><!--/.container-->
</section><!--/#contact-page-->

    
<script type="text/javascript">
    $(document).ready(function () {
     
    <?php if(empty($message)) { ?>
      $("#contacts").removeClass('hidden')
    <?php } ?>
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#testiUsForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "Name": {
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your complete name"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'Please enter your name in valid characters'
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

        }).on('success.form.bv',function(e){
          e.preventDefault();
         $('#testiUsForm').unbind('submit').submit();
        });
    });
</script>