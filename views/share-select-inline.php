<script type="text/javascript">
jQuery(document).ready(function($){

	$("p").contentshare({
		shareIcons : [ ssPluginDir + '/assets/img/fb.png', ssPluginDir + '/assets/img/tw.png']
	});
	    $.fn.contentshare.defaults.shareable.on('mouseup',function(){
	        $.fn.contentshare.showTooltip();
    });
	
});
</script>