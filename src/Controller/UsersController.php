<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'login', 'test', 'contact', 'invitefrnd', 'reg']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        
    }

    public function test() {
//        $email = new Email('default');
//        $res = $email->from(["Support@gmail.com" => 'sender'])
//		->to(["anshuverma300@gmail.com" =>"sfsf fsf"])
//		->subject('Forget Password')                   
//		->send("Your account password");
//        debug($res); exit;
    }

    public function contact() {
        if ($this->request->is('post')) {
            $name = $this->request->data['name_txt'];
            $email_add = 'rakeshacn123@gmail.com';
            $zip = $this->request->data['zip_txt'];
            $email = $this->request->data['email_txt'];
            $category = $this->request->data['category_sct'];
            $subject = "Canasta Rosa Registration";
            $msg1 = "Hi $name";
            $msg2 = "My Details:";
            $msg6 = "Email: $email";
            $msg3 = "Zip: $zip";
            $msg4 = "Category: $category";
            $msg5 = "Thanks";
            $message = $msg1 . ' ' . $msg2 . ' ' . $msg6 . ' ' . $msg3 . ' ' . $msg4 . ' ' . $msg5;
            $headers = 'From: info@canastarosa.com' . "\r\n";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $res = @mail($email_add, $subject, $message, $headers);
            //print_r($res);die;
            if ($res) {
                $this->redirect('/');
            }
        }
    }

    public function invitefrnd() {
        $inviteTable = \Cake\ORM\TableRegistry::get('Invites');
        if ($this->request->is('post')) {
            $invite = $inviteTable->newEntity();
            $invite->email = $this->request->data['email'];
            $invite->message = $this->request->data['message'];
            if ($inviteTable->save($invite)) {
                $email_add = $invite->email;
                $message_txt = $invite->message;
                $subject = "Canasta Rosa invitation";
                $msg2 = "My Details: " . "<br>";
                $msg3 = "Content: $message_txt" . "<br>";
                $msg5 = "Thanks";
                $message = $msg2 . '\r\n ' . $msg3 . '\r\n ' . $msg5;
                $headers = 'Cc: progbass@gmail.com' . "\r\n";
                $headers = 'From: info@canastarosa.com' . "\r\n";
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $res = @mail($email_add, $subject, $message, $headers);
                if ($res) {
                    $this->set("res", array('r' => 1));
                    $this->response->type("json");
                    $this->render("/Common/ajax", 'ajax');
                }
            }
        }
    }

    /*
     * Register through index page
     */

    public function reg() {
        $registerTable = \Cake\ORM\TableRegistry::get('Registrations');
        $catTable = \Cake\ORM\TableRegistry::get('Categories');
        if ($this->request->is('post')) {
            $register = $registerTable->newEntity();
            $name = $this->request->data['name'];
            $email_to = "progbass@gmail.com";
            $email = $this->request->data['email'];
            $code = $this->request->data['postal_code'];
            $mobiles = $this->request->data['mobile'];
            $cate = serialize($this->request->data['category']);
            $register->name = $name;
            $register->email = $email;
            $register->postal_code = $code;
            $register->mobile = $mobiles;
            $register->forms_type = "registration";
            $register->category = $cate;
            $category = implode(" , ", $this->request->data['cat']);
            if ($registerTable->save($register)) {
                $subject = "Canasta Rosa Registration";
                $msg1 = "Hi $name";
                $msg2 = "My Details:";
                $msg3 = "Email: $email";
                $msg4 = "Zip: $code";
                $msg5 = "Mobile : $mobiles";
                $msg6 = "Category: $category";
                $msg7 = "Thanks";
                $message = $msg1 . '<br> ' . $msg2 . '<br> ' . $msg3 . ' <br>' . $msg4 . ' <br>' . $msg5 . ' <br>' . $msg6 . ' <br>' . $msg7;              
                $headers = 'From:  info@canastarosa.com' . "\r\n";
				$headers = 'Cc: akasolutionslimited@gmail.com' . "\r\n";
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $res = @mail($email_to, $subject, $message, $headers);
                if ($res) {
                    $this->set("res", array('r' => 1));
                    $this->response->type("json");
                    $this->render("/Common/ajax", 'ajax');
                }
            }
        }
    }

}
