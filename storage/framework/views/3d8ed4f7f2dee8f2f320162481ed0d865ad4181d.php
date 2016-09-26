<?php $__env->startSection('content'); ?>

<body >
	<p>
	<div id="map" class="w3-center " style="min-height: 500px; width: 600px;border: 2px solid black; border-radius: 8px"></div>
	</p>

	<p>
	<div id="message"  class="w3-center " style="min-height: 100px; width: 600px; border: 4px solid black; border-radius: 10px"></div>
	</p>

	<div id="floating-panel"  class="w3-center ">
		<input id="address" type="textbox" value="請輸入你的地址">
		<input id="submit" type="button" value="search">
		<input id="Coordinate" type="button" value="顯示座標" >
	</div>

<script src="<?php echo e(url('map.js')); ?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxAWsEr_pkAUEViFnL_r3eLJiIheQKdKA&callback=initMap&libraries=places, geometry"></script>

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>