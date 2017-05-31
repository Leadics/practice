<div class="container">
<?php if (empty($userData['package_money'])) { ?>
    <div class="row">
        <form>
        <div id="changePlan"  >
            <div class="modal-content modal-dialog">
                <div class="modal-header">
                    <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <a href="<?php echo ABSOLUTE_URL;?>/users/buildOrder"><h4 class="modal-title" id="myModalLabel">Invest To Earn More !</h4></a>
                </div>
            </div>
        </div>
        </form>
    </div>
<?php }
            if($userData['is_admin'] == 1){
                echo '<a href="'.ABSOLUTE_URL.'/admin/adminDashboard" class="btn btn-success pull-right btn-lg" style="margin-right:50px;">Admin Panel</a>';
              } ?>
<div class="clearfix"></div>
<style type="text/css">
     .smallCard{min-height: 130px; max-height: 130px;background-color: #64e73b33; margin-right: 10px; width:22.8%;}
</style>
    <div id="cards" class="row" style="padding-left: 60px;padding-top: 30px;">
       
    </div>
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
    $.ajax({
        url:'<?php echo ABSOLUTE_URL;?>/crons/getRoi/<?php echo $userData["id"];?>',
        method:'GET',
        success: function (data) {

            var obj = JSON.parse(data); 
            console.log(obj);
            if (!obj.roi.amount) {
                obj.roi.amount = 0;
            } 
            $("#cards").append('<div class="drop-shadow paddingAll col-md-3 smallCard"><div class="col-md-12"><h4 class="text-success">'+obj.roi.Membership+'</h4><h3 class="text-danger text-center">'+obj.roi.amount+'</h3></div></div>');
        }
    });
</script>
 