<div>
    @section('secondary-header')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="inline-block">
                    <h6>Create user</h6>
                </div>

                <div class="vertical-divider"></div>

                <div class="inline-block">
                    <h6>Add User</h6>
                </div>
            </div>

            <div class="col-md-6 text-right">
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-dark">Back to list</a>
            </div>
        </div>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="tdb card">
                    <h5 class="card-title">Create User</h5>

                    <hr class="mb-5 mt-3">

                    @include('partials.validation-errors')

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" wire:model="user.firstName">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" wire:model="user.lastName">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right control-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" wire:model="user.email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right control-label">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" wire:model="user.userName">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" wire:model="user.password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-sm btn-primary" wire:click="save">Save and continue</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
