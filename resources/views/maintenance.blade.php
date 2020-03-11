<!DOCTYPE html>
<html lang="en">
<head>
	<title>Maintenance</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{url ("images/favicon.png")}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ("fails/vendor/bootstrap/css/bootstrap.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ("fails/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ("fails/vendor/animate/animate.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ("fails/vendor/select2/select2.min.css")}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset ("fails/css/util.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset ("fails/css/main.css")}}">

<!--===============================================================================================-->
</head>
<body>
	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('fails/images/bg01.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('fails/images/bg02.jpg');"></div>
	</div>

	<div class="flex-col-c-sb size1 overlay1">
		<!--  -->
		<div class="w-full flex-w flex-sb-m p-l-80 p-r-80 p-t-22 p-lr-15-sm">
			<div class="wrappic1 m-r-30 m-t-10 m-b-10">
			<a href="{{url ('maintenance')}}"><img src="{{url ("images/favicon.png")}}" width="32px" height="32px" alt="LOGO"></a>
			</div>

			<div class="flex-w m-t-10 m-b-10">
				<a href="{{url ('logout')}}" class="size2 m1-txt1 flex-c-m how-btn1 trans-04">
					Logout
				</a>
			</div>
		</div>

		<!--  -->
		<div class="flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-120">
			<h3 class="txt-center p-b-10 respon1" width="50%" height="auto" style="font-family: 'Fira Code'; color: white">
				Hallo <b>{{ Auth::user()->nama }}</b>,
			</h3>

			<div class="flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-120">
        <img src="{{url ("images/WCC-LOGO.png")}}"  alt="" width="50%" height="auto">
      </div>

			<h3 class="l1-txt1 txt-center p-b-40 respon1" width="50%" height="auto">
				under construction
			</h3>

      

			{{-- <div class="flex-w flex-c-m cd100">
				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 days">2</span>
					<span class="s1-txt1 where1 p-l-35">Days</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 hours">15</span>
					<span class="s1-txt1 where1 p-l-35">Hours</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 minutes">50</span>
					<span class="s1-txt1 where1 p-l-35">Minutes</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 seconds">39</span>
					<span class="s1-txt1 where1 p-l-35">Seconds</span>
				</div>
			</div> --}}
		</div>

		<!--  -->
		<div class="flex-w flex-c-m p-b-35">
			{{-- <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
				<i class="fa fa-facebook"></i>
			</a> --}}

			<a href="https://instagram.com/widuricc" target="_blank" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
				<i class="fa fa-instagram"></i>
			</a>

			{{-- <a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
				<i class="fa fa-youtube-play"></i>
			</a> --}}
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="{{asset ("fails/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ("fails/vendor/bootstrap/js/popper.js")}}"></script>
	<script src="{{asset ("fails/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ("fails/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ("fails/vendor/countdowntime/moment.min.js")}}"></script>
	<script src="{{asset ("fails/vendor/countdowntime/moment-timezone.min.js")}}"></script>
	<script src="{{asset ("fails/vendor/countdowntime/moment-timezone-with-data.min.js")}}"></script>
	<script src="{{asset ("fails/vendor/countdowntime/countdowntime.js")}}"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 2,
			endtimeHours: 19,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			ex:  timeZone: "Asia/Jakarta"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset ("fails/vendor/tilt/tilt.jquery.min.js")}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset ("fails/js/main.js")}}"></script>

</body>
</html>