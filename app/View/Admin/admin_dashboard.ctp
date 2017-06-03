<style type="text/css">
    .paddingAll{
        padding-top: 1%!important;
        padding-bottom: 1%!important;
    }
    .smallCard{min-height: 130px; max-height: 130px;background-color: #64e73b33; margin-bottom: 15px;margin-right: 10px; width:22.8%;}
    @media(max-width:500px) {
        .smallCard{min-height: 130px; max-height: 130px;background-color: #64e73b33; margin-bottom: 15px;margin-right: 10px; width:31.8%;}   
      }
</style>
<section id="main-content">
  <section class="wrapper">            
      <!--overview start-->
      <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>                          
            </ol>
        </div>
    </div>
    <div id="flash" class=" alert alert-success">
        <?php echo $this->Session->flash();?>
    </div>
    <div class="row">
        <?php foreach ($summary as $key => $value) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box <?php echo $value['col'];?>">
                    <i class="fa fa-cubes"></i>
                    <div class="count" id="binaryamount"><?php echo $value['val'];?></div>
                    <div class="title" id="binarylable"><?php echo $value['key'];?></div>
                </div><!--/.info-box-->         
            </div>
            <?php if ($key == 3) { ?>
                <div class="clearfix"></div>
        <?php } } ?>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-flag-o red"></i><strong>Incomplete Transactions</strong></h2>
                    <div class="panel-actions">
                        <a href="<?php echo ABSOLUTE_URL;?>/admin/adminDashboard#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                        <a href="<?php echo ABSOLUTE_URL;?>/admin/adminDashboard#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="<?php echo ABSOLUTE_URL;?>/admin/adminDashboard#" class="btn-close"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table bootstrap-datatable countries">
                        <thead>
                            <tr>
                                <th><strong>Amount</strong></th>
                                <th><strong>Item</strong></th>
                                <th><strong>Discount</strong></th>
                                <th><strong>Date Time</strong></th>
                                <th><strong>User</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead> 
                        <tbody>
                           <?php foreach ($Requests as $key => $value) { ?>
                                <tr>
                                   <td><?php echo $value['Shoping']['price'];?></td>
                                   <td><?php echo $value['Shoping']['item'];?></td>
                                   <td><?php echo $value['Shoping']['discount'];?></td>
                                   <td><?php echo $value['Shoping']['created'];?></td>
                                   <td><?php echo $usersList[$value['Shoping']['user_id']] ;?></td>
                                   <td><?php echo 'Payment Panding';?></td>
                                   <td> <a onclick="return getConfirmed();" href="<?php echo ABSOLUTE_URL.'/admin/approveRequest/'.$value['Shoping']['id'];?>/<?php echo $value['Shoping']['auth_string'];?>">Approve&nbsp;</a>
                                    <a  href="<?php echo ABSOLUTE_URL.'/admin/editTransaction/'.$value['Shoping']['id'];?>">Edit</a>
                                    </td> 
                               </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
  </section>
</section>
  
  <script type="text/javascript">
      function editTransaction(id){
          $.ajax({
              url:'<?php echo ABSOLUTE_URL;?>/admin/editTransaction',
              method:'post',
              data: {help_id:id},
              success: function (data) {
                  alert("Your request submitted successfully");
              },
              error: function (){
                  alert('Something went wrong..');
              }
          });
      }
      
      // function blockHelp(id){
      //   $.ajax({
      //       url:'<?php echo ABSOLUTE_URL;?>/users/blockHelp',
      //       method:'post',
      //       data: {help_id:id},
      //       success: function (data) {
      //           alert("Your request submitted successfully");
      //       },
      //       error: function (){
      //           alert('Something went wrong..');
      //       }
      //   });
      // }
  </script>