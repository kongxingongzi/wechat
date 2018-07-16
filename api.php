<?php

    //获得参数 signature nonce token timestamp echostr
    class api{
        public function api(){
            $nonce     = $_GET['nonce'];
            $token     = 'weixin';
            $timestamp = $_GET['timestamp'];
            $echostr   = $_GET['echostr'];
            $signature = $_GET['signature'];
            //形成数组，然后按字典序排序
            $array = array();
            $array = array($nonce, $timestamp, $token);
            sort($array);
            //拼接成字符串,sha1加密 ，然后与signature进行校验
            $str = sha1( implode( $array ) );
            if( $str  == $signature && $echostr ){
                //第一次接入weixin api接口的时候
                //(第一次，有四个参数，signature、nonce、timestamp、echostr，第二次就没有echostr参数)
                echo  $echostr;
                exit;
            }else{
                $this->reponseMsg();//接收事件推送并回复
            }
        }
    }

    $aa=new api();
    $aa->api();