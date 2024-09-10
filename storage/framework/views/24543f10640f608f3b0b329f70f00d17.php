<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="<?php echo e(asset('client/js/jquery/jquery-2.1.1.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('backend/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        th, td, tr {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Order Email</h1>
    <div>Customer Name : <?php echo e($order->user->userInfo->first_name); ?> <?php echo e($order->user->userInfo->last_name); ?></div>
    <div>Customer Email : <?php echo e($order->user->email); ?></div>
    <div>Customer Phone : <?php echo e($order->user->phone_number); ?></div>
    <h1>Order Email</h1>
    <table class="table" style="margin-bottom: 0px">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Product Name</th>
            <th scope="col">Total Price</th>
            <th scope="col">Deposit</th>
            <th scope="col">Quantity</th>
            <th scope="col">Rent Time</th>
            <th scope="col">Pick Up Date</th>
            <th scope="col">Return Date</th>
        </tr>
        <?php 
        $total = 0;
        $total_deposit = 0;
        ?>
        <?php $__currentLoopData = $order->productsInOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scope="row"><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->product_name); ?></td>
                <td><?php echo e(number_format($item->product_price)); ?>đ</td>
                <td><?php echo e(number_format($item->deposit)); ?>đ</td>
                <td><?php echo e($item->product_quantity); ?></td>
                <th><?php echo e($item->rent_time); ?></td>
                <td><?php echo e($item->expected_pick_up_date); ?></td>
                <td><?php echo e($item->expected_return_date); ?></td>
            </tr>
            <?php 
            $total += $item->product_price;
            $total_deposit += $item->deposit;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <h3>Total: <?php echo e(number_format($total)); ?>đ</h3>
    <h3>Total Deposit: <?php echo e(number_format($total_deposit)); ?>đ</h3>
    <h3>Note: If you not go to shop to pick those products up, after 3 days or after the rental period end, those products will automatically cancel</h3>
</body>

</html><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/mail/order_email.blade.php ENDPATH**/ ?>