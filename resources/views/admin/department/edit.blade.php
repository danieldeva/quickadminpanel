@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.department.title_singular') }}:
                    {{ trans('cruds.department.fields.id') }}
                    {{ $department->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('department.edit', [$department])
        </div>
    </div>
</div>
@endsection