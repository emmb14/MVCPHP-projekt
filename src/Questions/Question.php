<?php
namespace Anax\Questions;
 
/**
 * Model for Questions.
 *
 */
class Question extends \Anax\MVC\CDatabaseModel
{
	
	public function getLastId() {
		return $this->db->lastInsertId();
	}
	
	public function getTags($questionId) {
		$sql = "SELECT * FROM projekt_questionTag as questionTag, projekt_tag as tag WHERE questionTag.questionId = '{$questionId}' and questionTag.tagName = tag.tag;"; 
		$this->db->execute($sql);
		return $this->db->fetchAll();
		
		/*$this->db->select()
				 ->from("questionTag")
				 ->where("questionId = ?");

		$this->db->execute([$questionId]);
		//$this->db->setFetchModeClass(__CLASS__);
		return $this->db->fetchAll();*/
	}
	
		
	/**
	 * get a question and answers that belongs to the question 
	 */
	public function getQuestionandAnswers($questionId) {
		$sql = "SELECT * FROM projekt_question as question, projekt_answer as answer WHERE question.id = {$questionId} and answer.questionId = {$questionId};"; 
		$this->db->execute($sql);
		return $this->db->fetchAll();
	}
	
	
	
	/**
	 * Get the three last questions
	 *
	 */
	public function findLatestQuestions() {
		$sql = "SELECT * FROM projekt_question ORDER BY id DESC LIMIT 3;"; 
		$this->db->execute($sql);
		return $this->db->fetchAll();
	}
}