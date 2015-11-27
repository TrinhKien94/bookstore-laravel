@if(count($errors)>0)
	<div id='alert-danger'>
		<div>
			<h1>This your input has {{count($errors)}} errors:</h1>
		</div>
		<ul>
			@foreach($errors->all() as $error)
				<li><h2>{{$error}}</h2></li>
			@endforeach
		</ul>
	</div>
@endif