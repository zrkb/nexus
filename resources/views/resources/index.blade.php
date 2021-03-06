@extends('nexus::layouts/table')

@section('content')

    <!-- START page-title -->
    @component('nexus::misc/page-title')
        @slot('superactions')
            @include('nexus::components/resources/create-button')
        @endslot

        @include('nexus::misc/models/segments')

        {{ $resource->label() }}
    @endcomponent
    <!-- END page-title -->

    @messages

    <!-- START table -->
    @table(['items' => $items])

        <!-- START thead -->
        @slot('thead')
            @foreach ($resource->indexFields() as $field)
                @php
                    $tdClass = in_array($field->attribute, ['id', 'image']) ? 'class=tid' : ''
                @endphp
                <th {{ $tdClass }}>{{ $field->name }}</th>
            @endforeach

            @if ($resource::newModel()->hasSoftDelete())
                <th class="text-center">Status</th>
            @endif

            <th></th>
        @endslot
        <!-- END thead -->

        <!-- START tbody -->
        @slot('tbody')
            @foreach($items as $item)
                <tr>
                    @foreach ($resource->indexFields() as $field)
                        @php
                            $tdClass = $field->attribute == 'id' ? 'class=tid' : ''
                        @endphp
                        <td {{ $tdClass }}>
                            {!! html_entity_decode($field->renderForIndex($item, $resource)->render()) !!}
                        </td>
                    @endforeach

                    @if ($item->hasSoftDelete())
                        <td class="actions text-center">
                            @include('nexus::misc/models/status-badge', ['model' => $item])
                        </td>
                    @endif

                    <td class="actions text-center">
                        @include('nexus::misc/models/crud-actions', ['model' => $item])
                    </td>
                </tr>
            @endforeach
        @endslot
        <!-- END tbody -->

    @endtable
    <!-- END table -->

@endsection
