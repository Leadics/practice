<style type="text/css">
  .text-bold{color:#000000 ;}
</style>

        <div class=" col-md-8 col-md-offset-2"  style="margin-top: 20px;">
            <div>
                <h3 class="text-center" >Assign Donor</h3>
            </div>
            <div>
                <form id="lactivationForm" enctype="multipart/form-data" method="POST" action="<?php echo ABSOLUTE_URL;?>/admin/assignGetHelp" data-toggle="validator" >
                      <div class="form-group control-group">
                        <label for="pin" class="control-label" >Recipient</label>
                             <select type="integer" required="" class="form-control" id="reciever" name="reciever_id" title="Please enter your mobile number">
                                <option value="">Please select a recipient</option>
                                <?php foreach ($usersList as $key => $value) { ?>
                                    <option value="<?php echo $value['User']['id'];?>"><?php echo $value['User']['name'];?></option>
                               <?php } ?>
                            </select>
                        <span class="help-block"></span>
                      </div>
                    
                   <div class="form-group control-group">
                        <input type="text" name="id" hidden value="<?php echo $userData['id'];?>">
                        <select type="integer" required="" class="form-control" id="donation" name="GiveHelpId" title="Please enter your mobile number">
                            <option value="<?php echo $donations['GiveHelp']['id'];?>"><strong>Donor :</strong>&nbsp;<?php echo $donorsList[$donations['GiveHelp']['donator_id']];?>&nbsp; <strong>Amount :</strong>&nbsp; <?php echo $donations['GiveHelp']['amount'];?></option>
                            
                        </select>
                         <span class="help-block"></span>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </form>
            </div>
        </div>


<script>
$(document).ready(function(){
    $("#reciever").val("<?php echo $userToDonate;?>");
})
</script>
