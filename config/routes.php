<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::connect('/pages/browse/books',
    ['controller'=> 'Catgories', 'action' => 'view', 'books' ]);

Router::scope('/db_test', function(RouteBuilder $routes) {
    $routes->connect('/categories',
                     ['controller' => 'Categories',
                      'action' => 'display']);
    $routes->connect('/courses',
                     ['controller' => 'Courses',
                      'action' => 'display']);
    $routes->connect('/registered_users',
                     ['controller' => 'RegisteredUsers',
                      'action' => 'display']);
    $routes->connect('/tags',
                     ['controller' => 'Tags',
                      'action' => 'display']);
    $routes->connect('/wish_lists',
                     ['controller' => 'WishLists',
                      'action' => 'display']);
    $routes->connect('/watching_lists',
                     ['controller' => 'WatchingLists',
                      'action' => 'display']);
    $routes->connect('/sold_lists',
                     ['controller' => 'SoldLists',
                      'action' => 'display']);
    $routes->connect('/selling_lists',
                     ['controller' => 'SellingLists',
                      'action' => 'display']);
    $routes->connect('/purchased_lists',
                     ['controller' => 'PurchasedLists',
                      'action' => 'display']);
    $routes->connect('/conversations',
                     ['controller' => 'Conversations',
                      'action' => 'display']);
    $routes->connect('/private_messages',
                     ['controller' => 'PrivateMessages',
                      'action' => 'display']);
    $routes->connect('/conditions',
                     ['controller' => 'Conditions',
                      'action' => 'display']);
});

Router::scope('/', function (RouteBuilder $routes) {

    // The page to render depends on the site visited. (Ex: sfsuse.com/~ivnyu will render ivan_page)

    // The page to render depends on the site visited. (Ex: sfsuse.com/~ivnyu will render ivan_page)
    if(strpos(dirname($_SERVER['PHP_SELF']), '/~achalke') !== false){
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'index']);
    } else if(strpos(dirname($_SERVER['PHP_SELF']), '/~ivnyu') !== false) {
        // this displays ivan_page.ctp on the browser.
        //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'ivan_page']);
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'index']);
    } else if(strpos(dirname($_SERVER['PHP_SELF']), '/~bkng') !== false){
        // this displays brad_page.ctp on the browser.
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'brad_page']);
    } else if(strpos(dirname($_SERVER['PHP_SELF']),'/~tluu4') !== false){
        // this displays thaos_page.ctp on the browser
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'index']);
    } else if (strpos(dirname($_SERVER['PHP_SELF']), '/~jerrya') !== false) {
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'jerry_page']); 
    }  else if (strpos(dirname($_SERVER['PHP_SELF']), '/~tluu4/browse') !== false) {
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'browse']); 
    } else {
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'index']);
    }
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
