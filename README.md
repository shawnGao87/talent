# Laravel Redirect

-   Laravel redirect() function is commented out due to the conflict with Moodle redirect() function.
-   Larevel redirect() is defined in \vendor\laravel\framework\src\Illuminate\Foundation\helpers.php
-   Need to modify Moodle core /lib/weblib.php, wrap the redirect() deifinition in if (!function_exists('redirect'))
-   To work with IIS, need to install URL Rewrite for IIS: https://www.iis.net/downloads/microsoft/url-rewrite. Then add web.config in public folder after setting up Virtual Directory
