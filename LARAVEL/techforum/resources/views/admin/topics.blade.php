@extends('admin/index')

@section('adminsection')
<h1>Topics</h1>
<a href="/admin/topic/add">Add New Topic</a>
<table class="table">
	<tr>
		<td>Id</td>
		<td>Name</td>
		<td>Description</td>
		<td>Action</td>
	</tr>

	@foreach($topics as $topic)
	<tr>
		<td>{{$topic->topic_id}}</td>
		<td>{{$topic->name}}</td>
		<td>{{$topic->description}}</td>
		<td><a href="/admin/topic/delete/{{$topic->topic_id}}" class="btn btn-primary">Delete</a> <a href="/admin/topic/update/{{$topic->topic_id}}" class="btn btn-primary">Update</a></td>
	</tr>
	@endforeach

</table>
@stop