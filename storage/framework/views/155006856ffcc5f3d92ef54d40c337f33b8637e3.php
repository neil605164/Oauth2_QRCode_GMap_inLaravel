<?php $__env->startSection('content'); ?>
	<form method="post" action="<?php echo e(url('imageProcess')); ?>" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

		 Your image<br>
		 <input type="file" name="image">
		 <br>
		 
		 <p>
		 	<input type="submit" class="w3-btn w3-white w3-border w3-round" value="submit"> 
		 </p>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>