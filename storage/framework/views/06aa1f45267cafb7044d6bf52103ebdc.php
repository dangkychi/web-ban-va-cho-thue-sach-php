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
            <?php echo e(Breadcrumbs::render('likedProducts')); ?>

        </ul>
        <div class="row">
            <?php echo $__env->make('client.pages.account_sidebar.account_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="content" class="col-sm-9">
                <div class="panel-collapse collapse in" id="collapse-checkout-option" aria-expanded="true" style="">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Wish List</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <?php if($liked_products->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered shopping-cart">
                            <thead>
                                <tr>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Product Name</td>
                                    <td class="text-left">Categories</td>
                                    <td class="text-left">Publisher</td>
                                    <td class="text-right">Origin</td>
                                    <td class="text-right">Unit Price</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $liked_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="likedProduct<?php echo e($item->id); ?>">
                                    <td class="text-center"> <a
                                        href="<?php echo e(route('client.products.detail', ['slug' => $item->product->slug])); ?>"><img
                                        src="<?php echo e(asset("images/products/{$item->product->productImages->firstWhere('type', 1)->image_url}")); ?>"
                                        alt="ut labore et dolore magnam aliquam quae"
                                        title="ut labore et dolore magnam aliquam quae" class="img-thumbnail"
                                        style="height: 50px"></a>
                                    </td>
                                    <td class="text-left">
                                        <a href="<?php echo e(route('client.products.detail', ['slug' => $item->product->slug])); ?>"><?php echo e($item->product->name); ?></a>
                                    </td>
                                    <td class="text-left">
                                        <?php $__currentLoopData = $item->product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php if($key > 0): ?>, <?php endif; ?> <?php echo e($category->name); ?> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo e($item->product->publisher->name); ?>

                                    </td>
                                    <td class="text-right"><?php echo e($item->product->origin->name); ?></td>
                                    <td class="text-right">$123.20</td>
                                    <td class="text-right">
                                        <div style="display: flex">
                                            <?php if($item->product->quantity > 0): ?>
                                            <button 
                                            style="margin-right: 5px"
                                            class="addtocart btn-primary"
                                            data-url="<?php echo e(route('client.addToCart', ['productId' => $item->product->id])); ?>">
                                                <i class="fa fa-cart-plus"></i>
                                            </button>
                                            <?php endif; ?>
                                            <button 
                                            type="button"
                                            data-url="<?php echo e(route('client.removeFromLikedProducts', ['productId' => $item->product->id])); ?>"
                                            data-id="<?php echo e($item->id); ?>"
                                            class="btn btn-danger removefromlike">
                                                <i class="fa fa-times-circle"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="row" style="font-size: 3rem; width: 100%; text-align: center">
                        There is nothing in your wishlist
                    </div>
                    <?php endif; ?>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left"><a
                            href="<?php echo e(route('/')); ?>"
                            class="btn btn-primary">Continue Shopping</a></div>
                    <div class="pull-right"><a
                            href="<?php echo e(route('client.cart')); ?>"
                            class="btn btn-primary">Go to cart</a></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
<script type="text/javascript">
$(document).ready(function() {
    $('.addtocart').on('click', function() {
        let url = $(this).data('url');
        $.ajax({
            method: 'GET',
            url: url,
            success: function(res) {
                reloadViewCart(res);
                Swal.fire ({
                    icon: 'success',
                    text: res.message,
                });
            },
        }); 
    });

    $('.removefromlike').on('click', function() {
        let url = $(this).data('url');
        let id = $(this).data('id');
        $.ajax({
            method: 'GET',
            url: url,
            success: function(res) {
                $('#likedProduct'+id).empty();
                reloadViewLike(res);

                Swal.fire ({
                    icon: 'success',
                    text: res.message,
                });
            }
        });
    });

    function reloadViewCart(res) {
        let total = res.total;
        $('#cart-total').html(total);

        let selector = '#cart-products-container';
        let urlUpdate = window.location.href + " " + selector;
        $(selector).load(urlUpdate);
    }

    function reloadViewLike(res) {
        let total = res.total;
        $('#like-total').html(total);
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/liked_products/liked_products.blade.php ENDPATH**/ ?>