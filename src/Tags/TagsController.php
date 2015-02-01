<?php
namespace Anax\Tags;
 
/**
 * A controller for tags.
 *
 */
class TagsController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable,
		\Anax\MVC\TRedirectHelpers;
	
	
	public $tags;
	
	
	
	/**
	 * Initialize the controller.
	 *
	 * @return void
	 */
	public function initialize()
	{
		//$this->users = new \Anax\Users\User();
		//$this->users->setDI($this->di);
		
		//$this->questions = new \Anax\Questions\Question();
		//$this->questions->setDI($this->di);
		
		//$this->answers = new \Anax\Answers\Answer();
		//$this->answers->setDI($this->di);
				
		//$this->comments = new \Anax\Comments\Comment();
		//$this->comments->setDI($this->di);
		
		$this->tags = new \Anax\Tags\Tag();
		$this->tags->setDI($this->di);
	}
	
	
	/**
	 * List all tags.
	 *
	 * @return void
	 */
	public function listAction()
	{
		$all = $this->tags->findAll();
		
		$this->theme->setTitle("Taggar");
		$this->views->add('tags/list-all', [
			'tags' => $all,
			'title' => "Taggar",
		]);
	}
	
	
	/**
	 * List tag with id and the questions that has that tag.
	 */
	public function idAction($tagId = null)
	{
		$tag = $this->tags->find($tagId);
		$tagName = $tag->tag;
		
		$tagsQuestions = $this->tags->getQuestonsWithTag($tagName);
		
		
		$this->theme->setTitle("Visa tagg");
		$this->views->add('tags/view', [
			'tag' => $tag,
			'tagsQuestions' => $tagsQuestions
		]);
		
		//var_dump($tag);
		/*$question = $this->questions->find($questionId);
		$userId = $question->userId;
		$questionUser = $this->users->find($userId);
		
		$allAnswers = $this->answers->findAnswers($questionId);
		
		$tags = $this->questions->getTags($questionId);
		
		*/
	}

	
}