<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FacebookApp extends CI_Controller {
	
	private $data;

	function __construct()
	{	
		parent::__construct();
		
	}
	
	function FacebookApp() {
		parent::Controller();
	}
	
	public function index()
	{
		$fb_config = array(
                    'appId'  => '225583544205326',
                    'secret' => '4889e13ce74607119e6bd9d75fc487fe',
					'cookie' => true,
        );
		$this->load->library('facebook', $fb_config);
		$user = $this->facebook->getUser();
		
		if($user){
			try {
				$data['me'] = $this->facebook->api('/me/');
				$data['friends_list'] = $this->facebook->api('/me/friends');
				$data['appUrl'] = 'http://apps.facebook.com/'.$fb_config['appId'];
				$data['appId'] = $fb_config['appId'];
			} catch (FacebookApiException $e) {
				error_log($e->getType());
				error_log($e->getMessage());
			}
		} else {
			$data['loginUrl'] = $this->facebook->getLoginUrl(array('canvas' => 1, 'fbconnect' => 0, 'scope' => '',));
		}
	
		$this->load->view('facebookview',$data);
	}

}