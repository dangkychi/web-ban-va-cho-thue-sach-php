<aside id="column-left" class="col-sm-3 hidden-xs">
    <?php if(Auth::check()): ?>
    <div class="box">
        <div class="box-heading">Account</div>
        <div class="list-group">
            <a href="<?php echo e(route('client.users.edit')); ?>" class="list-group-item">My Account</a> <a
                href="<?php echo e(route('client.likedProducts')); ?>" class="list-group-item">Wish List</a> <a
                href="<?php echo e(route('client.orderHistory')); ?>" class="list-group-item">Order History</a>
        </div>
    </div>
    <?php endif; ?>
    <div class="box">
        <div class="box-heading">Information</div>
        <div class="list-group">
            <a class="list-group-item" href="<?php echo e(route('aboutUs')); ?>">About
                Us</a>
        </div>
    </div>
</aside>
<?php /**PATH D:\forproject\Nam3_Ky1\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/account_sidebar/account_sidebar.blade.php ENDPATH**/ ?>