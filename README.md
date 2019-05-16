# Laravel Redirect

-   Laravel redirect() function is commented out due to the conflict with Moodle redirect() function.
-   Larevel redirect() is defined in \vendor\laravel\framework\src\Illuminate\Foundation\helpers.php
-   Need to modify Moodle core /lib/weblib.php, wrap the redirect() deifinition in if (!function_exists('redirect'))
-   Modified Moodle Core in /login/index.php line 49 block.
-   ```
    if ($testsession) {
        if ($testsession == $USER->id) {
            if (isset($SESSION->redirect)) {
                $urltogo = $SESSION->redirect;
            } elseif (isset($SESSION->wantsurl)) {
                $urltogo = $SESSION->wantsurl;
            } else {
                $urltogo = $CFG->wwwroot . '/';
            }
            unset($SESSION->wantsurl);
            unset($SESSION->redirect);
            redirect($urltogo);
        } else {
            // TODO: try to find out what is the exact reason why sessions do not work
            $errormsg = get_string("cookiesnotenabled");
            $errorcode = 1;
        }
    }
    ```
