@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.blog.title_singular') }}:
                    {{ trans('cruds.blog.fields.id') }}
                    {{ $blog->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.blog.fields.id') }}
                            </th>
                            <td>
                                {{ $blog->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blog.fields.title') }}
                            </th>
                            <td>
                                {{ $blog->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blog.fields.status') }}
                            </th>
                            <td>
                                {{ $blog->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blog.fields.content') }}
                            </th>
                            <td>
                                {{ $blog->content }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('blog_edit')
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection