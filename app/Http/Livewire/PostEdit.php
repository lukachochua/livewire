<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $content;
    public $photo;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000'
    ];



    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function updatedPhoto()
    {
        $this->validate();
    }

    public function submitForm()
    {
        $this->validate();

        $imageToShow = $this->post->photo ?? null;

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $imageToShow,
        ]);

        session()->flash('message', 'Post was successfully updated!');
    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
