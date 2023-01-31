<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mediaCollections.setting_website_logo') ? 'invalid' : '' }}">
        <label class="form-label" for="website_logo">{{ trans('cruds.setting.fields.website_logo') }}</label>
        <x-dropzone id="website_logo" name="website_logo" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_website_logo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_website_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.website_logo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
        <input class="form-control" type="number" name="phone" id="phone" wire:model.defer="setting.phone" step="1">
        <div class="validation-message">
            {{ $errors->first('setting.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.setting.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="setting.email">
        <div class="validation-message">
            {{ $errors->first('setting.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.welcome_message') ? 'invalid' : '' }}">
        <label class="form-label" for="welcome_message">{{ trans('cruds.setting.fields.welcome_message') }}</label>
        <x-ck-editor property="setting.welcome_message" id="content" class="w-full"></x-ck-editor>
        {{-- <textarea class="form-control" name="welcome_message" id="welcome_message" wire:model.defer="setting.welcome_message" rows="4"></textarea> --}}
        <div class="validation-message">
            {{ $errors->first('setting.welcome_message') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.welcome_message_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.copyright') ? 'invalid' : '' }}">
        <label class="form-label" for="copyright">{{ trans('cruds.setting.fields.copyright') }}</label>
        <textarea class="form-control" name="copyright" id="copyright" wire:model.defer="setting.copyright" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('setting.copyright') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.copyright_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.youtube') ? 'invalid' : '' }}">
        <label class="form-label" for="youtube">{{ trans('cruds.setting.fields.youtube') }}</label>
        <input class="form-control" type="text" name="youtube" id="youtube" wire:model.defer="setting.youtube">
        <div class="validation-message">
            {{ $errors->first('setting.youtube') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.youtube_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
