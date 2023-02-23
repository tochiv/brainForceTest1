<?php

declare(strict_types=1);

namespace Classes\Core;

class Mail
{
    private string $to;

    private string $subject;

    private string $message;

    private string $headers;
    public function __construct(string $to, string $subject, string $message)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function send()
    {
        mail($this->to, $this->subject, $this->message);
    }
}