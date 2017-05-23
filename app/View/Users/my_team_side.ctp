<style type="text/css">
  .drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
    }
    .modal-content{
        background-color: rgba(47, 200, 173, 0.4) !important;
    }
   .margin-top-30{margin-top:30px !important;} 
   .margin-top-60{margin-top:60px !important;} 
   .margin-bottom-30{margin-bottom:30px !important;}
   .widthmin{max-width: 99.8%; margin-left: -1px !important;}
   .mobile{padding-top: 1px !important;
        padding-bottom: 1px !important;}
   #templatemo-nav-bar{ margin-top: -42px !important; }
     @media(max-width:500px) {
        .margin-top-minus-60 {
            margin-top: 0px!important;
        }
      }
</style>

<div class="col-xs-12 col-md-12  margin-top-30 " >
  <div class=" text-center text-white ">
    <div class="text-center">
        <h4>
          <b>Here is your Team</b>
        </h4>
        <br>
    </div>
 
    <div class="cleafix"></div>
    <div>
        <h4>
          <b><?php echo ucwords($side);?> Side Team</b>
        </h4>
        <table class="table table-striped table-responsive text-left">
            <tr>
                <td><strong>User</strong></td>
                <td><strong>Placment</strong></td>
                <td><strong>Created on</strong></td>
                <td><strong>Paid on</strong></td>
                <td><strong>Amount</strong></td>
                <td><strong>Paid/Unpaid</strong></td>
                <td><strong>Status</strong></td>
            </tr>
        <?php foreach ($availablePin as $key => $value) { if ($key > 0 && $value['side'] == $side) { ?>
            <tr>
                <td><?php echo $value['username'];?></td>
                <td><strong><?php echo $value['side'];?></strong></td>
                <td><?php echo $value['created'];?></td>
                <?php if (empty($value['payment_date'])) {
                    echo '<td class="text-danger">Not paid</td>';
                } else{
                    echo '<td class="text-success">'.$value['payment_date'].'</td>';
                }
                ?>
                <td><?php echo $value['donation'];?></td>
                <?php if ($value['payment'] == 1 ) {
                    echo '<td class="text-success">Paid</td>';
                }else {
                     echo '<td class="text-danger">Unpaid</td>';
                }?>
                <?php if ($value['status'] == 1 ) {
                    echo '<td class="text-success">Active</td>';
                }else if ($value['status'] == 2 ){
                     echo '<td class="text-danger">Blocked</td>';
                }else {
                     echo '<td class="text-danger">Inactive</td>';
                }?>
            </tr>
        <?php } }?>
        </table>
    </div>
   
  </div>
</div>
</section>
