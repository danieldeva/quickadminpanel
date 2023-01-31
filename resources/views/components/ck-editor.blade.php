<div wire:ignore>

    <textarea class="ck-editor__editable" id="{{ $attributes['id'] }}" wire:model.defer="{{ $attributes['property'] }}">
    </textarea>


</div>
@push('scripts')
    <script>
        document.addEventListener("livewire:load", () => {
            ClassicEditor
                .create(document.querySelector(`#{{ $attributes['id'] }}`), {
                    simpleUpload: {
                        uploadUrl: '{{ route('admin.ckImage') . '?_token=' . csrf_token() }}',
                    }

                })
                .then(editor => {
                    editor.model.document.on('change:data', (e) => {
                        @this.set('{{ $attributes['property'] }}', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
