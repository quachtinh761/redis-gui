
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
