<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;

        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                All Products
                            </div>

                            <div class="col-md-4">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                            <div class="col-md-4">
<input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Sale Price</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                    width="60" alt=""></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->stock_status }}</td>
                                            <td>{{ $product->regular_price }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"><i
                                                        class="fa fa-edit fa-2x text-info"></i></a>
                                                <a href="#"
                                                    wire:click.prevent="deleteProduct({{ $product->id }})"
                                                    onclick="confirmDelete('{{ $product->id }}');"
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
                            {{ $products->links('\vendor\pagination\bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function confirmDelete(productId) {
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
                    Livewire.emit('deleteConfirmed', productId);
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
