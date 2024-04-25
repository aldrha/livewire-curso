<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $isOpen = true;

    public $title, $content, $image, $identificador;



    protected $rules = [
        'title' => 'required|min:4',
        'content' => 'required|min:3',
        'image' => 'required|max:2048'
    ];

    // public function updated($prop)
    // {
    //     $this->validateOnly($prop);
    // }

    public function mount()
    {
        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();

        $image = $this->image->store('post');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->reset(['isOpen', 'title', 'content', 'image']);

        $this->identificador = rand();

        $this->dispatch('render')->to(ShowPosts::class);
        $this->dispatch('alert', 'El post ha sido creado satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
