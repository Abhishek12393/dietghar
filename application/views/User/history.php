<?php include('header.php');
include('sidebar.php'); ?>
<!--********************************** Content body start ***********************************-->
<div class="content-body">
  <div class="container-fluid">


    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Weight Update History</h4>
          </div>
          <div class="card-body">



            <div class="table-responsive">
              <table class="table primary-table-bordered">
                <thead class="thead-primary">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Weight</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (is_array($weight_history)) {
                    foreach ($weight_history as $i => $weight) {; ?>
                      <tr>
                        <th><?= ++$i ?></th>
                        <td><?= $weight->weight; ?></td>
                        <td><?= date("d-m-Y", strtotime($weight->recorded_date)); ?> </td>
                      </tr>
                  <?php }
                  }  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Inch Update History</h4>
          </div>
          <div class="card-body">
            <?php #pr($inch_history) ; 
            ?>
            <div class="table-responsive">
              <table class="table primary-table-bordered">
                <thead class="thead-primary">
                  <tr>

                    <th scope="col">#Sno</th>
                    <th scope="col">Neck</th>
                    <th scope="col">Chest</th>
                    <th scope="col">Waist</th>
                    <th scope="col">Hip</th>
                    <th scope="col">Arm</th>
                    <th scope="col">Thigh</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (is_array($inch_history)) {
                    foreach ($inch_history as $i => $inch) {; ?>
                      <tr>
                        <th><?= ++$i ?></th>
                        <td><?= $inch->neck; ?></td>
                        <td><?= $inch->chest; ?></td>
                        <td><?= $inch->waist; ?></td>
                        <td><?= $inch->hip; ?></td>
                        <td><?= $inch->arm; ?></td>
                        <td><?= $inch->thigh; ?></td>
                        <td><?= date("d-m-Y", strtotime($inch->recorded_date)); ?> </td>
                      </tr>
                  <?php }
                  }  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Chart Purchase History</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table primary-table-bordered">
                <thead class="thead-primary">
                  <tr>
                    <th scope="col">#SN</th>
                    <th scope="col">ChartID / Days</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Purchase Date</th>
                    <th scope="col">Chart Download</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (is_array($chart_pur_history)) {
                    foreach ($chart_pur_history as $i => $cph) {; ?>
                      <tr>
                        <th><?= ++$i ?></th>
                        <td><?= '<b>'.$cph->meal_chart_id.'</b> /'. $cph->days; ?></td>
                        <td><?php if($cph->order_id == ''){echo 'Not Purchased'; }else{ echo $cph->order_id ;} ?></td>
                        <td><?php  if($cph->p_date != ''){  echo date("d-m-Y", strtotime($cph->p_date)); } ?> </td>
                        <td><a href="<?=base_url('final_chart_download/'. $cph->meal_chart_id); ?>"> Download </a></td>
                      </tr>
                  <?php }
                  }  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>            
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Plan Purchase History</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table primary-table-bordered">
                <thead class="thead-primary">
                  <tr>
                    <th scope="col">#SN</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (is_array($order_history)) {
                    foreach ($order_history as $i => $order) {; ?>
                      <tr>
                        <th><?= ++$i ?></th>
                        <td><?= $order->plan_name; ?></td>
                        <td><?= $order->plan_amount; ?></td>
                        <td><?= date("d-m-Y", $order->purchase_date); ?> </td>
                      </tr>
                  <?php }
                  }  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Transaction History</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table primary-table-bordered">
                <thead class="thead-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">View Receipt / Order Id</th>
                    <th scope="col">Source / Date</th>
                    <th>Reciept</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (is_array($transaction_history)) {
                    foreach ($transaction_history as $i => $tns) {  ?>
                      <tr>
                        <th><?= $i + 1; ?></th>
                        <td><?= $tns->order_id; ?></td>
                        <td><?= $tns->txn_date; ?></td>
                        <td><a href="<?= base_url('Bill_ctrl/customerBill/' . $tns->order_id); ?>"> Download </a></td>
                      </tr>
                  <?php }
                  }  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- ## -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Login History</h4>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table primary-table-bordered">
                <thead class="thead-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Time & Date</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Device</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (is_array($login_history)) {
                    foreach ($login_history as $i => $login) {  ?>
                      <tr>
                        <th><?= $i + 1; ?></th>
                        <td><?= $login['url']; ?> </td>
                        <td><?= $login['ipv4']; ?> </td>
                        <td><?= $login['time']; ?> </td>
                      </tr>
                  <?php }
                  }  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
<!--********************************** Content body end ***********************************-->
<?php include('footer.php'); ?>