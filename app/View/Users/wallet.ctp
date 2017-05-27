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
          <b>Here is your total income</b>
        </h4>
        <br>
    </div>
    <div>
        <table class="table table-striped table-responsive ">
            <tr>
                <td><strong>Binary Income </strong></td>
                <td><strong><?php if ($data['binary']['amount'] > 0) {
                    echo $data['binary']['amount'];
                } else {
                    echo 0;
                    }?>
                </strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Direct Referals</strong></td>
                <td><strong><?php if ($data['referal']['amount'] > 0) {
                    echo $data['referal']['amount'];
                } else {
                    echo 0;
                    }?></strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Single Lag Binary</strong></td>
                <td><strong>
                <?php if ($data['singleLag']['amount'] > 0) {
                    echo $data['singleLag']['amount'];
                } else {
                    echo 0;
                    }?></strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>ROI</strong></td>
                <td><strong>
                <?php if ($data['roi']['amount'] > 0) {
                    echo $data['roi']['amount'];
                } else {
                    echo 0;
                    }?></strong></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="clearfix"></div>
    <div id="respoce" class="hidden col-md-6 col-md-offset-3 col-md-offset-3 modal-body  margin-bottom-0">
        <div id="responceDiv" class="card">
        <h3><?php echo $message['message'];?></h3>
        </div>
   </div>
      <div id="contacts-us" class="row  text-white  widthmin">
            <div class="col-md-10  col-md-offset-1 margin-bottom-30 mobile drop-shadow">
            <div class="margin-top-30 margin-bottom-30">
            <h3 class="text-danger">Withdraw Money</h3>
                <form id="widrowForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/withdraw" enctype="multipart/form-data" data-toggle="validator" >
                        <div class="form-group control-group controls col-md-3">
                            <label for="Name" class="control-label">Binary</label>
                            <input type="text" onchange="return checkVal(this.id);" value="0" class="form-control" id="binary" name="binary">
                            <input type="text" value="<?php if ($data['binary']['amount'] > 0) { echo $data['binary']['amount']; } else { echo 0; }?>"  class="form-control hidden" id="binaryWithdraw" >
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group control-group controls col-md-3">
                            <label for="email" class="control-label" >Referals</label>
                            <input type="text" onchange="return checkVal(this.id);" value="0"  class="form-control" id="referal" name="referal" >
                            <input type="text" value="<?php if ($data['referal']['amount'] > 0) { echo $data['referal']['amount']; } else { echo 0; }?>"  class="form-control hidden" id="referalWithdraw" >
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group control-group controls col-md-3">
                            <label for="mobile" class="control-label">Single lag Binary</label>
                            <input type="text" onchange="return checkVal(this.id);" value="0"   class="form-control" id="singleLag" name="singleLag" >
                             <input type="text" value="<?php if ($data['singleLag']['amount'] > 0)  { echo $data['singleLag']['amount']; } else { echo 0; }?>"  class="form-control hidden" id="singleLagWithdraw" >
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group control-group controls col-md-3">
                            <label for="mobile" class="control-label">ROI</label>
                            <input type="text" onchange="return checkVal(this.id);" value="0"   class="form-control" id="roi" name="roi" >
                             <input type="text" value="<?php if ($data['roi']['amount'] > 0)  { echo $data['roi']['amount']; } else { echo 0; }?>"  class="form-control hidden" id="roiWithdraw" >
                            <span class="help-block"></span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group control-group controls col-md-3">
                            <label for="mobile" class="control-label">Total</label>
                            <input type="text" readonly  required  class="form-control" id="total" name="total" >
                            <span class="help-block"></span>
                        </div>
                        <button type="submit" onclick="return varifieForm();" class="btn btn-success btn-block" style="width:100%;">Submit</button>
                    </form>
                </div>
            </div>
      </div>
      

  </div>
</div>
</section>
<div class="clearfix"></div>
<script type="text/javascript">
    $(document).ready(function () {
        
    });
    function checkVal(id){
        var val = parseInt( $("#"+id).val());
        var limit =  parseInt( $("#"+id+"Withdraw").val());
        if (val > limit) {
            alert("Please select amount below or equal to "+limit);
            $("#"+id).val(0);
            var val1 = parseInt( $("#binary").val());
            var val2 = parseInt( $("#referal").val());
            var val3 = parseInt( $("#singleLag").val());
            var val4 = parseInt( $("#roi").val());
            var total = val1+val2+val3+val4;
            $("#total").val(total);
            return false;
        } else {
            calculate();
        }
    }
    function calculate(){
        var val1 = parseInt( $("#binary").val());
        var val2 = parseInt( $("#referal").val());
        var val3 = parseInt( $("#singleLag").val());
        var val4 = parseInt( $("#roi").val());
        var total = val1+val2+val3+val4 ;
        var val1php = parseInt( $("#binaryWithdraw").val());
        var val2php = parseInt( $("#referalWithdraw").val());
        var val3php = parseInt( $("#singleLagWithdraw").val());
        var val4php = parseInt( $("#singleLagWithdraw").val());
        var totalphp = val1php+val2php+val3php+val4php ;
        var caping = "<?php echo $userData['donation'];?>";
        console.log(total);
        if (total > parseInt(caping) || total > totalphp) {
            $('#widrowForm')[0].reset();
            alert("Please select amount below or equal to "+caping);
            return false;
        } else {
            $("#total").val(total);
        }
    }
    function varifieForm(){
        var caping = "<?php echo $userData['donation'];?>";
        var total = parseInt( $("#total").val());
        if (!total) {
            alert("Please select amount below or equal to "+caping);
            return false;
        }
    }
</script>