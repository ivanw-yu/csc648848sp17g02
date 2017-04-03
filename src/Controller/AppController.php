<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{


    public $current_logged_in_user;// = $this->Auth->user('id');
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',
        [
            'authenticate' =>
            [
                'Form' =>
                [
                    'fields' =>
                    [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'userModel' => 'RegisteredUsers'
                ]
            ],
            'loginAction' =>
            [
                'controller' => 'RegisteredUsers',
                'actions' => 'login'
            ],
            /*'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'homepage'
            ],*/   
            // If unauthorized, return them to the page they were just on
            'unauthorizedRedirect' => $this->referer(),
            'authorize' => 'Controller'
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // the next 3 lines of codes was added to allow default.ctp to have access to the categories table.
        $this->loadModel('Categories');
        $categoryEntries = $this->Categories->find('all');
        $this->set(['validCategories' => $categoryEntries]);

        // $this->Auth->user(_id_) isn't null after login() successful.
        if($this->Auth->user('username') !== null){
            // allows the name of the user to be accessed in default.ctp and all other pages.
            $this->set(['currentUser' => $this->Auth->user('username')]);
        }
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user) {
        return false;
    }
}
