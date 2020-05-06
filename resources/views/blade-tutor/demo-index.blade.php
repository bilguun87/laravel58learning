@extends('layouts.demo-layout')
@php
$myarray = ['A'=>[1,2,3], 'B'=>2, 'C'=>3];
@endphp
<p style="color: blue;">
Ямар нэгэн section, yield гэх мэтийг зааж өгөөгүй child хуудсын контент
</p>
@section('title','Demo Index хуудас')

@section('demo1')
<div id="parent" style="color: red;">
	@parent
</div>

<p style="color: blue;">
	Layout-ийн <span>@</span>section('demo1')-д утга өгч байна.
	Мөн дээр <span>@</span>parent гэсэн заалт оруулж өгсөн болхоор Layout-ийн <span style="color: red;">улаанаар бичигдсэн</span> хэсэг харагдаж байна хэрэв <span>@</span>parent заалт байхгүй байсан бол Layout-ийн уг хэсэг харагдахгүй энэ контентээр дарагдах байсан.
</p>

<br>
<button onclick="clearParent()">Clear parent</button>
@endsection

@section('content')
<p style="color: blue;">Энэ бол child хуудас. Layout-ийн <span>@</span>yield('content')-д утга өгч байна.</p>
<p>
@component('blade-tutor.demo-alert')
    <strong>Whoops!</strong> Something went wrong!<br>
    Энэ нь Blade-ийн Component&Slot гэсэн хэсгийн demo юм. Олон газар нэгэн хэвийн байдлаар харагдах контентуудад ашиглах боломжтой. Жишээ нь Alert гаргах үед. 
@endcomponent

@componentFirst(['blade-tutor.demo-alert2','blade-tutor.demo-alert'])
    <strong>Whoops!</strong> Something went wrong!<br>
    conponentFirst-ийг ашиглах үед. 
@endcomponent

@component('blade-tutor.demo-multi-component')
	@slot('title')
		Forbidden
	@endslot
    Олон slot ашигласан үед
@endcomponent
</p>
<p>
	<span>@</span>json ашиглан array-г json форматруу хөрвүүлж байна<br>
	@json($myarray) - Энгийн
	<br>
	@json($myarray, JSON_PRETTY_PRINT) - JSON_PRETTY_PRINT ашигласан
</p>
<p> Hello @{{World}}. Энэ жишээнд <span>{</span> тэмдэгийн урд <span>@</span> тэмдэг бичсэн учир хэвээр гарч байна. Үгүй бол { тэмдэгийг Blade нь өөрөөр ашиглах болно. Эсвэл <span>@</span>verbatim заалтыг ашиглаж болно. Энэ нь олон дахин <span>@</span> тэмдэг бичих шаардлагагүй болгоно. Жишээ нь: 
	@verbatim
	{{Hello}} {{World}} {{How}} {{are}} {{you}}
	@endverbatim
</p>
<p><span>@</span>csrf заалт нь csrf token-ийг үүсгэдэг<br>@csrf</p>
<p>
	HTML form нь PUT, PATCH, DELETE хүсэлтүүдийг үүсгэх боломжгүй тул Blade-ийн <span>@</span>method заалтыг ашиглан эдгээр хүсэлтүүдийг үүсгэх боломжтой. Жишээ нь form таг дотор <span>@</span>method('PUT') гэж оруулж өгнө.
</p>
<p><h4>Sub-view</h4>
<span>@</span>include заалтыг ашиглан дэд Blade view дуудах боломжтой.
<span>@</span>includeIf-ийг ашиглавал байхгүй view дуудах үед алдаа гарахгүй байвал зүгээр л хэвлэгдэнэ.
Ямар нэгэн boolean утга дээр үндэслэн view дуудах хэрэгтэй бол <span>@</span>includeWhen(<span>$</span>boolean,'view.name',['variable'=>'value']) -ийг ашиглаж болно.
<br>
@include('blade-tutor.demo-include')
<br>
Хувьсагчтай
@include('blade-tutor.demo-include',['var' => 'PASSED VALUE'])
</p>
<p><h4><span>@</span>each</h4>
	Sub-view -ийг давталтанд оруулж дуудах боломжтой. Эхний хувьсагчинд view-ийн нэр, 2 дахь нь Array хувьсагч, 3 дахь нь array дахь утгыг нэг нэгээр нь view-руу дамжуулж буй хувьсагчийн нэр.
	@php
		$jobs = ['Software Developer','System Engineer'];
	@endphp
	@each('blade-tutor.demo-each',$jobs,'job')
</p>
<p>
	<h4>Stacks</h4>
	Include хийж өөр view-ийг дуудах, эсвэл layoute-ийг extend хийх гэх мэт үед stack-ийг ашиглан тухайн view-ийг нэг газар гаргахгүйгээр зарим хэсгийг нь өөр газар гаргах боломжтой. Доорх жишээ нь өмнөх include-ийн жишээнд ашигласан Viewe-ийн нэг хэсгийг энд хэвлэж байна.(Өмнөх include-ийн жишээг 2 дуудсан тул энэ жишээнд хоёр хоёр хэвлэгдсэн). Нэг Stack-д олон Push хийж болох бөгөөд дарааллын дагуу хэвлэгдэнэ. Гэхдээ prepend-ийг ашигласнаар хамгийн хамгийн эхэнд гаргаж болно.<br>
	@stack('hello')
</p>
@endsection

<script>
function clearParent(){
	document.getElementById("parent").innerHTML = "";
}
</script>