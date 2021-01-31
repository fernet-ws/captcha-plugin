<?php

namespace CaptchaFernet\Component;

use Anhskohbo\NoCaptcha\NoCaptcha;

abstract class Base
{
    protected NoCaptcha $captcha;

    public $preventWrapper = true;

    public function __construct(NoCaptcha $captcha)
    {
        $this->captcha = $captcha;
    }
}
