<?php
include_once "generalPost.php";
class hashTagPost extends generalPost{
    public function createHashTagPost($content)
    {
        return "Hashtag Post :$content";
    }
}