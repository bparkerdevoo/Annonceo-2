<?php 
require_once("inc/init.inc.php");

require_once("inc/haut.inc.php");
?>

<form>
								<label for='commentaire'>Commentaire</label>
								<textarea name='commentaire'></textarea>

								<label for='note'>Donnez une note</label>
								<select name='note'>
									<option value='1'>1/5</option>
									<option value='2'>2/5</option>
									<option value='3'>3/5</option>
									<option value='4'>4/5</option>
									<option value='5'>5/5</option>
								</select>


							</form>



<?php 

endforeach;
require_once("inc/bas.inc.php");
?>