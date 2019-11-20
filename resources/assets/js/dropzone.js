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
		var currentFile = undefined;
		var parentForm = $(el);
		var elementOptions = el.dataset.options;
			elementOptions = elementOptions ? JSON.parse(elementOptions) : {};
		var defaultOptions = {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			maxFilesize: 20, // MB
			thumbnailWidth: 500,
			thumbnailHeight: 1000,
			resizeQuality: 1.0,
			thumbnailMethod: 'contain',
			maxThumbnailFilesize: 20,
			uploadprogress: function(file, progress, bytesSent) {
			    if (file.previewElement) {
			    	var parent = $(file.previewElement).parents(".dropzone.dropzone-single");
			    	var parentElement = parent.get(0);

			        var container = parentElement.querySelector('.progress');
			        container.style.display = "block";

			        var progressElement = parentElement.querySelector("[data-dz-uploadprogress]");
			        progressElement.style.width = progress + "%";
			        progressElement.querySelector(".progress-text").textContent = parseInt(progress) + "%";

			        if (progress >= 100) {
			        	container.style.display = "none";
			        }
			    }
			},
			previewsContainer: el.querySelector('.dz-preview'),
			previewTemplate: el.querySelector('.dz-preview').innerHTML,
	  		init: function() {
				this.on('addedfile', function(file) {
			  		var maxFiles = elementOptions.maxFiles;

			  		if (maxFiles == 1 && currentFile) {
						this.removeFile(currentFile);
			  		}

			 		currentFile = file;
				});

				this.on('sending', function(file, xhr, formData){
				    formData.append('path', $(el).data('image-path'));
				});
				
				this.on("error", function(file, message) { 
			        alert(message);
			        this.removeFile(file); 
			    });
		  	},
			success: function (file, response) {
				parentForm.parents('form').append('<input type="hidden" name="' + $(el).data('input-name') + '" data-target="' + file.name + '" value="' + response.name + '">');
				uploadedDocumentMap[file.name] = response.name;
			},
		  	removedfile: function (file) {
				file.previewElement.remove();
				$(el).removeClass('dz-max-files-reached');
				$(el).find('.progress').hide();

				var name = '';

				if (typeof file.file_name !== 'undefined') {
					name = file.file_name
			  	} else {
					name = uploadedDocumentMap[file.name]
			  	}

			  	$('input:hidden[data-target="' + file.name + '"][value="' + name + '"]').remove()
			},
		}

		var options = Object.assign(elementOptions, defaultOptions);

		// Clear preview
		el.querySelector('.dz-preview').innerHTML = '';

		// Init dropzone
		let myDropzone = new Dropzone(el, options);
		let image = $(el).data('image');

		if (image) {
			// Create the mock file:
			var mockFile = { name: image, size: 1 };

			// Call the default addedfile event handler
			myDropzone.emit("addedfile", mockFile);

			// And optionally show the thumbnail of the file:
			myDropzone.emit("thumbnail", mockFile, $(el).data('storage-url') + image);

			// Make sure that there is no progress bar, etc...
			myDropzone.emit("complete", mockFile);

			parentForm.parents('form').append('<input type="hidden" name="' + $(el).data('input-name') + '" data-target="' + image + '" value="' + image + '">');

			window.uploadedDocumentMap[image] = image;
			
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
