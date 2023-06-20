<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Slides
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Choose Categories</label>
                            <div class="col-md-4" wire:ignore>
                                <select name="categories[]" multiple="multiple" class="sel_categories form-control"
                                    wire:model="selected_categories">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label" wire:model="numberOfProducts">No of
                                Products</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <input type="text" id="datetimepicker"> --}}

        </div>
    </div>
</div>
@push('scripts')
    <script>
        // import 2 link từ select2.org để biến đổi các lựa chọn từ tag select trông đẹp
        $(document).ready(function() {
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e) {
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories', data);
            });

        });
    </script>
@endpush
