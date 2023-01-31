@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.gallery.title_singular') }}:
                    {{ trans('cruds.gallery.fields.id') }}
                    {{ $gallery->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('gallery.edit', [$gallery])
        </div>
    </div>
</div>
@endsection