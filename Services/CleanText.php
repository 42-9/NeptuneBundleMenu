<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23/05/2019
 * Time: 11:08
 */

namespace ScyLabs\NeptuneBundle\Services;


class CleanText
{
    public function clean(?string $string){
        if(null === $string)
            return '';

        $string = str_replace(
            array(" ", "À", "Á", "Â", "Ã", "Ä", "Å", "à", "á", "â", "ã", "ä", "å", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "ò", "ó", "ô", "õ", "ö", "ø", "È", "É", "Ê", "Ë", "è", "é", "ê", "ë", "Ç", "ç", "Ì", "Í", "Î", "Ï", "ì", "í", "î", "ï", "Ù", "Ú", "Û", "Ü", "ù", "ú", "û", "ü", "ÿ", "Ñ", "ñ", "(", ")", "[", "]", "'", "#", "~", "$", "&", "%", "*", "@", "ç", "!", "?", ";", ",", ":", "/", "^", "¨", "€", "{", "}", "|", "+", ".", "²"),
            array("-", "A", "A", "A", "A", "A", "A", "a", "a", "a", "a", "a", "a", "O", "O", "O", "O", "O", "O", "o", "o", "o", "o", "o", "o", "E", "E", "E", "E", "e", "e", "e", "e", "C", "c", "I", "I", "I", "I", "i", "i", "i", "i", "U", "U", "U", "U", "u", "u", "u", "u", "y", "N", "n", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "euro", "", "", "", "", "", "2"),
            $string
        );

        return strtolower(preg_replace("#[^a-zA-Z_0-9.-]#","",$string));

    }
}