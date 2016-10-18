<!DOCTYPE html>
<html ng-app="tamasha">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tamasha Water C/O</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/back.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/footer.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://tutahosting.net/wp-content/uploads/2015/01/tutaico.png" type="image/x-icon" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body onload="displayTime()">

<!--[if lte IE 7]>
<p class="browsehappy">Vous utilisez un navigateur <strong>obsolète</strong>. S'il vous plaît <a href="http://browsehappy.com/">Mettez le à jour</a> pour améliorer votre navigation.</p>
<![endif]-->

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<a href="{{ url('/') }}" class = "navbar-brand"><i class="fa fa-home"></i> {{trans('menu.appname')}}</a>
        </div>
        <!-- Main Menu -->
        <ul class="nav navbar-right top-nav">
				<li style="color:#fff; padding-top:16px; padding-right:10px;">
					<span class="fa fa-fw fa-time"></span><span id="datetime"></span>
				</li>
			@if (Auth::guest())
				<li></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/settings') }}"><span class="fa fa-fw fa-gear"></span> {{trans('menu.application_settings')}}</a></li>
						<li class="divider"></li>
						<li><a href="{{ url('/auth/logout') }}"><span class="fa fa-fw fa-power-off"></span> {{trans('menu.logout')}}</a></li>
					</ul>
				</li>
			@endif
        </ul>
        <!-- Sidebar Menu -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                @if (Auth::check())
                    <li id="home">
                        <a href="{{ url('home') }}"><span class="fa fa-fw fa-dashboard"></span> {{trans('menu.dashboard')}}</a>
                    </li>
                    <li id="customers"><a href="{{ url('/customers') }}"><span class="fa fa-fw fa-users"></span> {{trans('menu.customers')}}</a></li>
					<li id="items"><a href="{{ url('/items') }}"><span class="fa fa-fw fa-list"></span> {{trans('menu.items')}}</a></li>
					<li id="item-kits"><a href="{{ url('/item-kits') }}"><span class="fa fa-fw fa-suitcase"></span> {{trans('menu.item_kits')}}</a></li>
					<li id="suppliers"><a href="{{ url('/suppliers') }}"><span class="fa fa-fw fa-truck"></span> {{trans('menu.suppliers')}}</a></li>
					<li id="receivings"><a href="{{ url('/receivings') }}"><span class="fa fa-fw fa-download"></span> {{trans('menu.receivings')}}</a></li>
					<li id="sales"><a href="{{ url('/sales') }}"><span class="fa fa-fw fa-line-chart"></span> {{trans('menu.sales')}}</a></li>
					<li id="reports" class="dropdown">
						<a href="#" data-toggle="collapse" data-target="#reportmenu"><span class="fa fa-fw fa-book"></span> {{trans('menu.reports')}} <span class="fa fa-fw fa-caret-down"></span></a>
						<ul id="reportmenu" class="collapse">
							<li><a href="{{ url('/reports/receivings') }}">{{trans('menu.receivings_report')}}</a></li>
							<li><a href="{{ url('/reports/sales') }}">{{trans('menu.sales_report')}}</a></li>
						</ul>
					</li>
					<li id="employees"><a href="{{ url('/employees') }}"><span class="fa fa-fw fa-male"></span>{{trans('menu.employees')}}</a></li>
                    <li id="log-viewer">
                        <a href="{{ url('/log-viewer') }}"><span class="fa fa-fw fa-eye"></span>{{trans('menu.log-viewer')}}</a>
                    </li>
                    <li id="internal-invoice">
                        <a href="{{ url('/invoices') }}"><span class="fa fa-fw fa-eye"></span>{{trans('menu.internal_invoice')}}</a>
                    </li>
				@else
					<li class="intro">Welcome to Tamasha Water C/O Inventory Management System</li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.page-wrapper -->
	
	<footer class="footer">
	  <div class="contain">
		<p class="text-muted">&copy <script>document.write(new Date().getFullYear())</script>  Tamasha Water C/O. All right reserved.
		</p>
	  </div>
	</footer>

</div>
<!-- /.wrapper -->

<!-- Scripts -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	
	<script>
	function displayTime(){
		var currentDate = new Date();
		var day = currentDate.getDate();
		var month = currentDate.getMonth() + 1;
		var year = currentDate.getFullYear();
		var dayindex = currentDate.getDay();
        var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		var hours = currentDate.getHours();
		var minutes = currentDate.getMinutes();
		var seconds = currentDate.getSeconds();

		if (minutes < 10)
		minutes = "0" + minutes;
	
		if (seconds < 10)
		seconds = "0" + seconds;

		var suffix = "AM";
		if (hours >= 12) {
		suffix = "PM";
		hours = hours - 12;
		}
		if (hours == 0) {
		hours = 12;
		}
		
		var result = ""+days[dayindex]+"   <b>" + day + "/" + month + "/" + year + "</b>   <b>" + hours + ":" + minutes + ":" + seconds + " " + suffix + "</b>";
		document.getElementById('datetime').innerHTML = result;
		
		var t = setTimeout(displayTime, 500);

	}
	</script>
	
	<script>
        $(document).ready(function () {         
		$(function(){
			var current_page_URL = location.href;

			$( "a" ).each(function() {

				if ($(this).attr("href") !== "#") {

					var target_URL = $(this).prop("href");

						if (target_URL == current_page_URL) {
							$('nav a').parents('li, ul').removeClass('active');
							$(this).parent('li').addClass('active');

							return false;
						}
				}
			}); }); });
    </script>
	
</body>
</html>