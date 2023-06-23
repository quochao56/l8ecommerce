<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sale Setting
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="updateSale">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Sale Date</label>
                            <div class="col-md-4">
                                <input type="text" id="sale_date" class="form-control input-md"
                                    wire:model="sale_date" placeholder="YYYY/MM/DD H:M:S">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function() {
            // Initialize datetimepicker
            $('#expiry_dsale_dateate').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss', // Specify the desired format
            }).on('dp.change', function(ev) {
                var data = $('#sale_date').val();
                @this.set('expiry_date', data);
            });
        });
    </script>
@endpush
