<?php $order = $this->Session->read('order');?>
<div class="feature">
	<div class="container">
		<div class="text-center">
        <?php if ($data['registration'] == 1) {
            echo '<h1>Registration fee $ 10 and will be eligible to coingy-dex.com and coinigydex.club </h1>';
            $cost = "10 USD";
        } else {
            echo '<h1>Get the banifits of '.$order['item'].' plan in just '.$order['amount'].' and will earn from coingy-dex.com and coinigydex.club </h1>';
            $cost = $order['amount']." USD";
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
<?php/*
<form action="https://bitpay.com/checkout" method="post" >
  <input type="hidden" name="action" value="checkout" />
  <input type="hidden" name="posData" value="" />
  <input type="hidden" name="data" value="dV57WeUJxOnscDn5jDPDL2Q0fM2cHzBttJsxvqBZusn32UlvbzfGEEYBpUJhvD7g1cxItA9qJh0rYYSTwkI69RzytQhlmXoA6LMSvAC9pwM3492feNPZmSc4+XpW/fEc0TE/DQ+yX8mbWDTEYwzyFUEny7lY/Y/+1A4i9a00xJSJFFVsBVf3G0543oCNu37Htao5DQHBsKuAZq8XoIEGjJ7ELwA+YXbJOuMw6dJWdDnfk/eWsWHdYPaI7C/8KqQx3wgzdv6WVBrshZPis+HKmAxkSKNnU4ulwgBLXyTaWWABQVqtkBpTQ9QZXOrcJE17" />
  <input type="image" src="https://bitpay.com/img/button-medium.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
</form> */?>
