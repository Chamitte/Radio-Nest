<?php include "./controleur/c_historique.php"; ?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Opencall</title>
	  <link rel="shortcut icon" href="./vue/img/opencall.ico" type="image/x-icon"/>
<link rel="icon" href="./vue/img/opencall.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./vue/css/foundation.css" />
	<link rel="stylesheet" href="./vue/css/graph.css" />
    <script src="./vue/js/vendor/modernizr.js"></script>
	<script src="./vue/js/foundation/pikaday.js"></script>
	<script src="./vue/js/foundation/foundation.alert.js"></script>
	<script src="./vue/js/foundation/foundation.interchange.js"></script>
	<script type="text/javascript" src="./vue/js/amcharts.js"></script>
	<script type="text/javascript" src="./vue/js/serial.js"></script>
	<script type="text/javascript" src="./vue/js/light.js"></script>
		<script type="text/javascript" src="./vue/js/light1.js"></script>
		<script type="text/javascript" src="./vue/js/light2.js"></script>	
	<script type="text/javascript" src="./vue/js/pie.js"></script>
		<script type="text/javascript" src="./vue/js/dark.js"></script>
		<script type="text/javascript" src="./vue/js/none.js"></script>
		<link rel="stylesheet" href="./vue/css/pikaday.css">
		<script type="text/javascript">
var chart11 = AmCharts.makeChart("chartdiv11", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php echo $chart_1_donnee; ?>],
    "valueAxes": [{
        "unit": "",
        "position": "left",
        "title": "Appel entrant/Appel traite",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "Nombre appel entrant le [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "appel_in"
    }, {
        "balloonText": "Nombre appel traite le [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "appel_ok"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "date",
    "categoryAxis": {
        "gridPosition": "start"
    }

});
var chart1 = AmCharts.makeChart("chartdiv2", {
    "theme": "light1",
    "type": "serial",
    "dataProvider": [<?php echo $chart_2_donnee; ?>],
    "valueAxes": [{
        "unit": "",
        "position": "left",
        "title": "Appel entrant/Appel Abandonne",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "Nombre appel entrant le [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "appel_in"
    }, {
        "balloonText": "Nombre appel abandonne par les clients le [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "appel_nok"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "date",
    "categoryAxis": {
        "gridPosition": "start"
    }

});
var chart6 = AmCharts.makeChart("chartdiv6", {
    "theme": "light2",
    "type": "serial",
    "dataProvider": [<?php echo $chart_6_donnee; ?>],
    "valueAxes": [{
        "unit": "",
        "position": "left",
        "title": "Appel entrant/Appel sans réponses",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "Nombre appel entrant le [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "appel_in"
    }, {
        "balloonText": "Nombre appel sans réponses le [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "appel_sok"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "date",
    "categoryAxis": {
        "gridPosition": "start"
    }

});
var chart3 = AmCharts.makeChart("chartdiv3", {
    "type": "pie",
	"theme": "none",
    "dataProvider": [<?php echo $chart_3_donnee; ?>],
    "valueField": "data",
    "titleField": "appel",
	"colorField": "color",
	"exportConfig":{	
      menuItems: [{
      icon: './vue/img/export.png',
      format: 'png'	  
      }]  
	}	
});

var chart4 = AmCharts.makeChart("chartdiv4", {
    "type": "serial",
    "theme": "none",
     "pathToImages":"./vue/img/",
    "dataProvider": [<?php echo $chart_4_donnee; ?>],
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
        "title": "Appels stats"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<b>[[category]]: [[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "data"
    }],
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "appel",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 45
    },
    "amExport":{}
     
});
  var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "theme": "none",
                "dataDateFormat": "YYYY-MM-DD",
                "pathToImages": "./vue/img/",
                "dataProvider": [<?php echo $chart_5_donnee; ?>],
                "valueAxes": [{
                    "maximum": 15,
                    "minimum": 0,
                    "axisAlpha": 0,
                    "guides": [{
                        "fillAlpha": 0.1,
                        "fillColor": "#FFFFFF",
                        "lineAlpha": 0,
                        "toValue": 10,
                        "value": 0
                    }, {
                        "fillAlpha": 0.1,
                        "fillColor": "#f1b0b0",
                        "lineAlpha": 0,
                        "toValue": 15,
                        "value": 10
                    }]
                }],
                "graphs": [{
                    "bullet": "round",
                    "dashLength": 4,
                    "valueField": "moyenne"
                }],
                "chartCursor": {
                    "cursorAlpha": 0
                },
                "categoryField": "date",
                "categoryAxis": {
                    "parseDates": true
                }
            });
          
</script>
  </head>
  <body>
  <div class="row">
      <div class="large-12 columns">
        <h1>Module OpenCall</h1>
<nav class="top-bar" data-topbar> <ul class="title-area"> 
<li class="name"> <h1><a href="http://opencall.itinet.fr/">OpenCall</a></h1> </li> 
<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>
    
 

 <section class="top-bar-section">
 <ul class="left">
		<li><a href="index.php?menu=recherche">Recherche</a></li>
      <li><a href="index.php?menu=supervision">Supervision</a></li>
	  <li><a href="index.php?menu=stats">Statistiques</a></li>
    </ul>
<ul class="right">
      <li class="has-form"> <a href="index.php?menu=deconnect" class="button">Deconnexion</a> </li>
    </ul>
  </section>
</nav>
          </div> </div>
		  <br>

 <?php include $contenu; ?>
  
  <footer class="row">
<div class="large-12 columns">
<hr>
<div class="row">
<div class="large-6 columns">
<p>© Copyright OpenCall 2014.</p>
</div>

</div>
</div>
</footer>
    <script>

    var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date('2000-01-01'),
        maxDate: new Date('2020-12-31'),
        yearRange: [2000,2020]
    });

    </script>
	<script>
	$(document).foundation('interchange', {
  named_queries : {
    my_custom_query : 'only screen and (max-width: 100px)'
  }
});
</script>
    <script src="./vue/js/vendor/jquery.js"></script>
    <script src="./vue/js/foundation.min.js"></script>
	<script src="./vue/js/foundation/foundation.abide.js"></script>
	
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
