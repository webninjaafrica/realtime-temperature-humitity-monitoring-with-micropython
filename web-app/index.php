<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<title>MAGOCHI-1-Green-house</title>
	<link href="jquery.simplegauge.css" type="text/css" rel="stylesheet">

<style>
@font-face {
    font-family: 'Digital Dream Skew Narrow';
    src: URL('digital-dream.skew-narrow.ttf') format('truetype');
}
</style>
</head>
<body>
	
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    MY FARM
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Sensors</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Greenhouse</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Soil Moisture [focus] </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Nutrients</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Water Usage</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Weather</a>
    </li>
  </ul>
</nav>

	<div class="container-fluid">
		<div class="row" style="margin-top: 4px;background: rgba(255, 250, 240,.87);">
			<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4" style="box-shadow: 1px 1px 2px 1px black; border: 1px solid grey;">
				<div id="greenhouse1"></div>
			</div>

			<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"  style="box-shadow: 1px 1px 2px 1px black; border: 1px solid grey;">
				<h4>Temperature<sup>o</sup>C</h4>
				<div id="greenhouse" style="width:100%;max-width:700px"></div>
			</div>
			<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"  style="box-shadow: 1px 1px 2px 1px black; border: 1px solid grey;">
				<h4>Humidity</h4>
				<div id="greenhouse2" style="width:100%;max-width:700px"></div>
			</div>
		</div>
	</div>
	<style>
#greenhouse,#greenhouse2,#greenhouse1{ width:  16em; height: 16em; }
</style>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
<script src="jquery.simplegauge.js" type="text/javascript"></script>




<script>
var xValues = ["Temperature", "Humidity"];

$.ajax({
	url: "bg.php",
	dataType: "JSON",
	success: function(ff){
		//alert(typeof(ff));
		resp=ff;
		yValues=[resp['temperature'],resp['humidity']];

		$('#greenhouse').simpleGauge({
    value: yValues[0],
    min:    0,
    max:    70,

    type:   'analog digital', // enable one or the other, or both
    container: {
      scale:  100,            // scale of gauge, in percent
      style:  'background: #ddd; background: linear-gradient(335deg, #ddd 0%, #fff 30%, #fff 50%, #bbb 100%); border-radius: 1000px; border: 5px solid #bbb;'
    },
    title: {
      text:   'HUMIDITY ',
      style:  'color: #555; font-size: 20px; padding: 10px;'
    },
    digital: {
      text:   '{value.3}', // value with number of decimals
      style:  'color: auto; font-size: 35px;'
    },
    analog: {
      minAngle:   -150,
      maxAngle:   150
    },
    labels: {
      text:   '{value}',
      count:  7,
      scale:  73,
      style:  'font-size: 20px;'
    },
    ticks: {
      count:  14,
      scale1: 84,
      scale2: 93,
      style:  'width: 2px; color: #999;'
    },
    subTicks: {
      count:  5,
      scale1: 93,
      scale2: 96,
      style:  'width: 1px; color: #bbb;'
    },
    bars: {
      scale1: 88,
      scale2: 94,
      style:  '',
      colors: [
        [ 0,   '#666666', 91, 92 ],
        [ 1.0, '#378618', 0, 0 ],
        [ 5.0, '#ffa500', 0, 0 ],
        [ 6.5, '#dd2222', 0, 0 ]
      ]
    },
    pointer: {
      scale: 95,
      //shape: '2,100 -2,100 ...', // x,y coordinates for custom shape
      style: 'color: #ee0; opacity: 0.5; filter: drop-shadow(-3px 3px 2px rgba(0, 0, 0, .7));'
    }
  });
		//=========================

  $('#greenhouse2').simpleGauge({ value: 1.2 });
  setTimeout(function() {
    $('#greenhouse2').simpleGauge('setValue', yValues[1]);
  }, 100);
		
	}
});

setTimeout(function(){
	$.ajax({
	url: "bg.php",
	dataType: "JSON",
	success: function(ff){
		//alert(typeof(ff));
		resp=ff;
		yValues=[resp['temperature'],resp['humidity']];
		/*$('#greenhouse').simpleGauge({ value: 3.2 });
  setTimeout(function() {
    $('#greenhouse').simpleGauge('setValue', yValues[0]);
  }, 1000); */


  //--------------------------------------------------------------


  $('#greenhouse').simpleGauge({
    value: yValues[0],
    min:    0,
    max:    70,

    type:   'analog digital', // enable one or the other, or both
    container: {
      scale:  100,            // scale of gauge, in percent
      style:  'background: #ddd; background: linear-gradient(335deg, #ddd 0%, #fff 30%, #fff 50%, #bbb 100%); border-radius: 1000px; border: 5px solid #bbb;'
    },
    title: {
      text:   'HUMIDITY ',
      style:  'color: #555; font-size: 20px; padding: 10px;'
    },
    digital: {
      text:   '{value.2}', // value with number of decimals
      style:  'color: auto; font-size: 35px;'
    },
    analog: {
      minAngle:   -150,
      maxAngle:   150
    },
    labels: {
      text:   '{value}',
      count:  7,
      scale:  73,
      style:  'font-size: 20px;'
    },
    ticks: {
      count:  14,
      scale1: 84,
      scale2: 93,
      style:  'width: 2px; color: #999;'
    },
    subTicks: {
      count:  5,
      scale1: 93,
      scale2: 96,
      style:  'width: 1px; color: #bbb;'
    },
    bars: {
      scale1: 88,
      scale2: 94,
      style:  '',
      colors: [
        [ 0,   '#666666', 91, 92 ],
        [ 1.0, '#378618', 0, 0 ],
        [ 5.0, '#ffa500', 0, 0 ],
        [ 6.5, '#dd2222', 0, 0 ]
      ]
    },
    pointer: {
      scale: 95,
      //shape: '2,100 -2,100 ...', // x,y coordinates for custom shape
      style: 'color: #ee0; opacity: 0.5; filter: drop-shadow(-3px 3px 2px rgba(0, 0, 0, .7));'
    }
  });





  //--------------------------------------------------------------------

  $('#greenhouse2').simpleGauge({ value: 1.2 });
  setTimeout(function() {
    $('#greenhouse2').simpleGauge('setValue', yValues[1]);
  }, 500);
		

	}
});
},1000);


</script>
</html>