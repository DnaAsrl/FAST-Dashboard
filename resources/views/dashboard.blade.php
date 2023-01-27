@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">FAST Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Fully Automated System for Issuing/Tendering</li>
        </ol>
        <form method="get" class="form-horizontal" action="">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <p class="text-right">Select Announcement Year</p>
                </div>
                <div class="p-2 bd-highlight">
                    <div class="input-group ">
                        <select name="new_year" required class="form-control">
                            @for ($year = date('Y')-1; $year < date('Y') + 10; $year++)
                            <option value="{{$year}}" @if($new_year == $year) selected @endif>{{$year}}</option>
                            @endfor
                        </select>                    
                    </div>
                </div>
                <div class="p-2 bd-highlight">
                    <input type="submit" class="btn btn-primary" style="margin-right: 20px" value="Submit">
                </div>
            </div>
        
            {{-- <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Announcement</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Facilty Information</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Stock Information</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Stock Auction Calendar</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Number of News By Month
                        </div>
                        <div class="card-body chartWithMarkerOverlay">
                            <div id="news_month" style="width:100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Number of News By Type
                        </div>
                        <div class="card-body chartWithMarkerOverlay">
                            <div id="news_type" style="width:100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <p class="text-right">Select Maturity Year</p>
                </div>
                <div class="p-2 bd-highlight">
                    <div class="input-group ">
                        <select name="maturity_year" required class="form-control">
                            @for ($year = date('Y')-1; $year < date('Y') + 10; $year++)
                            <option value="{{$year}}" @if($maturity_year == $year) selected @endif>{{$year}}</option>
                            @endfor
                        </select>                    
                    </div>
                </div>
                <div class="p-2 bd-highlight">
                    <input type="submit" class="btn btn-primary" style="margin-right: 20px" value="Submit">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Number of Stocks (Maturity) By Month
                        </div>
                        <div class="card-body chartWithMarkerOverlay">
                            <div id="stocks_maturity" style="width:100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Number of Facility By Type
                        </div>
                        <div class="card-body chartWithMarkerOverlay">
                            <div id="facility_type" style="width:100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    function drawChart() {

        // news by month
        var newsByMonthdata = google.visualization.arrayToDataTable({!! json_encode($newsByMonth) !!});
        var options = {
            title: 'Number of News By Month'
        };
        var chart = new google.visualization.BarChart(document.getElementById('news_month'));
        chart.draw(newsByMonthdata, options);

        // news by type
        var newsByTypedata = google.visualization.arrayToDataTable({!! json_encode($newsByType) !!});
        var options = {
            title: 'Number of News By Type' 
        };
        var chart = new google.visualization.PieChart(document.getElementById('news_type'));
        chart.draw(newsByTypedata, options);

        // stock maturity
        var stocksMaturitydata = google.visualization.arrayToDataTable({!! json_encode($stocksMaturity) !!});
        var options = {
            title: 'Stocks Maturity By Month'
        };
        var chart = new google.visualization.BarChart(document.getElementById('stocks_maturity'));
        chart.draw(stocksMaturitydata, options);

        // Facility Information By Type
        var facilityTypedata = google.visualization.arrayToDataTable({!! json_encode($facilityType) !!});
        var options = {
            title: 'Facility Information By Type'
        };
        var chart = new google.visualization.PieChart(document.getElementById('facility_type'));
        chart.draw(facilityTypedata, options);


    }

    window.onload = function () {
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
    }
</script>

@endsection