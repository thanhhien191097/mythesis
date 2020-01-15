<!DOCTYPE html>
<html lang="en">
	<head>
		    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CV Preview</title>
	</head>


	<style>
		

	</style>

	<body>
		@if($showDownload ?? true)
		<div style="text-align: right; margin-bottom: 10px">
			<form action="{{ route('download',$id) }}" method="GET">
				<button class="btn btn-icon btn-warning" type="submit">
				    <i class="fa fa-download"></i> Download PDF
				</button>			
				<input type="hidden" name="name" value="{{ $_GET['name'] }}">
				<input type="hidden" name="email" value="{{ $_GET['email'] }}">
				<input type="hidden" name="job" value="{{ $_GET['job'] }}">
				<input type="hidden" name="age" value="{{ $_GET['age'] }}">
				<input type="hidden" name="address" value="{{ $_GET['address'] }}">
				
			</form>
		</div>
		@endif
		<!-- HEADER -->
		<div class="header">
			<!-- <img src="assets/images/nguyen.png" id="ava" alt=""> -->
			<div class="name" id="name"><?php echo $_GET['name'];?></div>
			<div class="email" id="email"><?php echo $_GET['email'];?></div>
			<div class="job" id="job"><?php echo $_GET['job'];?></div>
			<div class="age" id="age"><?php echo $_GET['age'];?></div>
			<div class="address" id="address"><?php echo $_GET['address'];?></div>
		</div>	
	</body>
</html>