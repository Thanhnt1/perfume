var revapi;

jQuery(document).ready(function() {
    revapi = jQuery('.tp-banner').revolution({
        dottedOverlay:"none",
        delay:9000,
        startwidth:1170,
        startheight:700,
        hideThumbs:200,
        
        thumbWidth:100,
        thumbHeight:50,
        thumbAmount:5,
        
        navigationType:"none",
        navigationArrows:"solo",
        navigationStyle:"",
        
        touchenabled:"on",
        onHoverStop:"on",
        
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
                    
                    
        keyboardNavigation:"on",
        
        navigationHAlign:"center",
        navigationVAlign:"bottom",
        navigationHOffset:0,
        navigationVOffset:20,

        soloArrowLeftHalign:"left",
        soloArrowLeftValign:"center",
        soloArrowLeftHOffset:20,
        soloArrowLeftVOffset:0,

        soloArrowRightHalign:"right",
        soloArrowRightValign:"center",
        soloArrowRightHOffset:20,
        soloArrowRightVOffset:0,
            
        shadow:0,
        fullWidth:"on",
        fullScreen:"off",

        spinner:"spinner0",
        
        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,

        shuffle:"off",
                            
        forceFullWidth:"off",           
        fullScreenAlignForce:"off",           
        minFullScreenHeight:"400",            
                    
        hideThumbsOnMobile:"off",
        hideNavDelayOnMobile:1500,            
        hideBulletsOnMobile:"off",
        hideArrowsOnMobile:"off",
        hideThumbsUnderResolution:0,
        
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        startWithSlide:0,
        fullScreenOffsetContainer: ""

    });

    // Setup laravel csrf token for ajax
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		},
	    error: function(request){
	    	if(request.responseJSON && request.status != 401) {
	    		$.notify({
	    			message: request.responseJSON.msg ? request.responseJSON.msg : request.responseJSON.message
	    		}, {
	    			type: 'danger'
	    		});
	    	}
		},
		// Handle error message 
		statusCode: {
			401: function(request){
				$.notify({
	    			message: 'This user is not authorized.'
	    		}, {
	    			type: 'danger'
				});
				setTimeout(function(){ location.reload(); }, 1500);
			},
		},
	});
	// Set default for bootstrap-notify
	$.notifyDefaults({
		type: 'success',
		placement: {
            align: 'center',
		},
		z_index: 9999,
	});

    
}); //ready

setTimeout(function(){
    $('.alert-custom').fadeOut('slow', function(){
        $(this).remove()
    });
}, 5000);