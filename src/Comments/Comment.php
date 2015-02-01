<?php
namespace Anax\Comments;
 
/**
 * Model for Comments.
 *
 */
class Comment extends \Anax\MVC\CDatabaseModel
{
	/**
	 * Find all answers that belongs to an answer
	 *
	 */
	public function findCommentstoAnswers($answerId, $commentType) {
			//echo 'trying to fin all comments';
			$this->db->select()
				 ->from($this->getSource())
				 ->where("questAnswId = ?")
				 ->andWhere("commentType = ?");
	 
		$this->db->execute([$answerId, $commentType]);
		$this->db->setFetchModeClass(__CLASS__);
		return $this->db->fetchAll();
	}
	
}