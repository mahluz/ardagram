@extends('layouts.varello')
@section('instagram-active','active')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Instagram</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">

	<div class="panel">
		<div class="panel-body">
			<h1 class="inbox-main-heading">Manual Post</h1>
			<form class="form" method="post" action="{{ url('instagram/upload') }}" enctype="multipart/form-data">
				<div class="form-group">
					<label class="label label-default">Caption: </label>
					<input type="text" class="form-control" name="caption">
				</div>
				<div class="form-group">
					<label>Select Photo</label>
					<input type="file" name="photo">
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-default btn-block">Submit</button>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-9">
			<div class="panel">
				<div class="panel-body">
					<div>
			            {{-- <form class="form-inline pull-right">
			                <div class="form-group">
			                    <input type="text" placeholder="Search Inbox..." class="form-control inbox-search-input"><button class="btn btn-transparent btn-transparent-white">Search</button>
			                </div>
			            </form> --}}
			            <h1 class="inbox-main-heading">Auto Post <small>Status 
			            	@if($instagram->status == "running")
			            		<span class="typcn typcn-media-play-outline"> <small>Running</small></span>
			            	@elseif($instagram->status == "stopped")
			            		<span class="typcn typcn-media-stop-outline"> <small>Stopped</small></span>
			            	@endif
			            </small>
			            </h1>
			        </div>
			        <div class="inbox-actions">
			            <form method="post" class="form-inline" action="{{ url('instagram/play') }}">
			            	<div class="form-group">
			            		<input type="number" placeholder="play from" class="form-control" name="run_at">
			            		{{ csrf_field() }}
			            		<button name="status" value="play" class="btn btn-transparent btn-transparent-white btn-sm" type="submit"><span class="typcn typcn-media-play-outline"></span> Play</button>
			            		<button name="status" value="stop" class="btn btn-transparent btn-transparent-white btn-sm" type="submit"><span class="typcn typcn-media-stop-outline"></span> Stop</button>
			            	</div>
			            </form>
			            {{-- <button class="btn btn-transparent btn-transparent-info btn-sm"><span class="fa fa-eye"></span> Mark As Read</button>
			            <button class="btn btn-transparent btn-transparent-warning btn-sm"><span class="fa fa-exclamation-circle"></span> Flag As Important</button>
			            <button class="btn btn-transparent btn-transparent-danger btn-sm"><span class="fa fa-trash"></span> Move To Trash</button>
			            <div class="btn-group pull-right">
			                <button class="btn btn-transparent btn-transparent-white btn-sm"><i class="fa fa-arrow-left"></i></button>
			                <button class="btn btn-transparent btn-transparent-white btn-sm"><i class="fa fa-arrow-right"></i></button>
			            </div> --}}
			        </div>
					<table class="table table-inbox table-vertical-align-middle" id="table">
				        <thead>
				            <tr>
				            	<th>No.</th>
				                {{-- <th>From</th> --}}
				                <th>Caption</th>
				                <th>Photo</th>
				                <th>Action</th>
				                <th>Status</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($photo as $index => $ini)
				        	<tr @if($instagram->run_at == $ini->id) class="table-inbox-row-unread" @endif>
				        		<td>{{ $index+1 }}</td>
				        		<td>{{ $ini->caption }}</td>
				        		<td>
				        			<a href="#" class="typcn typcn-zoom-outline" title="Header" data-toggle="popover" data-content="<img src='{{ url('storage/app/'.$ini->path) }}' class='img-responsive' ></img> Zulhamn"></a>
				        		</td>
				        		<td>
				        			<a href="{{ url('instagram/delete') }}" onclick="event.preventDefault();document.getElementById('delete{{ $ini->id }}').submit()"><span class="fa fa-trash"></span></a>
				        			<form id="delete{{ $ini->id }}" method="post" action="{{ url('instagram/delete') }}">
				        				<input type="hidden" name="id" value="{{ $ini->id }}">
				        				<input type="hidden" name="old_photo" value="{{ $ini->path }}">
				        				{{ csrf_field() }}
				        			</form>
				        		</td>
				        		<td>
				        			<small class="text-muted">{{ $ini->status }}</small>
				        		</td>
				        	</tr>
				        	@endforeach
				            {{-- <tr>
				            	<td>1</td>
				                <td><a href="inbox/view.html">Admin</a></td>
				                <td><a href="inbox/view.html">lorem ipsum dolor sit amet...</a></td>
				                <td>
				                	<a href="#" class="typcn typcn-zoom-outline" title="Header" data-toggle="popover" data-content="<img src='{{ url('public/img/profile.jpg') }}' class='img-responsive' ></img> Zulhamn"></a>
				                </td>
				                <td><span class="fa fa-paperclip"></span></td>
				                <td><small class="text-muted">Sent</small></td>
				            </tr>
				            <tr class="table-inbox-row-unread">
				            	<td>2</td>
				                <td><a href="inbox/view.html">Admin</a></td>
				                <td><a href="inbox/view.html">lorem ipsum dolor sit amet...</a></td>
				                <td>
				                	<a href="#" class="typcn typcn-zoom-outline" title="Header" data-toggle="popover" data-content="<img src='{{ url('public/img/profile.jpg') }}' class='img-responsive' ></img> Zulhamn"></a>
				                </td>
				                <td><span class="fa fa-paperclip"></span></td>
				                <td><small class="text-muted">Uploading...</small></td>
				            </tr>
				            <tr>
				            	<td>3</td>
				                <td><a href="inbox/view.html">Admin</a></td>
				                <td><a href="inbox/view.html">lorem ipsum dolor sit amet...</a></td>
				                <td>
				                	<a href="#" class="typcn typcn-zoom-outline" title="Header" data-toggle="popover" data-content="<img src='{{ url('public/img/profile.jpg') }}' class='img-responsive' ></img> Zulhamn"></a>
				                </td>
				                <td><span class="fa fa-paperclip"></span></td>
				                <td><small class="text-muted">Waiting</small></td>
				            </tr> --}}
				        </tbody>
				    </table>
				</div>
			</div>
		</div>
		{{-- end col lg 9 --}}
		<div class="col-lg-3">
			<div class="panel">
				<div class="panel-heading">
					Add Photo
				</div>
				<div class="panel-body">
					<form class="form" method="post" action="{{ url('instagram/create') }}" enctype="multipart/form-data">
						<div class="form-group">
							<label class="label label-default">Caption: </label>
							<input type="text" class="form-control" name="caption">
						</div>
						<div class="form-group">
							<label class="label label-default">Photo: </label>
							<input type="file" class="form-control" name="photo">
						</div>
						{{ csrf_field() }}
						<button type="submit" class="btn btn-default btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({html:true,trigger:"hover"});
    $("#table").dataTable();
});
</script>
@endsection