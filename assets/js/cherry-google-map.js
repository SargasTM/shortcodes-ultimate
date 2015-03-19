(function($){
	var methods = {
		init : function( options ) {

			var settings = {
				offset: true
			}

			return this.each(function(){
				if ( options ){
					$.extend(settings, options);
				}

				var
					_this = $(this)
				,	mapId = _this.data('map-id')
				,	addEventsFunction = function(){}
				,	mapInit = function(){
						var
							map
						,	coordData = new google.maps.LatLng( -34.397, 150.644 )
						,	marker
						,	mapOptions = {
								zoom: 4,
								center: coordData,
								scrollwheel: false
							}
						;

						map = new google.maps.Map( $('#'+mapId)[0], mapOptions);
						marker = new google.maps.Marker({
							map:map,
							draggable: true,
							position: coordData
						});
					}
				,	constructor = function(){
						google.maps.event.addDomListener(window, "load", mapInit);
					}
				;

				constructor();

			});
		},
		destroy    : function( ) { },
		update     : function( content ) { }
	};

	$.fn.cherryGoogleMap = function( method ){
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method with name ' +  method + ' is not exist for jQuery.cherryGoogleMap' );
		}
	}//end plugin
})(jQuery)
