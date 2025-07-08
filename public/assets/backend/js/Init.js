toastr.options = {
    showHideTransition: "plain",
    closeButton: true,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "500",
    timeOut: "7000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

//bootstarp modals
function largeModal(url, header) {
    $("#largeModal .modal-body").html("Loading...");
    $("#largeModal .modal-title").html("Loading...");

    $("#largeModal").modal("show");
    $.ajax({
        url: url,
        success: function (response) {
            $("#largeModal .modal-body").html(response);
            $("#largeModal .modal-title").html(header);
        },
    });
}

function smallModal(url, header) {
    $("#smallModal .modal-body").html("Loading...");
    $("#smallModal .modal-title").html("Loading...");

    $("#smallModal").modal("show");
    $.ajax({
        url: url,
        success: function (response) {
            $("#smallModal .modal-body").html(response);
            $("#smallModal .modal-title").html(header);
        },
    });
}

/*delete with confirmation option*/
function confirmModalWithTextConfirmation(delete_url, param, title) {
    //console.log(delete_url, param, title);
    $("#confirmModalWithTextConfirmation").modal("show");
    $('input[name="required_text"]').attr('value', title);
    $('input[name="required_text"]').val(title);
    $('input[name="confirm_text"]').attr('value', '');
    $('input[name="confirm_text"]').val('');
    callBackFunction = param;
    document.getElementById("delete_form_with_confirm_text").setAttribute("action", delete_url);
}

$(document).ready(function() {
    initValidate('#delete_form_with_confirm_text');
});

$("#delete_form_with_confirm_text").submit(function (e) {
    e.preventDefault(); // Prevent form submission

    var requiredText = $('input[name="required_text"]').val();
    var confirmText = $('input[name="confirm_text"]').val();
    
    console.log(requiredText);
    console.log(confirmText);

    if (requiredText === confirmText) {
        // If texts match, proceed with form submission
        var form = $(this);
        ajaxSubmit(e, form, callBackFunction);
    } else {
        Command: toastr["error"]('The confirmation text does not match. Please enter correctly', "Alert");
    }
});

function disableCopyPaste(selector) {
    $(selector).on('paste cut copy', function(e) {
        e.preventDefault();
        
        // Show toastr error message based on the event type
        switch(e.type) {
            case 'paste':
                Command: toastr["error"]('Pasting is not allowed!', "Alert");
                break;
            case 'cut':
                Command: toastr["error"]('Cutting is not allowed!', "Alert");
                break;
            case 'copy':
                Command: toastr["error"]('Copying is not allowed!', "Alert");
                break;
        }
    });
}

$(document).ready(function() {
    disableCopyPaste('input[name="confirm_text"]');
});
/*delete with confirmation option*/

function confirmModal(delete_url, param) {
    $("#confirmModal").modal("show");
    callBackFunction = param;
    document.getElementById("delete_form").setAttribute("action", delete_url);
}

function confirmModal2(deleteUrl, callback, title) {
    $("#confirmModal2").modal("show");
    callBackFunction = callback;
    document.getElementById("delete_form2").setAttribute("action", deleteUrl);
    
    // Split the title into words
    var words = title.split(' ');
    
    // Get the first one, two, or three words based on the number of words in the title
    var firstWords = words.slice(0, Math.min(words.length, 3)).join(' ');

    // Set the prompt in the readonly input field
    document.getElementById("delete_form2title").value = `You need to type: "${firstWords}"`;

    // Clear previous input value and disable the delete button
    var input = document.getElementById("confirmationInput");
    var deleteButton = document.getElementById("deleteButton");
    input.value = '';
    deleteButton.disabled = true;
    
 // Function to show the copy-paste message
    function showCopyPasteMessage() {
        var message = document.getElementById("copyPasteMessage");
        message.style.display = 'block';
        setTimeout(function() {
            message.style.display = 'none';
        }, 3000); // Hide the message after 3 seconds
    }

    // Disable copy-paste and notify the user
    input.addEventListener('copy', function(e) {
        e.preventDefault();
        showCopyPasteMessage();
    });
    input.addEventListener('cut', function(e) {
        e.preventDefault();
        showCopyPasteMessage();
    });
    input.addEventListener('paste', function(e) {
        e.preventDefault();
        showCopyPasteMessage();
    });

    // Add event listener to the input field
    input.addEventListener('input', function() {
        var typedValue = input.value.trim();
        
        if (typedValue === firstWords) {
            deleteButton.disabled = false;
        } else {
            deleteButton.disabled = true;
        }
    });
}

$(".ajaxDeleteForm").submit(function (e) {
    var form = $(this);
    ajaxSubmit(e, form, callBackFunction);
});

$(".ajaxDeleteForm2").submit(function (e) {
    var form = $(this);
    ajaxSubmit(e, form, callBackFunction);
});

function closeModel() {
    //$('.modal .modal-body').html('');
    //$('.modal .modal-title').html('');
}

function closeConfirmModel() {
    $("#confirmModal").modal("hide");
}

//jquery validator
function initValidate(selector) {
    $(selector).validate({
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });
}

//select2
function initSelect2(selector) {
    $(selector).select2();
}

//Form Submition
function ajaxSubmit(e, form, callBackFunction) {
    if (form.valid()) {
        e.preventDefault();

        var btn = $(form).find('button[type="submit"]');
        var btn_text = $(btn).html();
        $(btn).html('<i class="ri-refresh-line"></i>');
        $(btn).css("opacity", "0.7");
        $(btn).css("pointer-events", "none");

        var action = form.attr("action");
        var form = e.target;
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: "json",
            data: data,
            success: function (response) {
                $(btn).html(btn_text);
                $(btn).css("opacity", "1");
                $(btn).css("pointer-events", "inherit");

                if (response.status) {
                    Command: toastr["success"](
                        response.notification,
                        "Success"
                    );
                    callBackFunction(response);
                } else {
                    if (typeof response.notification === "object") {
                        var errors = "";
                        $.each(response.notification, function (key, msg) {
                            errors +=
                                "<div>" + (key + 1) + ". " + msg + "</div>";
                        });
                        Command: toastr["error"](errors, "Alert");
                    } else {
                        Command: toastr["error"](
                            response.notification,
                            "Alert"
                        );
                    }
                }
            },
        });
    } else {
        toastr.error("Please make sure to fill all the necessary fields");
    }
}

