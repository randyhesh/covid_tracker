<link rel="stylesheet" href="{{ URL::asset('css/datepicker.css')}}">
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>

<form id="{{ (isset($edit_view))? 'covid_data_form_update' : 'covid_data_form' }}" action="{{ URL::Route($action) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="id" name="id" value="{{ (isset($edit_view))? $covid_record->id: '' }}">

    <div id="messages" class="col-md-12" styte="color:red">
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('reported_date')) ? ' has-error' : '' }}">
                <label for="reported_date">Reported Date</label>
                <input type="text" class="form-control datepicker" id="reported_date" name="reported_date" data-date-format="yyyy-mm-dd" value="{{ (isset($covid_record))? $covid_record['reported_date'] : '' }}" required autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('detected_province_id')) ? ' has-error' : '' }}">
            <label for="detected_province_id">Reported Province</label>
            <select class="form-control" id="detected_province_id" name="detected_province_id">
                <option value="">select</option>
                <option value="1" {{ (isset($covid_record) && ($covid_record->detected_province_id == '1'))? 'selected' : '' }}>Western</option>
                <option value="2" {{ (isset($covid_record) && ($covid_record->detected_province_id == '2'))? 'selected' : '' }}>Eastern</option>
                <option value="3" {{ (isset($covid_record) && ($covid_record->detected_province_id == '3'))? 'selected' : '' }}>South</option>
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('detected_district_id')) ? ' has-error' : '' }}">
            <label for="detected_district_id">Reported District</label>
            <select class="form-control" id="detected_district_id" name="detected_district_id">
                <option value="">select</option>
                <option value="1" {{ (isset($covid_record) && ($covid_record->detected_district_id == '1'))? 'selected' : '' }}>Gampaha</option>
                <option value="2" {{ (isset($covid_record) && ($covid_record->detected_district_id == '2'))? 'selected' : '' }}>Kaluthara</option>
                <option value="3" {{ (isset($covid_record) && ($covid_record->detected_district_id == '3'))? 'selected' : '' }}>Colombo</option>
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('detected_city_id')) ? ' has-error' : '' }}">
            <label for="detected_city_id">Reported City</label>
            <select class="form-control" id="detected_city_id" name="detected_city_id">
                <option value="">select</option>
                <option value="1" {{ (isset($covid_record) && ($covid_record->detected_city_id == '1'))? 'selected' : '' }}>Colombo</option>
                <option value="2" {{ (isset($covid_record) && ($covid_record->detected_city_id == '2'))? 'selected' : '' }}>Minuwangoda</option>
                <option value="3" {{ (isset($covid_record) && ($covid_record->detected_city_id == '3'))? 'selected' : '' }}>Katunayaka</option>
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('patient_name')) ? ' has-error' : '' }}">
            <label for="patient_name">Patient Name</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{ (isset($covid_record))? $covid_record->patient_name : '' }}" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('gender')) ? ' has-error' : '' }}" >
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="">select</option>
                <option value="M" {{ (isset($covid_record) && ($covid_record->gender == 'M'))? 'selected' : '' }}>Male</option>
                <option value="F" {{ (isset($covid_record) && ($covid_record->gender == 'F'))? 'selected' : '' }}>Female</option>
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('dob')) ? ' has-error' : '' }}">
            <label for="dob">DOB</label>
            <input type="text" class="form-control datepicker" id="dob" name="dob" value="{{ (isset($covid_record))? $covid_record->dob : '' }}" data-date-format="yyyy-mm-dd" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('createddate')) ? ' has-error' : '' }}">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="nationality" name="nationality">
                <option value="Sri_Lankan" {{ (isset($covid_record) && ($covid_record->nationality == 'Sri_Lankan'))? 'selected' : '' }}>Sri Lankan</option>
                <option value="Indian" {{ (isset($covid_record) && ($covid_record->nationality == 'Indian'))? 'selected' : '' }}>Indian</option>
                <option value="American" {{ (isset($covid_record) && ($covid_record->nationality == 'American'))? 'selected' : '' }}>American</option>
                <option value="Other" {{ (isset($covid_record) && ($covid_record->nationality == 'Other'))? 'selected' : '' }}>American</option>
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('createddate')) ? ' has-error' : '' }}">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="CONFIRMED_CASE" {{ (isset($covid_record) && ($covid_record->status == 'CONFIRMED_CASE'))? 'selected' : '' }}>confirmed case</option>
                <option value="SUSPECTED_HOSPITALIZED" {{ (isset($covid_record) && ($covid_record->status == 'SUSPECTED_HOSPITALIZED'))? 'selected' : '' }}>Hospitalized</option>
                <option value="RECOVERED_DISCHARGED" {{ (isset($covid_record) && ($covid_record->status == 'RECOVERED_DISCHARGED'))? 'selected' : '' }}>Recovered / Discharged </option>
                <option value="DIED" {{ (isset($covid_record) && ($covid_record->status == 'DIED'))? 'selected' : '' }}>Died </option>
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('date_of_death')) ? ' has-error' : '' }}">
            <label for="date_of_death">Date of Death</label>
            <input type="text" class="form-control datepicker" id="date_of_death" name="date_of_death" value="{{ (isset($covid_record))? $covid_record->date_of_death : '' }}" data-date-format="yyyy-mm-dd" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('place_of_death')) ? ' has-error' : '' }}">
            <label for="place_of_death">Place of Death</label>
            <input type="text" class="form-control" id="place_of_death" name="place_of_death" value="{{ (isset($covid_record))? $covid_record->place_of_death : '' }}" >
            </div>
        </div>

    </div>

    <div class="row padding-top-20">
        <div class="col-md-4 padding-top-20 pull-right">
            <button class="btn btn-info btn-addonc">{{ (isset($edit_view))? 'Update' : 'Save' }} <i class="fa fa-filter pull-right"></i></button>
            @if(!isset($edit_view))
            <button class="btn btn-dark btn-addon clearbutton" type="button" onclick="clearForm()">Clear <i class="fa fa-eraser pull-right"></i></button>
            @endif
        </div>
    </div>
