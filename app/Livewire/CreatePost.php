<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{
    public $isOpen = false;

    public $title, $content;

    protected $rules = [
        'title' => 'required|max:10',
        'content' => 'required|min:3'
    ];


    public function updated($prop)
    {
        $this->validateOnly($prop);
    }


    public function save()
    {
        $this->validate();
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['isOpen', 'title', 'content']);

        $this->dispatch('render')->to(ShowPosts::class);
        $this->dispatch('alert', 'El post ha sido creado satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
