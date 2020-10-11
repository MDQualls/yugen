<!-- MODAL TO ADD NEW DATA TYPES -->
    <div class="modal fade" id="dataTypeModal" tabindex="-1" aria-labelledby="dataTypModalLabel" aria-hidden="true">
        <form id="timeline_type_form" name="timeline_type_form" method="POST"
              action="{{ route('timeline-type-store') }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataTypModalLabel">Add New Data Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="new_data_type" class="col-form-label">Data type:</label>
                            <input type="text" class="form-control" name="timeline_type" id="timeline_type" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add data type</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
</div>