function updateXlinkHref() {
    
    // Get current full URL
    let currentUrl = window.location.href;
    
    // Check if the URL contains query parameters (?) or a hash (#)
    if (currentUrl.includes('?')) {
        // If no query parameters and no hash, append a dummy query parameter
        // currentUrl += '?';

        console.log(currentUrl);
        console.log('working edit');
        
        // Get the part of the URL before any "#"
        const currentUrlWithoutHash = currentUrl.split('#')[0];
    
        // Find all elements with xlink:href and update the URL
        $('use').each(function() {
            let href = $(this).attr('xlink:href');
            if (href) {
                // Extract the part after the #
                const hashPart = href.split('#')[1];
    
                // Replace the URL before # with the current one (including query parameters)
                $(this).attr('xlink:href', currentUrlWithoutHash + '#' + hashPart);
            }
        });
    }
}


//trumbowyg Editor
function initTrumbowyg(target) {
    $(target).trumbowyg({
        btnsDef: {
            // Create a new dropdown
            image: {
                dropdown: ["insertImage", "upload"],
                ico: "insertImage",
            },
            // Define the heading button with different levels
            heading: {
                dropdown: ["h1", "h2", "h3", "h4", "h5", "h6"],
                ico: "pencil", // You can use an appropriate icon
            },
        },
        // Redefine the button pane
        btns: [
            ["viewHTML"],
            ["formatting"],
            ["strong", "em", "del"],
            ["superscript", "subscript"],
            ["link"],
            ["image"], // Our fresh created dropdown
            ['noembed'],
            ["table"],
            ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
            ["unorderedList", "orderedList"],
            ["horizontalRule"],
            ["removeformat"],
            ["fullscreen"],
        ],
        plugins: {
            // Add imagur parameters to upload plugin for demo purposes
            upload: {
                serverPath:
                    $("#baseUrl").attr("href") + "/backend/trumbowyg/upload",
                fileFieldName: "image",
                headers: {},
                urlPropertyName: "file",
            },
            resizimg: true,
        },
    });
    // $(target).css("height", 200);
    // $(".trumbowyg-editor").css("min-height", 200);

    updateXlinkHref();

}

function destroyTrumbowyg(target) {
    $(target).trumbowyg("destroy");
}
