<?php
namespace CaptchaFernet;

use Anhskohbo\NoCaptcha\NoCaptcha;
use Symfony\Component\HttpFoundation\Request;

class Captcha 
{
    private NoCaptcha $captcha;

    public function __construct(NoCaptcha $captcha)
    {
        $this->captcha = $captcha;
    }

    public function verify(Request $request)
    {
        $value = $request->request->get('g-recaptcha-response');
        return $this->captcha->verifyResponse($value);
    }
}
