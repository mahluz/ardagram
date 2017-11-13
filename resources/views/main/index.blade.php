@extends('layouts.varello')
@section('dashboard-active','active')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Dashboard</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="widget widget-default widget-fluctuation">
                <header class="widget-header">
                    Monthly Revenue
                    <div class="widget-header-actions">
                        <span class="widget-header-action fa fa-cog"></span>
                        <span data-close-widget class="widget-header-action fa fa-close"></span>
                    </div>
                </header>
                <div class="widget-body">
                    <section class="widget-fluctuation-period">
                        <span class="widget-fluctuation-period-text"><strong>$17,468.45</strong> in <strong>February</strong></span><br>
                        <button class="btn btn-sm btn-transparent-white" type="button"><span class="fa fa-calendar"></span> View Different Month</button>
                    </section>
                    <section class="widget-fluctuation-description">
                        <span class="widget-fluctuation-description-amount text-success">+$3,429.56</span>
                        <span class="widget-fluctuation-description-text">increase on<br>last month</span>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="widget widget-statistic widget-primary">
                <header class="widget-statistic-header">Profit this quarter</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value">$27,294</span>
                    <span class="widget-statistic-description">That's <strong>$2,593 more</strong> than this quarter last year</span>
                    <span class="widget-statistic-icon fa fa-credit-card-alt"></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="widget widget-statistic widget-purple">
                <header class="widget-statistic-header">Closed support cases</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value">59%</span>
                    <span class="widget-statistic-description">That's <strong>12 less</strong> than this time last week</span>
                    <span class="widget-statistic-icon fa fa-support"></span>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    Website Registrations
                    <div class="widget-header-actions">
                        <span class="widget-header-action fa fa-cog"></span>
                        <span data-close-widget class="widget-header-action fa fa-close"></span>
                    </div>
                </header>
                <div class="widget-body widget-body-md">
                    <canvas id="graph-monthly-registrations" class="widget-graph-md"></canvas>
                </div>
            </div>
        </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="hidden-xs hidden-sm">#</th>
                    <th class="hidden-xs hidden-sm">First Name</th>
                    <th class="hidden-xs hidden-sm">Last Name</th>
                    <th>Email</th>
                    <th>Quota</th>
                    <th class="text-right">Manage <span class="hidden-xs hidden-sm">User</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="hidden-xs hidden-sm">1</td>
                    <td class="hidden-xs hidden-sm">Mark</td>
                    <td class="hidden-xs hidden-sm">Smith</td>
                    <td><a href="mailto:marksmith@test.com">marksmith@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="3GB / 10GB used"><span class="piety-pie">3/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">2</td>
                    <td class="hidden-xs hidden-sm">Jim</td>
                    <td class="hidden-xs hidden-sm">Johnson</td>
                    <td><a href="mailto:jimjohnson@test.com">jimjohnson@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="5.63GB / 10GB used"><span class="piety-pie">5.63/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">3</td>
                    <td class="hidden-xs hidden-sm">Harry</td>
                    <td class="hidden-xs hidden-sm">Williams</td>
                    <td><a href="mailto:harrywilliams@test.com">harrywilliams@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="2.56GB / 10GB used"><span class="piety-pie">2.56/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">4</td>
                    <td class="hidden-xs hidden-sm">Bob</td>
                    <td class="hidden-xs hidden-sm">Jones</td>
                    <td><a href="mailto:bobjones@test.com">bobjones@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="0.02GB / 10GB used"><span class="piety-pie">0.02/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">5</td>
                    <td class="hidden-xs hidden-sm">Ryan</td>
                    <td class="hidden-xs hidden-sm">Brown</td>
                    <td><a href="mailto:ryanbrown@test.com">ryanbrown@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="0GB / 10GB used"><span class="piety-pie">0/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">6</td>
                    <td class="hidden-xs hidden-sm">Ben</td>
                    <td class="hidden-xs hidden-sm">David</td>
                    <td><a href="mailto:bendavis@test.com">bendavis@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="6GB / 10GB used"><span class="piety-pie">6/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">7</td>
                    <td class="hidden-xs hidden-sm">Fred</td>
                    <td class="hidden-xs hidden-sm">Miller</td>
                    <td><a href="mailto:fredmiller@test.com">fredmiller@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="9.6GB / 10GB used"><span class="piety-pie">9.6/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">8</td>
                    <td class="hidden-xs hidden-sm">Paul</td>
                    <td class="hidden-xs hidden-sm">Wilson</td>
                    <td><a href="mailto:paulwilson@test.com">paulwilson@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="3.9GB / 10GB used"><span class="piety-pie">3.9/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">9</td>
                    <td class="hidden-xs hidden-sm">James</td>
                    <td class="hidden-xs hidden-sm">Taylor</td>
                    <td><a href="mailto:jamestaylor@test.com">jamestaylor@test.com</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="10GB / 10GB used"><span class="piety-pie">10/10</span></div></td>
                    <td class="text-right"><button class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></button> <button class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></button></td>
                </tr>
            </tbody>
        </table>
    </div>

	</div>
</div>
{{-- end container fluid --}}

@endsection
@section('script')
<script type="text/javascript">
	
</script>
@endsection
