@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.gallery.title_singular') }}:
                    {{ trans('cruds.gallery.fields.id') }}
                    {{ $gallery->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.id') }}
                            </th>
                            <td>
                                {{ $gallery->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.image') }}
                            </th>
                            <td>
                                @foreach($gallery->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.heading') }}
                            </th>
                            <td>
                                {{ $gallery->heading }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.status') }}
                            </th>
                            <td>
                                {{ $gallery->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.sort_order') }}
                            </th>
                            <td>
                                {{ $gallery->sort_order }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('gallery_edit')
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection