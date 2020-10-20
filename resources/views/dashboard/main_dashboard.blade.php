@extends('template.main_template')

@section('content')

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard </h4>
                <ol class="breadcrumb p-0">
                    <li>
                        <a href="#">Covid Tracker</a>
                    </li>
                    <li class="active">
                        Dashboard
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        {{--Total Figures--}}
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-layers pull-xs-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Total Confirmed Cases</h6>
                <h2 class="m-b-20" data-plugin="counterup"
                    style="color:blue">{{ $data['total_figures']['total_confirmed_cases'] }}</h2>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fa fa-universal-access pull-xs-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Deaths</h6>
                <h2 class="m-b-20"><span data-plugin="counterup"
                                         style="color:red">{{ $data['total_figures']['total_deaths'] }}</span></h2>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fa fa-check pull-xs-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Recovered & Discharged</h6>
                <h2 class="m-b-20"><span data-plugin="counterup"
                                         style="color:green">{{ $data['total_figures']['total_recovered'] }}</span></h2>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h6 class="text-muted text-uppercase m-b-20">Suspected & Hospitalized</h6>
                <h2 class="m-b-20" data-plugin="counterup"
                    style="color:mediumpurple">{{ $data['total_figures']['total_suspect_hospitalized'] }}</h2>
            </div>
        </div>
        {{--End Total Figures--}}
    </div>

    <div class="row">
        {{--Progression of COVID-19 Cases--}}
        <div class="col-xs-12 col-lg-12 col-xl-8">
            <div class="card-box" style="height: 420px;">

                <h4 class="header-title m-t-0 m-b-20">Progression of COVID-19 Cases</h4>

                <div class="text-xs-center">
                    <ul class="list-inline chart-detail-list m-b-0">
                        <li class="list-inline-item">
                            <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>Total Confirmed Cases</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Daily Cases</h6>
                        </li>
                    </ul>
                </div>

                <div class="p-20">
                    <div id="simple-line-chart" class="ct-chart ct-golden-section"></div>
                </div>

            </div>
        </div>
        {{--End Progression of COVID-19 Cases--}}

        {{--Daily Figures--}}
        <div class="col-xs-12 col-lg-12 col-xl-4">

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-three">
                    <div class="bg-icon pull-xs-left">
                        <i class="icon-layers"></i>
                    </div>
                    <div class="text-xs-right">
                        <h6 class="text-primary text-uppercase m-b-15 m-t-10">Daily Confirmed Cases</h6>
                        <h2 class="m-b-10"><span
                                data-plugin="counterup">{{ $data['total_figures']['daily_confirmed_cases'] }}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-three">
                    <div class="bg-icon pull-xs-left">
                        <i class="fa fa-universal-access"></i>
                    </div>
                    <div class="text-xs-right">
                        <h6 class="text-pink text-uppercase m-b-15 m-t-10">Daily Deaths</h6>
                        <h2 class="m-b-10"><span
                                data-plugin="counterup">{{ $data['total_figures']['daily_deaths'] }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-three">
                    <div class="bg-icon pull-xs-left">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="text-xs-right">
                        <h6 class="text-success text-uppercase m-b-15 m-t-10">Daily Recovered & Discharged</h6>
                        <h2 class="m-b-10"><span
                                data-plugin="counterup">{{ $data['total_figures']['daily_recovered'] }}</span></h2>
                    </div>
                </div>
            </div>

        </div>
        {{--End Daily Figures--}}
    </div>


    <div class="row">
        {{--Daily Recoveries in Sri Lanka--}}
        <div class="col-xs-12 col-lg-12 col-xl-4">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">Daily Recoveries in Sri Lanka</h4>

                <div id="morris-bar-stacked" style="height: 320px;"></div>

            </div>
        </div>
        {{--End Daily Recoveries in Sri Lanka--}}

        {{--District Distribution--}}
        <div class="col-xs-12 col-lg-12 col-xl-4">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-20">District Distribution</h4>

                <div id="district-morris-bar" style="height: 320px;"></div>

            </div>
        </div>
        {{--End District Distribution--}}

        {{--Gender wise Breakdown--}}
        <div class="col-xs-12 col-lg-12 col-xl-4">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Gender wise Breakdown</h4>

                <div id="morris-donut-example" style="height: 280px;"></div>

                <div class="text-xs-center">
                    <ul class="list-inline chart-detail-list m-b-0">
                        <li class="list-inline-item">
                            <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>Male</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Female</h6>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        {{--End Gender wise Breakdown--}}
    </div>

    <?php
    //PROGRESSION OF COVID-19 CASES
    $progress_data = $data['covid_progress']['data_list'];

    $prg_labels = array();
    $prg_tot_cases = array();
    $prg_cases = array();

    foreach ($progress_data as $rec) {
        array_push($prg_labels, $rec['date']);
        array_push($prg_tot_cases, $rec['total_confirmed_cases']);
        array_push($prg_cases, $rec['daily_confirmed_cases']);
    }
    $prg_labels = json_encode($prg_labels);
    $prg_tot_cases = json_encode($prg_tot_cases);
    $prg_cases = json_encode($prg_cases);

    //DAILY RECOVERIES IN SRI LANKA
    $rec_data = json_encode($data['covid_recoveries']['data_list']);

    //DISTRICT DISTRIBUTION
    $district_data = json_encode($data['district_distribusion']['data_list']);

    //GENDER WISE BREAKDOWN
    $gender_data[] = array('label' => "Male", 'value' => $data['gender_breakdown']['male_count']);
    $gender_data[] = array('label' => "Female", 'value' => $data['gender_breakdown']['female_count']);
    $gender_data = json_encode($gender_data);

    ?>

    <script type="text/javascript">

        $(document).ready(function () {

            //PROGRESSION OF COVID-19 CASES
            var $prgLabels = JSON.parse('<?php echo $prg_labels; ?>');
            console.log($prgLabels);

            var $prgTotCases = JSON.parse('<?php echo $prg_tot_cases; ?>');
            console.log($prgTotCases);
            var $prgCases = JSON.parse('<?php echo $prg_cases; ?>');
            console.log($prgCases);

            new Chartist.Line('#simple-line-chart', {
                labels: $prgLabels,
                series: [
                    $prgTotCases,
                    $prgCases
                ]
            }, {
                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            });

            //DAILY RECOVERIES IN SRI LANKA
            var $stckedData = JSON.parse('<?php echo $rec_data; ?>');
            console.log($stckedData);

            Morris.Bar({
                element: "morris-bar-stacked",
                data: $stckedData,
                xkey: "date",
                ykeys: ["recovery_count"],
                stacked: true,
                labels: ['Recovered Count'],
                hideHover: 'auto',
                barSizeRatio: 0.4,
                resize: true, //defaulted to true
                gridLineColor: '#eeeeee',
                barColors: ['#3db9dc']
            });

            //DISTRICT DISTRIBUTION
            var $distData = JSON.parse('<?php echo $district_data; ?>');
            console.log($distData);

            Morris.Bar({
                element: "district-morris-bar",
                data: $distData,
                xkey: 'district',
                ykeys: ['count'],
                stacked: true,
                labels: ['District'],
                hideHover: 'auto',
                barSizeRatio: 0.4,
                resize: true, //defaulted to true
                gridLineColor: '#eeeeee',
                barColors: ['#1bb99a']
            });

            //GENDER WISE BREAKDOWN
            var $genderData = JSON.parse('<?php echo $gender_data; ?>');
            console.log($genderData);

            Morris.Donut({
                element: 'morris-donut-example',
                data: $genderData,
                resize: true, //defaulted to true
                colors: ['#9261c6', "#ff7aa3"]
            });


        });
    </script>

@stop