</form>

<script type="text/javascript">

    $(document).ready(function() {

        $('.datepicker').datepicker({
            autoclose:true,
            todayHighlight:true,
            defaultDate:new Date()
        });
    });

    $('#covid_data_form').on('submit', function(event) {
        event.preventDefault();

        var newform = new FormData(this);
        var url_path = $(this).attr('action');
        var el = $(this);
        $('.form-group').removeClass('has-error');

        $.ajax({
            headers: { 'X-CSRF-Token' : $(this).find('input[name="_token"]').val() },
            url: url_path,
            data: newform,
            dataType: 'json',
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){

                if(data.code == 200) {
                    clearForm();
                    $('#messages').empty().html(data.message);
                } else if(data.code == 401) {
                    var htmldata = '';
                    $.each(data.error, function (index, val) {
                        htmldata += '<span class="error-item" style="color:red">' + val[0] + '</span><br/>';
                    });
                    $('#messages').empty().html(htmldata);
                } else {
                    $('#messages').empty().html(data.message);
                }
            },
            error: function(error) {
                $('#messages').empty().html('error');
            }
        });

        return false;
    });

    function clearForm(){
        $('#messages').empty().html('');
        $("#covid_data_form").trigger('reset')
    }

    $('#covid_data_form_update').on('submit', function(event) {
        event.preventDefault();

        var newform = new FormData(this);
        var url_path = $(this).attr('action');
        var el = $(this);
        $('.form-group').removeClass('has-error');

        $.ajax({
            headers: { 'X-CSRF-Token' : $(this).find('input[name="_token"]').val() },
            url: url_path,
            data: newform,
            dataType: 'json',
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){

                if(data.code == 200) {
                    $('#messages').empty().html(data.message);
                    $('#edit_modal').modal('toggle');
                } else if(data.code == 401) {
                    var htmldata = '';
                    $.each(data.error, function (index, val) {
                        htmldata += '<span class="error-item" style="color:red">' + val[0] + '</span><br/>';
                    });
                    $('#messages').empty().html(htmldata);
                } else {
                    $('#messages').empty().html(data.message);
                }
            },
            error: function(error) {
                $('#messages').empty().html('error');
            }
        });

        return false;
    });

</script>
