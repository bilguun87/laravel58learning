<html>
<head>
	<title>Blade Demo - @yield('title')</title>
</head>
<body>
	<p>
		<h3>This is Layout</h3>
		Layout-ийг extend хийхдээ child хуудас нь section('нэр') гэсэн заалтыг бичдэг. 
	</p>
	<p>
		Layout-ийн <span>@</span>section гэдэг хэсэг.<br>
		@section('demo1')
		<span>@</span>show заалтаар хязгаарлагдах болно<br>
		@show
	</p>
	<div class="container" style="border-color:black; border-style: solid; border-width: 1px;">
		<span>@</span>yield хэсэг.<br>
		@yield('content')
	</div>
	<div>
		<span>@</span>yield-ийн default-ийг шалгах хэсэг
		@yield('demo-default-yield',View::make('blade-tutor.demo-default-yield'))
	</div>
</body>
</html>