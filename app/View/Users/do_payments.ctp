
<div class="feature">
	<div class="container">
		<div class="text-center">
        <?php if ($keyword['item'] == 'Subscription' && $keyword['amount'] == 10) {
            echo '<h1>Registration fee $ 10 and will be eligible to coingy-dex.com and coinigydex.club </h1>';
            $cost = "10 USD";
        } else {
            echo '<h1>Get the banifits of '.$keyword['item'].' plan in just '.$keyword['amount'].' and will earn from coingy-dex.com and coinigydex.club </h1>';
            $cost = $keyword['amount']." USD";
        } ?>
			
		</div>
        <div class="row">
            <div id="changePlan"  >
                <div class="modal-content modal-dialog">
                    <div class="modal-header">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="myModalLabel">Please procced to pay <?php echo $cost; ?></h4>
                        </div>

                        <form method="post" action="https://payeer.com/merchant/">
                           <input type="hidden" name="m_shop" value="<?php echo $data['m_shop']; ?>">
                            <input type="hidden" name="m_orderid" value="<?php echo $data['m_orderid']; ?>">
                            <input type="hidden" name="m_amount" value="<?php echo $data['m_amount']; ?>">
                            <input type="hidden" name="m_curr" value="<?php echo $data['m_curr']; ?>">
                            <input type="hidden" name="m_desc" value="<?php echo $data['m_desc']; ?>">
                            <input type="hidden" name="m_sign" value="<?php echo $data['sign']; ?>">
                            <input type="hidden" name="m_params" value="<?php echo $data['m_params']; ?>">
                            <input type="hidden" name="m_cipher_method" value="AES-256-CBC">
                                <div class="clearfix"></div>
                                <div class="col-md-12" style="margin-top: 30px;">
                                    <div class="col-md-6">
                                        <input name="m_process" value="Pay Now" type="submit" class="btn btn-primary btn-block" href="<?php echo ABSOLUTE_URL;?>/ShopingCart/proceedToPay">
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-block" href="<?php echo ABSOLUTE_URL;?>/users/logout">Later</a>
                                    </div>
                                </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
	</div>
</div>
