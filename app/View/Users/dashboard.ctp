<div class="container">
<?php if (empty($userInfo['package_money'])) { ?>
    <div class="row">
        <form>
        <div id="changePlan"  >
            <div class="modal-content modal-dialog">
                <div class="modal-header">
                    <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myModalLabel">Please select a plan</h4>
                </div>
                <div class="modal-body">
                    <div class="well">
                        <form id="lactivationForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/changeDonationRequest" data-toggle="validator" >
                            <div class="form-group control-group">
                                <label for="pin" class="control-label" >Select A Investment</label>
                                <input type="text" name="id" hidden value="<?php echo $userData['id'];?>">
                                <select type="integer" required="" class="form-control" id="donation" name="donation" title="Please enter your mobile number">
                                    <option value="">Please select a plan</option>
                                    <option value="learner">Learner : 100 - 299 $</option>
                                    <option value="pre-trader">Pre-Trader : 300 - 599 %</option>
                                    <option value="trader">Trader : 700 - 1499 $</option>
                                    <option value="pro-trader">Pro-Trader : 1500 - 4999 $</option>
                                    <option value="merchant">Merchant : 5000 - 9999 $</option>
                                    <option value="exchanger">Exchanger : 10000 $ and Above</option>
                                </select>
                                  <span class="help-block"></span>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
        </form>
    </div>
<?php } ?>
<style type="text/css">
     .smallCard{min-height: 130px; max-height: 130px;background-color: #64e73b33; margin-right: 10px; width:22.8%;}
</style>
    <div id="cards" class="row" style="padding-left: 60px;padding-top: 30px;">
       
    </div>
    <a href="https://www.coinify.com/checkout/invoice/0zS/R2b?add=6Cb"><img src="https://cdn.coinify.com/assets/includes/buywithcoinify.png" alt="Buy with Bitcoin" title="Buy with Bitcoin" /></a>
</div>
<script type="text/javascript">
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateBinary/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
             if (!obj.binary.amount) {
                obj.binary.amount = 0;
            } 
            $("#cards").append('<div class="drop-shadow paddingAll col-md-3 smallCard"><div class="col-md-12"><h4 class="text-success">'+obj.binary.Membership+'</h4><h3 class="text-danger text-center">'+obj.binary.amount+'</h3></div></div>');
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateReferals/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
            if (!obj.referal.amount) {
                obj.referal.amount = 0;
            } 
            $("#cards").append('<div class="drop-shadow paddingAll col-md-3 smallCard"><div class="col-md-12"><h4 class="text-success">'+obj.referal.Membership+'</h4><h3 class="text-danger text-center">'+obj.referal.amount+'</h3></div></div>');
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateMatrix/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data);
            if (!obj.membership.amount) {
                obj.membership.amount = 0;
            } 
            $("#cards").append('<div class="drop-shadow paddingAll col-md-3 smallCard"><div class="col-md-12"><h4 class="text-success">'+obj.membership.Membership+'</h4><h3 class="text-danger text-center">'+obj.membership.amount+'</h3></div></div>');
        }
    });
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/calculateSingleLag/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {
            var obj = JSON.parse(data); 
            if (!obj.singlelag.amount) {
                obj.singlelag.amount = 0;
            } 
            $("#cards").append('<div class="drop-shadow paddingAll col-md-3 smallCard"><div class="col-md-12"><h4 class="text-success">'+obj.singlelag.Membership+'</h4><h3 class="text-danger text-center">'+obj.singlelag.amount+'</h3></div></div>');
        }
    });
</script>
 