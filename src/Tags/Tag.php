<?php
namespace Anax\Tags;
 
/**
 * Model for Tags.
 *
 */
class Tag extends \Anax\MVC\CDatabaseModel
{
	
	/**
	 * Save tags to database
	 */
	public function saveTag($tag, $maxQuestionId) {
		
		$result = $this->findTag($tag);
		
		if(!$result) {
			//If the tag don´t exist in the table projekt_tag, save it there
			$this->insertNewTag($tag);
			
			//and save the tag together with the belonging questionId
			$this->insertQuestionTag($tag, $maxQuestionId);


		} else {
			//If the tag already exists in the projekt_tag tabel just save the tag together with the belonging questionId
			$this->insertQuestionTag($tag, $maxQuestionId);
		}
	}
	
	
	/**
	 *
	 */
	public function insertNewTag($tag) {
		$sql = "INSERT INTO projekt_tag (tag) values ('{$tag}')"; 
		return $this->db->execute($sql); 
	}
	
	
	/**
	 * Add a question-id and the tag-name that belongs to it, into the table projekt_questionTag i the database
	 */
	public function insertQuestionTag($tag, $maxQuestionId) {
		
		$sql = "INSERT INTO projekt_questionTag (tagName, questionId) values ('{$tag}', '{$maxQuestionId}')"; 
		return $this->db->execute($sql);
		
	}
	
	
	/**
	 * Find the last question id
	 */
	public function lastQuestion() {
	
		$sql = "SELECT MAX(id) FROM projekt_question"; 
		return $this->db->fetchAll();
	}
	
	/**
	 * Find a tag
	 *
	 */
	public function findTag($id)
	{
		$this->db->select("tag")
				 ->from($this->getSource())
				 ->where("tag = ?");

		$this->db->execute([$id]);
		$this->db->setFetchModeClass(__CLASS__);
		return $this->db->fetchAll();
	}
	
	
	/**
	 * Get questions that belong to a tag
	 *
	 */
	public function getQuestonsWithTag($tagName) {
		
		$sql = "SELECT * FROM projekt_questionTag as questionTag, projekt_question as question WHERE questionTag.tagName = '{$tagName}' and questionTag.questionId = question.id;"; 
		$this->db->execute($sql);
		return $this->db->fetchAll();
		
	}
	

	/**
	 *
	 *
	 */
	public function findMostPopularTags() 
	{	
		$sql = "SELECT *, count(tagName) as tagName_count
				FROM projekt_tag as tag , projekt_questionTag as questionTag
				WHERE questionTag.tagName = tag.tag
				group by questionTag.tagName
				order by tagName_count desc limit 3
				;"; 
		$this->db->execute($sql);
		return $this->db->fetchAll();
	}
	
}