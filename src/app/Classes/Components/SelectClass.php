<?php

declare(strict_types=1);

namespace Classes\Components;

class SelectClass
{
    private string $htmlString;

    public function __construct(array $info, bool $isRequired = false)
    {

        $this->htmlString = '<select ';
        foreach ($info as $key => $value) {
            $this->htmlString .= "$key='$value' ";
        }
        if ($isRequired === true) {
            $this->htmlString .= "required";
        }
        $this->htmlString .= '>';
    }

    public function addOption(OptionClass $option)
    {
        $this->htmlString .= $option->build();
    }

    public function build(): string
    {
        return $this->htmlString . "</select>";
    }

}