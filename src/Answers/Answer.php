<?php
namespace Anax\Answers;
 
/**
 * Model for Answers.
 *
 */
class Answer extends \Anax\MVC\CDatabaseModel
{
	
	/**
	 * Find all answers that belongs to a question
	 *
	 */
	public function findAnswers($questionId) {
			$this->db->select()
				 ->from($this->getSource())
				 ->where("questionId = ?");
	 
		$this->db->execute([$questionId]);
		$this->db->setFetchModeClass(__CLASS__);
		return $this->db->fetchAll();
	}
	
	
	/**
	 * Find and an answer by it´s id
	 *
	 * @return this
	 */
	public function findAnswer($id)
	{
		$this->db->select()
				 ->from($this->getSource())
				 ->where("id = ?");
	 
		$this->db->execute([$id]);
		$this->db->setFetchModeClass(__CLASS__);
		return $this->db->fetchAll();
	}
}