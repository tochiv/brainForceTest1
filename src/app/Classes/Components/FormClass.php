<?php

declare(strict_types=1);

namespace Classes\Components;

class FormClass
{
    private string $htmlString;

    public function __construct(array $info)
    {

        $this->htmlString = '<form ';
        foreach ($info as $key => $value) {
            $this->htmlString .= "$key='$value' ";
        }
        $this->htmlString .= '>';
    }

    public function addInput(InputClass $input)
    {
        $this->htmlString .= $input->build();
    }

    public function addSelect(SelectClass $select)
    {
        $this->htmlString .= $select->build();
    }

    public function build(): string
    {
        return $this->htmlString . "</form>";
    }
}
