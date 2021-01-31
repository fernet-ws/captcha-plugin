<?php

namespace CaptchaFernet\Component;

class CaptchaScript extends Base
{
    public function __toString()
    {
        return $this->captcha->renderJs();
    }
}
