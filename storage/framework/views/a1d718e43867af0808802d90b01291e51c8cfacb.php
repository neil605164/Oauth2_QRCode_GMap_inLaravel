<?php $__env->startSection('content'); ?>
<div class="w3-center">
	<img src="<?php echo e($google2fa); ?>">
</div>
<div class="w3-container">
	<a href="<?php echo e($google2fa); ?>" class="w3-btn w3-white w3-border w3-round" download>download</a>
		<!--在controller去比對，然後直接去導向A頁面-->
	<a href="<?php echo e(url('/image')); ?>" class="w3-btn w3-white w3-border w3-round">圖片比對</a>
		<!--在controller去比對，然後直接去導向A頁面-->
	<a href="<?php echo e(url('/verify')); ?>" class="w3-btn w3-white w3-border w3-round">驗證碼比對</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>