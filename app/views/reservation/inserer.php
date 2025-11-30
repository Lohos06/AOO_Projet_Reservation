<?php

if (!empty($data['error'])) {
    echo $data['error'];
}

?>

<form action="" method ="POST">
    <fieldset>          
        <!--<legend>Identifiants</legend>-->
        <label for="userId">Identifiant utilisateur</label>
        <input type="text" id="userId" name="userId">
        <label for="activityId">Identifiant de L'activité</label>
        <input type="activityId" id="activityId" name="activityId">
    </fieldset>
    <input type="submit" value="Submit">
</form>

