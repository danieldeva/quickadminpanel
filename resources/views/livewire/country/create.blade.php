<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mediaCollections.country_flag') ? 'invalid' : '' }}">
        <label class="form-label required" for="flag">{{ trans('cruds.country.fields.flag') }}</label>
        <x-dropzone id="flag" name="flag" action="{{ route('admin.countries.storeMedia') }}" collection-name="country_flag" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.country_flag') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.flag_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('country.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.country.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="country.name">
        <div class="validation-message">
            {{ $errors->first('country.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('country.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.country.fields.status') }}</label>
        <select class="form-control" wire:model="country.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('country.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>