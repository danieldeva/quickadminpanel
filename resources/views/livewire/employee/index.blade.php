<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('employee_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Employee" format="csv" />
                <livewire:excel-export model="Employee" format="xlsx" />
                <livewire:excel-export model="Employee" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.employee.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.department') }}
                            @include('components.table.sort', ['field' => 'department.name'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.salary') }}
                            @include('components.table.sort', ['field' => 'salary'])
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.created_at') }}
                            @include('components.table.sort', ['field' => 'created_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $employee->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $employee->id }}
                            </td>
                            <td>
                                @if($employee->department)
                                    <span class="badge badge-relationship">{{ $employee->department->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $employee->name }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $employee->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $employee->email }}
                                </a>
                            </td>
                            <td>
                                {{ $employee->phone }}
                            </td>
                            <td>
                                @foreach($employee->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $employee->address }}
                            </td>
                            <td>
                                {{ $employee->salary }}
                            </td>
                            <td>
                                {{ $employee->created_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('employee_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.employees.show', $employee) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('employee_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.employees.edit', $employee) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('employee_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $employee->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $employees->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush