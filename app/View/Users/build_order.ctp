<div id="login"  style="margin-top: 100px;"  role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Invest now and get earn</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12 " id="classdiv">
                      <div class="well">
                          <form id="orderForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/buildOrder" data-toggle="validator" >
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