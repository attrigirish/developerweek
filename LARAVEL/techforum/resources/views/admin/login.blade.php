@extends('admin/base')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form method="post">
		  {{ csrf_field() }}
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="userdetail" placeholder="Display Name/Email/Phone">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="password" class="form-control" name="password" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="submit" class="btn btn-primary btn-lg">
		    </div>
		  </div>
		</form>
	</div>
</div>
@stop