# Cookie notice
OctoberCMS plugin for cookie notice required by EU Cookie Directive.

## Requirements
* [Ajax Framework](https://octobercms.com/docs/cms/ajax) must be included in your layout/page in order to handle form requests.

## Optional
* [Translate](https://octobercms.com/plugin/rainlab-translate) plugin, if you want to include multilingual contents.

## Settings
This plugin creates a Settings menu item, found by navigating to **Settings > Cookies > Cookie Notice**. This page allows the setting of cookie notice content, button text and cookie duration in days.

If [Translate](https://octobercms.com/plugin/rainlab-translate) is enabled, content and button text are translatable.

## Usage
All you need to do is to import the `cookieNotice` component to a page layout and add `{% component %}` tag somewhere in the body.

    description = "layout"
    [cookieNotice]
    loadCSS = 1
    ==
    <!DOCTYPE html>
    <html>
      <head>
        ...
      </head>
      <body>
        {% component 'cookieNotice' %}
        ...
      </body>
    </html>

There is one optional parameter `loadCSS`. It is not recommended for production to have `loadCSS` enabled unless your server supports HTTP/2 protocol. A better approach would be, to copy required CSS into your main CSS file, to reduce a number of server requests.

CSS file looks like this:

    .cookie-notice{
      position:fixed;
      width:100%;
      background-color:rgba(0,0,0,.8);
      font-weight:200;
      color:#ffffff;
      bottom:0;
      transform: translate(0, -10rem);
      z-index:10000;
      animation:cookie-notice-slide-in 1s ease-out forwards;
    }
    .cookie-notice > div{
      display:flex!important;
      justify-content: flex-end!important;
      align-items: center!important;
      padding-top:1em;
      padding-bottom:1em;
    }
    .cookie-notice > div > div {
      padding-right:1em;
      margin-right:auto;
    }
    .cookie-notice button{
      background:transparent;
      border:solid 1px #ffffff;
      border-radius:0;
      color:#ffffff;
      padding:8px 15px;
    }
    .cookie-notice button:hover{
      background-color:rgba(255,255,255,0.4);
      color:#ffffff;
    }
    @keyframes cookie-notice-slide-in{
      0% {
        transform: translateY(10rem);
      }
      100%{
        transform:none;
      }
    }

## Authors

* [GrofGraf](https://github.com/GrofGraf)

## License

The MIT License (MIT)

Copyright (c) 2017 GrofGraf

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
