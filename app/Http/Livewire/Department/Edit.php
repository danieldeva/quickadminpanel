<?php

namespace App\Http\Livewire\Department;

use App\Models\Country;
use App\Models\Department;
use Livewire\Component;

class Edit extends Component
{
    public Department $department;

    public array $listsForFields = [];

    public function mount(Department $department)
    {
        $this->department = $department;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.department.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->department->save();

        return redirect()->route('admin.departments.index');
    }

    protected function rules(): array
    {
        return [
            'department.country_id' => [
                'integer',
                'exists:countries,id',
                'required',
            ],
            'department.name' => [
                'string',
                'required',
            ],
            'department.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['country'] = Country::pluck('name', 'id')->toArray();
        $this->listsForFields['status']  = $this->department::STATUS_SELECT;
    }
}
