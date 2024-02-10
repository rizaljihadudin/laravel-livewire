<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;

class TaskCreate extends Component
{
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $priority = '';

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.task-create');
    }

    public function save()
    {
        $this->validate();

        Task::create([
            'title'     => $this->title,
            'priority'  => $this->priority
        ]);

        session()->flash('status', 'Task berhasil di Tambah.');
        return $this->redirectRoute('task', navigate:true);
    }
}
