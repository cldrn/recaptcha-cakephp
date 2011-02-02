           ____            _       _              __            
 _ __ ___ / ___|__ _ _ __ | |_ ___| |__   __ _   / _| ___  _ __ 
| '__/ _ \ |   / _` | '_ \| __/ __| '_ \ / _` | | |_ / _ \| '__|
| | |  __/ |__| (_| | |_) | || (__| | | | (_| | |  _| (_) | |   
|_|  \___|\____\__,_| .__/ \__\___|_| |_|\__,_| |_|  \___/|_|   
                    |_|                                         
  ____      _        ____  _   _ ____    _   _____ 
 / ___|__ _| | _____|  _ \| | | |  _ \  / | |___ / 
| |   / _` | |/ / _ \ |_) | |_| | |_) | | |   |_ \ 
| |__| (_| |   <  __/  __/|  _  |  __/  | |_ ___) |
 \____\__,_|_|\_\___|_|   |_| |_|_|     |_(_)____/ 
                                                   
================================================================

INSTALLATION:

1.- Copy captcha.php to app/controllers/components/
2.- Copy captcha_tool.php to app/views/helpers
3.- Copy recaptcha/ to app/vendors/
4.- Add the component to your controller. 
var $components=array('Email','RequestHandler','Captcha' => array( 
                'private_key' => "YOUR_PRIVATE_KEY",  
                'public_key' => "YOUR_PUBLIC_KEY"));

4.- Validate from your controller with $this->Captcha->validate()

5.- Add echo $captchaTool->show(); to your views

