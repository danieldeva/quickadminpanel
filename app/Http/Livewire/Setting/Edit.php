<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Setting $setting;

    public array $mediaToRemove = [];

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Setting $setting)
    {
        $this->setting          = $setting;
        $this->mediaCollections = [
            'setting_website_logo' => $setting->website_logo,
        ];
    }

    public function render()
    {
        return view('livewire.setting.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->setting->save();
        $this->syncMedia();

        return redirect()->route('admin.settings.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->setting->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'mediaCollections.setting_website_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_website_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'setting.phone' => [
                'integer',
                'min:1',
                'max:21474836479',
                'nullable',
            ],
            'setting.email' => [
                'email:rfc',
                'nullable',
            ],
            'setting.welcome_message' => [
                'string',
                'nullable',
            ],
            'setting.copyright' => [
                'string',
                'nullable',
            ],
            'setting.youtube' => [
                'Url',
                'nullable',
            ],
        ];
    }
}
