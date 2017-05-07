<div class="feature">
	<div class="container">
		<div class="text-center">
			<h1>Registration fee $ 10 and will be eligible to coingy-dex.com and coinigydex.club </h1>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <form>
        <div id="changePlan"  >
            <div class="modal-content modal-dialog">
                <div class="modal-header">
                    <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myModalLabel">Please procced to pay registration fees 10 $</h4>
                </div>
                <?php if (empty($giveHelp)) { ?>
                <div class="modal-body">
                    <div class="well">
                        <form action="https://bitpay.com/checkout" method="post" >
			                <input type="hidden" name="action" value="checkout" />
			                <input type="hidden" name="posData" value="" />
			                <input type="hidden" name="data" value="dV57WeUJxOnscDn5jDPDL2Q0fM2cHzBttJsxvqBZusn32UlvbzfGEEYBpUJhvD7gcMidNTNXawAHhPNJdl9kQ975aSaqdRz0El9Q1U8LpFOXN8/dD5HC9M+WLDgKrr+PP7ZBeIsjly7rQ222x4IbIGMz75W4UOUSibOVOV1f4vdPZKabyOaZytDBdw+YuCaijSnew3OOO19strpI+Yn7O3ULEA5pQ7rID+9V/zYTKvzAGlEvxR73SGnHuacwXi6kWPCc1IxhBAqGMEuGudu6tumBcE6kssvVnSBZ8FPHjis=" />
			                <input type="image" src="https://bitpay.com/img/button-medium.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
			            </form>
                    </div>  
                </div>
                <?php } else { ?>
                    <div class="modal-body">
                        <div class="well">
                        <h3 class="text-danger">Please complete your assigned donation first.</h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        </form>
    </div>
</div>