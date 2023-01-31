<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('employee.department_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="department">{{ trans('cruds.employee.fields.department') }}</label>
        <x-select-list class="form-control" required id="department" name="department" :options="$this->listsForFields['department']" wire:model="employee.department_id" />
        <div class="validation-message">
            {{ $errors->first('employee.department_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.department_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.employee.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="employee.name">
        <div class="validation-message">
            {{ $errors->first('employee.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.employee.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="employee.email">
        <div class="validation-message">
            {{ $errors->first('employee.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.phone') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone">{{ trans('cruds.employee.fields.phone') }}</label>
        <input class="form-control" type="number" name="phone" id="phone" required wire:model.defer="employee.phone" step="1">
        <div class="validation-message">
            {{ $errors->first('employee.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.employee_photo') ? 'invalid' : '' }}">
        <label class="form-label required" for="photo">{{ trans('cruds.employee.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.employees.storeMedia') }}" collection-name="employee_photo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.employee_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.address') ? 'invalid' : '' }}">
        <label class="form-label required" for="address">{{ trans('cruds.employee.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" required wire:model.defer="employee.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('employee.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.salary') ? 'invalid' : '' }}">
        <label class="form-label required" for="salary">{{ trans('cruds.employee.fields.salary') }}</label>
        <input class="form-control" type="number" name="salary" id="salary" required wire:model.defer="employee.salary" step="0.01">
        <div class="validation-message">
            {{ $errors->first('employee.salary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.salary_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>