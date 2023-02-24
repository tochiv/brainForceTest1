<?php

declare(strict_types=1);

namespace Classes\Components;

class OptionClass
{
    public string $htmlString;

    public function __construct(string $option, array $info)
    {
        $this->htmlString = "<option value='$option'";
        foreach ($info as $key => $value) {
            $this->htmlString .= "$key='$value' ";
        }
        $this->htmlString .= '>' . $option;
    }

    public function build(): string
    {
        return $this->htmlString . '</option>';
    }
}
