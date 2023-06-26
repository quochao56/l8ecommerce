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
                            <div class="col-md-6">All Attribute</div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.add-attribute') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pattributes as $pattribute)
                                        <tr>
                                            <td>{{ $pattribute->id }}</td>
                                            <td>{{ $pattribute->name }}</td>
                                            <td>{{ $pattribute->created_at }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.edit-attribute', ['attribute_id' => $pattribute->id]) }}"><i
                                                        class="fa fa-edit fa-2x"></i></a>
                                                <a href="#"
                                                    wire:click.prevent="deletepattribute({{ $pattribute->id }})"
                                                    onclick="confirmDelete('{{ $pattribute->id }}');"
                                                    style="margin-left: 10px;">
                                                    <i class="fa fa-times fa-2x text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="pagination-summary">
                            Showing {{ $startIndex }} to {{ $endIndex }} of {{ $totalResults }} results
                        </div> --}}
                        <div class="pagination">
                            <div>
                                {{ $pattributes->links('\vendor\pagination\bootstrap-4') }}
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
        function confirmDelete(pattributeId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete the product attribute',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed', pattributeId);
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
