    <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i> My Team</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo ABSOLUTE_URL;?>">Home</a></li>
            <li><i class="fa fa-table"></i><?php echo ucwords($side);?> Side Team</li>
          </ol>
        </div>
      </div>


<div class="col-sm-12">
    <section class="panel">
        <header class="panel-heading">
            <?php echo ucwords($side);?> Side Team
        </header>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td><strong>User</strong></td>
                    <td><strong>Placment</strong></td>
                    <td><strong>Created on</strong></td>
                    <td><strong>Paid on</strong></td>
                    <td><strong>Amount</strong></td>
                    <td><strong>Paid/Unpaid</strong></td>
                    <td><strong>Status</strong></td>
                </tr>
            </thead>
          <tbody>
        <?php foreach ($availablePin as $key => $value) { ?>
            <tr>
                <td><?php echo $value['username'];?></td>
                <td><strong><?php echo $value['side'];?></strong></td>
                <td><?php echo $value['created'];?></td>
                <?php if (empty($value['payment_date'])) {
                    echo '<td class="text-danger">Not paid</td>';
                } else{
                    echo '<td class="text-success">'.$value['payment_date'].'</td>';
                }
                ?>
                <td><?php echo $value['donation'];?></td>
                <?php if ($value['payment'] == 1 ) {
                    echo '<td class="text-success">Paid</td>';
                }else {
                     echo '<td class="text-danger">Unpaid</td>';
                }?>
                <?php if ($value['status'] == 1 ) {
                    echo '<td class="text-success">Active</td>';
                }else if ($value['status'] == 2 ){
                     echo '<td class="text-danger">Blocked</td>';
                }else {
                     echo '<td class="text-danger">Inactive</td>';
                }?>
            </tr>
        <?php  }?>
        </tbody>
        </table>
    </section>
</div>