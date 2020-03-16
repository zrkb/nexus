<div class="card card-body">
    @foreach ($fields as $field)
        {!! $field->renderForForm($item, $resource)->render() !!}
    @endforeach
</div>
