@extends('backend.layouts.app')

@section('page.name', 'Companies')

@section('page.content')
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-sm-5">
            @if ($companies -> isnotEmpty())
                <div class="text-sm-start">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2"
                        onclick="largeModal('{{ route('company.savepoliciesForm') }}', 'Update  Policies')"><i
                            class="mdi mdi-plus-circle me-2"></i> Update Policies</a>
                </div>
            @endif
            </div>
            <div class="col-sm-7">
                <div class="text-sm-end">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2"
                        onclick="largeModal('{{ route('company.add') }}', 'Add Company')"><i
                            class="mdi mdi-plus-circle me-2"></i> Add Company</a>
                </div>
            </div>
            <!-- end col-->
        </div>
        <div class="table-responsive">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Domain Name</th>
                        <th>Owner Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($companies->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">
                            <p>No data available</p>
                        </td>
                    </tr>
                    @else
                    @foreach($companies as $company)
                    <tr id="companyRow{{ $loop->index + 1 }}">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $company->company }}</td>
                        <td>{{ $company->domain }}</td>
                        <td>{{ $company->owner }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{datetimeFormatter($company->created_at)}}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon"
                                onclick="largeModal('{{ url(route('company.edit',['id' => $company->id])) }}', 'Edit')">
                                <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>

                                @if(auth()->user()->designation == 'SuperAdmin')
                                    <a href="javascript:void(0);" class="action-icon"
                                        onclick="confirmModalWithTextConfirmation('{{ url(route('company.delete', $company->id)) }}', responseHandler, '{{ $company->company }}')">
                                        <i class="mdi mdi-delete" title="Delete"></i>
                                    </a>
                                @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- end card-body-->
</div>
@endsection

@section('page.scripts')
<script>
var responseHandler = function(response) {
    // Reload the page after a successful action
    location.reload();
}
</script>
@endsection