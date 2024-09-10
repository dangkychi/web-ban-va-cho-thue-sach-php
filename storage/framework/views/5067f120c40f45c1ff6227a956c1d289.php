<?php $__env->startSection('body-class'); ?>
    class="account-login layout-2 left-col"
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <?php if(session('message')): ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            text: '<?php echo e(session("message")); ?>',
        });
    </script>
    <?php endif; ?>
    <?php
        $today = explode('-', $today);
    ?>
    <div class="content_headercms_top"></div>
    <div class="content-top-breadcum">
        <div class="container">
            <div class="row">
                <div id="title-content">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="breadcrumb">
            <?php echo e(Breadcrumbs::render('checkout')); ?>

        </ul>
        <div class="row">
            <div id="content" style="width: 100%">
                <div class="panel-collapse collapse in" id="collapse-checkout-option" aria-expanded="true" style="">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div>Your Information:</div>
                <div>Phone number: <?php echo e(Auth::user()->phone_number); ?></div>
                <div>Email: <?php echo e(Auth::user()->email); ?></div>
                <?php if($cart->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered shopping-cart">
                            <thead>
                                <tr>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Product Name</td>
                                    <td class="text-left">Quantity</td>
                                    <td class="text-left">Rent Time(days)</td>
                                    <td class="text-left">Pick up date</td>
                                    <td class="text-right">Unit Price</td>
                                    <td class="text-right">Deposit</td>
                                    <td class="text-right">Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <form action=""></form>
                                <?php
                                    $total = 0;
                                    $total_deposit = 0;
                                ?>
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><img
                                                src="<?php echo e(asset("images/products/{$item->product->productImages->firstWhere('type', 1)->image_url}")); ?>"
                                                alt="ut labore et dolore magnam aliquam quae"
                                                title="ut labore et dolore magnam aliquam quae" class="img-thumbnail"
                                                style="height: 80px">
                                        </td>
                                        <td class="text-left">
                                            <p><?php echo e($item->product->name); ?></p>
                                        </td>
                                        <td class="text-left">
                                            <p><?php echo e($item->quantity); ?></p>
                                        </td>
                                        <td class="text-left">
                                            <p><?php echo e($item->rent_time); ?></p>
                                        </td>
                                        <td class="text-left">
                                            <div style="max-width: 200">
                                                <form method="POST" action=<?php echo e(route('client.setPickUpDate')); ?>

                                                    id="set-pick-up-date-form<?php echo e($item->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="product_id"
                                                        value="<?php echo e($item->product->id); ?>">
                                                    <p>Date: <input type="text" name="date"
                                                            id="datePicker<?php echo e($item->id); ?>" class="datePicker">
                                                    </p>
                                                    <?php $__errorArgs = ['pick_up_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <?php echo e($message); ?>

                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </form>
                                            </div>
                                            <?php
                                            $dates = findNotAvailableDays($item->product, $item->quantity, $item->rent_time);
                                            ?>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    var dates = [<?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> '<?php echo e($date); ?>', <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>];

                                                    function DisableDates(date) {
                                                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                                        return [dates.indexOf(string) == -1];
                                                    }
                                                    $('#datePicker<?php echo e($item->id); ?>').datepicker({
                                                        beforeShowDay: DisableDates,
                                                        dateFormat: 'yy-mm-dd',
                                                        minDate: new Date(<?php echo e($today[0]); ?>, <?php echo e($today[1] - 1); ?>,
                                                            <?php echo e($today[2]); ?>),
                                                        maxDate: "+1Y",
                                                    });
                                                    $('#set-pick-up-date-form<?php echo e($item->id); ?>').on('change', function() {
                                                        let url = $(this).attr('action');
                                                        let formData = $(this).serialize();
                                                        console.log(formData);
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: url,
                                                            data: formData,
                                                            success: function(res) {},
                                                        });
                                                    })
                                                });
                                            </script>
                                        </td>
                                        <td class="text-right">
                                            <div>
                                                <?php echo e(number_format($item->product->rentPrice->firstWhere('number_of_days', 1)->price)); ?>đ/1day
                                            </div>
                                            <div>
                                                <?php echo e(number_format($item->product->rentPrice->firstWhere('number_of_days', 7)->price)); ?>đ/7day
                                            </div>
                                            <div>
                                                <?php echo e(number_format($item->product->rentPrice->firstWhere('number_of_days', 30)->price)); ?>đ/30day
                                            </div>
                                            <div>
                                                <?php echo e(number_format($item->product->rentPrice->firstWhere('number_of_days', 90)->price)); ?>đ/90day
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div><?php echo e(number_format($item->product->price * $item->quantity)); ?>đ</div>
                                        </td>
                                        <td class="text-right">
                                            <?php echo e(number_format(calculatePrice($item->product, $item->rent_time, $item->quantity))); ?>đ
                                        </td>
                                    </tr>
                                    <?php
                                        $total += calculatePrice($item->product, $item->rent_time, $item->quantity);
                                        $total_deposit += $item->product->price * $item->quantity;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div>Note: If you pick a big amount of a product, you may need to wait a long time for pick up date
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-right"><strong>Total:</strong></td>
                                        <td class="text-right"><?php echo e(number_format($total)); ?>đ</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Total Deposit:</strong></td>
                                        <td class="text-right"><?php echo e(number_format($total_deposit)); ?>đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <button data-url="<?php echo e(route('client.placeOrder')); ?>" class="btn btn-primary"
                                id="order-btn">Order
                            </button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row" style="font-size: 3rem; width: 100%; text-align: center">
                        There is nothing in your cart
                    </div>
                    <div class="row" style="text-align: center; margin-top: 10px">
                        <a href="<?php echo e(route('/')); ?>" class="btn btn-primary">Continue Shopping</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#order-btn').on('click', function() {

                let isEmpty = $('.datePicker').filter(function() {
                    return this.value == '';
                });

                if (isEmpty.length > 0) {
                    Swal.fire({
                        text: 'You need to select pick up date',
                        icon: 'error',
                    });
                } else {
                    window.location.href = $(this).data('url');
                }

            });


            $('.set-pick-up-date-form').on('change', function() {
                let url = $(this).attr('action');
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: formData,
                    success: function(res) {},
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/checkout/checkout.blade.php ENDPATH**/ ?>