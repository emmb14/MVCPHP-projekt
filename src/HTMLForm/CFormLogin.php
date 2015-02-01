<?php
namespace Anax\HTMLForm;
/**
* Anax base class for wrapping sessions.
*
*/
class CFormLogin extends \Mos\HTMLForm\CForm
{
	use \Anax\DI\TInjectionaware,
	\Anax\MVC\TRedirectHelpers;
	
	public $users=null;
	//public $sessionkey;
	
	
	/**
	 * Constructor
	 *
	 */
	public function __construct($users, $user=null)
	{	
		$this->users=$users;
		//$this->sessionKey = 'user';

			
		
		parent::__construct([], [
			'acronym' => [
				'type'        => 'text',
				'label'       => 'Användarnamn:',
				'required'    => true,
				'validation'  => ['not_empty'],
				'value'		  => '',
			],
			'password' => [
				'type'        => 'password',
				'label'       => 'Lösenord:',
				'required'    => true,
				'validation'  => ['not_empty'],
				'value'		  => '',
			],
			'submit' => [
				'type'      => 'submit',
				'callback'  => [$this, 'callbackSubmit'],
			],
		]);
	}
	
	/**
	* Customise the check() method.
	*
	* @param callable $callIfSuccess handler to call if function returns true.
	* @param callable $callIfFail handler to call if function returns true.
	*/
	public function check($callIfSuccess = null, $callIfFail = null)
	{
		return parent::check([$this, 'callbackSuccess'], [$this, 'callbackFail']);
	}
	
	
	/**
	* Callback for submit-button.
	*
	*/
	public function callbackSubmit()
	{
		//$now = gmdate('Y-m-d H:i:s');
		
		$acronym = $this->Value('acronym');
		$password = $this->Value('password');
		
		$user = $this->users->checkLogin($acronym);

		if(password_verify($password, $user->password)){
			$this->saveInSession = true;
			return true;
		}
		else{
			return false;
		}
	}
	
	/*public function checkAuthentication()
	{
		$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
		
		if ($acronym)
		{
			$this->AddOutput("Du är inloggad som: ");
		}
		else {
		 $this->AddOutput("Du är INTE inloggad.");
		}
	}*/
	
	
	/**
	 * Callback What to do if the form was submitted?
	 *
	 */
	public function callbackSuccess()
	{
		//$this->redirectTo('users/id/' . ($_SESSION['user']->id));
		$this->redirectTo('users/id/' . ($this->users->id));
		//header("Location: " . $this->di->url->create(''));
		//echo ($_SESSION['user']->id);
		//var_dump($_SESSION);
		//echo 'Inloggning lyckades';
	}
	
	
	/**
	 * Callback What to do when form could not be processed?
	 *
	 */
	public function callbackFail()
	{
		$this->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
		$this->redirectTo();
	}
}