<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class Create extends Component
{
    public Blog $blog;

    public array $listsForFields = [];

    public function mount(Blog $blog)
    {
        $this->blog         = $blog;
        $this->blog->status = 'active';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.blog.create');
    }

    public function submit()
    {
        $this->validate();

        $this->blog->save();

        return redirect()->route('admin.blogs.index');
    }

    protected function rules(): array
    {
        return [
            'blog.title' => [
                'string',
                'required',
            ],
            'blog.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'blog.content' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->blog::STATUS_SELECT;
    }
}
