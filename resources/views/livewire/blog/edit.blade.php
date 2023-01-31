<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('blog.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.blog.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="blog.title">
        <div class="validation-message">
            {{ $errors->first('blog.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('blog.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.blog.fields.status') }}</label>
        <select class="form-control" wire:model="blog.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('blog.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('blog.content') ? 'invalid' : '' }}">
        <label class="form-label required" for="content">{{ trans('cruds.blog.fields.content') }}</label>
        <x-ck-editor property="blog.content" id="content" class="w-full"></x-ck-editor>
        {{-- <textarea class="form-control" name="content" id="content" required wire:model.defer="blog.content" rows="4"></textarea> --}}
        <div class="validation-message">
            {{ $errors->first('blog.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blog.fields.content_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>