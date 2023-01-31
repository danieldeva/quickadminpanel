@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.department.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('department_create')
                    <a class="btn btn-indigo" href="{{ route('admin.departments.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.department.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('department.index')

    </div>
</div>
@endsection