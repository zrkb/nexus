Dropzone.autoDiscover = false;

jQuery(document).ready(function() {
    //
    // Variables
    //
    var toggle = document.querySelectorAll('[data-toggle="dropzone-custom"]');
    window.uploadedDocumentMap = {};

    //
    // Functions
    //
    function init(el) {
        var parentForm = $(el);

        const elementOptions = el.dataset.options ? JSON.parse(el.dataset.options) : {};

        const defaultOptions = {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            maxFilesize: 20, // MB
            // thumbnailWidth: 500,
            // thumbnailHeight: 1000,
            // resizeQuality: 1.0,
            // thumbnailMethod: 'contain',
            // maxThumbnailFilesize: 20,
            uploadprogress: function(file, progress, bytesSent) {
                if (file.previewElement) {
                    const parent = $(file.previewElement).parents(".dropzone.dropzone-single");
                    const parentElement = parent.get(0);

                    const container = parentElement.querySelector('.progress-container');
                    container.style.display = "block";

                    const progressParent = parentElement.querySelector('.progress');
                    progressParent.style.display = "flex";

                    const progressElement = parentElement.querySelector("[data-dz-uploadprogress]");
                    progressElement.style.display = "block";
                    progressElement.style.width = Math.floor(progress) + "%";
                }
            },
            previewTemplate: document.querySelector('#dz-template-' + el.dataset.inputName)?.innerHTML,
            previewsContainer: el.querySelector('.dz-preview-list'),
            init: function() {
                const dz = this;

                dz.on('addedfile', function(file) {
                    el.querySelector('.dz-message').style.display = 'none';
                });

                dz.on('sending', function(file, xhr, formData){
                    formData.append('path', $(el).data('image-path'));
                });

                dz.on("error", function(file, message) {
                    alert(message);
                    dz.removeFile(file);
                });

                dz.on("complete", function(file) {
                    // setTimeout(() => {
                        const parent = $(file.previewElement).parents(".dropzone.dropzone-single");
                        const parentElement = parent.get(0);
                        const container = parentElement.querySelector('.progress-container');
                        if (container) container.style.display = "none";
                    // }, 500);
                });
            },
            success: function (file, response) {
                parentForm.parents('form').append('<input type="hidden" name="' + $(el).data('input-name') + '" data-target="' + file.name + '" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
                if (file.previewElement) {
                    var removeImageButton = file.previewElement.querySelector("[data-dz-remove]");
                    removeImageButton.style.display = 'block';
                   file.previewElement.classList.add("dz-success");
                }

                el.querySelector('.dz-message').style.display = 'none';
            },
            removedfile: function (file) {
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                // $(el).removeClass('dz-max-files-reached');
                $(el).find('.progress-container').hide();
                el.querySelector('.dz-message').style.display = 'flex';

                var name = '';

                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }

                $('input:hidden[data-target="' + file.name + '"][value="' + name + '"]').remove()

                return this._updateMaxFilesReachedClass();
            },
        }

        var options = Object.assign(elementOptions, defaultOptions);

        // Init dropzone
        let myDropzone = new Dropzone(el, options);
        let image = $(el).data('image');
        let filename = $(el).data('filename');

        // Clear preview
        // el.querySelector('.dz-preview').innerHTML = '';

        if (image) {
            // Create the mock file:
            const mockFile = { name: image, size: 1, accepted: true };

            // Call the default addedfile event handler
            myDropzone.emit("addedfile", mockFile);

            // And optionally show the thumbnail of the file:
            myDropzone.emit("thumbnail", mockFile, $(el).data('storage-url') + image);

            // Make sure that there is no progress bar, etc...
            myDropzone.emit("complete", mockFile);

            parentForm.parents('form').append('<input type="hidden" name="' + $(el).data('input-name') + '" data-target="' + image + '" value="' + filename + '">');

            window.uploadedDocumentMap[image] = filename;

            $(el).addClass('dz-max-files-reached');
        }
    }

    //
    // Events
    //
    if (typeof Dropzone !== 'undefined' && toggle) {
        [].forEach.call(toggle, function(el) {
            init(el);
        });
    }
});
