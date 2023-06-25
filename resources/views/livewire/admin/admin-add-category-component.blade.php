<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    {{-- wire:model="name" tương tự name="name"  --}}
                                    {{--  wire:keyup="generateslug" là khi nhập data vào vùng category_name thì nó sẽ tự điền dữ liệu 
                                    được xử lý từ func generateslug vào wire:model="slug" --}}
                                    <input type="text" id="category_name"  wire:model="name" wire:keyup="generateslug" placeholder="Category Name" class="form-control input-md">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" id="category_slug" wire:model="slug" placeholder="Category Slug" class="form-control input-md">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Parent Category</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control input-md" wire:model="category_id">
                                        <option value="">None</option>   
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach 
                                    </select>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit"  class="btn btn-primary">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
