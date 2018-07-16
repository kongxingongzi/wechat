<?php
error_reporting(E_ALL || ~E_NOTICE);
define("TOKEN", "weixin");
include dirname(__FILE__)."/Lib/WeChatApi.class.php";
include dirname(__FILE__)."/Lib/WeChat.class.php";
class WxApi extends Wechat
{
	public function responseMsg(){
		parent::responseMsg();


		if( $this->keyword=='迪丽热巴是谁?' or $this->keyword=='迪丽热巴是谁？'){
			$this -> getSingel();
			exit();
		}

		if( $this->keyword=='90后女神' ){
			$this -> getMore();
		}


		if( $this->sendType=='voice' ){
			$content =  $this -> Recognition ; //获取语音识别的结果
			$this -> reText('您说的内容是:'.$content );

		}


		//当用户输入?时回复相关信息
		if( $this->keyword=='?' or $this->keyword=='？' ){
			$content = "
【1】特种服务号码\n【2】通讯服务号码\n【3】银行服务号码\n您可以通过输入【】方括号的编号获取内容哦！";
			$this -> reText( $content );
			exit();
		}else if( $this->keyword==1 ){
			$content = "常用特种服务号码：\n匪警：110\n火警：119";
			$this -> reText( $content );
			exit();
		}else if( $this->keyword==2 ){
			$content = "常用通讯服务号码：\n中国移动：10086\n中国电信：10000";
			$this -> reText( $content );
			exit();
		}else if( $this->keyword==3 ){
			$content = "常用银行服务号码：\n工商银行：95588\n建设银行：95533";
			$this -> reText( $content );
			exit();
		}


		if( $this->keyword=='php的logo是什么样子的?' ){
			$mediaId = "YOX-JaJ0MW46uAYxsiXBzAn-aMonwDOGac1o5jmYSfSWF_rB1H3lswr1f4OuJ5CF";
			//使用图片回复接口
			$this -> reImage( $mediaId );
			exit();
		}

		//由于我们是测试号,音乐播放没有背景
		if( $this->keyword=='小宝贝' ){
			//$title = "丽江夏夏<<小宝贝>>"; //音乐的标题
			$title = "丽江夏夏《小宝贝》";
			$desc = "这是一首脍炙人口的手鼓儿歌";
			$url = $hqurl = "http://www.snk147.cn/mp3/xiaobaobei.mp3";
			//使用音乐回复接口进行回复
			$this -> reMusic( $title,$desc,$url,$hqurl );
			//$this -> reText( $title );
			exit();
		}

        //使用视频回复接口
		if( $this->keyword=='低杆怎么打?' ){
			$mediaId = 'SvIsObdAJWlswMEkjOS8j2TBfXN4o6BrxHilDbjV4rmfE1csFWslsjS84ELztoQv';
			$title = "台球技术之低杆";
			$desc = "这是台球运动的基本杆法之一,也叫拉杆!打母球的低位就可以产生强烈的回旋!";
			$this -> reVideo( $mediaId,$title,$desc );
		}


		if( $this->keyword == '我漂亮吗?' ){
			$this -> reText('你漂亮死了,然后千万不要去死哦!');
			exit();
		}	
        
		    /*
			if( $this->sendType=='text' )
			{
				$this -> reText('您上传的是文本消息,我接收的类型是'.$this->sendType);
				exit();
			}else if( $this->sendType=='image'  ){
				$this -> reText('您上传的是图片消息,我接收的类型是'.$this->sendType);
				exit();
			}else if( $this->sendType=='video'  ){
				$this -> reText('您上传的是视频或者小视频,我接收的类型是'.$this->sendType);
				exit();
			}else if( $this->sendType=='voice'  ){
				$this -> reText('您上传的是一段语音,我接收的类型是'.$this->sendType);
				exit();
			}else if( $this->sendType=='link'  ){
				$this -> reText('您上传的是链接,我接收的类型是'.$this->sendType);
				exit();
			}else if( $this->sendType=='location'  ){
				$this -> reText('您上传的是地理位置消息,我接收的类型是'.$this->sendType);
				exit();
			}*/
			
		
	}

    //实现单图文
	private function getSingel(){
		$data = array(
			[
			    //图文信息的标题
				'Title'=> '迪丽热巴·迪力木拉提', 
				//描述
				'Desc'=>'迪丽热巴（Dilraba），1992年6月3日出生于新疆乌鲁木齐市，中国内地影视女演员',
				'PicUrl'=>'http://www.snk147.cn/images/dlrb.jpg',
				'Url'=> 'https://baike.baidu.com/item/%E8%BF%AA%E4%B8%BD%E7%83%AD%E5%B7%B4/1180418?fr=aladdin'
			]
		);
		$this -> reNews( $data );
	}


	private function getMore(){
		$data = array(
			[
			    //图文信息的标题
				'Title'=> '迪丽热巴·迪力木拉提', 
				//描述
				'Desc'=>'迪丽热巴（Dilraba），1992年6月3日出生于新疆乌鲁木齐市，中国内地影视女演员',
				'PicUrl'=>'http://www.snk147.cn/images/dlrb.jpg',
				'Url'=> 'https://baike.baidu.com/item/%E8%BF%AA%E4%B8%BD%E7%83%AD%E5%B7%B4/1180418?fr=aladdin'
			],
			[
			    //图文信息的标题
				'Title'=> '丽江兰澜', 
				//描述
				'Desc'=>'丽江兰澜，xxxxxx',
				'PicUrl'=>'http://www.snk147.cn/images/1.jpg',
				'Url'=> 'http://www.snk147.cn/zy/id-1.html'

			],
			[
			    //图文信息的标题
				'Title'=> '丽江夏夏', 
				//描述
				'Desc'=>'丽江夏夏，xxxxxx',
				'PicUrl'=>'http://www.snk147.cn/images/2.jpg',
				'Url'=> 'http://www.snk147.cn/zy/id-2.html'

			],
		);
		$this -> reNews( $data );		
	}



	
}
$WxApi = new WxApi();
#注解该代码就开启了自动回复功能
//$WxApi ->valid();
$WxApi -> responseMsg();