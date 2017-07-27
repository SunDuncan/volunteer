<?php
    namespace Welfare\Controller;
    use Think\Controller;

    class MessageController extends Controller {
        public function add() {
            echo "这是发布消息的界面";
        }

        public function showlist() {
            echo "这是消息队列表的界面";
        }

        public function applist() {
            echo "这是消息申请列表的界面";
        }
    }