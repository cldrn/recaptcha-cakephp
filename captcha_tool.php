<?php
/**
 * CaptchaToolHelper
 * 
 * CaptchaToolHelper takes care of printing the recaptcha form.
 * @link http://recaptcha.net
 *
 * @see CaptchaComponent
 * @author Jason Burgess <jason@holostek.net>
 * @author Paulino Calderon <calderon@websec.mx>  #Cakephp 1.3 port
 * @version 0.1
 * @license MIT/X
 */
class CaptchaToolHelper extends Helper {
	/**
	 * Display a reCaptcha form
	 * @since 0.1.0
	 * @access public
	 */
	public function show() {
		App::import('Vendor', 'Recaptcha',array('file'=>'recaptcha/recaptchalib.php'));
		if (empty($this->params['Recaptcha.public_key']))
			return $this->output(__('No public key was set for reCaptcha.', true));
		$code = '';
		if (!empty($this->params['Recaptcha.configuration']) && is_array($this->params['Recaptcha.configuration'])) {
			$recaptchaConfJson=json_encode($this->params['Recaptcha.configuration']);
			$code = "<script type='text/javascript'>var RecaptchaOptions = {$recaptchaConfJson};</script>";
		}
		$code .= recaptcha_get_html($this->params['Recaptcha.public_key']);
		return $this->output($code);
	}
}
?>
