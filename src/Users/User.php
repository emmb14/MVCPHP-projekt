<?php
namespace Anax\Users;
 
/**
 * Model for Users.
 *
 */
class User extends \Anax\MVC\CDatabaseModel
{

	public function login($acronym, $password)
	{
			$user = $this->checkLogin($acronym);

			if(password_verify($password, $user->password)){
				
				//add to timesLogedIn
				$sql = "UPDATE projekt_user SET timesLogedIn = timesLogedin + 1 WHERE acronym = '{$acronym}';"; 
				$this->db->execute($sql);
				
				$this->session->set('userId', $user->id);
				$this->response->redirect($this->url->create('users/profile/' . ($user->id)));
			}
			else{
				$output = 'Inloggningen misslyckades.';
				return $output;
			}
	}
	
	
	public function logout(){
		$this->session->destroy();	
		$this->response->redirect($this->url->create(''));
	}
	
	
	/**
	 * Check if username and password is correct.
	 *
	 * @return this
	 */
	public function checkLogin($acronym)
	{
		$this->db->select()
				 ->from($this->getSource())
				 ->where("acronym = ?");
	 
		$this->db->execute([$acronym]);
		
		return $this->db->fetchInto($this);
		//var_dump($this->db->fetchInto($this));
	}
	
	
	public function checkAuthentication()
	{
		$acronym = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		
		if ($acronym)
		{
			return 'Du är inloggad';
		}
		else {
			return 'Du är inte inloggad.';
		}
	}
	
	
	/**
	 * Get all the questions that belongs to a userId.
	 */
	public function getUsersQuestions($userId) {
		$this->db->select()
				 ->from("question")
				 ->where("userId = ?");

		$this->db->execute([$userId]);
		$this->db->setFetchModeClass(__CLASS__);
		return $this->db->fetchAll();
		
	}
	
	
	/**
	 * Find the most active users
	 */
	public function mostActiveUsers()
	{
		$sql = "SELECT * FROM projekt_user ORDER BY timesLogedIn DESC LIMIT 3;"; 
		$this->db->execute($sql);
		return $this->db->fetchAll();
	}
	
}