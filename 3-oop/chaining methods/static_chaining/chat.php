<?php
namespace static_chaining;
class chat{
    public static function start()
    {
        echo "chat has been started <br>";
        return __CLASS__;
    }

    public static function sendMessage(string $message)
    {
        echo $message . "<br>";
        return chat::class;
    }

    public static function close()
    {
        echo "chat has been closed <br>";
        return self::class;
    }
}

