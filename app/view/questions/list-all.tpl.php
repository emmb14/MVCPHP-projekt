<h1><?=$title?></h1>
 
<table style='text-align: left;'>

	<?php foreach ($questions as $question) : ?>
		<tr>
			<td><a href="<?=$this->url->create('questions/id/' . $question->id)?>"><?=$question->questionTitle?></a></td>
			<td>skapad: <?=$question->created?></td>
		</tr> 
	<?php endforeach; ?>

</table>
 