

<div class="card">
    <div class="card-body">
<!---================================ SECTION heading =======================--->
    <section>
        <form id="updating_recive_email" action="{{url(route('setting.update'))}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group mb-3">
                        <label>Recive Email</label>
                        <input type="text" class="form-control" name="recive_email" value="{{ get_settings('recive_email') }}" required>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group mt-3 mb-3">
                        <button type="submit" class="btn btn-block btn-secondary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
<!---================================ SECTION heading =======================--->
    </div>
</div>

@section("component.scripts")
<script>
    $(document).ready(function() {
        initValidate('#updating_recive_email');
    });
    
    $("#updating_recive_email").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });
    
    var responseHandler = function(response) {
        location.reload();
    }
</script>
@endsection