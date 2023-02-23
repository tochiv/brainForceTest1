<?php

declare(strict_types=1);

namespace Classes\Components;

class InputClass
{
    private string $htmlString;

    public function __construct(string $type, array $info, bool $isRequired = false)
    {
        $this->htmlString = "<input type='$type' ";
        foreach ($info as $key => $value) {
            $this->htmlString .= "$key='$value' ";
        }
        if ($isRequired === true) {
            $this->htmlString .= "required";
        }
    }

    public function build(): string
    {
        return $this->htmlString . '>';
    }
}
