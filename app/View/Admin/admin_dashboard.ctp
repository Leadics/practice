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
<div class="container">
    <div class="row " style="margin-left: 1%;">
        <div id="flash" class=" text-center">
            <?php echo $this->Session->flash();?>
        </div>
        <!-- <div class="col-md-12 drop-shadow paddingAll" style="margin-top:2%;width:90%;margin-left:1.8%;">
         <h3 class="text-danger" style="margin-top: 0px;">Notice Board</h3> 
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div> -->
        <a href="<?php echo ABSOLUTE_URL;?>/users/dashboard" class="btn btn-success pull-right btn-lg" style="margin-right:50px;">User Panel</a>
        
        <div class="clearfix"></div>
        <div class="col-md-12  paddingAll" style=" margin-top:2%;">
        <?php foreach ($summary as $key => $value) { ?>
            <div class="drop-shadow paddingAll col-md-3 smallCard">
                <div class="col-md-12">
                    <h4 class="text-success"><?php echo $value['key'];?></h4>
                    <h3 class="text-danger text-center"><?php echo $value['val'];?></h3>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 hidden-xs drop-shadow paddingAll" style="width:91%;margin-left:1.3%;margin-bottom: 3%; background-color: #f673731a;">
         <h3 class="text-danger" style="margin-top: 0px;">Incomplete Transactions</h3> 
           <table class="table table-striped table-responsive">
               <tr>
                   <td><strong>Amount</strong></td>
                   <td><strong>Item</strong></td>
                   <td><strong>Discount</strong></td>
                   <td><strong>Date Time</strong></td>
                   <td><strong>User</strong></td>
                    <td><strong>Status</strong></td>
                    <td><strong>Action</strong></td>
               </tr>
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
           </table>
        </div>
    </div>
</div>

  
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