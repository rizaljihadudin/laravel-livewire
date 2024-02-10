<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Task extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.task', [
            'tasks' => ModelsTask::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function completed($id)
    {
        ModelsTask::find($id)->update([
            'status' => 'Completed'
        ]);
        session()->flash('status', 'Task berhasil di update.');
    }

    public function delete($id)
    {
        ModelsTask::find($id)->delete();
        session()->flash('status', 'Task Berhasil di hapus.');
    }
}
