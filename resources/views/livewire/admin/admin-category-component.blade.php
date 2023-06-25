<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
        .sclist{
            list-style: none;
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
                                                @foreach ($category->subcategories as $scategory )
                                                    <li><i class="fa fa-caret-right"></i>{{ $scategory->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" wire:click.prevent="deleteCategory({{ $category->id }})"
                                                onclick="confirmDelete('{{ $category->id }}');"
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
        function confirmDelete(categoryId) {
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
                    Livewire.emit('deleteConfirmed', categoryId);
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
