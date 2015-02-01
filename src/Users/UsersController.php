<?php
namespace Anax\Users;
 
/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable,
		\Anax\MVC\TRedirectHelpers;
	
	public $users;
	private $messages;
	public $question;
 
		
	/**
	 * Initialize the controller.
	 *
	 * @return void
	 */
	public function initialize()
	{
		$this->users = new \Anax\Users\User();
		$this->users->setDI($this->di);
		
		$this->questions = new \Anax\Questions\Question();
		$this->questions->setDI($this->di);

	}
	
	
	/**
	 * List all users.
	 *
	 * @return void
	 */
	public function listAction()
	{
		$all = $this->users->findAll();
	 
		$this->theme->setTitle("Användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Alla användare",
		]);
	}
	
	
	/**
	 * List user with id.
	 *
	 * @param int $id of user to display
	 *
	 * @return void
	 */
	public function idAction($id = null)
	{
		$user = $this->users->find($id);
		
		$usersQuestions = $this->users->getUsersQuestions($id);
		
		$this->theme->setTitle("Visa användare med id");
		$this->views->add('users/view', [
			'user' => $user,
			'userQuestions' => $usersQuestions,
			'questions' => $this->questions
		]);
	}
	
	
	
	/**
	 * Show user-profile
	 *
	 * @param int $id of user to display
	 *
	 * @return void
	 */
	public function profileAction($id = null)
	{
		$userId =  isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		
		if($userId){
			$user = $this->users->find($id);
			
			//$usersQuestions = $questions->getQuestionandAnswers($userQuestion->questionId)
			$usersQuestions = $this->users->getUsersQuestions($id);
			
			//$allAnswers = $this->answers->findAnswers($questionId);
			
			$this->theme->setTitle("Min sida");
			$this->views->add('users/profile', [
				'user' => $user,
				'userQuestions' => $usersQuestions,
				'questions' => $this->questions
			]);
			
		} else {
			$this->di->theme->setTitle("Min sida");
			$this->di->views->add('default/page', [
				'title' => "Min sida",
				'content' => '<p>Du måste vara inloggad för att se den här sidan. <br/> <a href="' . $this->url->create('users/login') . '">Logga in</a></p>'
			]);
		}
	}
	
	
	
	/**
	 * Add new user.
	 *
	 * @param string $acronym of user to add.
	 *
	 * @return void
	 */
	public function addAction($acronym = null)
	{ 	 
		// Check the status of the form
		//$form->check([$this, 'callbackSuccess'], [$this, 'callbackFail']);
		
		
		$form = new \Anax\HTMLForm\CFormUser($this->users);
		$form->setDI($this->di);
		$form->check();
		
		$this->di->theme->setTitle("Lägg till användare");
		$this->di->views->add('default/page', [
			'title' => "Lägg till användare",
			'content' => $form->getHTML()
		]);	
	}
	
	
	/**
	 * Login user.
	 *
	 */
	public function loginAction()
	{ 	 
		$output = null;
		$output = $this->users->checkAuthentication();
		
		$isPosted = $this->request->getPost('login');
		if (isset($isPosted))
		{
			$acronym = $this->request->getPost('acronym');
			$password = $this->request->getPost('password');
			
			$output = $this->users->login($acronym, $password);
		}
		
		$this->di->theme->setTitle("Logga in");
		$this->di->views->add('users/login', [
			'title' => "Logga in",
			'output'  => $output,
		]);
	}
	
	
	/**
	 * Logout user.
	 *
	 */
	public function logoutAction()
	{ 	 
		$output = null;
		
		$isPosted = $this->request->getPost('logout');
		if (isset($isPosted))
		{			
			$output = $this->users->logout();
		}
		
		$this->di->theme->setTitle("Logga ut");
		$this->di->views->add('users/logout', [
			'title' => "Logga ut",
			'output'  => $output,
		]);
	}
	
	
	
	/**
	 * Delete user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function deleteAction($id = null)
	{
		if (!isset($id)) {
			die("Missing id");
		}
	 
		$res = $this->users->delete($id);
	 
		$url = $this->url->create('users/list');
		$this->response->redirect($url);
	}

	
	/**
	 * Delete (soft) user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function softDeleteAction($id = null)
	{
		if (!isset($id)) {
			die("Missing id");
		}
	 
		$now = gmdate('Y-m-d H:i:s');
	 
		$user = $this->users->find($id);
	 
		$user->deleted = $now;
		$user->save();
	 
		$url = $this->url->create('users/id/' . $id);
		$this->response->redirect($url);
	}
	
	
	/**
	 * Undo delete (soft) user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function undoSoftDeleteAction($id = null)
	{
		if (!isset($id)) {
			die("Missing id");
		}
	 
		$now = gmdate('Y-m-d H:i:s');
	 
		$user = $this->users->find($id);
	 
		$user->deleted = null;
		$user->save();
	 
		$url = $this->url->create('users/id/' . $id);
		$this->response->redirect($url);
	}
	
	
	/**
	 * Make user active
	 *
	 */
	public function activateAction($id = null) 
	{
		if (!isset($id)) {
			die("Missing id");
		}
	 
		$now = gmdate('Y-m-d H:i:s');
	 
		$user = $this->users->find($id);
	 
		$user->active = $now;
		$user->save();
	 
		$url = $this->url->create('users/id/' . $id);
		$this->response->redirect($url);
	}
	
	
	/**
	 * Make user active
	 *
	 */
	public function inactivateAction($id = null) 
	{
		if (!isset($id)) {
			die("Missing id");
		}
	 
		$now = gmdate('Y-m-d H:i:s');
	 
		$user = $this->users->find($id);
	 
		$user->active = null;
		$user->save();
	 
		$url = $this->url->create('users/id/' . $id);
		$this->response->redirect($url);
	}
	
	
	/**
	 * Update user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function updateAction($id = null)
	{
		if (!isset($id)) {
			die("Missing id");
		}
		
		$user = $this->users->find($id);
		
		$form = new \Anax\HTMLForm\CFormUser($this->users, $user);
		$form->setDI($this->di);
		$form->check();
		
		$this->di->theme->setTitle("Uppdatera användare");
		$this->di->views->add('default/page', [
			'title' => "Uppdatera användare " . $id,
			'content' => $form->getHTML()
		]);
	}
	
	
	/**
	 * List all active and not deleted users.
	 *
	 * @return void
	 */
	public function activeAction()
	{
		$all = $this->users->query()
			->where('active IS NOT NULL')
			->andWhere('deleted is NULL')
			->execute();
	 
		$this->theme->setTitle("Aktiva användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Aktiva användare",
		]);
	}
	
	
	public function inactiveAction()
	{
		$all = $this->users->query()
			->where('active IS NULL')
			->andWhere('deleted is NULL')
			->execute();
	 
		$this->theme->setTitle("Inaktiva användare");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Inaktiva användare",
		]);
	}
	
	
	public function trashAction()
	{
		$all = $this->users->query()
			->where('deleted is NOT NULL')
			->execute();
	 
		$this->theme->setTitle("Papperskorgen");
		$this->views->add('users/list-all', [
			'users' => $all,
			'title' => "Papperskorgen",
		]);
	}
	
	
	
	
}