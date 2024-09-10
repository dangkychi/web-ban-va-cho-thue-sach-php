
<?php if($paginator->hasPages()): ?>
<div class="pagination-wrapper">
    <div class="col-sm-6 text-left page-link">
        <ul class="pagination">
            <?php if(!$paginator->onFirstPage()): ?>
            <li><a href="<?php echo e($paginator->previousPageUrl()); ?>"><</a></li>
            <?php endif; ?>

            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active"><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
            <li><a href="<?php echo e($paginator->nextPageUrl()); ?>">></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="col-sm-6 text-right page-result">Showing 
        <span class="fw-semibold"><?php echo e($paginator->firstItem()); ?></span> to 
        <span class="fw-semibold"><?php echo e($paginator->lastItem()); ?></span> of 
        <span class="fw-semibold"><?php echo e($paginator->total()); ?></span></div>
</div>
<?php endif; ?><?php /**PATH D:\forproject\CNPM_NC\WebsiteBanVaMuonSach\websitebanvathuesach\resources\views/client/pagination/custom.blade.php ENDPATH**/ ?>