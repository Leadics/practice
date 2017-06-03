 <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
            <li><i class="icon_documents_alt"></i>Pages</li>
            <li><i class="fa fa-user-md"></i>Profile</li>
          </ol>
        </div>
      </div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4><?php echo $userInfo['name'];?></h4>               
                              <div class="follow-ava">
                              <?php if (empty($userInfo['profile_pic'])) { ?>
                                <img src="<?php echo ABSOLUTE_URL;?>/img/user-other.png" alt="">
                              <?php } else {?>
                                  <img src="<?php echo $userInfo['profile_pic'];?>" alt="">
                              <?php } ?>
                              </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p>@<?php echo $userInfo['username'];?></p>
                <p><i class="fa fa-twitter"><?php echo $userInfo['username'];?></i></p>
                                <h6>
                                    <span><i class="icon_clock_alt"></i><?php echo date('g:i A',strtotime($userInfo['created']));?> </span>
                                    <span><i class="icon_calendar"></i><?php echo date('D M j G',strtotime($userInfo['created']));?></span>
                                    <span><i class="icon_pin_alt"></i><?php echo $userInfo['country'];?></span>
                                </h6>
                            </div>
          <!--                   <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              
                                              <i class="fa fa-comments fa-2x"> </i><br>
                        
                        Contrary to popular belief, Lorem Ipsum is not simply
                                          </li>
                       
                                      </ul>
                            </div>
              <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              
                                              <i class="fa fa-bell fa-2x"> </i><br>
                        
                        Contrary to popular belief, Lorem Ipsum is not simply 
                                          </li>
                       
                                      </ul>
                            </div>
              <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              
                                              <i class="fa fa-tachometer fa-2x"> </i><br>
                        
                        Contrary to popular belief, Lorem Ipsum is not simply
                                          </li>
                       
                                      </ul>
                            </div> -->
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                 
                                  <li class="active">
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane active">
                                    <section class="panel">
                                      <div class="bio-graph-heading">
                                                <?php echo $userInfo['about_me'];?>
                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span> Name </span>: <?php echo $userInfo['name'];?> </p>
                                              </div>                                             
                                              <div class="bio-row">
                                                  <p><span>Birthday</span>: <?php echo date('F j, Y',strtotime($userInfo['birthday']));?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Occupation </span>: <?php echo $userInfo['occupation'];?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Country </span>: <?php echo $userInfo['country'];?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span>:<?php echo $userInfo['emailid'];?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>: <?php echo $userInfo['mobile'];?></p>
                                              </div>
                                          </div>
                                      </div>
                                    </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo ABSOLUTE_URL;?>/users/editProfileSave" method="post" role="form">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $userInfo['name']; ?>" class="form-control" id="name" name="name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">About Me</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="about_me" placeholder="<?php echo $userInfo['about_me']; ?>" id="about_me" class="form-control" cols="30" rows="5"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Country</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $userInfo['country']; ?>" class="form-control" id="country" name="country" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Birthday</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $userInfo['birthday']; ?>" class="form-control" id="birthday" name="birthday" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Occupation</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $userInfo['occupation']; ?>" class="form-control" id="occupation" name="occupation" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" readonly="true" value="<?php echo $userInfo['emailid']; ?>" class="form-control" id="email" name="emailid" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $userInfo['mobile']; ?>"  class="form-control" id="mobile" name="mobile" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Profile Pic</label>
                                                      <div class="col-lg-6">
                                                          <input type="file" value="<?php echo $userInfo['profile_pic']; ?>" class="form-control" id="profile_pic" name="profile_pic" >
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Website URL</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $userInfo['website']; ?>" class="form-control" id="website" name="website" placeholder="http://www.demowebsite.com ">
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>