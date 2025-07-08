<!-- Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModal-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModal-label">Loading...</h5>
        <a type="button" class="btn-close" onclick="closeModel();" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        Loading...
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="smallModal" tabindex="-1" aria-labelledby="smallModal-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="smallModal-label">Loading...</h5>
        <a type="button" class="btn-close" onclick="closeModel();" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        Loading...
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
        <form method="POST" class="ajaxDeleteForm" action="" id ="delete_form">
          @csrf
          <i class="fa-solid fa-circle-info" style="font-size: 50px;color: #dc3545;"></i>
          <p class="mt-3">Are you sure?</p>
          <button type="button" class="btn btn-sm btn-info" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i> Cancel</button>
          <button type="submit" class="btn btn-sm btn-secondary" onclick=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Continue</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Confirmation Modal 2-->
    <div class="modal fade" id="confirmModal2" tabindex="-1" aria-labelledby="confirmModal-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form method="POST" class="ajaxDeleteForm2" action=""  title="" id="delete_form2">
                        @csrf
                        
                        <i class="fa-solid fa-circle-info" style="font-size: 50px;color: #dc3545;"></i>
                        <p class="mt-3">Are you sure? Please type the blog title to confirm:</p>
                        <span id="copyPasteMessage" class="text-danger" style="display:none;">Copying, cutting, and pasting are disabled. Please type to confirm.</span>
                        <input type="text" readonly class="form-control mb-2" id="delete_form2title">
                        <input type="text" id="confirmationInput" class="form-control mb-2" autocomplete="off" placeholder="Type here">
                        <button type="button" class="btn btn-sm btn-info" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i> Cancel
                        </button>
                        <button type="submit" id="deleteButton" class="btn btn-sm btn-secondary" disabled>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Continue
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete with confirmation option Modal-->
    <div class="modal fade" id="confirmModalWithTextConfirmation" tabindex="-1" aria-labelledby="confirmModal-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body text-center">
            <form method="POST" class="ajaxDeleteForm_with_confirm_text" action="" id ="delete_form_with_confirm_text" autocomplete="off">
              @csrf
              <i class="fa-solid fa-circle-info" style="font-size: 50px;color: #dc3545;"></i>
              <p class="mt-3">Are you sure?</p>
              <input name="required_text" type="text" readonly class="form-control mb-2">
              <input name="confirm_text" type="text" class="form-control mb-2" placeholder="Enter above text" oninput1="disableCopyPaste(this)" autocomplete="off" required>
              <button type="button" class="btn btn-sm btn-info" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i> Cancel</button>
              <button type="submit" class="btn btn-sm btn-danger" onclick=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Continue</button>
            </form>
          </div>
        </div>
      </div>
    </div>  
    <!--delete with confirmation option Modal-->    