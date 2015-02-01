<h1><?=$tag->tag?></h1>

<p>Frågor som har den här taggen: </p>

<div ="tagsquestions">
	<ul>
	
		<? if(isset($tagsQuestions)) : ?>
			<? foreach ($tagsQuestions as $tagQuestion) : ?>
				
				<li><a href="<?=$this->url->create('questions/id/' . $tagQuestion->id)?>"><?=$tagQuestion->questionTitle?></a> Skapad: <?=$tagQuestion->created?></li>
				
			<? endforeach; ?>
		<? endif; ?>
	
	</ul>

</div>