<?php

namespace App\Services;

class ReadTimeCalculator
{
    public function calculateReadTime($content, $wordPerMinutes = 200 )
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount  / $wordPerMinutes);

        return $minutes;

    }
}