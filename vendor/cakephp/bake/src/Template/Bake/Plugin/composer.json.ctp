<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$namespace = str_replace('\\', '\\\\', $namespace);
%>
{
    "name": "<%= $package %>",
    "description": "<%= $plugin %> plugin for CakePHP",
    "type": "cakephp-plugin",
    "license": "MIT",
    "require": {
        "cakephp/cakephp": "^3.4"
    },
    "require-dev": {
        "phpunit/phpunit": "^5.7|^6.0"
    },
    "autoload": {
        "psr-4": {
            "<%= $namespace %>\\": "src"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "<%= $namespace %>\\Test\\": "tests",
            "Cake\\Test\\": "./vendor/cakephp/cakephp/tests"
        }
    }
}
