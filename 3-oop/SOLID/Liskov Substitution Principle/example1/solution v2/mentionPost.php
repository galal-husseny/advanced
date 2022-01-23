<?php
include_once "posts.php";
class mentionPost implements posts {
    public function createPost($content)
    {
       return "Mention Post :$content";
    }
}