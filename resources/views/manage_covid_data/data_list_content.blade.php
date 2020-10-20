<table class="table" style="width:100%">
    <thead>
    <tr>
        <th>Reported Date</th>
        <th>Gender</th>
        <th>Status</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Nationality</th>
        <th>Actions</th>
    </tr>
    </thead>

    <tbody>

    @foreach($data as $record)
        <tr>
            <td>{{$record->reported_date}}</td>
            <td>{{$record->gender}}</td>
            <td>{{$record->status}}</td>
            <td>{{$record->patient_name}}</td>
            <td>{{$record->dob}}</td>
            <td>{{$record->nationality}}</td>
            <td>
                <a href="javascript:;" data-val="{{ $record->id }}" data-toggle="modal" data-target="#edit_modal" class="btn btn-success btn-round edit-item" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="javascript:;" data-val="{{ $record->id }}" class="btn btn-danger btn-round delete-item-action" title="Delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
    @endforeach

    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit modal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="login_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </tbody>

</table>

<div class="clearfix margin-top-15">
    {{ $data->links() }}
</div>

<script type="text/javascript">

    $('.edit-item').on('click', function(event) {
        event.preventDefault();
        var id =$(this).attr('data-val');

        $.ajax({
            url: '{{ 'edit_record' }}',
            data: 'id='+id,
            dataType: 'json',
            processData: false,
            contentType: false,
            type: 'GET',
            success: function(data){

                if(data.code == 200) {
                    $('.modal-body').empty().html(data.message);
                } else {
                    $('.modal-body').empty().html(data.message);
                }
            },
            error: function(error) {
                $('.modal-body').empty().html('error');
            }
        });
    });

    $('.delete-item-action').on('click', function(event) {

        event.preventDefault();
        if(confirm("Are You sure YOu want to delete this?")){

            var id= $(this).attr('data-val');
            $.ajax({
                headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                url: '{{ route('delete-record') }}',
                data: 'id=' + id,
                dataType: 'json',
                type: 'POST',
                success: function(data){

                    if(data.code != 200) {
                        alert('error');
                    } else {
                        alert('deleted');
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });

            return false;

        }
    });

</Script>
