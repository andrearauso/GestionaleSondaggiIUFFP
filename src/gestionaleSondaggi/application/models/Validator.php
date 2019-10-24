<?php


namespace Models;


class Validator
{
    public function validateInt($element)
    {
        $validElement=$this->sanatizeInput($element);
        return intval($validElement);
    }

    public function validateString($element)
    {
        $validElement=$this->sanatizeInput($element);

        $pattern = '/^[A-Za-z0-9_-]*$/';
        if (!preg_match($pattern, $validElement)) {
            $validElement=strval($validElement);
        }
        return $validElement;


    }

    private function sanatizeInput($element){
        $element = trim(stripslashes(htmlspecialchars($element)));
        return $element;
    }


}