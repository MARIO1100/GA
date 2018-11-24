// markers array
var arrayMarker;
// map
var map;

function init(){
    getData();
}

// get data from DB
function getData(){
    // creating http variable
    var http = new XMLHttpRequest();
    // api's url
    var url = "api/getData";
    http.open('GET', url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {
        // if it is ok
        if(http.readyState == 4 && http.status == 200) {
            // convert responseText to JSON
            let response = JSON.parse(http.responseText);

            // iterate incidents
            response.forEach(incident => {
                // add each incident found
                addIncident(incident);
            });
        }
   }
   // consume api
   http.send();
}

// add incident to the map
function addIncident(incident){
    // create data for content from the incident
    let name = incident.name +  ' ' + incident.lastname + "'s accident";
    let cont = {header: name, speed: incident.speed, date: incident.date, title: incident.name + "'s incident"};

    // get incident's content
    let contentInc = setContent(cont);

    // create marker with data getted from incident
    let markerInc = { 
        coords: {lat: parseFloat(incident.latitud), lng: parseFloat(incident.longitud)},
        content: contentInc
    }
    // create marker and add it to map
    addMarker(markerInc);
}

// send data, and transform it to the content for infowindow (for marker)
function setContent(data){
    // create content with HTML code, adding variable data
    let content = '<div id="content">'+
        '<h3 id="firstHeading" class="firstHeading">' +  data.header + '</h3>'+
        '<div id="bodyContent">'+
            '<h6>Speed: ' + data.speed + 'KM/H</h6>' +
            '<h6><b>date:</b> ' + data.date + '</h6>' +
        '</div>'+
    '</div>';

    // return content
    return content;
}

// initializing map
function initMap(){
    init();
    //div
    var div = document.getElementById('map');
    // center focus
    let centerMap = {lat:32.4601702,lng:-116.82541789999999};
    // map options
    var options = {
        zoom: 16,
        center: centerMap
    }
    
    // initialize map
    map = new google.maps.Map(div, options);
}

// Add Marker Function
function addMarker(props){
    // add marker with its parameters
    var marker = new google.maps.Marker({
        position:props.coords,
        map:map,
        title: props.title
    });

    //check if there's content
    if(props.content){
        // creating info window and adding content
        var infoWindow = new google.maps.InfoWindow({
            content:props.content
        });

        // adding click listener to marker
        marker.addListener('click', function(){
            // adding info window
            infoWindow.open(map, marker);
        });
    }
}