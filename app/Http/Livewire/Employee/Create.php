<?php

namespace App\Http\Livewire\Employee;

use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Employee $employee;

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

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.employee.create');
    }

    public function submit()
    {
        $this->validate();

        $this->employee->save();
        $this->syncMedia();

        return redirect()->route('admin.employees.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->employee->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'employee.department_id' => [
                'integer',
                'exists:departments,id',
                'required',
            ],
            'employee.name' => [
                'string',
                'required',
            ],
            'employee.email' => [
                'email:rfc',
                'required',
            ],
            'employee.phone' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'mediaCollections.employee_photo' => [
                'array',
                'required',
            ],
            'mediaCollections.employee_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'employee.address' => [
                'string',
                'required',
            ],
            'employee.salary' => [
                'numeric',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['department'] = Department::pluck('name', 'id')->toArray();
    }
}
