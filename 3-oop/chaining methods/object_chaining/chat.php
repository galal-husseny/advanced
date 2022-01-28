<?php
namespace object_chaining;
class chat {
    public function start()
    {
        echo "chat has been started <br>";
        return $this;
    }

    public function sendMessage(string $message)
    {
        echo $message . "<br>";
        return $this; // object
    }

    public function close()
    {
        echo "chat has been closed <br>";
        return $this;
    }
}