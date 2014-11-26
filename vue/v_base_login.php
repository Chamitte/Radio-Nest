<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Opencall</title>
	   <link rel="shortcut icon" href="./vue/img/opencall.ico" type="image/x-icon"/>
<link rel="icon" href="./vue/img/opencall.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./vue/css/foundation.css" />
    <script src="./vue/js/vendor/modernizr.js"></script>
	<script src="./vue/js/foundation/pikaday.js"></script>
	<script src="./vue/js/foundation/foundation.alert.js"></script>
	<script src="./vue/js/foundation/foundation.interchange.js"></script>
		<link rel="stylesheet" href="./vue/css/pikaday.css">
  </head>
  <body>

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