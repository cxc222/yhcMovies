<?php

namespace App\Libraries\Random;

use Faker\Provider\Text;

class Comment extends Text
{
    /**
     * From uk.wikisource.org
     *
     * Текст доступний на умовах ліцензії Creative Commons Attribution/Share-Alike,
     * також можуть діяти додаткові умови. Детальніше див. Умови використання.
     *
     *
     * Title: Захар Беркут
     *
     * Author: Іван Франко
     *
     * Posting Date: July 19, 2007
     * Release Date: 1882
     * [Last updated: November 14, 2012]
     *
     * Language: Ukrainian
     *
     * @see     https://wikimediafoundation.org/wiki/Terms_of_Use/
     * @link    http://uk.wikisource.org/wiki/%D0%97%D0%B0%D1%85%D0%B0%D1%80_%D0%91%D0%B5%D1%80%D0%BA%D1%83%D1%82
     * @var string
     */
    protected static $baseText = <<<'EOT'
CHAPTER I. Down the Rabbit-Hole

Alice was beginning to get very tired of sitting by her sister on the
bank, and of having nothing to do: once or twice she had peeped into the
book her sister was reading, but it had no pictures or conversations in
it, 'and what is the use of a book,' thought Alice 'without pictures or
conversations?'

So she was considering in her own mind (as well as she could, for the
hot day made her feel very sleepy and stupid), whether the pleasure
of making a daisy-chain would be worth the trouble of getting up and
picking the daisies, when suddenly a White Rabbit with pink eyes ran
close by her.
EOT;
}
