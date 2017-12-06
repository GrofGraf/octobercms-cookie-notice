<?php namespace GrofGraf\CookieNotice\Components;

use GrofGraf\CookieNotice\Models\Settings;
use Cms\Classes\ComponentBase;

class cookieNotice extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'cookieNotice Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
      return [
        'loadCSS' => [
            'title'       => 'Load CSS',
            'description' => 'Load css required for animation',
            'type'        => 'checkbox',
            'default'     => true,
        ],
      ];
    }

    public function onRun(){
      if(!isset($_COOKIE['confirm_cookie'])){
        echo $this->runCookieNotice();
      }
    }

    public function runCookieNotice(){
      if($this->property('loadCSS') == true){
        $this->addCss('assets/css/main.css');
      }
      $data = [
        "cookie_notice_content" => Settings::instance()->cookie_notice_content ?: "This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies.",
        "button_text" => Settings::instance()->button_text ?: "Agree!"
      ];
      return $this->renderPartial('::cookie-notice', $data);
    }

    public function onConfirmCookies(){
      if(!isset($_COOKIE['confirm_cookie'])){
        setcookie("confirm_cookie", " ", strtotime('+ ' . Settings::get('days_valid') . ' day'));
      }
      return;
    }

    public function siteKey(){
      return Settings::get('site_key');
    }

    public function enableCaptcha(){
      return Settings::get('enable_captcha');
    }
}
