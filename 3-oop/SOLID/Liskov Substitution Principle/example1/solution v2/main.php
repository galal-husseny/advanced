<?php
// car => drive
// bike => drive

// $object = new car;
// $object = new bike;
// $object->drive();

// LSP IF S is  a subtype of T , => S -> child , T -> parent
// then objects of type T in a program may be replaced with objects of type S
// without altering any of the desirable properties in the program 


include_once "mentionPost.php";
include_once "generalPost.php";
include_once "hashTagPost.php";
include_once "pollPosts.php";

class main {
    public function main()
    {
        $posts = [
            'Hello EveryBody',
            '@Ahmed Welcome To My Profile',
            '#Don\'t_try_this',
            '-Poll Post'
        ];

        foreach($posts AS $post){
            if(str_starts_with($post,'@')){
                $post = new mentionPost; 
            }elseif(str_starts_with($post,'#')){
                $post = new hashTagPost; 
            }elseif(str_starts_with($post,'-')){
                $post = new PollPosts;
            }else{
                $post = new generalPost; 
            }
            echo $post->createPost($post) ."<br>";
            // General Post:hello everybody 
            // Mention Post:@Ahmed Welcome To My Profile
            // Hashtag Post:#Don\'t_try_this
            // Poll Post:#Poll Post
        }
    }
}