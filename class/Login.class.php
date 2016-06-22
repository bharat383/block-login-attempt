<?php
	@include("config.php");
	class Login {
		public function __construct(){
			//CHECK THE IP ADDRESS IS BLOCKED OR NOT
			$this->checkaccess();

			if(!isset($_SESSION['failed_login'])){
				$_SESSION['failed_login'] = 0;
			}		

			//LOGIN FUCNTION TRIGGER
			if(isset($_POST['login_submit']) && $_POST['login_submit']=="Login"){
				$this->login();
			}

		}

		protected function checkaccess(){
			//IF BLOCK BY IP IS ENABLED
			if(BLOCK_IP==true){
				$block_ip_data = json_decode(@file_get_contents("blockedip.json"),true);
				//print_r($block_ip_data);exit;
				if(count($block_ip_data)>0) {
					foreach($block_ip_data as $key=>$blocked_ip){
						if($_SERVER['REMOTE_ADDR']==$blocked_ip['ip_address']){
							if($blocked_ip['timeout']>date("Y-m-d H:i:s")){
								@header("location:blocked.html");
								exit;
							} else {
								unset($block_ip_data[$key]);
								@header("location:example.php");
								file_put_contents("blockedip.json",json_encode($block_ip_data));
							}
							break;
						}
					}
				}
			}
		}

		protected function login()
		{
			$username = "bharat383";
			$password = "123456";

			if($_POST['username']!=$username || $_POST['password']!=$password){
				$_SESSION['failed_login']++;

				if($_SESSION['failed_login']>=MAX_LOGIN_ATTEMPT){

					//IF BLOCK BY IP IS ENABLED
					if(BLOCK_IP===true){
						$block_ip_data = json_decode(@file_get_contents("blockedip.json"),true);
						$block_ip_data[] = array(
											"ip_address"=>$_SERVER['REMOTE_ADDR'],
											"timeout"=>date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")."+".BLOCK_TIMEOUT." Minutes"))
											);
						file_put_contents("blockedip.json",json_encode($block_ip_data));
					}
				}

				$_SESSION['response'] = array("status"=>"fail","message"=>"Login Failed. Invalid Username or Password.");
				@header("location:example.php");
				exit;
			} else {
				$_SESSION['failed_login']=0;
				$_SESSION['response'] = array("status"=>"success","message"=>"Logged in successfully.");
				@header("location:example.php");
				exit;
			}
		}

		public function DisplayMessage(){
			if(isset($_SESSION['response']) && $_SESSION['response']!="") {
				if($_SESSION['response']['status']=="fail"){
					echo "<div style='color:#f00;'>".$_SESSION['response']['message']."</div>";
					echo "<div style='color:#f00;font-weight:bold;'>You have ".abs(MAX_LOGIN_ATTEMPT-$_SESSION['failed_login'])." login attempts left.</div>";
				} else {
					echo "<div style='color:#0f0;'>".$_SESSION['response']['message']."</div>";
				}
				unset($_SESSION['response']);
			}
		}

	}
?>