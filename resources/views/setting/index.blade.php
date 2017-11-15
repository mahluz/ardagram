@extends('layouts.varello')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Setting</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>
{{-- end header --}}

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-9">
			<div class="panel">
				<div class="panel-heading">
					Account Form
				</div>
				<div class="panel-body">
					<form class="form" method="post" action="{{ url('setting/update') }}">
						<div class="form-group">
							<label class="label label-default">Username</label>
							<input type="text" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label class="label label-default">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						{{ csrf_field() }}
						<button type="submit" class="btn btn-default btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="panel">
				<div class="panel-body">
					<div class="panel">
						<div class="panel-heading">
							Current Account
						</div>
						<div class="panel-body">
							<label class="label label-default">Username : {{ $instagram->username }}</label>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
{{-- end container fluid --}}
@endsection
@section('script')

@endsection