<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Gallery $gallery;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Gallery $gallery)
    {
        $this->gallery         = $gallery;
        $this->gallery->status = 'active';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.gallery.create');
    }

    public function submit()
    {
        $this->validate();

        $this->gallery->save();
        $this->syncMedia();

        return redirect()->route('admin.galleries.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->gallery->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'mediaCollections.gallery_image' => [
                'array',
                'required',
            ],
            'mediaCollections.gallery_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'gallery.heading' => [
                'string',
                'required',
            ],
            'gallery.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'gallery.sort_order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->gallery::STATUS_SELECT;
    }
}
