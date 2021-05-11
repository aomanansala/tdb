<div>
    @section('secondary-header')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="inline-block">
                    <h6>Users</h6>
                </div>

                <div class="vertical-divider"></div>

                <div class="inline-block">
                    <span>{{ count($users) }} records found</span>
                </div>

                <div class="vertical-divider no-border"></div>

                <div class="inline-block">
                    <input type="text" class="form-control" placeholder="Type to search">
                </div>
            </div>

            <div class="col-md-6 text-right">
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary"></span> Add new user</a>
            </div>
        </div>
    @endsection

    <div class="tdb card">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <div class="form-inline">
                                <select class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 text-right">
                            <button class="btn btn-sm btn-outline-dark">View statistics</button>
                            <button class="btn btn-sm btn-outline-dark">View inactive</button>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Contact number</th>
                            <th>User role ID</th>
                            <th>Status</th>
                            <th>Controls</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                                <td>{{ $user->email }}</td>
                                <td>1234567890</td>
                                <td>{{ $user->userRoleId }}</td>
                                <td>active</td>
                                <td>


                                    @if ($delete && $user->id == $userId)
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="confirmDelete">
                                            <span class="fa fa-check"></span>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-primary" wire:click="cancelDelete">
                                            <span class="fa fa-stop"></span>
                                        </button>
                                    @else
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <button type="button" class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})">Delete</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.alerts')
</div>
