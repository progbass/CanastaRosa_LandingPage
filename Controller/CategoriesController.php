<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $category = $this->Categories->get($id, [
            'contain' => ['Users', 'Products']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'product']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $users = $this->Categories->Users->find('list', ['limit' => 200]);
        $this->set(compact('category', 'users'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $users = $this->Categories->Users->find('list', ['limit' => 200]);
        $this->set(compact('category', 'users'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /*
     * Add Product
     */

    public function product(){
       $cat=  $this->Categories->find("all");
       $this->set("cat",$cat);
       $imageTable=  \Cake\ORM\TableRegistry::get('Images');
       if($this->request->is('post')){
          $productTable=  \Cake\ORM\TableRegistry::get('Products');
          $product=$productTable->newEntity();
          $product=$productTable->patchEntity($product,  $this->request->data);
          $product->user_id= $this->Auth->user('id');
          $data=array();
          if($productTable->save($product)){
              $uniqid=  $this->request->session()->read('uniqueid');
              $res=$imageTable->find("all")->where(['uniqueid'=>$uniqid]);
              foreach ($res as $img){
                 $image=$imageTable->newEntity();
                 $image->product_id=$product->id;
                 $image->status=1;
                 $image->id=$img['id'];
                 $data[]=$imageTable->save($image);
              }
              
              if($data){
                  $this->redirect(['action'=>'viewProduct']);
              }
          }
       }
    }

    /*
     * Add Product image
     */

    public function image() {
        $imageTable = \Cake\ORM\TableRegistry::get('Images');
        if ($this->request->is('post')) {
            $img = $this->request->data['images'];
            $name = rand(0, 999);
            $destination = WWW_ROOT . "img" . DS . $name . $img['name'];
            move_uploaded_file($img['tmp_name'], $destination);
            $image = $imageTable->newEntity();
            $image->images = $destination;
            $image->user_id = $this->Auth->user('id');
            $image->status = 0;
            $image->uniqueid = session_id();
            if ($imageTable->save($image)) {
                $this->set("res", array('r' => 1));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
    }

}
