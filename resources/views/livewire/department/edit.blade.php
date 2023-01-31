<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('department.country_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="country">{{ trans('cruds.department.fields.country') }}</label>
        <x-select-list class="form-control" required id="country" name="country" :options="$this->listsForFields['country']" wire:model="department.country_id" />
        <div class="validation-message">
            {{ $errors->first('department.country_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.department.fields.country_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('department.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.department.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="department.name">
        <div class="validation-message">
            {{ $errors->first('department.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.department.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('department.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.department.fields.status') }}</label>
        <select class="form-control" wire:model="department.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('department.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.department.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>