{{-- Vendor --}}
<script src="{{ assets_path() }}/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/@shopify/draggable/lib/es5/draggable.bundle.legacy.js"></script>
<script src="{{ assets_path() }}/assets/libs/autosize/dist/autosize.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/highlightjs/highlight.pack.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/list.js/dist/list.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/quill/dist/quill.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/chart.js/Chart.extension.min.js"></script>
<script src="{{ assets_path() }}/assets/libs/bootbox/bootbox.js"></script>
<script src="{{ assets_path() }}/assets/libs/tags/tags.js"></script>
<script src="{{ assets_path() }}/assets/libs/fancybox/fancybox.min.js"></script>

{{-- App --}}
<script src="{{ mix('/assets/js/app.js', 'vendor/nexus') }}" defer></script>

{{-- Extra --}}
@stack('scripts')
