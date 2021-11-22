@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Opps!</strong> Alguns campos precisam da sua atenção.<br><br>
        <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }}</li>
        @endforeach
            <ul>
    </div>
 @endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{!! Session::get('success') !!}
</div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {!! Session::get('warning') !!}
    </div>
@endif