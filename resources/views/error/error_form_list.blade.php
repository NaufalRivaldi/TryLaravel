@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $txt)
			<li>{{$txt}}</li>
		@endforeach
	</ul>
@endif