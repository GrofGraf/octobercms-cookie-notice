<?php namespace GrofGraf\CookieNotice\Components;

use GrofGraf\CookieNotice\Models\Settings;
use Cms\Classes\ComponentBase;

class CookieNotice extends ComponentBase
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
        'loadBootstrap' => [
            'title'       => 'Load Bootstrap',
            'description' => 'Load Bootstrap assets (not recommended for production)',
            'type'        => 'checkbox',
            'default'     => true,
        ],
        'loadCSS' => [
            'title'       => 'Load CSS',
            'description' => 'Load css required for animation',
            'type'        => 'checkbox',
            'default'     => true,
        ],
      ];
    }

    public function onRun(){
      $days_valid = Settings::get('days_valid');
      if(!isset($_COOKIE['confirm_cookie']) || $_COOKIE['confirm_cookie'] > strtotime('+' . $days_valid . 'days')){
        echo $this->runCookieNotice();
      }
    }

    public function runCookieNotice(){
      if($this->property('loadBootstrap') == true){
        $this->addCss('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
      }
      if($this->property('loadCSS') == true){
        $this->addCss('assets/css/main.css');
      }
      $data = [
        "cookie_notice_content" => Settings::instance()->cookie_notice_content,
        "button_text" => Settings::instance()->button_text
      ];
      return $this->renderPartial('::cookie-notice', $data);
    }

    public function onConfirmCookies(){
      setcookie("confirm_cookie", date("now"));
      return;
    }
}
