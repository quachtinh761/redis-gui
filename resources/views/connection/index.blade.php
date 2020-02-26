@extends('layout.master')

@section('content')
<h4>Bootstrap Snipp for Datatable</h4>
<div class="table-responsive">
    <div class="text-right">
        <button type="button" onclick="addEditModal('', '')" class="btn btn-primary">Add new key</button>
    </div>
    <table class="table table-striped" id="listTable">
        <thead>
        <tr>
            <th></th>
            <th>Key</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@include('redis.addEditModal')
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#listTable').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "{{ Route('redis.get') }}",
            "columns": [
                {
                    "render": function ( data, type, row ) {
                        return `<input type="checkbox" value="key[${row['key']}]">`;
                    },
                },
                {"data": "key",},
                {"data": "value",},
                {
                    "target": -1,
                    "render": function ( data, type, row ) {
                        let html = `<a class="glyphicon glyphicon-pencil" href="javascript:addEditModal('${row['key']}', '${row['value']}')"></a>`;
                        html += '&nbsp;&nbsp;&nbsp;'
                        html += `<a class="glyphicon glyphicon-remove" href="javascript:deleteItem('${row['key']}')"></a>`;
                        return html;
                    },
                },
            ],
        });
    } );

    function addEditModal(key, val) {
        var modal = $('#addEdit');
        modal.find('#key').val(key || '');
        modal.find('#value').val(val || '');
        modal.modal('show');
    }

    function deleteItem(key) {
        if (key) {
            if (confirm('Are you sure?')) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('redis.delete') }}",
                    data: {
                        '_token' : '{{csrf_token()}}',
                        'key': key,
                    },
                    success: function(data){
                        $('.top-left').notify({
                            message: { text: 'Xóa Thành công' }
                        }).show();
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        }
    }

    function save() {
        var modal   = $('#addEdit');
        var key     = modal.find('#key').val();
        var value   = modal.find('#value').val();
        // TODO: ajax to save here
        $.ajax({
            type: "POST",
            url: "{{ route('redis.add') }}",
            data: {
                '_token'    : '{{csrf_token()}}',
                'key'       : key,
                'value'     : value,
            },
            success: function(data){
                modal.modal('hide');
                $('.top-left').notify({
                    message: { text: 'Thành công' }
                }).show();
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        });
    }
</script>
@endsection
