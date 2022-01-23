<?php
include_once "posts.php";
class hashTagPost implements posts{
    public function createPost($content)
    {
        return "Hashtag Post :$content";
    }
}