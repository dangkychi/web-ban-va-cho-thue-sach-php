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

    <div class="container">
        <ul class="breadcrumb">
            <?php echo e(Breadcrumbs::render('login')); ?>

        </ul>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Warning: No match for E-Mail Address and/or Password.</div>
        <?php endif; ?>
        <div class="row">
            <?php echo $__env->make('client.pages.account_sidebar.account_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="content" class="col-sm-9">
                <h1>Login</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well">
                            <h3>New Customer</h3>
                            <p><strong>Register Account</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's
                                status, and keep track of the orders you have previously made.</p>
                            <a href="<?php echo e(route('signup')); ?>" class="btn btn-primary">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h3>Returning Customer</h3>
                            <p><strong>I am a returning customer</strong></p>
                            <form action="<?php echo e(route('postLogin')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label class="control-label" for="input-email">Email Address</label>
                                    <input type="text" name="email" value="<?php echo e(old('email')); ?>" placeholder="E-Mail Address"
                                        id="input-email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password"
                                        id="input-password" class="form-control" />
                                </div>
                                <input type="submit" id="submit-login" value="Login" class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\Nam3_Ky1\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/auth/login.blade.php ENDPATH**/ ?>