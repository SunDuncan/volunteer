<?php
    namespace Enterprise\Controller;
    use Think\Controller;

    class EnterpriseController extends Controller {
        public function showlist() {
            $this->display();
        }

        public function index() {

        }
        public function servicelist(){
            $this->display();
        }
        public function pendsuccess(){
            $this->display();
        }
    }