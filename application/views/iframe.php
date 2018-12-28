
<div class="container">
	<div class="scroll-wrapper" style=" position: fixed; right: 0;   bottom: 0; left: 0; top: 50px; 
			-webkit-overflow-scrolling: touch; overflow-y: no;">
	<?php if (isset($iframe)) {?>
			<iframe src="<?php echo $iframe->path; ?>"  style="
			width:<?php echo $iframe->width; ?>; 
			height:<?php echo $iframe->height; ?>;"
			 frameborder="0" onload="resizeIframe(this)" ></iframe>	

	<?php }?>

	<script>
	  function resizeIframe(obj) {
	    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
	  }
	</script>


    
    </div>
</div>