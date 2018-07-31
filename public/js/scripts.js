/**
 * scripts.js
 *
 *EWEant
 *
 * Global JavaScript.
*/
//make pic div visible only if there is a pic
function hidePicDiv() {
    document.getElementById('pic_info').style.visibility='hidden';
    if (document.getElementById('pic_info').innerHTML == "")
    {
        document.getElementById('bus_pic').style.display='none';
    }
    else
    {
         document.getElementById('bus_pic').style.visibility='visible';
    }
    }
    
//insert google map
function googMap() {
 var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 15,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
  }

  function codeAddress() {
    var address = document.getElementById('add').innerHTML + " " + document.getElementById('city').innerHTML;
    //alert(address);
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
 initialize();
 codeAddress();
}

  
			        function good(){
                       document.getElementById('buttonChoice').style.display='none';
                       document.getElementById('bad').style.display='none';
                       document.getElementById('good').style.display='block';

			        }
			        function bad(){
                       document.getElementById('buttonChoice').style.display='none';
                       document.getElementById('good').style.display='none';
                       document.getElementById('bad').style.display='block';

			        }