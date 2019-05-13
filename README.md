# Laravel Redirect

-   Laravel redirect() function is commented out due to the conflict with Moodle redirect() function.
-   Larevel redirect() is defined in \vendor\laravel\framework\src\Illuminate\Foundation\helpers.php
-   Need to modify Moodle core /lib/weblib.php, wrap the redirect() deifinition in if (!function_exists('redirect'))
