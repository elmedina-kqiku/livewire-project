<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{

    public $comments;

    public $newComment;

    public function mount()
    {
//        $this->newComment = 'I am from mounted function';

        $initialComments = Comment::latest()->get();
          $this->comments = $initialComments;
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment'=>'required']);
    }

    public function addComment()
    {
        $this->validate(['newComment'=>'required|max:255']);

        $createdComment = Comment::create([
            'body' => $this->newComment, 'user_id' => 1
        ]);

        $this->comments->prepend($createdComment);

        $this->newComment = "";

        session()->flash('message', 'Comment added succesfully');
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        //this way is not deleted from the database
//        $this->comments = $this->comments->where('id','!=', $commentId);

        //or this way is deleted from the database
        $comment->delete();

        $this->comments = $this->comments->except($commentId);

        session()->flash('message', 'Comment deleted succesfully');

    }
    public function render()
    {
        return view('livewire.comments');
    }
}
