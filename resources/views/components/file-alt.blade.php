<div class="file-action">
    @isset($file)
        <div class="file-container mb-4">
            <p>
                {{ $file->basename }}
                <a href="{{ $file->getUrl() }}" target="_blank">
                    <i data-feather="external-link"></i>
                </a>
            </p>

            @if ($file->isImage())
                <img src="{{ $file->getUrl() }}" class="d-block mb-2 img-fluid img-thumbnail rounded w-50 img-content" alt="{{ $file->name }}">
            @else
                <img src="{{ assets_path('/assets/img/icons/file-icon.svg') }}" class="d-block mb-2 img-content" alt="{{ $file->name }}">
            @endif

            <a href="javascript:;" class="text-danger delete-file mt-2">
                <i class="bx bx-trash"></i>
                <span>Borrar archivo</span>
            </a>
        </div>
    @endisset

    <div class="custom-file">
        {{ form()->label('file', 'Seleccione un archivo ...', ['class' => 'custom-file-label']) }}
        {{ form()->file('file', ['class' => 'custom-file-input', 'data-browse' => 'Elegir']) }}
    </div>

    <small class="form-text mt-3"><strong>Nota:</strong> Solo se permiten subir imágenes de hasta 10MB.</small>
</div>

@push('scripts')
    <script>
        class InputFile {
            constructor() {
                this.initialize();
            }

            initialize() {
                // Input File
                $('.custom-file input[type="file"]').change(function(event){
                    let el = $(this);
                    let filename = event.target.files[0].name;
                    el.parent().find('.custom-file-label').html(filename);
                });
            }
        }

        jQuery(document).ready(new InputFile);
    </script>
@endpush