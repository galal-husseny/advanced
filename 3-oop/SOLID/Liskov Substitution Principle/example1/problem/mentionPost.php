<?php
include_once "generalPost.php";
class mentionPost extends generalPost {
    public function createMentionPost($content)
    {
       return "Mention Post :$content";
    }
}