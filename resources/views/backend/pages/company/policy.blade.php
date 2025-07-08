<form id="add_policy_form" action="{{ route('company.savepoliciesPost') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="company_name">Terms and Conditions</label>
        <!-- Terms and Conditions -->
        <textarea name="terms_and_conditions" class="form-control trumbowyg"
            placeholder="Terms and Conditions" required>{{ $company->terms_and_conditions ?? '' }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="domain_name">Refund Policy</label>
        <!-- Refund Policy -->
        <textarea name="refund_policy" class="form-control trumbowyg" placeholder="Refund Policy" required>{{ $company->refund_policy ?? '' }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="owner_name">Privacy Policy</label>
        <!-- Privacy Policy -->
        <textarea name="privacy_policy" class="form-control trumbowyg" placeholder="Privacy Policy" required>{{ $company->privacy_policy ?? '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save Policies</button>
</form>
<script>
// $(document).ready(function() {
//     initializeTrumbowyg('.trumbowyg1');
//     initializeTrumbowyg('.trumbowyg2');
//     initializeTrumbowyg('.trumbowyg3');
// });

// function initializeTrumbowyg(selector) {
//     // Check if Trumbowyg is not already initialized for the given selector
//     if (!$(selector).data('trumbowyg')) {
//         initTrumbowyg(selector);
//     }
// }

// function initTrumbowyg(selector) {
//     // Initialize Trumbowyg for the given selector
//     $(selector).trumbowyg({
//         // Trumbowyg configuration options
//     });
// }

$(document).ready(function() {
    initValidate('#add_policy_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#add_policy_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>