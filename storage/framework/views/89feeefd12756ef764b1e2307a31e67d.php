<?php $__env->startSection('body-class'); ?>
    class="product-product-44 layout-1"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content_headercms_top">
    </div>
    <div class="content-top-breadcum">
        <div class="container">
            <div class="row">
                <div id="title-content">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="breadcrumb product-page">
            <?php echo e(Breadcrumbs::render('productDetail', $product)); ?>

        </ul>
        <div class="row">
            <div id="content" class="productpage col-sm-12">
                <div class="row">
                    <h2 class="page-title"><?php echo e($product->name); ?></h2>

                    <div class="col-sm-6 product-left">
                        <div class="product-info">



                            <div class="left product-image thumbnails">

                                <!-- Caprica Cloud-Zoom Image Effect Start -->
                                <div class="image">
                                    <a class="thumbnail elevatezoom-gallery"
                                        href='<?php echo e(asset("images/products/{$product->productImages->firstWhere('type', 1)->image_url}")); ?>'
                                        title="Tempor autem quibusd et aut officiis"><img id="ctzoom"
                                            src='<?php echo e(asset("images/products/{$product->productImages->firstWhere('type', 1)->image_url}")); ?>'
                                            data-zoom-image='<?php echo e(asset("images/products/{$product->productImages->firstWhere('type', 1)->image_url}")); ?>'
                                            title="Tempor autem quibusd et aut officiis"
                                            alt="Tempor autem quibusd et aut officiis" />
                                    </a>
                                </div>

                                <div class="additional-carousel">
                                    <div class="customNavigation">
                                        <i class="fa prev fa-angle-left">&nbsp;</i>
                                        <i class="fa next fa-angle-right">&nbsp;</i>
                                    </div>

                                    <div id="additional-carousel" class="image-additional product-carousel">

                                        <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="slider-item">
                                                <div class="product-block">
                                                    <a href='<?php echo e(asset("images/products/{$image->image_url}")); ?>'
                                                        title="Tempor autem quibusd et aut officiis"
                                                        class="elevatezoom-gallery"
                                                        data-image='<?php echo e(asset("images/products/{$image->image_url}")); ?>'
                                                        data-zoom-image='<?php echo e(asset("images/products/{$image->image_url}")); ?>'><img
                                                            src='<?php echo e(asset("images/products/{$image->image_url}")); ?>'
                                                            width="95" height="120"
                                                            title="Tempor autem quibusd et aut officiis"
                                                            alt="Tempor autem quibusd et aut officiis" /></a>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                    <span class="additional_default_width" style="display:none; visibility:hidden"></span>
                                </div>



                                <!-- Caprica Cloud-Zoom Image Effect End-->
                            </div>



                        </div>
                    </div>
                    <div class="col-sm-6 product-right">
                        <h3 class="product-title"><?php echo e($product->name); ?></h3>
                        <div class="rating-wrapper">
                            <?php if($product->reviews->count() > 0): ?>
                                <?php
                                    $avgRating = $product->reviews->avg('rating');
                                ?>
                                <?php for($i = 0; $i < floor($avgRating); $i++): ?>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                            class="fa fa-star fa-stack-1x"></i></span>
                                <?php endfor; ?>
                                <?php for($i = 0; $i < ceil(5 - $avgRating); $i++): ?>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                                <?php endfor; ?>
                                <a class="review-count" href="#"
                                    onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo e($product->reviews->count()); ?>

                                    reviews</a>
                            <?php endif; ?>
                            <?php if(Auth::check() && $user_bought_this_product): ?>
                                <a class="write-review" href="#"
                                    onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><i
                                        class="fa fa-pencil"></i> Write a review</a>
                            <?php endif; ?>
                    </div>
                    <ul class="list-unstyled short-desc">
                        <li><span class="desc">Publisher:</span><a href=""><?php echo e($product->publisher->name); ?></a>
                        </li>
                        <li><span class="desc">Product Code:</span><?php echo e($product->id); ?></li>
                        <li><span class="desc">Availability:</span><?php echo e($product->quantity); ?> products left,
                            <?php echo e(calculateAvailability($product)); ?> avaialble now</li>
                    </ul>
                    <hr style="border-top: 1px solid #c4c4c4;">
                    <ul class="list-unstyled">
                        <li style="display: flex; margin-bottom: 10px">
                            <h4 style="margin-right: 5px" class="product-price">
                                <?php echo e(number_format($product->rentPrice->firstWhere('number_of_days', 1)->price)); ?>đ
                            </h4>
                            <span>/ 1 Days</span>
                        </li>
                        <li style="display: flex">
                            <h4 style="margin-right: 5px; margin-bottom: 10px" class="product-price">
                                <?php echo e(number_format($product->rentPrice->firstWhere('number_of_days', 7)->price)); ?>đ
                            </h4>
                            <span>/ 7 Days</span>
                        </li>
                        <li style="display: flex">
                            <h4 style="margin-right: 5px; margin-bottom: 10px" class="product-price">
                                <?php echo e(number_format($product->rentPrice->firstWhere('number_of_days', 30)->price)); ?>đ
                            </h4>
                            <span>/ 30 Days</span>
                        </li>
                        <li style="display: flex">
                            <h4 style="margin-right: 5px; margin-bottom: 10px" class="product-price">
                                <?php echo e(number_format($product->rentPrice->firstWhere('number_of_days', 90)->price)); ?>đ
                            </h4>
                            <span>/ 90 Days</span>
                        </li>
                    </ul>

                    <div id="product">


                        <div class="product-rightinfo">

                            <div class="form-group cart-block" style="display: flex">
                                <div class="col-3">
                                    <label class="control-label qty" for="rent-time-input">Rent Time:</label>
                                </div>
                                <div style="display: flex">
                                    <select name="" id="rent-time-input" class="form-control" style="width: 50px"
                                    data-url="<?php echo e(route('client.products.getPrice', ['product' => $product->id])); ?>">
                                        <option value="7">7</option>
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                        <option value="30">30</option>
                                        <option value="90">90</option>
                                    </select>
                                    <div style="margin-left: 5px">
                                        Day(s)
                                    </div>
                                </div>
                            </div>

                            <div class="form-group cart-block" style="display: flex">
                                <div class="col-3">
                                    <label class="control-label qty" for="quantity-input">Quantity:</label>
                                </div>
                                <div style="display: flex">
                                    <input type="number" id="quantity-input" name="quantity"
                                        max="<?php echo e($product->quantity); ?>" value="1"
                                        min="1"
                                        data-url="<?php echo e(route('client.products.getPrice', ['product' => $product->id])); ?>"
                                        class="form-control" <?php if($product->quantity === 0): ?> disabled <?php endif; ?>>
                                </div>
                            </div>

                            <div class="form-group cart-block" style="display: flex">
                                <div class="col-3">
                                    <label class="control-label qty" for="total-input">Total:</label>
                                </div>
                                <div style="display: flex">
                                    <input style="display: inline-block; width: 180px" id="total-input" type="text"
                                        disabled name="quantity" value="<?php echo e(number_format(calculatePrice($product))); ?> đ"
                                        size="2" class="form-control">
                                </div>
                            </div>

                            <div class="form-group cart-block">
                                <?php if(Auth::check()): ?>
                                    <?php if($product->quantity > 0): ?>
                                        <button type="button" id="button-cart"
                                            data-url="<?php echo e(route('client.addToCart', ['productId' => $product->id])); ?>"
                                            class="btn btn-primary btn-lg btn-block">Add to Cart</button>
                                    <?php endif; ?>
                                    <button type="button" id="button-like"
                                        data-url="<?php echo e(route('client.addToLikedProducts', ['productId' => $product->id])); ?>"
                                        class="btn btn-default wishlist"><i class="fa fa-heart"></i>Add
                                        to Wish
                                        List</button>
                                <?php else: ?>
                                    <a type="button" href="<?php echo e(route('login')); ?>"
                                        class="btn btn-primary btn-lg btn-block">Login to Rent</a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style"
                        data-url="indexbfcf.html?route=product/product&amp;product_id=31"><a
                            class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a
                            class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                    </div>
                    <script src="../../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
                    <!-- AddThis Button END -->
                    <div class="content_product_block">
                        <div>
                            <div class="product-tabs" id="custom_tab">
                                <ul>
                                    <li><a class="first selected" href="#tab-1" style="display: inline;">Description</a>
                                    </li>
                                    <li><a class="second" href="#tab-2" style="display: inline;">Product
                                            Size</a>
                                    </li>
                                    <li><a class="third" href="#tab-3" style="display: inline;">Information</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab_product" id="tab-1" style="display: block; word-wrap: break-word">
                                <?php echo $product->description; ?>

                            </div>
                            <div class="tab_product" id="tab-2" style="display: none;">
                                <span><strong>Height :</strong> <?php echo e($product->height); ?>cm </span>
                                <span><strong>Width :</strong> <?php echo e($product->width); ?>cm </span>
                                <?php if($product->thickness): ?>
                                    <span><strong>Thickness :</strong> <?php echo e($product->thickness); ?>cm </span>
                                <?php endif; ?>
                            </div>
                            <div class="tab_product" id="tab-3" style="display: none;">
                                <span><strong>Author :</strong> <?php echo e($product->author); ?> </span>
                                <span><strong>Publisher :</strong> <?php echo e($product->publisher->name); ?> </span>
                                <span><strong>Origin :</strong> <?php echo e($product->origin->name); ?> </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12" id="tabs_info">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-review" data-toggle="tab">Reviews
                        (<?php echo e($product->reviews->count()); ?>)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-description">
                    <div id="review">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 50%;"><strong><?php echo e($review->user_name); ?></strong></td>
                                        <td class="text-right"><?php echo e($review->created_at); ?>

                                            <?php if(Auth::check() && Auth::user()->id === $review->user_id): ?>
                                                <a
                                                    href="<?php echo e(route('client.products.deleteReview', ['review' => $review->id])); ?>"><button
                                                        style="margin-left: 20px">Delete</button>
                                            <?php endif; ?>
                                        </td></a>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p><?php echo e($review->content); ?></p>
                                            <?php for($i = 0; $i < $review->rating; $i++): ?>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                        class="fa fa-star fa-stack-1x"></i></span>
                                            <?php endfor; ?>
                                            <?php for($i = 0; $i < 5 - $review->rating; $i++): ?>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                                            <?php endfor; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="text-right"></div>
                    </div>
                    <?php if(Auth::check() && $user_bought_this_product): ?>
                        <form class="form-horizontal" id="form-review" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" name="user_name"
                                value="<?php echo e(Auth::user()->userInfo->last_name); ?> <?php echo e(Auth::user()->userInfo->first_name); ?>">
                            <h4>Write a review as <?php echo e(Auth::user()->userInfo->last_name); ?>

                                <?php echo e(Auth::user()->userInfo->first_name); ?></h4>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-review">Your Review</label>
                                    <textarea name="content" rows="5" id="input-review" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label">Rating</label>
                                    &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                    <input type="radio" name="rating" value="1" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="2" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="3" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="4" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="5" id="default-rating" checked />
                                    &nbsp;Good
                                </div>
                            </div>

                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <button type="button" id="button-review" 
                                    data-url="<?php echo e(route('client.products.postReview')); ?>"
                                    data-loading-text="Loading..."
                                        class="btn btn-primary">Post</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $('select[name=\'recurring_id\'], input[name="quantity"]').change(function() {
            $.ajax({
                url: 'index.php?route=product/product/getRecurringDescription',
                type: 'post',
                data: $(
                    'input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'
                ),
                dataType: 'json',
                beforeSend: function() {
                    $('#recurring-description').html('');
                },
                success: function(json) {
                    $('.alert, .text-danger').remove();

                    if (json['success']) {
                        $('#recurring-description').html(json['success']);
                    }
                }
            });
        });
    </script>
    <script>
        $('.date').datetimepicker({
            pickTime: false
        });

        $('.datetime').datetimepicker({
            pickDate: true,
            pickTime: true
        });

        $('.time').datetimepicker({
            pickDate: false
        });

        $('button[id^=\'button-upload\']').on('click', function() {
            var node = this;

            $('#form-upload').remove();

            $('body').prepend(
                '<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>'
            );

            $('#form-upload input[name=\'file\']').trigger('click');

            if (typeof timer != 'undefined') {
                clearInterval(timer);
            }

            timer = setInterval(function() {
                if ($('#form-upload input[name=\'file\']').val() != '') {
                    clearInterval(timer);

                    $.ajax({
                        url: 'index.php?route=tool/upload',
                        type: 'post',
                        dataType: 'json',
                        data: new FormData($('#form-upload')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $(node).button('loading');
                        },
                        complete: function() {
                            $(node).button('reset');
                        },
                        success: function(json) {
                            $('.text-danger').remove();

                            if (json['error']) {
                                $(node).parent().find('input').after(
                                    '<div class="text-danger">' + json['error'] + '</div>');
                            }

                            if (json['success']) {
                                alert(json['success']);

                                $(node).parent().find('input').val(json['code']);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr
                                .responseText);
                        }
                    });
                }
            }, 500);
        });
    </script>
    <script>


        //$(document).ready(function() {
        //	$('.thumbnails').magnificPopup({
        //		type:'image',
        //		delegate: 'a',
        //		gallery: {
        //			enabled:true
        //		}
        //	});
        //});


        $(document).ready(function() {
            if ($(window).width() > 767) {
                $("#ctzoom").elevateZoom({

                    gallery: 'additional-carousel',
                    //inner zoom				 

                    zoomType: "inner",
                    cursor: "crosshair"

                    /*//tint
                    
                    tint:true, 
                    tintColour:'#F90', 
                    tintOpacity:0.5
                    
                    //lens zoom
                    
                    zoomType : "lens", 
                    lensShape : "round", 
                    lensSize : 200 
                    
                    //Mousewheel zoom
                    
                    scrollZoom : true*/


                });
                var z_index = 0;

                $(document).on('click', '.thumbnail', function() {
                    $('.thumbnails').magnificPopup('open', z_index);
                    return false;
                });

                $('.additional-carousel a').click(function() {
                    var smallImage = $(this).attr('data-image');
                    var largeImage = $(this).attr('data-zoom-image');
                    var ez = $('#ctzoom').data('elevateZoom');
                    $('.thumbnail').attr('href', largeImage);
                    ez.swaptheimage(smallImage, largeImage);
                    z_index = $(this).index('.additional-carousel a');
                    return false;
                });

            } else {
                $(document).on('click', '.thumbnail', function() {
                    $('.thumbnails').magnificPopup('open', 0);
                    return false;
                });
            }
        });
        $(document).ready(function() {
            $('.thumbnails').magnificPopup({
                delegate: 'a.elevatezoom-gallery',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-with-zoom',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title');
                    }
                }
            });
        });

        $('#tabs a').tabs();
        $('#custom_tab a').tabs();
    </script>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script type="text/javascript">
        $('#button-cart').click(function() {
            let url = $(this).data('url') + '/' + $('#quantity-input').val() + '/' + $('#rent-time-input').val();
            $.ajax({
                method: 'GET',
                url: url,
                success: function(res) {
                    reloadViewCart(res);
                    Swal.fire({
                        icon: 'success',
                        text: res.message,
                    });
                },
            });
        });

        $('#button-review').click(function() {
            let url = $(this).data('url');
            $.ajax({
                method: 'POST',
                url: url,
                data: $("#form-review").serialize(),
                success: function() {
                    let selector = '#review';
                    let urlUpdate = window.location.href + " " + selector;
                    $(selector).load(urlUpdate);
                    selector = '.rating-wrapper';
                    urlUpdate = window.location.href + " " + selector;
                    $(selector).load(urlUpdate);
                    $('#input-review').val('');
                    $('#default-rating').prop('checked', true);
                }
            });
        });


        $('#button-like').click(function() {
            let url = $(this).data('url');
            $.ajax({
                method: 'GET',
                url: url,
                success: function(res) {
                    reloadViewLike(res);
                    Swal.fire({
                        icon: 'success',
                        text: res.message,
                    });
                },
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

        $('#quantity-input').on('change input', function() {
            if (parseInt($(this).val()) > parseInt($(this).attr('max'))) {
                $(this).val($(this).attr('max'));
            } else if (parseInt($(this).val()) < parseInt($(this).attr('min'))) {
                $(this).val($(this).attr('min'));
            }
            let url = $(this).data('url') + '/' + $(this).val() + '/' + $('#rent-time-input').val();
            $.ajax({
                method: 'GET',
                url: url,
                success: function(res){
                    $('#total-input').val(res.price + ' đ');
                },
            });
        });
        $('#rent-time-input').on('change input', function() {
            let url = $(this).data('url') + '/' + $('#quantity-input').val() + '/' + $(this).val();
            $.ajax({
                method: 'GET',
                url: url,
                success: function(res){
                    $('#total-input').val(res.price + ' đ');
                },
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\Nam3_Ky1\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pages/product_detail/product_detail.blade.php ENDPATH**/ ?>