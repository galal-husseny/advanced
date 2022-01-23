<?php
include_once "posts.php";
class generalPost implements posts {
    public function createPost($content)
    {
        return "General Post :$content";
    }
}