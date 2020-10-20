@extends('template.main_template')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/datepicker.css')}}">
    <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
    <style>
        .clearfix{
            background-color: white;
        }

        svg{
            max-width: 0%;
        }
    </style>

    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Covid Data</h4>
                <ol class="breadcrumb p-0">
                    <li>
                        <a href="#">Covid Tracker</a>
                    </li>
                    <li>
                        <a href="#">Manage Covid Data </a>
                    </li>
                    <li class="active">
                        Covid Data List
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row clearfix">

        <div class="col-md-12">
            <b>Filter By </b>
        </div>

        <div class="col-md-3">
            <div class="form-group ">
                Status
                <select class="form-control filter" id="filter_status" name="filter_status" required>
                    <option value="">All</option>
                    <option value="CONFIRMED_CASE">confirmed case</option>
                    <option value="SUSPECTED_HOSPITALIZED">Hospitalized</option>
                    <option value="RECOVERED_DISCHARGED">Recovered / Discharged </option>
                    <option value="DIED">Died </option>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group ">
                Reported Date
                <input class="form-control datepicker" id="filter_date" name="filter_date" data-date-format="yyyy-mm-dd" autocomplete="off">
            </div>
        </div>

        <div class="col-md-12" style="margin-bottom: 10px;">
            <button class="btn btn-dark btn-addon clearbutton" type="button" onclick="clearForm()">Clear <i class="fa fa-eraser pull-right"></i></button>
        </div>
    </div>


    <div class="row" style="margin-top:25px;">

        <div class="clearfix col-md-12 padding-top-20">
            <div id="filter_result">
                @include('manage_covid_data.data_list_content')
            </div>
        </div>

    </div>

    <script type="text/javascript">

        $('.datepicker').datepicker({
            autoclose:true,
            endDate: '+0d',
            todayHighlight: true
        }).on('changeDate', function (ev) {
            call_filter();
        });

        $('.filter').on('change', function(event) {
            event.preventDefault();

            call_filter();
        });

        function call_filter() {

            var filter_status = $('#filter_status').val();
            var filter_date = $('#filter_date').val();

            $.ajax({
                url: '{{ route('record_filter') }}',
                data: 'status='+filter_status + '&reported_date=' +filter_date,
                dataType: 'json',
                type: 'GET',
                success: function(data){

                    if(data.code != 200) {
                        alert('error');
                    } else {
                        $('#filter_result').empty().html(data.content);
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });

            return false;
        };

        function clearForm(){
            $('#filter_status').val('').trigger('change');
            $('#filter_date').datepicker('setDate', null);
        }

    </script>
@stop

