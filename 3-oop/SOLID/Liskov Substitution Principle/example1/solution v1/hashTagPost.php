<?php
include_once "generalPost.php";
class hashTagPost extends generalPost{
    public function createPost($content)
    {
        return "Hashtag Post :$content";
    }
}