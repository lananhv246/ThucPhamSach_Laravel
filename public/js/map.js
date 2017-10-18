$(document).ready(function() {
    var map;
    $('#chBox').click(function(){
        if($(this).is(':checked')){
            $('#txt').show();
        } else {
            $("#txt").hide();
        }
    });

    //map
    //vi tri cua ban
    geoLocationInit();
    function geoLocationInit(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success, fail);
        }
        else{
            alert('trình duyệt không hổ trợ');
        }
    }
    function success(position){
        // console.log(position);
        var latval =position.coords.latitude;
        var lngval = position.coords.longitude;
        //vi tri bat dau tren map
        var uluru = new google.maps.LatLng(latval, lngval);//{lat: 10.0309641, Lng:105.76890409999999}
        createMap(uluru);
        placeService(uluru);
    }
    function fail(){
        alert('you can`t allow');
    }
    //create map
    function createMap(uluru){
        map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:uluru,
            zoom:12
        });
        //dia diem tren map
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        searchBox(marker);
    }
    // //tim vi tri tren map
    function searchBox(marker){
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    }

    function createMarker(latlng, icn, name){
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn,
            title: name
        });
    }

    //hien thi dia diem lan can
    function placeService(uluru){
        var request = {
            location: uluru,
            radius: '15500',
            type: ['school']
        };

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);
        function callback(results, status) {

            if(status == google.maps.places.PlacesServiceStatus.OK) {
                for(var i = 0; i < results.length;i++) {
                    var place = results[i];
                    latlng = place.geometry.location;
                    icn ={
                        url: place.icon,
                        anchor: new google.maps.Point(10, 10),
                        scaledSize: new google.maps.Size(10, 17)
                    }
                    name = place.name
                    createMarker(latlng, icn, name);
                }
                console.log(results);
            }
        }
    }
});