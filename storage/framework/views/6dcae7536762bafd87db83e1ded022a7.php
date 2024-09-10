<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">

                                <div class="card-header border-0 align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Order Items Statuses</h4>
                                </div>

                                <div class="card-body p-0 pb-2">
                                    <div class="content-wrapper">
                                    
                                        <!-- Main content -->
                                        <section class="content">
                                          <div class="container-fluid">
                                            <div class="row">
                                                <div id="piechart" style="width: 900px; height: 500px;"></div>
                                            </div>
                                          </div><!-- /.container-fluid -->
                                        </section>
                                        <!-- /.content -->
                                      </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                    </div>

                </div> <!-- end .h-100-->

            </div> <!-- end col -->
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable(<?php echo json_encode($arrayDatas, 15, 512) ?>);

      var options = {
        title: 'Order Status'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/admin/pages/index/index.blade.php ENDPATH**/ ?>