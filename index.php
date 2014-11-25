<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Narrowcasting</title>

    <!-- Bootstrap -->
    <link href="bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom css -->
    <!-- <link href="css/fonts.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">

	<!-- bxSlider CSS file -->
	<link href="lib/jquery.bxslider.css" rel="stylesheet" />


	<link href="css/animate.css" rel="stylesheet">

	<link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <div id="logo-container-bottom" class="centered">
      <!-- <p>Logo BuZa</p> -->
      <img src="img/logo-buza.png" alt="Buitenlandse Zaken"/>

      <div class="header-blue-line"></div>
    </div>
      <div id="headline">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="hp-main-area">
    				<div id="hp-slide-0" class="hp-slide-content" data-id="0">
    					
    					<div class="slide-title start-out-of-screen">
	    					Aantal mensen bereikt in <span>Sanitatie</span> door <br>Nederlandse bijdrage aan projecten
	    				</div>

    					<div class="slide-year-box start-out-of-screen">
    						<div class="slide-year-text">
    							Jaar
    						</div>
    						<div id="slide-0-year-counter" class="slide-year-counter">
    							2004
    						</div>
    					</div>
    					<div class="slide-reached-box start-out-of-screen">
							<div class="slide-reached-text">
    							Behaald
    						</div>
    						<div id="slide-0-reached-counter" class="slide-reached-counter">
    							996,135
    						</div>
    					</div>
    					<div class="slide-goal-box start-out-of-screen">
							<div class="slide-year-text">
    							Milleniumdoel NL 2015
    						</div>
    						<div id="slide-0-goal-counter" class="slide-goal-counter">
    							??????????
    						</div>
    					</div>



    					<?php 
    					for ($i = 0;$i < 8;$i++){
    					?>
    					<div class="bijdrage-<?php echo $i; ?>-box start-out-of-screen">
							<div class="bijdrage-<?php echo $i; ?>-text">
    							
    						</div>
    						<div class="bijdrage-<?php echo $i; ?>-bedrag">
    							
    						</div>
    					</div>
    					<?php
    					}
    					?>
    					
    					<div class="bg-homepage-line"></div>
    					<div class="slide-3-line"></div>


    				</div>
    			</div>
    		</div>
    	</div>
  	</div>

    <footer>
    	<div class="footer-blue-line"></div>
    	<div class="container">
    		
    		<div class="footer-text">
    			<img src="img/rfid.png" width="43" height="43" />
    			Meer informatie over deze projecten? <span>www.webadres.nl</span>
    		</div>

			<!-- <div class="ccounter">
				<input class="knob second" data-width="80" data-min="0" data-max="10" data-displayPrevious=true data-fgColor="#01689b" data-readOnly="true" value="10" data-bgcolor="#eee">
			</div> -->
		</div>
    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/jquery-ui/jquery-ui.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.2.0/js/bootstrap.min.js"></script>
    <!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.min.js"></script>

	<script src="js/jquery.knob.js"></script>
	<script src="js/jquery.ccountdown.js"></script>
	<script src="js/init.js"></script>

		<!-- counter for detail pages -->
	<script src="js/countUp.min.js"></script>
	<script src="js/narrowcasting.js"></script>


<script>


	(function($) {
		$.fn.ccountdown = function(_s) {
			var $this = this;
			var _secondsleft =_s;
			var _zerocount = 0;
			// calling function first time so that it wll setup remaining time
			var _changeTime = function() {

				if (_secondsleft > 0){
					_secondsleft = _secondsleft - 1;
				}

				if (_secondsleft == 0){

					_zerocount++; 
					if(_zerocount == 2){
						ncp.load_next();
						_zerocount = 0;
						_secondsleft = _s - 1;
					}
				}

				var el = $($this);
				var $ss = el.find(".second");
				$ss.val(_secondsleft).trigger("change");
			};
			
			_changeTime();
			setInterval(_changeTime, 1000);
		};
	})(jQuery);


	//enter the count down date using the format year, month, day, time:time
	$(".ccounter").ccountdown(11);

</script>

<script>

	var ncp = null;
	var hps = null;

