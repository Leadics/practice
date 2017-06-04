<section id="main-content">
  <section class="wrapper"> 
<div id="login col-md-6"  style="margin-top: 100px;"  role="dialog">
      <div class=" ">
          
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12 " id="classdiv">
                      <div class="well">
                          <form id="orderForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/buildOrder" data-toggle="validator" >
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
                              <div class="form-group control-group" id="emailid">
                                  <label for="email" class="control-label" >Enter the Amount</label>
                                  <input type="number" min="99" title="amount" description="user amount" class="form-control" id="amount" name="amount" value="" required=" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">
        $(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
      
         $("#orderForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "amount": {
                    message: "Please Enter amount",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter amount'
                        },callback: {
                            message: 'Enter a valid amount',
                            callback: function (value, validator, $field) {
                                if (value === '') {
                                    return(true);
                                }
                                if(isNaN(value)){
                                    return(false);
                                 }else{
                                    return(true);
                                 }
                                myString = value.replace(/ /g, '');
                                if (((myString > 98))) {
                                    return {
                                        valid: true,
                                    };
                                } 
                                else {
                                    return {
                                        valid: false,
                                        message: 'Enter a amount greater then 98 USD'
                                    };
                                }
                                return {
                                    valid: false,
                                    message: 'Enter a amount greater then 98 USD'
                                };
                            }
                        }
                    }
                }
            }

        })   
    });
  </script>