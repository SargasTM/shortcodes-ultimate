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
				,	latValue = parseFloat( _this.data('lat-value') )
				,	lngValue = parseFloat( _this.data('lng-value') )
				,	zoomValue = parseFloat( _this.data('zoom-value') )
				,	scrollWheel = ( _this.data('scroll-wheel' ) == 1) ? true : false
				,	panControl = ( _this.data('pan-control' ) == 1) ? true : false
				,	zoomControl = ( _this.data('zoom-control' ) == 1) ? true : false
				,	mapDraggable = ( _this.data('map-draggable' ) == 1) ? true : false
				,	mapMarkerImage = _this.data('map-marker')
				,	mapStyle = _this.data('map-style')
				,	contentString = $('.marker-desc', _this).html()
				,	infowindow = new google.maps.InfoWindow({
						content: contentString
					})
				,	addEventsFunction = function(){}
				,	mapInit = function(){
						console.log(latValue+'  -  '+lngValue);
						var
							map
						,	coordData = new google.maps.LatLng( latValue, lngValue )
						,	marker
						,	styleArray = mapStyle
						,	mapOptions = {
								zoom: zoomValue,
								center: coordData,
								scrollwheel: scrollWheel,
								styles: styleArray,
								panControl: panControl,
								zoomControl: zoomControl,
								scaleControl: false,
								draggable: mapDraggable
							}
						;

						var markerIcon = {
							url: mapMarkerImage[0],
							size: new google.maps.Size(mapMarkerImage[1], mapMarkerImage[2]),
							origin: new google.maps.Point(0,0),
							anchor: new google.maps.Point(( mapMarkerImage[1]/2 ), mapMarkerImage[2])
						};

						map = new google.maps.Map( $('#'+mapId)[0], mapOptions);
						marker = new google.maps.Marker({
							map: map,
							draggable: true,
							animation: google.maps.Animation.DROP,
							position: coordData,
							icon: markerIcon
						});

						google.maps.event.addListener(marker, 'click', function() {
							if( '' !== contentString){
								infowindow.open( map, marker );
							}
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
