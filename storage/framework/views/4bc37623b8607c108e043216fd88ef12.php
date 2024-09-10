<?php if($paginator->hasPages()): ?>

    <?php
    $items_count = 3;
    $show_first_item = false;
    $show_last_item = false;
    
    $limit_start = 1;
    $limit_end = 1;
    if (count($elements[0]) > $items_count * 2) {
        $limit_start = $paginator->currentPage() - 1;
        $limit_end = $limit_start + 2;
    }
    
    if ($paginator->currentPage() >= $items_count) {
        $show_first_item = true;
    }
    if ($paginator->lastPage() > $paginator->currentPage() + 1) {
        $show_last_item = true;
    }
    ?>

    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <div>
            <p class="small text-muted">
                Showing
                <span class="fw-semibold"><?php echo e($paginator->firstItem()); ?></span>
                to
                <span class="fw-semibold"><?php echo e($paginator->lastItem()); ?></span>
                of
                <span class="fw-semibold"><?php echo e($paginator->total()); ?></span>
                results
            </p>
        </div>

        <div>
            <ul class="pagination pagination-rounded">
                <?php if($paginator->onFirstPage()): ?>
                    <li class="page-item disabled">
                        <a href="#" class="page-link">←</a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">←</a>
                    </li>
                <?php endif; ?>

                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_string($element)): ?>
                        <li class="disabled"><span><?php echo e($element); ?></span></li>
                    <?php endif; ?>
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="page-item active">
                                    <span class="page-link"><?php echo e($page); ?></span>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a href="<?php echo e($url); ?>" class="page-link"><?php echo e($page); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">→</a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a href="#" class="page-link">→</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/admin/pagination/custom.blade.php ENDPATH**/ ?>