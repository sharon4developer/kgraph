$('#terms-add-form').validate({
    rules: {
        description: {
            required: true,
        },
    },
    errorElement: 'span',
    submitHandler: function(form,event) {
        //
        var formData = new FormData($(form)[0]);
        formData.append('description', $('.ql-editor').html());
        $('.error').html('');
        var submitButton=$(form).find('[type=submit]');
        var current_btn_text=submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val()+'/terms-and-condition',
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    `+button_loading_text+`
                `).attr('disabled',true);
            },
            success: function(response)
            {
                if(response.status){
                    showMessage('success',response.message);
                }else{
                    showMessage('warning',response.message);
                }
            },
            error: function (response) {
                submitButton.html(current_btn_text).attr('disabled',false);
                if(response.responseJSON.errors){
                    $.each(response.responseJSON.errors, function(i,v) {
                        element=$(form).find('[name='+i+']');
                        element.addClass('is-invalid');
                        if( $(form).find('#'+ i +'-error').length){
                            $(form).find('#'+ i +'-error').html(v).show();
                        }else{
                            element.closest('.form-group').
                            append(`<span id="`+i+`-error" class="error invalid-feedback">`+v+`</span>`);
                            $('.error').show();
                        }
                        element.attr('aria-invalid',true);
                        element.attr("area-describedby",i+"-error");
                        element.focus();
                    });
                }
                else{
                    showMessage('warning','Something went wrong...');
                }
            },
            complete:function(){
                submitButton.html(current_btn_text).attr('disabled',false);
            }
        });
        event.preventDefault();
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});

$(document).ready(function () {

    var toolbarOptions = [
        ["bold", "italic", "underline", "strike"], // toggled buttons
        ["blockquote", "code-block"],
        ["image", "code-block"],
        [{ header: 1 }, { header: 2 }], // custom button values
        [{ list: "ordered" }, { list: "bullet" }],
        [{ script: "sub" }, { script: "super" }], // superscript/subscript
        [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
        [{ direction: "rtl" }], // text direction

        [{ size: ["small", false, "large", "huge"] }], // custom dropdown
        [{ header: [1, 2, 3, 4, 5, 6, false] }],

        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
        [{ font: [] }],
        [{ align: [] }],

        ["clean"], // remove formatting button
    ];

    Quill.register("modules/htmlEditButton", htmlEditButton);

    var quill = new Quill("#summernote", {
        theme: "snow",
        modules: {
            imageResize: {
                displaySize: true,
            },
            htmlEditButton: {
                debug: true, // logging, default:false
                msg: "Edit the content in HTML format", //Custom message to display in the editor, default: Edit HTML here, when you click "OK" the quill editor's contents will be replaced
                okText: "Save", // Text to display in the OK button, default: Ok,
                cancelText: "Cancel", // Text to display in the cancel button, default: Cancel
                buttonHTML: "<span class='quill-top-buttons'>&lt;&gt;</span>", // Text to display in the toolbar button, default: <>
                buttonTitle: "Show HTML source", // Text to display as the tooltip for the toolbar button, default: Show HTML source
                syntax: false, // Show the HTML with syntax highlighting. Requires highlightjs on window.hljs (similar to Quill itself), default: false
                prependSelector: "div#myelement", // a string used to select where you want to insert the overlayContainer, default: null (appends to body),
                editorModules: {}, // The default mod
            },
            toolbar: toolbarOptions,
        },
        placeholder: "",
        theme: "snow", // or 'bubble'
    });
    $(".ql-editor").html($("#text-content").val());
});
