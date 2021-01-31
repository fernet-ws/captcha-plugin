<?php

declare(strict_types=1);

namespace CaptchaFernet;

use Fernet\Core\PluginBootstrap;
use Fernet\Framework;
use Fernet\Core\Exception;
use Anhskohbo\NoCaptcha\NoCaptcha;

class Bootstrap extends PluginBootstrap
{
    private const LINK = 'https://github.com/pragmore/captcha-fernet';

    public function setUp(Framework $framework): void
    {
        if (!isset($_ENV['CAPTCHA_SITE'])) {
            throw new Exception("CAPTCHA_SITE config is missing", 0, self::LINK);
        }
        if (!isset($_ENV['CAPTCHA_SECRET'])) {
            throw new Exception("CAPTCHA_SECRET config is missing", 0, self::LINK);
        }
        $captcha = new NoCaptcha($_ENV['CAPTCHA_SECRET'], $_ENV['CAPTCHA_SITE']);
        $framework->getContainer()->add(NoCaptcha::class, $captcha);
        $this->addComponentNamespace(__NAMESPACE__);
    }
}
