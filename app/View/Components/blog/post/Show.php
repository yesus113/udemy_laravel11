<?php
namespace App\View\Components\blog\post;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    //public Post $post;
    protected $except = [''];
    public function __construct(public Post $post, public string $title = '')
    {
        
    }

    public function changeTitle(){
        $this->post->title = ' New Title';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   
        
    
        return view('components.blog.post.show');
    }
}