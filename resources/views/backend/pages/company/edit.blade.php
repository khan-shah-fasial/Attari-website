<form id="edit_company_form" action="{{ route('company.update', ['id' => $company->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="company_id" value="{{ $company->id }}">
    <div class="form-group">
        <label for="company_name">Company Name</label>
        <input type="text" name="company" id="company_name" class="form-control" value="{{ $company->company }}"
            required>
    </div>
    <div class="form-group">
        <label for="domain_name">Domain Name</label>
        <input type="text" name="domain" id="domain_name" class="form-control" value="{{ $company->domain }}" required>
    </div>
    <div class="form-group">
        <label for="owner_name">Owner Name</label>
        <input type="text" name="owner" id="owner_name" class="form-control" value="{{ $company->owner }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" required>{{ $company->address }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<script>
    $(document).ready(function() {
    initValidate('#edit_company_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_company_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>