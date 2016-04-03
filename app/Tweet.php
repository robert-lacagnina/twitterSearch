<?php

namespace App;


class Tweet implements \JsonSerializable {

    public $createdTimestamp;
    public $handle;
    public $tweetText;

    public function jsonSerialize() {
        return
            [
                'createdTimeStamp' => $this->createdTimestamp,
                'handle' => $this->handle,
                'tweetText' => $this->tweetText
            ];
    }
}