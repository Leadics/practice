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
          <b>Here is your <?php echo ucwords($type);?> Income</b>
        </h4>
        <br>
    </div>
    <div class="cleafix"></div>
    <div>
        <h4>
          <b><?php echo ucwords($type);?> Income</b>
        </h4>
      <?php if ($type != 'daily') { ?>
        <table class="table table-striped table-responsive ">
            <tr>
                <td><strong>Date</strong></td>
                <td><strong>Your <?php echo $type;?></strong></td>
            </tr>
        <?php foreach ($availablePin as $key => $value) {  ?>
            <tr>
                <td><?php echo $key;?></td>
                <td><?php echo $value;?></td>
            </tr>
        <?php } ?>
        </table>
      <?php } else {?>
         <table class="table table-striped table-responsive text-left">
            <tr>
                <td><strong>Date</strong></td>
                <td><strong>Clicks</strong></td>
                <td><strong>Income per click</strong></td>
                <td><strong>Total</strong></td>
            </tr>
            <?php foreach ($availablePin as $key => $value) { ?>
            <tr>
                <td><?php echo $value['date'];?></td>
                <td><strong><?php echo $value['count'];?></strong></td>
                <td><?php echo $value['income'];?></td>
                <?php if (empty($value['total'])) {
                    echo '<td class="text-danger">Not Generated</td>';
                } else{
                    echo '<td class="text-success">'.$value['total'].'</td>';
                }
                ?>
            </tr>
        <?php } ?>
         </table>
    <?php  }?>
    </div>
   
  </div>
</div>
</section>
