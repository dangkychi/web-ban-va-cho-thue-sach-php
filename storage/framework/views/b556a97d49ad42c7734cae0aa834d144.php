<?php $__env->startSection('body-class'); ?>
    class="account-login layout-2 left-col"
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content_headercms_top"></div>
    <div class="content-top-breadcum">
        <div class="container">
            <div class="row">
                <div id="title-content">
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Quick view JS ========= -->
    <script>
        function quickbox() {
            if ($(window).width() > 767) {
                $('.quickview-button').magnificPopup({
                    type: 'iframe',
                    delegate: 'a',
                    preloader: true,
                    tLoading: 'Loading image #%curr%...',
                });
            }
        }
        jQuery(document).ready(function() {
            quickbox();
        });
        jQuery(window).resize(function() {
            quickbox();
        });
    </script>
    <div class="container">
        <ul class="breadcrumb">
            <?php echo e(Breadcrumbs::render('orderDetail', $order)); ?>

        </ul>
        <div class="row">
            <?php echo $__env->make('client.pages.account_sidebar.account_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="content" class="col-sm-9">
                <div class="panel-collapse collapse in" id="collapse-checkout-option" aria-expanded="true" style="">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Order Detail</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table-container">
                    <div class="table-responsive">
                        <table class="table table-bordered shopping-cart">
                            <thead>
                                <tr>
                                    <td class="text-left">Image</td>
                                    <td class="text-left">Name</td>
                                    <td class="text-left">Rent Time</td>
                                    <td class="text-left">Quantity</td>
                                    <td class="text-left">Pick Up Date</td>
                                    <td class="text-left">Return Date</td>
                                    <td class="text-left">Price</td>
                                    <td class="text-left">Deposit</td>
                                    <td class="text-left">Status</td>
                                    <td class="text-left">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <img 
                                            style="height: 80px"
                                            src="<?php echo e(asset("images/products/{$item->product->productImages->firstWhere('type', 1)->image_url}")); ?>" 
                                            alt="No Image">
                                        </td>
                                        <td class="text-left"><?php echo e($item->product_name); ?></td>
                                        <td class="text-left"><?php echo e($item->rent_time); ?> day(s)</td>
                                        <td class="text-left"><?php echo e($item->product_quantity); ?></td>
                                        <td class="text-left"><?php echo e($item->pick_up_date ?? $item->expected_pick_up_date); ?></td>
                                        <td class="text-left"><?php echo e($item->return_date ?? $item->expected_return_date); ?></td>
                                        <td class="text-left"><?php echo e(number_format($item->product_price)); ?>đ</td>
                                        <td class="text-left"><?php echo e(number_format($item->deposit)); ?>đ</td>
                                        <td class="text-left">
                                            <?php switch($item->status):
                                                case ($productInOrderStatuses['wait_for_pick_up']): ?>
                                                    Waiting for pick up
                                                <?php break; ?>
                                                <?php case ($productInOrderStatuses['picked_up']): ?>
                                                    Picked Up
                                                <?php break; ?>
                                                <?php case ($productInOrderStatuses['returned_good']): ?>
                                                    All products returned
                                                <?php break; ?>
                                                <?php case ($productInOrderStatuses['returned_bad']): ?>
                                                    All products returned
                                                <?php break; ?>
                                                <?php case ($productInOrderStatuses['some_returned_good']): ?>
                                                    Some products returned
                                                <?php break; ?>
                                                <?php case ($productInOrderStatuses['some_returned_bad']): ?>
                                                    Some products returned
                                                <?php break; ?>
                                                <?php case ($productInOrderStatuses['cancel']): ?>
                                                    Cancelled
                                                <?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td class="text-right">
                                            <div style="display: flex">
                                                <?php if(in_array($item->status, $activeStatuses)): ?>
                                                <a class="btn btn-primary"
                                                    href="<?php echo e(route('client.extendRentTime', ['productInOrderId' => $item->id])); ?>">
                                                    Extend Rent Time
                                                </a>
                                                <?php endif; ?>
                                                <?php if($item->status === $productInOrderStatuses['wait_for_pick_up']): ?>
                                                <button class="cancel-button btn btn-danger"
                                                    data-url="<?php echo e(route('client.cancelOrderItem', ['productInOrderId' => $item->id])); ?>">
                                                    cancel
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left"><a href="<?php echo e(route('client.orderHistory')); ?>" class="btn btn-primary">Back to order history</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.cancel-button').on('click', function() {
                let url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(res) {
                        let selector = '#table-container';
                        let urlUpdate = window.location.href + " " + selector;
                        $(selector).load(urlUpdate);
                        Swal.fire({
                            text: res.message,
                            icon: 'success',
                        })
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/order/order_detail.blade.php ENDPATH**/ ?>