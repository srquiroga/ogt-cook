<h1>Area de notificacion</h1>
<div class='row'>
<div class="flash-success">
	<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
</div


</div>

