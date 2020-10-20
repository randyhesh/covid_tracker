@extends('template.main_template')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Covid Data</h4>
                <ol class="breadcrumb p-0">
                    <li>
                        <a href="#">Covid Tracker</a>
                    </li>
                    <li>
                        <a href="#">Manage Covid Data </a>
                    </li>
                    <li class="active">
                        Add Covid Data
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @include('manage_covid_data.form_fields')

@stop
