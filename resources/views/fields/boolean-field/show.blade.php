<span class="badge badge-soft-{{ $value ? 'success' : 'danger' }}">
    {{ $value ? $field->trueLabel : $field->falseLabel }}
</span>
