//
// user.js
// User scripts
//

'use strict';

// Dump & Die
window.dd = console.log;

class TableCheckboxManager {
    constructor() {
        this.init();
    }

    init() {
        document.body.addEventListener('click', (event) => {
            if (event.target.classList.contains('table-checkbox-manager')) {
                const el = event.target;
                const table = el.closest('table');
                const tableCheckboxes = table.querySelectorAll('.table-checkbox-item');

                tableCheckboxes.forEach(checkbox => {
                    checkbox.checked = el.checked;
                    checkbox.dispatchEvent(new Event('change', { bubbles: true }));
                });
            }
        });

        document.body.addEventListener('change', (event) => {
            if (event.target.classList.contains('table-checkbox-item')) {
                const el = event.target;
                const checked = el.checked;
                const table = el.closest('table');
                const checkedItems = table.querySelectorAll('.table-checkbox-item:checked');
                const checkboxManager = table.querySelector('.table-checkbox-manager');
                const allItems = table.querySelectorAll('.table-checkbox-item');

                if (checkedItems.length === 0) {
                    checkboxManager.checked = false;
                    checkboxManager.indeterminate = false;
                } else if (checkedItems.length === allItems.length) {
                    checkboxManager.checked = true;
                    checkboxManager.indeterminate = false;
                } else {
                    checkboxManager.indeterminate = true;
                }

                const row = el.closest('tr');
                if (checked) {
                    row.classList.add('bg-light');
                } else {
                    row.classList.remove('bg-light');
                }
            }
        });

        // Initialize state for checkboxes on page load
        document.querySelectorAll('.table-checkbox-item').forEach(checkbox => {
            const row = checkbox.closest('tr');
            const table = checkbox.closest('table');

            // Apply bg-light class if checkbox is checked
            if (checkbox.checked) {
                row.classList.add('bg-light');
            }

            // Update the manager checkbox state
            if (table) {
                const checkedItems = table.querySelectorAll('.table-checkbox-item:checked');
                const checkboxManager = table.querySelector('.table-checkbox-manager');
                const allItems = table.querySelectorAll('.table-checkbox-item');

                if (checkboxManager) {
                    if (checkedItems.length === 0) {
                        checkboxManager.checked = false;
                        checkboxManager.indeterminate = false;
                    } else if (checkedItems.length === allItems.length) {
                        checkboxManager.checked = true;
                        checkboxManager.indeterminate = false;
                    } else {
                        checkboxManager.indeterminate = true;
                    }
                }
            }
        });
    }
}

window.slugify = function(text, separator = '-') {
    text = text.toString().toLowerCase().trim();

    const sets = [
        {to: 'a', from: '[ÀÁÂÃÄÅÆĀĂĄẠẢẤẦẨẪẬẮẰẲẴẶ]'},
        {to: 'c', from: '[ÇĆĈČ]'},
        {to: 'd', from: '[ÐĎĐÞ]'},
        {to: 'e', from: '[ÈÉÊËĒĔĖĘĚẸẺẼẾỀỂỄỆ]'},
        {to: 'g', from: '[ĜĞĢǴ]'},
        {to: 'h', from: '[ĤḦ]'},
        {to: 'i', from: '[ÌÍÎÏĨĪĮİỈỊ]'},
        {to: 'j', from: '[Ĵ]'},
        {to: 'ij', from: '[Ĳ]'},
        {to: 'k', from: '[Ķ]'},
        {to: 'l', from: '[ĹĻĽŁ]'},
        {to: 'm', from: '[Ḿ]'},
        {to: 'n', from: '[ÑŃŅŇ]'},
        {to: 'o', from: '[ÒÓÔÕÖØŌŎŐỌỎỐỒỔỖỘỚỜỞỠỢǪǬƠ]'},
        {to: 'oe', from: '[Œ]'},
        {to: 'p', from: '[ṕ]'},
        {to: 'r', from: '[ŔŖŘ]'},
        {to: 's', from: '[ßŚŜŞŠ]'},
        {to: 't', from: '[ŢŤ]'},
        {to: 'u', from: '[ÙÚÛÜŨŪŬŮŰŲỤỦỨỪỬỮỰƯ]'},
        {to: 'w', from: '[ẂŴẀẄ]'},
        {to: 'x', from: '[ẍ]'},
        {to: 'y', from: '[ÝŶŸỲỴỶỸ]'},
        {to: 'z', from: '[ŹŻŽ]'},
        {to: '-', from: '[·/_,:;\']'}
    ];

    sets.forEach(set => {
        text = text.replace(new RegExp(set.from,'gi'), set.to);
    });

    text = text.toString().toLowerCase()
        .replace(/\s+/g, '-')         // Replace spaces with -
        .replace(/&/g, '-and-')       // Replace & with 'and'
        .replace(/[^\w\-]+/g, '')     // Remove all non-word chars
        .replace(/\--+/g, '-')        // Replace multiple - with single -
        .replace(/^-+/, '')           // Trim - from start of text
        .replace(/-+$/, '');          // Trim - from end of text

    if ((typeof separator !== 'undefined') && (separator !== '-')) {
        text = text.replace(/-/g, separator);
    }

    return text;
}


