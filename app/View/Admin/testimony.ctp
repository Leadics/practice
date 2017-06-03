
<style type="text/css">
	.margin-left-100{margin-left: 9% !important;}
  .margin-top-30{margin-top: 30px !important;}
	.form-group{margin-bottom: 5px !important;}
	.control-label{text-align: left !important;}
  img{max-width: 36%!important;}
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}
/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
.pagination{
  margin:0px;
}
</style>

<section id="main-content">
  <section class="wrapper"> 
		<div class="row col-lg-12" >
    <h3 class="text-info text-center" style="margin-top:0px;"><strong>Testimonials</strong></h3>
    <div class="padding-left-15">
        <nav>
            <ul class="pagination col-md-10 margin-left-100">
                <?php $alphas = range('A', 'Z');
                foreach ($alphas as $key => $value) {?>
                    <li><a href="<?php echo ABSOLUTE_URL;?>/admin/testimony?page=<?php echo $value;?>"><?php echo $value;?></a></li>
                <?php }?>
                <div class="clearfix"></div>
                <ul class="pager">
                    <li><a href="javascript:void(0);" id ="prevRes" >Previous</a></li>
                    <li><a href="javascript:void(0);" id="nextRes">Next</a></li>
                </ul>
            </ul>
        </nav>
    </div>
    <form action="<?php echo ABSOLUTE_URL;?>/admin/testimony/filter" method="POST" id="filterForm">
        <div class="col-md-12" style="padding-bottom:10px;">
            <div class="col-md-2"><label><h4>Search by</h4></label></div>
            <div class="col-md-4">
                <select class="form-control" id="search_by" name="data[search_by]" onchange="setAttr();">
                    <option value="">Please select a filter</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="mobile">Mobile</option>
                    <option value="created">Date Before</option>
                </select>
            </div>
            <div id="val" class="col-md-4"></div>
            <div id="val" class="col-md-2"><button type="button" onclick="getSearch();" class="btn btn-primary">Search</button></div>
        </div>
    </form>
<div class="col-md-12" style="width:99%;">
<table class="table table-striped table-responsive">
	<tr>
		<td ><strong>#</strong></td>
   		<td><strong><a href="<?php echo ABSOLUTE_URL;?>/admin/testimony?filter=name&dir=<?php echo $dir;?>">Name</a></strong></td>
   		<td><strong>Email</strong></td>
      <td><strong><a href="<?php echo ABSOLUTE_URL;?>/admin/testimony?filter=mobile&dir=<?php echo $dir;?>"> Mobile</a></strong></td>
      <td><strong>Comments</strong></td>
      <td><strong><a href="<?php echo ABSOLUTE_URL;?>/admin/testimony?filter=created&dir=<?php echo $dir;?>">Date</a></strong></td>
      <td><strong>Status on Wall</strong></td>
      <td><strong>Set On Wall</strong></td>
   </tr>
	<?php foreach ( $NameArray as $key => $value) {
        if(!empty($value['Testimonial']['id'])) { ?>
           <tr id="<?php echo 'list'.$key;?>" class='hidden'>
           		<td><strong><?php echo $key;?></strong></td>
           		<td><?php echo $value['Testimonial']['name'];?></td>
           		<td><?php echo $value['Testimonial']['email'];?></td>
              <td><?php echo $value['Testimonial']['mobile'];?></td>
           		<td class="col-md-3"><?php echo $value['Testimonial']['comments'];?></td>
              <td><?php echo $value['Testimonial']['created'];?></td>
              <td class="text-center"><?php if ($value['Testimonial']['set_to_wall'] == 1) {
                echo '<p class="text-success"><span class="glyphicon glyphicon-ok"></span></p>';
              }else {
                echo '<p class="text-danger"><span class="glyphicon glyphicon-remove"></span></p>';
              }?></td>
              <td> <a href="<?php echo ABSOLUTE_URL.'/admin/setOrRemove/'.$value['Testimonial']['id'].'/1';?>" class="text-success">Yes<span class="glyphicon glyphicon-ok">&nbsp;</a>
              <a href="<?php echo ABSOLUTE_URL.'/admin/setOrRemove/'.$value['Testimonial']['id'].'/2';?>" class="text-danger">&nbsp;&nbsp;No<span class="glyphicon glyphicon-remove"></a></td>
           </tr>
        <?php $nbr = $key+1;
        } }
        $cnt = count($NameArray);
        $intpage = 10;
        ?>
</table>
<ul class="pager">
    <li><a href="<?php echo ABSOLUTE_URL;?>/admin/testimony">View All</a></li>
  </ul>
</div>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

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
