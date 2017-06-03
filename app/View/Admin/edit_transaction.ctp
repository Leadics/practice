<style type="text/css">
  .text-bold{color:#000000 ;}
</style>
<section id="main-content">
  <section class="wrapper"> 
        <div class=" col-md-8 col-md-offset-2"  style="margin-top: 20px;">
            <div>
                <h3 class="text-center" >Edit Transaction</h3>
            </div>
            <div>
                <form id="lactivationForm" enctype="multipart/form-data" method="POST" action="<?php echo ABSOLUTE_URL;?>/admin/editTransaction/<?php echo $txt['Shoping']['id'];?>" data-toggle="validator" >
                      <div class="form-group control-group">
                        <label for="pin" class="control-label" >Edit Transaction</label>
                             <select type="integer"  class="form-control" id="reciever" name="reciever_id" title="Please enter your mobile number">
                                <option value="">Please select a Item</option>
                                <option value="Subscription">Subscription : 10 $</option>
                                <option value="learner">Learner : 100 - 299 $</option>
                                <option value="pre-trader">Pre-Trader : 300 - 599 %</option>
                                <option value="trader">Trader : 700 - 1499 $</option>
                                <option value="pro-trader">Pro-Trader : 1500 - 4999 $</option>
                                <option value="merchant">Merchant : 5000 - 9999 $</option>
                                <option value="exchanger">Exchanger : 10000 $ and Above</option>on>
                            </select>
                        <span class="help-block"></span>
                      </div>
                       <div class="form-group control-group">
                           <label for="mobile" class="control-label">Discription</label>
                            <input type="text" class="form-control" value="<?php echo $txt['Shoping']['description'];?>" id="description" name="description" title="Please enter your description ">
                            <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group">
                           <label for="mobile" class="control-label">Discount</label>
                            <input type="text" class="form-control" value="<?php echo $txt['Shoping']['discount'];?>" id="discount" name="discount" title="Please enter your discount ">
                            <span class="help-block"></span>
                      </div>
                      <div class="form-group control-group">
                           <label for="mobile" class="control-label">Amount</label>
                            <input type="number" class="form-control" value="<?php echo $txt['Shoping']['price'];?>" id="price" name="price" title="Please enter  price ">
                            <span class="help-block"></span>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </form>
            </div>
        </div>
