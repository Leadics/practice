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
    <div class="row">
        
    </div>
</div>
