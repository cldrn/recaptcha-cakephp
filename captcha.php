<?php
/**
 * CaptchaComponent
 * 
 * CaptchaComponent and CaptchaToolHelper allow the easy use of reCaptcha.net's captcha library.
 * @link http://recaptcha.net
 * 
 * Usage: (in the controller)
 * 	var $components = array(array('Recaptcha.Captcha', array(
 *					'private_key' => PRIVATE_KEY_FROM_RECAPTCHA_DOT_NET, 
 *					'public_key' => PUBLIC_KEY_FROM_RECAPTCHA_DOT_NET)));
 *  var $helpers = array('Recaptcha.CaptchaTool');
 * 
 * Usage: (in the view)
 * 	$captchaTool->show();
 * 
 * Requires:
 * - CakePHP 1.3
 * - PHP >= 5.2
 * - PECL json >= 1.2.0 (to use reCaptcha configuration options)
 * - Keys from reCaptcha.net
 * 
 * @author Jason Burgess <jason@holostek.net> 
 * @author Paulino Calderon <calderon@websec.mx> #Cakephp 1.3 port
 * @version 0.1
 * @license MIT/X
 */
class CaptchaComponent extends Object {
	public $error = false;
	public $privateKey = false;

	/**
	 * Initialize the component 
	 * 
	 * @param $controller reference to the controller
	 * @param $settings Settings for the component:
	 * 					- private_key: (required) Private key from reCaptcha.net
	 * 					- public_key: (required) Public key from reCaptcha.net
	 * 					- config: (optional) Array of configuration options to pass to the reCaptcha library
	 * @access public
	 * @internal
	 * @since 0.1.0
	 */
	public function initialize(&$controller, $settings = array()) {		

		if (!empty($settings['private_key'])) {
			$this->privateKey = $settings['private_key'];
		}
		
		if (!empty($settings['public_key'])) {
			$controller->params['Recaptcha.public_key'] = $settings['public_key'];
		}
		
		if (!empty($settings['config'])) {
			$controller->params['Recaptcha.configuration'] = $settings['config'];
		}
	}

	/**
	 * Validate the recaptcha code received by the user.
	 * 
	 * @return boolean success or failure
	 * @access public
	 * @since 0.1.0
	 */
	public function validate() {
		App::import('Vendor', 'Recaptcha',array('file'=>'recaptcha/recaptchalib.php'));
		$resp = recaptcha_check_answer($this->privateKey, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
		$error = $resp->error;
		
		return $resp->is_valid;
	}
}
?>
