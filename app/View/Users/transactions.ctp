    <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i> History</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
            <li><i class="fa fa-table"></i>History</li>
          </ol>
        </div>
      </div>
    	<div class="container" style=" font-size: 12px;">
    		<div class="row col-lg-12 well" >
        <h3 class="text-info text-center"><strong>View all Transactions</strong></h3>
        <div class="padding-left-15">
            <nav>
                <ul class="pagination col-md-10" style="margin-left:70px;">
                    <div class="clearfix"></div>
                    <ul class="pager">
                        <li><a href="javascript:void(0);" id ="prevRes" >Previous</a></li>
                        <li><a href="javascript:void(0);" id="nextRes">Next</a></li>
                    </ul>
                </ul>
            </nav>
        </div>
      <div class="col-sm-12">
          <section class="panel">
              <header class="panel-heading">
                  Transaction History
              </header>
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <td ><strong>#</strong></td>
                      <td><strong>Transaction Type</strong></td>
                      <td><strong>Amount</strong></td>
                      <td><strong>Binary</strong></td>
                      <td><strong>Referal</strong></td>
                      <td><strong>Single lag binary</strong></td>
                      <td><strong>Date</strong></td>
                      <td><strong>Status</strong></td>
                   </tr>
                  </thead>
                  <tbody>
                  <?php foreach ( $NameArray as $key => $value) {
                    if(!empty($value['WithdrawalRequest']['id'])) { ?>
                       <tr id="<?php echo 'list'.$key;?>" class='hidden'>
                          <td><strong><?php echo $key;?></strong></td>
                          <?php if (!empty($value['WithdrawalRequest']['perticular'])) {
                              echo '<td>Purchase</td>';
                           } else  if (!empty($UserArray['id']) && $value['WithdrawalRequest']['user_id'] ==$UserArray['id']){
                              echo '<td>Withdraw</td>';
                            }?>
                          <td><?php echo $value['WithdrawalRequest']['amount'];?></td>
                          <td><?php echo $value['WithdrawalRequest']['binary'];?></td>
                          <td><?php echo $value['WithdrawalRequest']['referal'];?></td>
                          <td><?php echo $value['WithdrawalRequest']['single_lag'];?></td>
                          <td><?php echo $value['WithdrawalRequest']['created'];?></td>
                          <?php if ($value['WithdrawalRequest']['status'] == 1 ) {
                            echo '<td class="text-success">Success</td>';
                          }else {
                            echo '<td class="text-danger">Panding</td>';
                          } ?>
                       </tr>
                    <?php $nbr = $key+1;
                    } }
                      $cnt = count($NameArray);
                      $intpage = 10;
                      ?>
                  </tbody>
              </table>
          </section>
      </div>
      <div class="clearfix"></div>
<ul class="pager">
    <li><a href="<?php echo ABSOLUTE_URL;?>/users/transactions">View All</a></li>
  </ul>
</div>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.45/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
function getSearch(){
    var search_by = $("#search_by").val();
    var value = $("#value").val();
    if (search_by == "") {
        alert("Please select a filter");
        return false;
    }
    if (value =="") {
        alert("Please enter or select a value");
        return false;
    }
    $('#filterForm').unbind('submit').submit();
}
function setAttr(){
    var atr = $("#search_by").val();
    if (atr == 'balance') {
        $("#val").html('<select class="form-control" id="value" name="data[value]"><option value="< 0">Nagative</option><option value="> 0">Positive</option><option value="= 0">Zeero</option></select>');
    } else if(atr == 'created'){
        $("#val").html('<input type="text" name="data[value]" id="value" class="form-control" >');
        $('#value').datetimepicker({
            viewMode: 'years',
            format: 'YYYY-MM-DD'
        });
    }else {
        $("#val").html('<input type="text" name="data[value]" id="value" class="form-control" >');
    }
}

$(document).ready(function() {
var cnt = <?php echo $cnt;?>;
 for (var i = 0; i < 10; i++) {
    $("#list"+i).show();
  $("#list"+i).removeClass('hidden');
}

var intpage = <?php echo $intpage;?>;
$("#nextRes").click(function() { 
if(intpage < cnt) {
var res = intpage +10;
for (var i = intpage-1; i < res; i++) {
    $("#list"+i).show();
  $("#list"+i).removeClass('hidden');
}
 for (var i = intpage-1; i >= 0; i--) {
            $("#list"+i).hide();
             $("#list"+i).addClass('hidden');
           }
           intpage = intpage +10;
}
else{
    alert("End of list please go to previous page");
}
});
$("#prevRes").click(function() { 
if(intpage >19) {
var res = intpage -10;
preres = res -10;
for (var i = res; i < intpage; i++) {
  $("#list"+i).hide();
  $("#list"+i).addClass('hidden');
}
var temp =res;
 for (var i = 0; i <= 10; i++) {
    if(temp>=0){
  temp--;
  $("#list"+temp).show();
  $("#list"+temp).removeClass('hidden');
  }
  else{
    break;
  }       
}
}
else{
    alert("End of list please go to next page");
}
intpage = intpage -10;
});
});

</script>
		</div>

</body>
