<div>
    <div class="container" style="padding: 30px 0;">
        <style>
            nav svg{
                height: 20px;
            }
            nav .hidden{
                display: block !important;
            }
        </style>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Contact Messages
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Comment</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->comment }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                    <div class="pagination">
                        <div>
                            {{ $contacts->links('\vendor\pagination\bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
