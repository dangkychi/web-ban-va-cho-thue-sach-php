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
            <?php echo e(Breadcrumbs::render('orderHistory')); ?>

        </ul>
        <div class="row">
            <?php echo $__env->make('client.pages.account_sidebar.account_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="content" class="col-sm-9">
                <form action="">
                    <select name="active_order" id="active-order-input" class="form-control" style="width: 200px">
                        <option value="0" <?php if((int)request()->active_order === 0): ?> selected <?php endif; ?>>Show all orders</option>
                        <option value="1" <?php if((int)request()->active_order === 1): ?> selected <?php endif; ?>>Show active order only</option>
                    </select>
                </form>
                <div class="panel-collapse collapse in" id="collapse-checkout-option" aria-expanded="true" style="">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Order History</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <?php if($orders->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered shopping-cart">
                            <thead>
                                <tr>
                                    <td class="text-center">Number of products</td>
                                    <td class="text-left">Total Price</td>
                                    <td class="text-left">Total deposit</td>
                                    <td class="text-left">Order time</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-left"><?php echo e($item->productsInOrder->count()); ?></td>
                                    <td class="text-left"><?php echo e($item->total); ?></td>
                                    <?php 
                                        $total_deposit = 0;
                                        foreach($item->productsInOrder as $productInOrder) {
                                            $total_deposit += $productInOrder->deposit;
                                        } 
                                    ?>

                                    <td class="text-left"><?php echo e($total_deposit); ?></td>
                                    <td class="text-left"><?php echo e($item->created_at); ?></td>
                                    <td class="text-right">
                                        <div style="display: flex">
                                            <a 
                                            class="btn btn-primary"
                                            href="<?php echo e(route('client.orderDetail', ['order' => $item->id])); ?>">
                                            detail
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="row" style="font-size: 3rem; width: 100%; text-align: center">
                        There is no order
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#active-order-input').on('change input', function() {
        $(this).closest('form').submit();
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/order/order_history.blade.php ENDPATH**/ ?>