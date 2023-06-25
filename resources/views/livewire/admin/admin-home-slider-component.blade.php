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
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.add-homeslider') }}" class="btn btn-success pull-right">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Price</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td><img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}"
                                                    width="120" alt=""> </td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle }}</td>
                                            <td>{{ $slider->price }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.edit-homeslider', ['slider_id' => $slider->id]) }}"><i
                                                        class="fa fa-edit fa-2x text-info"></i></a>
                                                <a href="#"
                                                    wire:click.prevent="deleteProduct({{ $slider->id }})"
                                                    onclick="confirmDelete('{{ $slider->id }}');"
                                                    style="margin-left: 10px;">
                                                    <i class="fa fa-times fa-2x text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function confirmDelete(sliderId) {
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
                    Livewire.emit('deleteConfirmed', sliderId);
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
