<?php
if(isset($_POST['zipcode']) && is_numeric($_POST['zipcode'])){
    $zipcode = $_POST['zipcode'];
}else{
    $zipcode = 'GTXX0002';
}
$result = file_get_contents('http://weather.yahooapis.com/forecastrss?p='.$zipcode.'&u=c');
$xml = simplexml_load_string($result);
//echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
$xml->registerXPathNamespace('yweather', 'http://xml.weather.yahoo.com/ns/rss/1.0');
$location = $xml->channel->xpath('yweather:location');
if(!empty($location)){
    foreach($xml->channel->item as $item){
        $current = $item->xpath('yweather:condition');
        $forecast = $item->xpath('yweather:forecast');
        $current = $current[0];
        $output = <<<END
            <h1 style="margin-bottom: 0">Clima en {$location[0]['city']}</h1>
            <small>{$current['date']}</small>
            <h2>Condiciones Actuales</h2>
            <p>
            <span style="font-size:72px; font-weight:bold;">{$current['temp']}&deg;C</span>
            <br/>
            <img src="http://l.yimg.com/a/i/us/we/52/{$current['code']}.gif" style="vertical-align: middle;"/>&nbsp;
            {$current['text']}
            </p>
            <h2>Pronostico</h2>
            {$forecast[0]['day']} - {$forecast[0]['text']}. Maximo: {$forecast[0]['high']} Minimo: {$forecast[0]['low']}
            <br/>
            {$forecast[1]['day']} - {$forecast[1]['text']}. Maximo: {$forecast[1]['high']} Minimo: {$forecast[1]['low']}
            </p>
END;
    }
}else{
    $output = '<h1>Ingrese un codigo postal correcto</h1>';
}
?>
<html>
<head>
<title>Analisis y Diseño 2</title>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
}
label {
    font-weight: bold;
}
</style>
</head>
<body>
<form method="POST" action="">
<label>Codigo Postal:</label> <input type="text" name="zipcode" size="8" value="" /><br /><input type="submit" name="submit" value="Buscar Datos" />
</form>
<hr />
<?php echo $output; ?>
</body>
</html>