var homepage = $(function() {

	ncp = new NarrowCasting();
	hps = new HomepageSlider();
	hps.init();

	for (var i = 0;i < 4;i++){
		hps.slides.push(new Slide());	
	}


	var first_counter = null;


	hps.slides[0].chart_data = {
		"2004": 996135,
		"2005": 2048382,
		"2006": 3100629,
		"2007": 8239080,
		"2008": 14252423,
		"2009": 20136638,
		"2010": 25192231,
		"2011": 30834331,
		"2012": 32846054,
		"2013": 35039549
	}

	hps.slides[0].callback = function(){

		$( ".bg-homepage-line" ).animate({ opacity: 1 }, { duration: 2300});

		function next_year(year){
			if (year in hps.slides[0].chart_data){

				// update counters
				if (first_counter == null){
					first_year_counter = new countUp("slide-0-year-counter", 2004, year, 0, 0.5, { useGrouping: false});
					first_year_counter.start();
					first_counter = new countUp("slide-0-reached-counter", 0, hps.slides[0].chart_data[year], 0, 0.5);
					first_counter.start();

				} else {
					first_counter.update(hps.slides[0].chart_data[year]);
					first_year_counter.update(year);
				}

				setTimeout(
				  function(){
				    next_year(parseInt(year) + 1);
				  }, 500);
			} else {
				// finished
			}
		}


		setTimeout(
		  function(){	

		  	$("#hp-slide-0 .slide-title").addClass("one-and-half-seconds animated bounceInLeft");
		    $("#hp-slide-0 .slide-year-box").addClass("two-seconds animated bounceInDown");
		    $("#hp-slide-0 .slide-reached-box").addClass("two-seconds animated bounceInDown");
		    $("#hp-slide-0 .slide-goal-box").addClass("two-seconds animated bounceInDown");
		    $("#hp-slide-0 .slide-title").removeClass("start-out-of-screen");
		    $("#hp-slide-0 .slide-year-box").removeClass("start-out-of-screen");
		    $("#hp-slide-0 .slide-reached-box").removeClass("start-out-of-screen");
		    $("#hp-slide-0 .slide-goal-box").removeClass("start-out-of-screen");

		    setTimeout(
		  		function(){	
		  			next_year(2004);
		  	}, 1000);
		  }, 500);

	}

	hps.slides[0].redraw = function(){
		// just call callback

	}

	hps.slides[0].out = function(){

		
	  	delAnimClass("#hp-slide-0 .slide-title, #hp-slide-0 .slide-year-box, #hp-slide-0 .slide-reached-box, #hp-slide-0 .slide-goal-box");
	  	$("#hp-slide-0 .slide-title, #hp-slide-0 .slide-year-box, #hp-slide-0 .slide-reached-box, #hp-slide-0 .slide-goal-box").addClass("bounceOutLeft");

	    setTimeout(
	  		function(){
	  			hps.go_to(1);
	  	}, 3000);
	}

	hps.slides[1].chart_data = {
		"2004": 62425,
		"2005": 718183,
		"2006": 1902129,
		"2007": 4853505,
		"2008": 8124033,
		"2009": 12391373,
		"2010": 15681685,
		"2011": 17983469,
		"2012": 20280430,
		"2013": 24300615
	}

	hps.slides[1].callback = function(){

		$(".slide-title").html("Aantal mensen bereikt in <span>Drinkwater</span> door <br>Nederlandse bijdrage aan projecten");
		$(".slide-title").css("color", "#638D02");
		$(".slide-year-box").css("background-image", "url('img/slide-1-year-box.png')");
		$(".slide-reached-box").css("background-image", "url('img/slide-1-reached-box.png')");
		$(".slide-goal-box").css("background-image", "url('img/slide-1-goal-box.png')");
		$("#slide-0-goal-counter").html("50,000,000");
		$("#slide-0-reached-counter").html("62,425");
		$("#slide-0-year-counter").html("2004");

		function next_year(year){

			if (year in hps.slides[1].chart_data){

				// update counters
				first_counter.update(hps.slides[1].chart_data[year]);
				first_year_counter.update(year);

				setTimeout(
				  function(){
				    next_year(parseInt(year) + 1);
				  }, 500);
			} else {
				// finished
			}
		}
		

		setTimeout(
		  function(){
		  	delAnimDurationClass("#hp-slide-0 .slide-title, #hp-slide-0 .slide-year-box, #hp-slide-0 .slide-reached-box, #hp-slide-0 .slide-goal-box");
		  	delAnimClass("#hp-slide-0 .slide-title, #hp-slide-0 .slide-year-box, #hp-slide-0 .slide-reached-box, #hp-slide-0 .slide-goal-box");		  	
		    $("#hp-slide-0 .slide-title").addClass("one-and-half-seconds bounceInLeft");
		    $("#hp-slide-0 .slide-year-box").addClass("two-seconds bounceInUp");
		    $("#hp-slide-0 .slide-reached-box").addClass("one-and-half-seconds bounceInUp");
		    $("#hp-slide-0 .slide-goal-box").addClass("two-seconds bounceInUp");
		    setTimeout(
		  		function(){	
		  			next_year(2004);
		  	}, 1000);
		  }, 500);

	}

	hps.slides[1].out = function(){
		// move counters to 0
		delAnimClass("#hp-slide-0 .slide-title, #hp-slide-0 .slide-year-box, #hp-slide-0 .slide-reached-box, #hp-slide-0 .slide-goal-box");
	  	$("#hp-slide-0 .slide-title, #hp-slide-0 .slide-year-box, #hp-slide-0 .slide-reached-box, #hp-slide-0 .slide-goal-box").addClass("bounceOutLeft");

	    setTimeout(
	  		function(){
	  			hps.go_to(1);
	  	}, 3000);
	};




	hps.slides[2].chart_data = [
		{"name": "Programma’s", "value": "€ 415.211.095"},
		{"name": "Multilateraal generieke bijdragen", "value": "€ 162.029.000"},
		{"name": "Multilateraal programma’s", "value": "€ 190.064.456"},
		{"name": "ORET/ORIO/FMO", "value": "€ 73.336.594"},
		{"name": "PPP", "value": "€ 168.500.000"},
		{"name": "NGO's", "value": "€ 110.943.023"},
		{"name": "Structurele Macrosteun Sanitair", "value": "€ 16.526.700"},
		{"name": "Totale bijdrage", "value": "€ 1.136.610.868"}
	];

	hps.slides[2].callback = function(){

		$(".slide-title").html("Totale bijdrage Nederland 2004-2014<br><span>programmering Sanitatie</span>");
		$(".slide-title").css("color", "#405E64");
		$( ".bg-homepage-line" ).animate({ opacity: 0 }, { duration: 2300});
		$( ".slide-3-line" ).animate({ opacity: 1 }, { duration: 2300});

		// set data in divs
		for (var i = 0;i < 8;i++){

			$(".bijdrage-"+i+"-text").html(hps.slides[2].chart_data[i].name);
			$(".bijdrage-"+i+"-bedrag").html(hps.slides[2].chart_data[i].value);
		}


		setTimeout(
		  function(){		  	
		    delAnimDurationClass(".slide-title");
			delAnimClass(".slide-title");
		  	$("#hp-slide-0 .slide-title").addClass("one-and-half-seconds bounceInLeft");

		  	$(".bijdrage-0-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-1-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-2-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-3-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-4-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-5-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-6-box").addClass("animated two-seconds zoomInUp");
		  	$(".bijdrage-7-box").addClass("animated one-and-half-seconds zoomIn");
		  	$(".bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box").removeClass("start-out-of-screen");

		  }, 500);

	}

	hps.slides[2].out = function(){
		// move counters to 0
		delAnimDurationClass(".slide-title, .bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box");
		delAnimClass(".slide-title, .bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box");
	  	$(".bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box").addClass("zoomOutDown");
		$(".slide-title").addClass("bounceOutLeft");
	  	setTimeout( function(){ hps.go_to(2); }, 1500);
	};




	hps.slides[3].chart_data = [
		{"name": "Bilaterale programma’s", "value": "€ 593.110.543 "},
		{"name": "Multilateraal generieke bijdragen", "value": "€ 162.029.000"},
		{"name": "Multilateraal programma’s", "value": "€ 114.205.656"},
		{"name": "ORET/ORIO/FMO", "value": "€ 554.433.715"},
		{"name": "PPP", "value": "€ 185.862.346"},
		{"name": "NGO's", "value": "€ 102.489.411"},
		{"name": "Structurele Macrosteun Drinkwater", "value": "€ 24.790.050"},
		{"name": "Totale bijdrage", "value": "€ 1.736.920.721"}
	];

	hps.slides[3].callback = function(){

		$(".slide-title").html("Totale bijdrage Nederland 2004-2014<br><span>programmering Drinkwater</span>");
		$(".slide-title").css("color", "#405E64");
		$( ".bg-homepage-line" ).animate({ opacity: 0 }, { duration: 2300});
		$( ".slide-3-line" ).animate({ opacity: 1 }, { duration: 2300});

		// set data in divs
		for (var i = 0;i < 8;i++){

			$(".bijdrage-"+i+"-text").html(hps.slides[3].chart_data[i].name);
			$(".bijdrage-"+i+"-bedrag").html(hps.slides[3].chart_data[i].value);
		}

		setTimeout(
		  function(){		  	
		    delAnimDurationClass(".slide-title, .bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box");
			delAnimClass(".slide-title, .bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box");
	  	
		  	$("#hp-slide-0 .slide-title").addClass("one-and-half-seconds bounceInLeft");

		  	$(".bijdrage-0-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-1-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-2-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-3-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-4-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-5-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-6-box").addClass("two-seconds zoomInUp");
		  	$(".bijdrage-7-box").addClass("one-and-half-seconds zoomIn");

		  }, 500);

	}

	hps.slides[3].out = function(){

		delAnimDurationClass(".slide-title, .bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box");
		delAnimClass(".slide-title, .bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box");
	  	$(".bijdrage-0-box, .bijdrage-1-box, .bijdrage-2-box, .bijdrage-3-box, .bijdrage-4-box, .bijdrage-5-box, .bijdrage-6-box, .bijdrage-7-box").addClass("zoomOutDown");
	  	$(".slide-title").addClass("bounceOutLeft");
	  	$( ".slide-3-line" ).animate({ opacity: 0 }, { duration: 2300, complete: function(){
	  		setTimeout( function(){ window.location = "overzicht.php"; }, 200);
	  	}});
	  	
	};



	hps.go_to(0);

});











</script>
  </body>
</html>