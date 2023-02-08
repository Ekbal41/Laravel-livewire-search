<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as PostModel;


class Post extends Component
{
   
    public $titles;
    public string $titleText = '';
    public string $searchText = '';
    protected $queryString = ['searchText'];

    public function mount()
    {
        $this->loadPosts();
    }
    public function render()
    {
    
        return view('livewire.post');
    }
   
    public function loadPosts()
    {
        $query = PostModel::query();
        if ($this->searchText) {
            $afterSearch = $query->where('title', 'like', '%' . $this->searchText . '%');
            $this->titles = $afterSearch->orderBy('id', 'desc')->get();
        } else {
            $this->titles = $query->orderBy('id', 'desc')->get();
        }

        
    }
    public function searchPosts(){
        $this->loadPosts();
    }
    public function addPost()
    {
        $post = new PostModel();
        $post->title = $this->titleText;
        $post->save();
        $this->titleText = '';
        $this->loadPosts();
    }
    public function deletePost($id){
        $post = PostModel::findOrFail($id);
        $post->delete();
        $this->loadPosts();
    }
}
