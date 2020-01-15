<!DOCTYPE html>
<html lang="en">
	<head>
		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		    <title>Document</title>

	    <!-- <link rel="stylesheet" href="assets/fonts"> -->    
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link href="https://cdn.remixicon.com/releases/v2.0.0/remixicon.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
	     <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css">
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		 <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
	</head>


	<style>
		@import "https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700&display=swap";

		
		body{
			font-family: Nunito Sans;
		}

		.name{
			font-size: 28px;
			color: #ffffff;
			text-transform: uppercase;
			font-weight: 700;
			margin-top: 16px;
		}

		.quote{
			font-size: 16px;
			color: #ffffff;
			font-weight: 500;
		}

		.quote-mark{
			color: #f4910c;
			font-size: 32px;
			font-weight: 700;
		}



		img{
			width: 200px;
		}

		.header{
			padding: 16px 0px;
			height: auto;
			background-color: #181818;
			text-align: center;
		}	

	</style>

	<body>
<!--  -->
		<!-- HEADER -->
		<div class="header">
			<img src="assets/images/nguyen.png" id="ava" alt="">
			<div class="name" id="fname"><?php echo $fname??'';?></div>
			<div class="quote" id="quote">
				<span class="quote-mark">"</span>
				<span><?php echo $quote??'';?></span>
				<span class="quote-mark">"</span>

			</div>
		</div>	


		<div style="text-align:center">
			
			
			<div class="text-h2" id="phone"><?php echo $phone??'';?></div>
			<div class="text-h3" id="email"><?php echo $email??'';?></div>
		</div>
	</body>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
</html>