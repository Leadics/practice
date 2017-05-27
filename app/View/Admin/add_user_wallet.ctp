<style type="text/css">
  .text-bold{color:#000000 ;}
</style>

        <div class=" col-md-8 col-md-offset-2"  style="margin-top: 20px;">
            <div>
                <h3 class="text-center" >Add User Wallet</h3>
            </div>
            <div>
                <form id="lactivationForm" enctype="multipart/form-data" method="POST" action="<?php echo ABSOLUTE_URL;?>/admin/addWalletToUser" data-toggle="validator" >
                      <div class="form-group control-group">
                        <label for="pin" class="control-label" >User</label>
                             <select type="integer" required="" class="form-control" id="user_id" name="user_id" title="Please enter your mobile number">
                                <option value="">Please select a user</option>
                                <?php foreach ($usersList as $key => $value) { ?>
                                    <option value="<?php echo $value['User']['id'];?>"><b>Name : &nbsp;<?php echo $value['User']['name'];?>&nbsp;,Email&nbsp;:&nbsp;<?php echo $value['User']['email'];?></b></option>
                               <?php } ?>
                            </select>
                        <span class="help-block"></span>
                      </div>
                    
                      <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >Binary</label>
                        <input type="text"  class="form-control" id="binary" name="binary" title="Please enter binary amount" >
                        <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >Referal</label>
                        <input type="text"  class="form-control" id="referal" name="referal" title="Please enter referal amount" >
                        <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >Single Lag Binary</label>
                        <input type="text"  class="form-control" id="single_lag" name="single_lag" title="Please enter single lag binary amount" >
                        <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >ROI</label>
                        <input type="text"  class="form-control" id="weekly" name="weekly" title="Please enter weekly amount" >
                        <span class="help-block"></span>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </form>
            </div>
        </div>
