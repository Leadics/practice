<style type="text/css">
  .text-bold{color:#000000 ;}
</style>

        <div class=" col-md-12"  style="margin-top: 20px;">
            <div>
                <h3 class="text-center" >Approve User Email</h3>
            </div>
            <div>
                <table class="table table-striped table-responsive">
                    <tr>
                      <td ><strong>#</strong></td>
                        <td><strong>User Name</strong></td>
                         <td><strong>Email</strong></td>
                        <td><strong>Created On</strong></td>
                        <td><strong>Status</strong></td>
                        <td><strong>Action</strong></td>
                     </tr>
                    <?php foreach ( $usersList as $key => $value) {
                     
                          if(!empty($value['User']['id'])) { ?>
                             <tr id="<?php echo 'list'.$key;?>">
                                <td><strong><?php echo $key;?></strong></td>
                                <td><?php echo $value['User']['name'];?></td>
                                <td><?php echo $value['User']['email'];?></td>
                                <td><?php echo $value['User']['created'];?></td>
                                
                                <?php if ($value['User']['status'] == 0) {
                                  echo '<td class="text-danger">Inactive</td>';
                                } else if($value['User']['status'] == 1){
                                  echo '<td class="text-success">Approved</td>';
                                } else { echo "<td>Blocked</td>";} 
                                
                                if($value['User']['status'] == 0){ ?>
                                <td>
                                <a onclick="return getConfirmed();" href="<?php echo ABSOLUTE_URL.'/admin/approveEmail/'.$value['User']['id'];?>">Approve&nbsp;&nbsp;</a>
                                <?php } else { echo 'Cant Approve';} ?>
                                </td>
                                 
                             </tr>
                          <?php }}
                            ?>
                  </table>
            </div>
        </div>
