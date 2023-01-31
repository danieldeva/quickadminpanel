<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mediaCollections.gallery_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="image">{{ trans('cruds.gallery.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.galleries.storeMedia') }}" collection-name="gallery_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.gallery_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('gallery.heading') ? 'invalid' : '' }}">
        <label class="form-label required" for="heading">{{ trans('cruds.gallery.fields.heading') }}</label>
        <input class="form-control" type="text" name="heading" id="heading" required wire:model.defer="gallery.heading">
        <div class="validation-message">
            {{ $errors->first('gallery.heading') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.heading_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('gallery.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.gallery.fields.status') }}</label>
        <select class="form-control" wire:model="gallery.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('gallery.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('gallery.sort_order') ? 'invalid' : '' }}">
        <label class="form-label required" for="sort_order">{{ trans('cruds.gallery.fields.sort_order') }}</label>
        <input class="form-control" type="number" name="sort_order" id="sort_order" required wire:model.defer="gallery.sort_order" step="1">
        <div class="validation-message">
            {{ $errors->first('gallery.sort_order') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.sort_order_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>