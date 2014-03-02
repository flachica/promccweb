<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Seleccione el punto en el mapa</title>
    <link rel="stylesheet" href="styles/map.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
    <script type="text/javascript" charset="utf-8" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="jquery.input_hint.js" type="text/javascript" charset="utf-8"></script>
    <script src="map.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/map.css" type="text/css" media="screen" charset="utf-8"/>
    
</head>

<body>

<div id="wrapper">
    <div id="map_canvas"></div>
    <form id="search_map_form" class="clearfix">
        <input type="text" name="search_map" value="" title="Indique Dirección, Ciudad o Código Postal" id="search_map"/>
        <input style="display: none;" type="submit" name="search_address_submit" value="Busque"
               id="search_address_submit"/>
        <input type="hidden" name="long" value="" id="long"/>
        <input type="hidden" name="lat" value="" id="lat"/>
        <a class="btn btn-primary" href="javascript:;" id="search_address_button">Busque dirección</a>
        <a class="btn btn-inverse" href="javascript:;" id="select_coords_button">Seleccione Coordenadas</a>

        <p class="field_tip">Puede buscar indicando la dirección o arrastrando el punto del mapa.</p>

        <p id="on_coords"><span id="on_lat"></span>, <span id="on_long"></span></p>
    </form>
</div>

</body>
</html>
