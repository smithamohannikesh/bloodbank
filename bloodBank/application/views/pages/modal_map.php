<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
      rel="stylesheet" type="text/css" />

<div id="dialog" style="display: block">
    <div id="dvMap" style="height: 380px; width: 580px;">
    </div>
</div>


<script type="text/javascript">

    $(function () {
        $("#btnShow").click(function () {


            $("#dialog").dialog({
                modal: true,
                title: "Google Map",
                width: 600,
                hright: 450,
                buttons: {
                    Close: function () {
                        $(this).dialog('close');
                    }
                },
                open: function () {
                    var mapOptions = {
                        center: new google.maps.LatLng(19.0606917, 72.83624970000005),
                        zoom: 18,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                   
                    poly = new google.maps.Polyline({
                        strokeColor: '#FF0000',
                        strokeOpacity: 1.0,
                        strokeWeight: 3,
                        map: map,
                    });
                    var path = [marker1.getPosition(), marker2.getPosition()];
                    poly.setPath(path);
                     var map = new google.maps.Map($("#dvMap")[0], mapOptions);
                }
            });
        });
    });
</script>
