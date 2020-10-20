@extends('template.main_template')

@section('content')

    @if(Auth::user())

        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6">
            <h4 class="header-title m-t-0">API List</h4>
            <br>
            <p class="text-muted font-13 m-b-10">
                Use following access token for API authentication
                <br>
                Access Token : <b>{{ Session::get('access_token') }}</b>
            </p>

            <div class="p-20">
                <table class="table table-inverse">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>API Name</th>
                        <th>Method</th>
                        <th>Header</th>
                        <th>Form Data</th>
                        <th>Json Response</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <td>{endpoint}/api/v1/getDailyCasesTotalFigures</td>
                        <td>POST</td>
                        <td>Content-Type: application/json<br>
                            Authorization: Bearer {access_token}
                        </td>
                        <td></td>
                        <td>
                            {
                            "total_confirmed_cases": 2500,
                            "total_deaths": 20,
                            "total_recovered": 1500,
                            "total_suspect_hospitalized": 1010,
                            "daily_confirmed_cases": 30,
                            "daily_deaths": 1,
                            "daily_recovered": 2,
                            "daily_suspect_hospitalized": 140
                            }
                        </td>
                    </tr>

                    <tr>
                        <th>1</th>
                        <td>{endpoint}/api/v1/getCovidProgressForDateRange</td>
                        <td>POST</td>
                        <td>Content-Type: application/json<br>
                            Authorization: Bearer {access_token}
                        </td>
                        <td style="width:20%">
                            start_date(YYYY-MM-DD) <br>
                            end_date(YYYY-MM-DD)
                        </td>
                        <td>
                            {
                            "data_list": [
                            {
                            "date": "2020-10-18",
                            "total_confirmed_cases": 1050,
                            "daily_confirmed_cases": 20
                            },
                            {
                            "date": "2020-10-19",
                            "total_confirmed_cases": 1070,
                            "daily_confirmed_cases": 40
                            }
                            ]
                            }
                        </td>
                    </tr>

                    <tr>
                        <th>1</th>
                        <td>{endpoint}/api/v1/getCovidRecoveriesForDateRange</td>
                        <td>POST</td>
                        <td>Content-Type: application/json<br>
                            Authorization: Bearer {access_token}
                        </td>
                        <td style="width:20%">
                            start_date(YYYY-MM-DD) <br>
                            end_date(YYYY-MM-DD)
                        </td>
                        <td>
                            {
                            "data_list": [
                            {
                            "date": "2020-10-01",
                            "recovery_count": 100
                            },
                            {
                            "date": "2020-10-02",
                            "recovery_count": 150
                            }
                            ]
                            }
                        </td>
                    </tr>

                    <tr>
                        <th>1</th>
                        <td>{endpoint}/api/v1/getDistrictDistribution</td>
                        <td>POST</td>
                        <td>Content-Type: application/json<br>
                            Authorization: Bearer {access_token}
                        </td>
                        <td></td>
                        <td>
                            {
                            "data_list": [
                            {
                            "district": "Colombo",
                            "count": 1000
                            },
                            {
                            "district": "Kaluthara",
                            "count": 500
                            },
                            {
                            "district": "Gampaha",
                            "count": 1500
                            }
                            ]
                            }
                        </td>
                    </tr>

                    <tr>
                        <th>1</th>
                        <td>{endpoint}/api/v1/getGenderWiseBreakdown</td>
                        <td>POST</td>
                        <td>Content-Type: application/json<br>
                            Authorization: Bearer {access_token}
                        </td>
                        <td></td>
                        <td>
                            {
                            "male_count": 1400,
                            "female_count": 500
                            }
                        </td>
                    </tr>

                    <tr>
                        <th>1</th>
                        <td>{endpoint}/api/v1/getAllDailyCases</td>
                        <td>POST</td>
                        <td>Content-Type: application/json<br>
                            Authorization: Bearer {access_token}
                        </td>
                        <td></td>
                        <td>
                            [
                            {
                            "id": 1,
                            "reported_date": "2020-10-18",
                            "detected_province": 'Western',
                            "detected_district": 'Gampaha',
                            "detected_city": 'Minuwangoda',
                            "patient_name": "",
                            "gender": "M",
                            "dob": "1990-10-18",
                            "nationality": "Sri Lankan",
                            "status": "CONFIRMED_CASE",
                            "place_of_death": "",
                            "date_of_death": "",
                            }
                            ]
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>


    @else

        <div class="row">
            <div class="col-xs-3">
            </div>
            <div class="col-xs-5">
                <div class="card-box">
                    <div id="register_view">
                        <h5>Please register to access API Documentation</h5>
                        <br>
                        <div class="row">

                            <form id="register_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">

                                    <div class="col-md-11">
                                        <div class="form-group {{ ($errors->has('email_reg')) ? ' has-error' : '' }}">
                                            <label for="email_reg">Email</label>
                                            <input type="text" class="form-control datepicker" id="email_reg"
                                                   name="email_reg"
                                                   required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-11">
                                        <div
                                            class="form-group {{ ($errors->has('password_reg')) ? ' has-error' : '' }}">
                                            <label for="password_reg">Password</label>
                                            <input type="password" class="form-control" id="password_reg"
                                                   name="password_reg"
                                                   required>
                                        </div>
                                    </div>
                                    <div id="regerror></div>
                                </div>

                                <div class="row padding-top-20">
                                    <div class="col-md-4 padding-top-20 pull-right">
                                        <button type="submit" class="btn btn-info btn-addonc">Register <i
                                                class="fa fa-filter pull-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif

    <script type="text/javascript">

        $('#register_form').on('submit', function (event) {
            event.preventDefault();

            var registerform = new FormData(this);
            $('.form-group').removeClass('has-error');

            $.ajax({
                headers: {'X-CSRF-Token': $(this).find('input[name="_token"]').val()},
                url: '{{ route('register') }}',
                data: registerform,
                dataType: 'json',
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {

                    if (data.code !== 200) {
                        var htmldata = '';
                        $.each(data.error, function (index, val) {
                            htmldata += '<span class="error-item" style="color:red">' + val[0] + '</span><br/>';
                        });
                        $('#regerror').empty().html(htmldata);
                    } else {
                        $('#register_view').html(data.content);
                    }
                },
                error: function (error) {
                    $('#regerror').empty().html('Something went wrong, please try again');
                }
            });

            return false;
        });

    </script>

@stop


