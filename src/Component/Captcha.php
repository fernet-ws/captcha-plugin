<?php

namespace CaptchaFernet\Component;

class Captcha extends Base
{
    public function __toString()
    {
        return $this->captcha->display();
    }
}

