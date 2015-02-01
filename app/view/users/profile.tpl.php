<h1>Min sida</h1>
<div>
	<img class="comment_img" src="http://www.gravatar.com/avatar/<?=md5($user->email);?>.jpg?s=100"  />

	<ul>
		<li>Namn: <?=$user->name?></li>
		<li>Användarnamn: <?=$user->acronym?></li>
		<li>E-post: <?=$user->email?></li>
		<li>Medlem sedan: <?=$user->created?></li>
		
	</ul>

	<p><a href="<?=$this->url->create('users/update/' . $user->id) ?>">Uppdatera profil</a></p>
</div>

<div id="usersQuestions">
	<h3>Frågor:</h3>
	
	<table style='text-align: left;'>
 
		<?foreach ($userQuestions as $userQuestion) : ?>
			<tr>
				<td><a href="<?=$this->url->create('questions/id/' . $userQuestion->id)?>"><?=$userQuestion->questionTitle?></a></td>
				<td>Skapad: <?=$userQuestion->created?></td>
				
				<? $questionId = $userQuestion->id;?>
				<? $allAnswers = $questions->getQuestionandAnswers($questionId); ?>
				<? $numberOfAnswers = count($allAnswers);?>
				<td><?= $numberOfAnswers?> svar</td>
			</tr> 
		<?php endforeach; ?>
	</table>
</div>




