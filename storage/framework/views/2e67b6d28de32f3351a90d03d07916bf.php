<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <?php echo e(Breadcrumbs::render('admin.products')); ?>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <?php if(session('message')): ?>
        <?php echo session('message'); ?>

        <?php endif; ?>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-auto">
                                <div>
                                    <h4 class="card-title mb-0 flex-grow-1">Products</h4>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">Create Products</a>
                                    <select id="sort-by" class="form-control mx-2" style="width: 120px">
                                        <option value="">---Sort by---</option>
                                        <option value="0" <?php if(!is_null(request()->sort_by) && request()->sort_by == 0): ?> selected <?php endif; ?>>Latest</option>
                                        <option value="1" <?php if(!is_null(request()->sort_by) && request()->sort_by == 1): ?> selected <?php endif; ?>>Oldest</option>
                                    </select>
                                    <button class="btn btn-light" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                            class="fa-solid fa-filter"></i> Filter</button>
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="search-input"
                                            placeholder="Search for products..." value="<?php echo e(request()->keyword); ?>">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Categories</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Publisher</th>
                                            <th scope="col">Origin</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Book Layout</th>
                                            <th scope="col">Created Time</th>
                                            <th scope="col">updated Time</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" style="width: 150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td style="max-width: 200px; overflow:hidden; text-overflow:ellipsis"><?php echo e($product->name); ?></td>
                                                <td style="max-width: 200px; overflow:hidden; text-overflow:ellipsis">
                                                    <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($key > 0): ?>, <?php endif; ?> <?php echo e($category->name); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td><?php echo e(number_format($product->price)); ?>đ</td>
                                                <td><?php echo e($product->publisher->name); ?></td>
                                                <td><?php echo e($product->origin->name); ?></td>
                                                <td style="max-width: 200px; overflow:hidden; text-overflow:ellipsis"><?php echo e($product->author); ?></td>
                                                <td><?php echo e($product->book_layout === 0 ? 'paperback' : ($product->book_layout === 1 ? 'hardcover' : '')); ?></td>
                                                <td><?php echo e($product->created_at); ?></td>
                                                <td><?php echo e($product->updated_at); ?></td>
                                                <td>
                                                    <?php echo $product->status === 1
                                                        ? '<span class="badge bg-success">show</span>'
                                                        : '<span class="badge bg-danger">hidden</span>'; ?>

                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.products.show', ['product' => $product->id])); ?>" type="button" class="btn btn-sm btn-light">Details</a>
                                                    <a href="<?php echo e(route('admin.products.edit', ['product' => $product->id])); ?>" type="button" class="btn btn-sm btn-secondary">Edit</a>
                                                    <form class="d-inline" action="<?php echo e(route('admin.products.changeStatus', ['product' => $product->id])); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>                                                            
                                                        <?php if($product->status === 1): ?>
                                                            <input type="hidden" name="status" value="0">
                                                            <button type='submit' class='btn btn-sm btn-danger'>Hide</button>
                                                        <?php else: ?>
                                                            <input type="hidden" name="status" value="1">
                                                            <button type='submit' class='btn btn-sm btn-success'>Show</button>
                                                        <?php endif; ?>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="13">
                                                <?php echo e($products->links('admin.pagination.custom')); ?>

                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

    </div>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Products Filter</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 overflow-hidden">
            <div data-simplebar="init" style="height: calc(100vh - 112px);">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <form id="search-form" method="GET" action="" class="container">
                                        <div class="row p-3">
                                            <div class="col-xxl-12">
                                                <div>
                                                    <label for="status-input" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="status-input">
                                                        <option value="">--Choose status--</option>
                                                        <option value="1" <?php if(!is_null(request()->status) && request()->status == 1): ?> selected <?php endif; ?>>Show</option>
                                                        <option value="0" <?php if(!is_null(request()->status) && request()->status == 0): ?> selected <?php endif; ?>>Hidden</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-xxl-12">
                                                <div>
                                                    <label for="origins-input" class="form-label">Origin</label>
                                                    <select class="form-control" name="origins[]" id="origins-input">
                                                        <option value="">--Choose origin--</option>
                                                        <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($origin->slug); ?>" <?php if(request()->origins && request()->origins[0] === $origin->slug): ?> selected <?php endif; ?>><?php echo e($origin->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-xxl-12">
                                                <div>
                                                    <label for="publishers-input" class="form-label">Publisher</label>
                                                    <select class="form-control" name="publishers[]" id="publishers-input">
                                                        <option value="">--Choose publisher--</option>
                                                        <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($publisher->slug); ?>" <?php if(request()->publishers && request()->publishers[0] === $publisher->slug): ?> selected <?php endif; ?>><?php echo e($publisher->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-xxl-12">
                                                <div>
                                                    <label for="category-input" class="form-label">Category</label>
                                                    <select class="form-control" name="category" id="category-input">
                                                        <option value="">--Choose category--</option>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($category->slug); ?>" <?php if(request()->category === $category->slug): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="sort-by-input" name="sort_by" value="<?php echo e(request()->sort_by); ?>">
                                        <input type="hidden" name="keyword" id="keyword-input" value="<?php echo e(request()->keyword); ?>">
                                        <div class="row p-3">
                                            <div class="col-xxl-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-light">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 987px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 763px; transform: translate3d(0px, 0px, 0px); display: block;">
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-foorter border p-3 text-center">
            2023 © Velzon.
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('custom-js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search-input').keypress(function (e) {
            if (e.which == 13) {
                $('#keyword-input').val($(this).val());
                $('#search-form').submit();
            }
        });
        $('#sort-by').on('change', function () {
            $('#sort-by-input').val($(this).val());
            $('#search-form').submit();
        });

        $(document).keydown(function(e) {
            if (e.ctrlKey && e.shiftKey && e.which == 65) {
                window.location.href = "<?php echo e(route('admin.products.create')); ?>";
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\forproject\Nam3_Ky1\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/admin/pages/products/index.blade.php ENDPATH**/ ?>