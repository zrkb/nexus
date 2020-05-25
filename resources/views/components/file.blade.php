@php
    $name = $name ?? 'file';
    $accept = $accept ?? '*';
    $uniqid = uniqid();

    $fileNotExists = is_null($file);
    $fileExists = is_null($file) == false;
@endphp

<div class="upload-box">

    <div class="text-center">
        <img class="upload-preview img-fluid" src="{{ $fileExists ? $file->getUrl() : '' }}" @if ($fileNotExists) style="display: none;" @endif>
    </div>

    <div class="upload-input" @if ($fileExists) style="opacity: 0; height: 1px;" @endif>

        <input type="file" name="{{ $name }}" id="file-{{ $uniqid }}" class="upload-file" accept="{{ $accept }}"  />

        <label for="file-{{ $uniqid }}" class="upload-instructions">
            <div class="upload-icon m-0">
                <h1 class="m-0 display-5">
                    <i class='bx bx-image text-muted'></i>
                </h1>
            </div>

            <span class="upload-dragndrop d-block small">
                {{ $message ?? 'Arrastra una imagen aquí o bien' }}
            </span>
            <span class="btn btn-link mt-1 text-primary">Selecciona un archivo</span>
        </label>
    </div>

    <button type="button" class="btn btn-link text-danger delete-file upload-delete" @if ($fileNotExists) style="display: none;" @endif>
        <i class="bx bx-trash"></i>
    </button>
</div>
<!-- END upload-box -->

@push('scripts')
    <script>
        'use strict';

        let isAdvancedUpload = function () {
            var div = document.createElement('div');
            return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
        }();

        jQuery(document).ready(function ($) {
            // feature detection for drag&drop upload
            var isAdvancedUpload = function() {
                var div = document.createElement('div');
                return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
            }();

            // applying the effect for every form
            $('.upload-box').each(function() {
                var $form		 = $(this),
                    $input		 = $form.find('input[type="file"]'),
                    $preview	 = $form.find('.upload-preview'),
                    $box         = $form.find('.upload-input'),
                    $label		 = $form.find('label'),
                    $errorMsg	 = $form.find('.upload-error span'),
                    $restart	 = $form.find('.upload-restart'),
                    $deleteBtn   = $form.find('.delete-file'),
                    droppedFiles = false,
                    showPreview = function(droppedFiles) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $box.css('opacity', 0);
                            $box.css('height', 0);
                            $preview.attr('src', e.target.result).show();
                            $deleteBtn.show();
                            $('[type="hidden"][name="remove"][value="1"]').remove();
                        }
                        reader.readAsDataURL(droppedFiles[0]);
                    };


                $deleteBtn.on('click', function(e) {
                    $box.css('opacity', 1);
                    $box.css('height', 'auto');
                    $box.show();
                    $input.attr('type', null).attr('type', 'file').val(null);
                    $preview.hide().attr('src', null);
                    $deleteBtn.hide();
                    $form.append('<input type="hidden" name="remove" value="1">');
                });

                // automatically submit the form on file select
                $input.on('change', function(e) {
                    showPreview(e.target.files);
                });

                // drag&drop files if the feature is available
                if ( isAdvancedUpload ) {
                    $form.addClass( 'has-advanced-upload' )
                        .on( 'drag dragstart dragend dragover dragenter dragleave drop', function( e ) {
                            // preventing the unwanted behaviours
                            // e.preventDefault();
                            // e.stopPropagation();
                        })
                        .on( 'dragover dragenter', function() {
                            $form.addClass( 'is-dragover' );
                        })
                        .on( 'dragleave dragend drop', function() {
                            $form.removeClass( 'is-dragover' );
                        });
                }

                // Firefox focus bug fix for file input
                $input.on('focus', function() {
                    $input.addClass( 'has-focus' );
                }).on('blur', function() {
                    $input.removeClass( 'has-focus' );
                });
            });

        });
    </script>
@endpush
