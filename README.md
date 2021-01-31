# CaptchaFernet

Google reCAPTCHA plugin for the Fernet framework. The plugin uses the [No CAPTCHA reCAPTCHA](https://github.com/anhskohbo/no-captcha) package.

## Set up 

Create a [Google reCAPTCHA](https://www.google.com/recaptcha/) v2 site. Add the configuration to your .env:

```ini
CAPTCHA_SITE="paste the site code"
CAPTCHA_SECRET="paste de secret code"
```

If you set up the plugin manually don't forget to add **"fernet/captcha"** to the plugins.json file.

## Usage

The plugin come with 2 components: <Captcha /> and <CaptchaScript />. CaptchaScript is needed to add the Google's script.

```php
<?php
namespace App\Component;

use CaptchaFernet\Captcha;
use Symfony\Component\HttpFoundation\Request;

class TodoForm 
{
    private Captcha $captcha;
    private string $message = 'Press the submit button';

    public function __construct(Captcha $captcha)
    {
        $this->captcha = $captcha;
    }
    
    public function handleSubmit(Request $request)
    {
        if (!$this->captcha->verify($request)) {
            $this->message = 'Captcha ok!';
        } else {
            $this->message = 'Error Captcha';
        }
    }

    public function __toString(): string
    {
        return <<<EOH
            <h1>{$this->message}</h1>
            <form @onSubmit="handleSubmit">
                <Captcha />
                <button>Submit</button>
            </form>
EOH;
    }
}
```

Don't forget to add the script file.

```php
<?php
namespace App\Component;

class App 
{
    public $preventWrapper = true;

    public function __toString(): string
    {
        return <<<EOH
            <html>
            <body>
                <TodoForm />
                <CaptchaScript />
            </body>
            </html>
EOH;
    }
}
```
