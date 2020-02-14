@extends('admin/index')

@section('adminsection')
<h1>Add New Topic</h1>
<div class="row">
	<div class="col-md-6">
		<form method="post">
		  {{ csrf_field() }}
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="name" placeholder="Topic Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <textarea class="form-control" name="description" rows=10 placeholder="description"></textarea>
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