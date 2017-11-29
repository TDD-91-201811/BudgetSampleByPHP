<?php

namespace App\Utilities;

class Linker
{
    /**
     * Copy from
     * http://www.danielmayor.com/php-convert-plain-text-links-to-a-clickable-link-html
     */
    public function autolink($text)
    {
        $text = strip_tags($text);

        // trigger build

        return preg_replace(
            '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-~]*(\?\S+)?)?)?)@',
            '<a href="$1">$1</a>',
            $text
        );
    }
}
