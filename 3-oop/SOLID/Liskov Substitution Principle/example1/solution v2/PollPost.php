<?php
include_once "posts.php";
class PollPosts implements posts {
    public function createPost($content)
    {
        return "Poll Post :$content";
    }
}