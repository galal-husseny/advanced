<?php
include_once "generalPost.php";
class mentionPost extends generalPost {
    public function createPost($content)
    {
       return "Mention Post :$content";
    }
}