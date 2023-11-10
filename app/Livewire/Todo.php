<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo as Todos;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Todo extends Component
{
    use LivewireAlert;
    public $todos;
    public $task;
    public $status;

    public function render()
    {
        return view('livewire.todo');
    }

    function fetchTodos(){
        $this->todos=Todos::all()->reverse();
    }

    function mount(){
        $this->fetchTodos();
    }

    function addTodo(){
        if($this->task!=''){
            $addTodo=new Todos;
            $addTodo->task=$this->task;
            $addTodo->status=1;
            $addTodo->save();
            $this->alert('success', 'Task is Added Successfully');
            $this->task='';
            $this->status='';
            $this->mount();

        }

    function markAsDone(Todos $todo){

        $todo->status='inactive';
        $todo->save();
        $this->alert('success', 'Task is Marked As Done');
        $todo->status='';
       }
    }

    function deleteTask(Todos $todo){
        $todo->delete();
        $this->alert('success', 'Task is Deleted Successfully');
        $this->mount();
    }

    public function markAsDone($todoId)
    {
        $todo = Todos::find($todoId);

        if ($todo) {
            $todo->status = 0;
            $todo->save();
            $this->alert('success', 'Task is Marked As finished');
            $this->status='';
        }

        $this->fetchTodos();
    }

    public function   markAsNotDone($todoId)
    {
        $todo = Todos::find($todoId);

        if ($todo) {
            $todo->status = 1;
            $todo->save();
            $this->alert('success', 'Task is Marked As Unfinished');
            $this->status='';
        }
        $this->fetchTodos();
    }


}

