<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .sclist {
            list-style: none;
        }

        .sclist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }

        .slink i{
            font-size: 16px;
            margin-left: 12px;
        }

    </style>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Categories</div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Sub Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <ul class="sclist">
                                                    @foreach ($category->subcategories as $scategory)
                                                        <li><i class="fa fa-caret-right"></i>{{ $scategory->name }} <a
                                                                href="{{ route('admin.editcategory', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}" class="slink"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a href="#"
                                                                wire:click.prevent="deleteSubcategory({{ $scategory->id }})"
                                                                onclick="confirmDeleteSubcategory('{{ $scategory->id }}');"><i
                                                                    class="fa fa-times text-danger"></i></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"><i
                                                        class="fa fa-edit fa-2x"></i></a>
                                                <a href="#"
                                                    wire:click.prevent="deleteCategory({{ $category->id }})"
                                                    onclick="confirmDeleteCategory('{{ $category->id }}');"
                                                    style="margin-left: 10px;">
                                                    <i class="fa fa-times fa-2x text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-summary">
                            Showing {{ $startIndex }} to {{ $endIndex }} of {{ $totalResults }} results
                        </div>
                        <div class="pagination">
                            <div>
                                {{ $categories->links('\vendor\pagination\bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function confirmDeleteCategory(categoryId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete the category',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmedCategory', categoryId);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        }
        function confirmDeleteSubcategory(scategoryId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete the sub category',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmedSubcategory', scategoryId);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        }
    </script>
@endpush
