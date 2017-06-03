<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo ABSOLUTE_URL;?>/ang/img/favicon.png">

    <title>Coin-dex</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->

    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo ABSOLUTE_URL;?>/ang/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo ABSOLUTE_URL;?>/ang/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo ABSOLUTE_URL;?>/ang/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo ABSOLUTE_URL;?>/ang/css/owl.carousel.css" type="text/css">
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo ABSOLUTE_URL;?>/ang/css/fullcalendar.css">
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/widgets.css" rel="stylesheet">
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/style.css" rel="stylesheet">
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/xcharts.min.css" rel=" stylesheet"> 
    <link href="<?php echo ABSOLUTE_URL;?>/ang/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="<?php echo ABSOLUTE_URL;?>" class="logo">Welcome <span class="lite">To Coin-dex</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                   
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    <!-- <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo ABSOLUTE_URL;?>/ang/#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="photo"><img alt="avatar" src="<?php echo ABSOLUTE_URL;?>/ang/./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="photo"><img alt="avatar" src="<?php echo ABSOLUTE_URL;?>/ang/./img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="photo"><img alt="avatar" src="<?php echo ABSOLUTE_URL;?>/ang/./img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="photo"><img alt="avatar" src="<?php echo ABSOLUTE_URL;?>/ang/./img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">See all messages</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo ABSOLUTE_URL;?>/ang/#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important"><?php echo count($notification['notification']);?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have <?php echo count($notification['notification']);?> new notifications</p>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    <?php echo count($notification['lable']);?>
                                    <!-- <span class="small italic pull-right"><?php echo count($notification['lable']);?></span>
 -->                                </a>
                            </li>
                           <!--  <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>  
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span> 
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
                            </li>    -->                         
                           <!--  <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/ang/#">See all notifications</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo ABSOLUTE_URL;?>/ang/#">
                            <span class="profile-ava">
                                <?php if (empty($userInfo['profile_pic'])) { ?>
                                <img src="<?php echo ABSOLUTE_URL;?>/img/user-other.png" height="40" width="40" alt="">
                              <?php } else {?>
                                  <img height="40" width="40" src="<?php echo $userInfo['profile_pic'];?>" alt="">
                              <?php } ?>
                            </span>
                            <span class="username"><?php echo $userData['username'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?php echo ABSOLUTE_URL;?>/users/profile"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/admin/passwordReset/<?php echo $userInfo['id'];?>/1"><i class="icon_piechart"></i></i> Change Password</a>
                            </li>
                            
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/users/profile"><i class="icon_genius"></i></i> Settings</a>
                            </li>
                            <li>
                                <a href="<?php echo ABSOLUTE_URL;?>/users/logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>    
           <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <!-- <li class="active">
                      <a class="" href="<?php echo ABSOLUTE_URL;?>">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo ABSOLUTE_URL;?>/users/transactions" class="">
                          <i class="icon_document_alt"></i>
                          <span>History</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo ABSOLUTE_URL;?>/users/transactions" class="">
                          <i class="icon_genius"></i>
                          <span>Buy a package</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                  </li>     
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>My Team</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/users/myTeamSide/left">Left Team</a></li>
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/users/myTeamSide/right">Right Team</a></li>
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/users/myTeam">Genealogy</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/users/wallet">
                          <i class="icon_documents_alt"></i>
                          <span>My Wallet</span>
                      </a>
                  </li> -->
                  <!-- <li>                     
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/users/passwordReset/<?php echo $userInfo['id'];?>/1">
                          <i class="icon_piechart"></i>
                          <span>Change Password</span>
                      </a>
                                         
                  </li> -->
                  <li>
                    <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/adminDashboard"> <i class="icon_house_alt"></i>
                          <span>Dashboard</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/usersList"> <i class="icon_document_alt"></i>
                          <span>View All Users</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/transactionList"> <i class="icon_document_alt"></i>
                          <span>View Transaction</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/leads"> <i class="icon_document_alt"></i>
                          <span>View Requests</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/createAdmin"> <i class="icon_document_alt"></i>
                          <span>Create Admin</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/setWeekly"> <i class="icon_document_alt"></i>
                          <span>Set Weekly ROI</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/addUserWallet"> <i class="icon_document_alt"></i>
                          <span>Add User Wallet</span></a>
                  </li>
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/withdrawList"> <i class="icon_document_alt"></i>
                          <span>withdraw Request</span></a>
                  </li>   
                  <li>
                      <a class="" href="<?php echo ABSOLUTE_URL;?>/admin/approveUserEmails"> <i class="icon_document_alt"></i>
                          <span>Approve User Email</span></a>
                  </li>                  
                  <li>      
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/ang/basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/users/profile">Profile</a></li>
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/ang/login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/ang/blank.html">Blank Page</a></li>
                          <li><a class="" href="<?php echo ABSOLUTE_URL;?>/ang/404.html">404 Error</a></li>
                      </ul>
                  </li> -->
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src="<?php echo ABSOLUTE_URL;?>/ang/js/bootstrapValidator.js
"></script>
 <link  href="<?php echo ABSOLUTE_URL;?>/ang/css/bootstrapValidator.min.css"> -->
<script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery-ui-1.10.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js
"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
 <script src="<?php echo ABSOLUTE_URL;?>/js/bootstrap.min.js"  type="text/javascript"></script>
<?php echo $this->fetch('content'); ?>

    
    <script type="text/javascript" src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/calendar-custom.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/sparkline-chart.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/easy-pie-chart.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/xcharts.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.autosize.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/gdp-data.js"></script>  
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/morris.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/sparklines.js"></script>    
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/charts.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/ang/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#flash").removeClass('hidden').show();
        setTimeout(function() {
              $("#flash").addClass('hidden').hide();
          }, 3000);
      });
    </script>