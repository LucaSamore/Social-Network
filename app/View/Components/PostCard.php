<?php

namespace App\View\Components;

use Illuminate\View\Component;

final class PostCard extends Component
{
    /**
     *  The post to show
     *
     * @var array<mixed>
     */
    public $post;

    /**
     *  The creator of the post
     *
     * @var array<string,mixed>
     */
    public $creator;

    /**
     *  Images related to the post
     *
     * @var array<string,mixed>
     */
    public $images;

    /**
     *  Videos related to the post
     *
     * @var array<string,mixed>
     */
    public $videos;

    /**
     *  Is this post in user's bookmarks?
     *
     * @var boolean
     */
    public $bookmarked;

    /**
     *  All comments within this post
     *
     * @var boolean
     */
    public $comments;

    /**
     *  All tags within this post
     *
     * @var boolean
     */
    public $tags;

    /**
     *  Can I edit this post?
     *
     * @var boolean
     */
    public $editable;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $creator, $images, $videos, $bookmarked, $comments, $tags, $editable)
    {
        $this->post = $post;
        $this->creator = $creator;
        $this->images = $images;
        $this->videos = $videos;
        $this->bookmarked = $bookmarked;
        $this->comments = $comments;
        $this->tags = $tags;
        $this->editable = $editable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
