<div>
    @section('styles')
        <link rel="stylesheet" href="{{ mix('css/organisation/organisation.css') }}">
    @endsection

    @section('secondary-header')
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="inline-block">
                    <h6>Organizations</h6>
                </div>

                <div class="vertical-divider"></div>

                <div class="inline-block">
                    {{ $pages }} found
                </div>

                <div class="vertical-divider no-border"></div>

                <div class="inline-block">
                    <input type="text" class="form-control" placeholder="Organization name">
                </div>

                <div class="inline-block">
                    <select class="form-control" v-model="selectedState">
                        <option v-for="state in states" :value="state.id">
                            @{{ state.name }}
                        </option>
                    </select>
                </div>

                <div class="inline-block">
                    <input type="text" class="form-control" placeholder="Zip code" v-model="zipCode">
                </div>

                <div class="inline-block">
                    <button type="button" class="btn btn-sm btn-success">Search</button>
                    <button type="button" class="btn btn-sm btn-danger">Clear</button>
                </div>
            </div>

            <div class="col-md-4 text-right">
                <a href="{{ route('admin.organisations.create') }}" class="btn btn-sm btn-primary">Add Organization</a>
            </div>
        </div>
    @endsection

    <div id="index-organization-application" class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @foreach ($organisations as $organisation)
                    <div class="jumbotron jumbotron-fluid" wire:click="toggle({{ $organisation['id'] }})">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <img
                                        v-if="organization.mascot"
                                        :src="organization.mascot.thumbnail"
                                        alt=""
                                        style="width: 75px;"
                                    >
                                </div>

                                <div class="col-md-6">
                                    <h5>
                                        {{ $organisation['name'] }}
                                    </h5>

                                    <p>
                                        {{ $organisation['address'] }}
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <strong>Progress: </strong> {{ $organisation['progress'] }}%

                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 95%">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($organisation['toggle'])
                                <div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>
                                                        <strong>Status:</strong>
                                                    </td>
                                                    <td>
                                                        active
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Team Name:</strong>
                                                    </td>

                                                    <td>
                                                        {{ $organisation['name'] }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Organization Website:</strong>
                                                    </td>

                                                    <td>
                                                        {{ $organisation['website'] }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Main Number:</strong>
                                                    </td>

                                                    <td>
                                                        {{ $organisation['phoneNumber'] }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Last Update:</strong>
                                                    </td>

                                                    <td>
                                                        {{ $organisation['lastModified'] }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>
                                                        <strong>Sports:</strong>
                                                    </td>

                                                    <td>
                                                        @foreach ($organisation['sportInfos'] as $sport)
                                                            <span class="badge badge-pill badge-light">
                                                            {{ $sport['name'] }}
                                                        </span>
                                                        @endforeach

                                                        <div>
                                                            {{ count($organisation['sportInfos']) }} sports
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Coaches:</strong>
                                                    </td>

                                                    <td>
                                                        @foreach ($organisation['coaches'] as $coach)
                                                            <span class="badge badge-pill badge-primary">
                                                            {{ substr(ucwords($coach['firstName']), 0, 1) }}
                                                                {{ substr(ucwords($coach['lastName']), 0, 1) }}
                                                        </span>
                                                        @endforeach

                                                        <div>
                                                            {{ count($organisation['coaches']) }} coaches
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Colors:</strong>
                                                    </td>

                                                    <td>
                                                        @foreach ($organisation['colorSets'] as $color)
                                                            <div class="color" style="background-color:#{{ $color['hexCode'] }}">

                                                            </div>
                                                        @endforeach

                                                        <div>
                                                            {{ count($organisation['colorSets']) }} colors
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a :href="routes.api('admin.organization.edit', {organizationId: organization.id}).url" class="btn btn-sm btn-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger" @click="deleteOrganization(organization.id)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
