<?php
namespace Anax\Questions;
 
/**
 * A controller for questions and related events.
 *
 */
class QuestionsController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable,
		\Anax\MVC\TRedirectHelpers;
		
	
	public $questions;
	public $user;
	public $answers;
	public $comments;
	public $tags;
	
	
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
		
		$this->answers = new \Anax\Answers\Answer();
		$this->answers->setDI($this->di);
				
		$this->comments = new \Anax\Comments\Comment();
		$this->comments->setDI($this->di);
		
		$this->tags = new \Anax\Tags\Tag();
		$this->tags->setDI($this->di);
		

	}

	
	
	/**
	 * Actions for the first page
	 * - latest questions
	 * - most popular tags
	 * - most active users
	 */
	public function firstpageAction() 
	{
		$latestQuestions = $this->questions->findLatestQuestions();
		$mostPopularTags = $this->tags->findMostPopularTags(); 
		$mostActiveUsers = $this->users->mostActiveUsers();
		
		$this->views->add('eskilstuna/start', [
			'latestQuestions' => $latestQuestions,
			'mostPopularTags' => $mostPopularTags,
			'mostActiveUsers' => $mostActiveUsers
		]);
	}
	
	
	/**
	 * List all questions.
	 *
	 * @return void
	 */
	public function listAction()
	{
		$all = $this->questions->findAll();
		//var_dump($all);
		$this->theme->setTitle("Frågor");
		$this->views->add('questions/list-all', [
			'questions' => $all,
			'title' => "Frågor",
		]);
	}
	
	
	/**
	 * List question with id and the answers, comments and tags that belongs to the question.
	 *
	 * @param int $id of question to display
	 *
	 * @return void
	 */
	public function idAction($questionId = null)
	{
		$question = $this->questions->find($questionId);
		
		$userId = $question->userId;
		$questionUser = $this->users->find($userId);
		
		$allAnswers = $this->answers->findAnswers($questionId);
		
		$tags = $this->questions->getTags($questionId);
		
		$this->theme->setTitle("Visa fråga");
		$this->views->add('questions/view', [
			'question' => $question,
			'user' => $questionUser,
			'answers' => $allAnswers,
			'comments' => $this->comments,
			'tags' => $tags
		]);
	}
	
	
	/**
	 * Add question
	 *
	 */
	public function addAction() 
	{
		$userId =  isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		
		if($userId){
			//echo $userId;
			$form = new \Anax\HTMLForm\CFormQuestion($this->questions, $userId, $this->tags);
			$form->setDI($this->di);
			$form->check();
			
			$this->di->theme->setTitle("Ställ en fråga");
			$this->di->views->add('default/page', [
				'title' => "Ställ en fråga",
				'content' => $form->getHTML()
			]);
		} else {
			$this->di->theme->setTitle("Ställ en fråga");
			$this->di->views->add('default/page', [
				'title' => "Ställ en fråga",
				'content' => '<p>Du måste vara inloggad för att ställa en fråga. <br/> <a href="' . $this->url->create('users/login') . '">Logga in</a></p>'
			]);
		}
	} 
	
	
	/**
	 * Answer a question
	 *
	 */
	public function addAnswerAction($questionId)
	{
		$userId =  isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		$question = $this->questions->find($questionId);
		
		$user = $this->users->find($userId);
		$acronym = $user->acronym;

				
		if($userId){
			$form = new \Anax\HTMLForm\CFormAnswer($this->answers, $userId, $question, $acronym);
			$form->setDI($this->di);
			$form->check();
			
			$this->di->theme->setTitle("Besvara fråga");
			$this->di->views->add('default/page', [
				'title' => "Svara på frågan: " . $question->questionTitle,
				'content' => $form->getHTML()
			]);
		} else {
			$this->di->theme->setTitle("Besvara fråga");
			$this->di->views->add('default/page', [
				'title' => "Svara på frågan: " . $question->questionTitle,
				'content' => '<p>Du måste vara inloggad för att besvara en fråga. <br/> <a href="' . $this->url->create('users/login') . '">Logga in</a></p>'
			]);
		}
	}
	
	
	/**
	 * Add a comment to a question
	 *
	 */
	public function addCommenttoQuestionAction($questionId)
	{
		$userId =  isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		$question = $this->questions->find($questionId);
		
		$user = $this->users->find($userId);
		$acronym = isset($user->acronym) ? $user->acronym : null;
		
		$type = "question";
				
		if($userId){
			$form = new \Anax\HTMLForm\CFormComment($this->comments, $userId, $questionId, $acronym, $type, $question);
			$form->setDI($this->di);
			$form->check();
			
			$this->di->theme->setTitle("Lägg till kommentar");
			$this->di->views->add('default/page', [
				'title' => "Lägg till kommentar",
				'content' => $form->getHTML()
			]);
		} else {
			$this->di->theme->setTitle("Lägg till kommentar");
			$this->di->views->add('default/page', [
				'title' => "Lägg till kommentar",
				'content' => '<p>Du måste vara inloggad för att lägga till en kommentar <br/> <a href="' . $this->url->create('users/login') . '">Logga in</a></p>'
			]);
		}
	}
	
	
	/**
	 * Add a comment to an answer
	 *
	 */
	public function addCommenttoAnswerAction($answerId, $questionId)
	{
		$userId =  isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		//$answer = $this->answers->findAnswer($answerId);
		$question = $this->questions->find($questionId);
		
		$user = $this->users->find($userId);
		$acronym = isset($user->acronym) ? $user->acronym : null;
		
		$type = "answer";
				
		if($userId){
			$form = new \Anax\HTMLForm\CFormComment($this->comments, $userId, $answerId, $acronym, $type, $question);
			$form->setDI($this->di);
			$form->check();
			
			$this->di->theme->setTitle("Lägg till kommentar");
			$this->di->views->add('default/page', [
				'title' => "Lägg till kommentar",
				'content' => $form->getHTML()
			]);
		} else {
			$this->di->theme->setTitle("Lägg till kommentar");
			$this->di->views->add('default/page', [
				'title' => "Lägg till kommentar",
				'content' => '<p>Du måste vara inloggad för att lägga till en kommentar <br/> <a href="' . $this->url->create('users/login') . '">Logga in</a></p>'
			]);
		}
	}
	
}