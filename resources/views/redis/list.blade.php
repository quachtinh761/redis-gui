@extends('layout.master')

@section('content')
    <div class="text-right">
        <button type="button" onclick="addEditModal('', '')" class="btn btn-primary">Add new key</button>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Key</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($list as $k => $v)
            <tr>
                <td><input type="checkbox" value="1" name="key[{{ $k }}]"></td>
                <td>{{ $k }}</td>
                <td>{{ $v }}</td>
                <td>
                    <a href="javascript:void(0)" class="glyphicon glyphicon-pencil" onclick="addEditModal('{{ $k }}', '{{ $v }}')"></a>
                    <a href="javascript:void(0)" class="glyphicon glyphicon-remove" onclick="deleteItem('{{ $k }}')"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="addEdit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add/Update redis key</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right" for="key">
                            Key <span class="text-danger text-light">(required)</span>
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" name="key" id="key">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right" for="value">
                            Value <span class="text-danger text-light">(required)</span>
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" id="value" name="value">
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <div class="text-danger text-light">
                        * This process will update if key exists. Otherwise, will create new one.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" onclick="save()">Save</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('js')
<script type="text/javascript">
    function addEditModal(key, val) {
        var modal = $('#addEdit');
        modal.find('#key').val(key || '');
        modal.find('#value').val(val || '');
        modal.modal('show');
    }

    function deleteItem(key) {
        if (key) {
            if (confirm('Are you sure?')) {
                // TODO: delete by ajax
            }
        }
    }

    function save() {
        var modal   = $('#addEdit');
        var key     = modal.find('#key').val();
        var value   = modal.find('#value').val();
        // TODO: ajax to save here

        modal.modal('hide');
        $('.top-left').notify({
            message: { text: 'Thành công' }
        }).show();
        setTimeout(function () {
            window.location.reload();
        }, 1000);
    }
</script>
@endsection
