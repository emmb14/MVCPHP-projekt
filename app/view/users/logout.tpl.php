<article>
	<pre><?/*=var_dump($_SESSION)*/?></pre>
	<?/*echo $_SESSION['userId'];*/?>
	<h1><?=$title?></h1>
	<p>Vill du logga ut?</p>
	<form method=post>
	  <fieldset>
		  <p><input type='submit' name='logout' value='Logga ut' onClick="this.form.action = '<?=$this->url->create('users/logout')?>'"/></p>
		  <output><b><?=$output?></b></output>
	  </fieldset>
	</form>
</article>