document.addEventListener('DOMContentLoaded', function () {
    /*
     |--------------------------------------------------------------------
     | Vendor Plugins
     |--------------------------------------------------------------------
     */

    new TableCheckboxManager;

    // Currency
    // document.querySelectorAll('body [data-mask]').forEach(function (el) {
    //     el.mask(el.getAttribute('data-mask'), { reverse: el.getAttribute('data-mask-reverse') });
    // });

    /*
     |--------------------------------------------------------------------
     | Bootstrap Components
     |--------------------------------------------------------------------
     */
    // Modal
    document.querySelectorAll('.modal[data-show="true"]').forEach(modal => {
        const modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
    });

    // Tooltip
    document.querySelectorAll('[data-bs-toggle="tooltip"], [data-toggle="tooltip"]').forEach(el => {
        new bootstrap.Tooltip(el);
    });

    // Popover
    // data-popover-content="#popover-container"
    document.querySelectorAll('[data-bs-toggle="popover"], [data-toggle="popover"]').forEach(el => {
        const contentSelector = el.getAttribute('data-popover-content');
        const contentElement = document.querySelector(contentSelector);

        new bootstrap.Popover(el, {
            html: true,
            trigger: 'focus',
            container: '.root',
            content: function() {
                const popoverBody = contentElement.querySelector('.popover-body');
                return popoverBody ? popoverBody.innerHTML : '';
            },
            title: function() {
                const popoverHeading = contentElement.querySelector('.popover-heading');
                return popoverHeading ? popoverHeading.innerHTML : '';
            }
        });
    });

    /*
     |--------------------------------------------------------------------
     | Resource Form
     |--------------------------------------------------------------------
     */

    // Delete File
    // $('.delete-file').on('click', function (event) {
    //     let el = $(event.currentTarget);
    //     let uploadBox = el.parents('.upload-box');
    //     let filePreview = uploadBox.find('.file-preview');
    //     let uploadBox = parent.find('.upload-box');
    //     filePreview.remove();
    //     uploadBox.removeClass('d-none');
    // });

    // Delete Record
    document.body.addEventListener('click', function(event) {
        if (event.target.matches('.delete-record, .destructive-action') ||
            event.target.closest('.delete-record, .destructive-action')) {

            event.preventDefault();

            const el = event.target.closest('.delete-record, .destructive-action') || event.target;
            const formSelector = el.getAttribute('data-form');
            const form = document.querySelector(formSelector);
            const forceDelete = el.getAttribute('data-delete') === 'hard';

            const modalTitle = el.getAttribute('data-modal-title');
            const modalMessage = el.getAttribute('data-modal-message');

            const title = modalTitle ? modalTitle : (forceDelete ? 'Estás seguro de borrar este registro?' : 'Estás seguro de inactivar este registro?');
            const message = modalMessage ? modalMessage : (forceDelete ? 'Una vez eliminado, ya no podrás recuperar este dato y todos los datos relacionados serán borrados de la Base de Datos!' : 'Para activar de vuelta este registro puedes usar el botón Restaurar.');

            const cancelButtonTitle = el.getAttribute('data-cancel-title');
            const confirmButtonTitle = el.getAttribute('data-confirm-title');

            const modal = bootbox.dialog({
                title: title,
                message: message,
                buttons: {
                    cancel: {
                        label: cancelButtonTitle ?? 'Cancelar',
                        className: 'btn-white btn-cancel-modal',
                    },
                    confirm: {
                        label: confirmButtonTitle ?? 'Sí, eliminar registro',
                        className: 'btn-danger btn-activity btn-loading',
                        callback: function () {
                            form.submit();
                        }
                    }
                },
                animate: true,
                closeButton: true,
            });

            modal.init();
        }
    });

    // Input File
    // $('.custom-file input[type="file"]').change(function(event){
    // 	let el = $(this);
    // 	let filename = event.target.files[0].name;
    // 	el.parent().find('.custom-file-label').html(filename);
    // });

    // feature detection for drag&drop upload
    const isAdvancedUpload = (function() {
        const div = document.createElement('div');
        return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
    })();

    document.querySelectorAll('form').forEach(function (form) {
        const wrapper = form.querySelector('.upload-wrapper');
        if (!wrapper) return;

        const box = wrapper.querySelector('.upload-box');
        const input = box ? box.querySelector('input[type="file"]') : null;
        if (!input) return;

        const multipleAttr = input.getAttribute('multiple');
        const label = wrapper.querySelector('.upload-dragndrop');
        const errorMsg = wrapper.querySelector('.upload-error span');
        const restart = wrapper.querySelector('.upload-restart');
        let droppedFiles = false;
        const fileHasMultipleAttr = multipleAttr !== null;

        const showFiles = function(files, isMultiple) {
            if (label && files.length > 0) {
                const text = isMultiple && files.length > 1
                    ? (input.getAttribute('data-multiple-caption') || '').replace('{count}', files.length)
                    : files[0].name;
                label.textContent = text;
            }
        };

        input.addEventListener('change', function (e) {
            showFiles(e.target.files, fileHasMultipleAttr);
        });

        // drag&drop files if the feature is available
        if (isAdvancedUpload && wrapper) {
            wrapper.classList.add('has-advanced-upload'); // letting the CSS part to know drag&drop is supported by the browser

            ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(eventName => {
                wrapper.addEventListener(eventName, function (e) {
                    // preventing the unwanted behaviours
                    e.preventDefault();
                    e.stopPropagation();
                });
            });

            ['dragover', 'dragenter'].forEach(eventName => {
                wrapper.addEventListener(eventName, function () {
                    box.classList.add('is-dragover');
                });
            });

            ['dragleave', 'dragend', 'drop'].forEach(eventName => {
                wrapper.addEventListener(eventName, function () {
                    box.classList.remove('is-dragover');
                });
            });

            wrapper.addEventListener('drop', function (e) {
                droppedFiles = e.dataTransfer.files;
                showFiles(droppedFiles, fileHasMultipleAttr);
                input.files = droppedFiles;
            });
        }

        // Firefox focus bug fix for file input
        input.addEventListener('focus', function() {
            input.classList.add('has-focus');
        });

        input.addEventListener('blur', function() {
            input.classList.remove('has-focus');
        });
    });


    document.querySelectorAll('.input-group-password a').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const el = event.currentTarget;
            const inputGroup = el.closest('.input-group');
            const input = inputGroup.querySelector('input');

            if (input.type === 'text') {
                input.type = 'password';
                const icon = el.querySelector('i');
                if (icon) {
                    icon.className = 'bx bxs-hide text-muted';
                }
            } else if (input.type === 'password') {
                input.type = 'text';
                const icon = el.querySelector('i');
                if (icon) {
                    icon.className = 'bx bxs-show text-primary';
                }
            }
        });
    });
});
