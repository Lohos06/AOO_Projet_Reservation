<?php

if (!empty($data['error'])) {
    echo $data['error'];
}

?>

<form action="" method="POST">
    <fieldset>
        <legend>Identité</legend>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <label for="firstname">FirstName</label>
        <input type="text" id="firstname" name="firstname">
    </fieldset>
    <fieldset>          
        <legend>Identifiants</legend>
        <label for="email">email</label>
        <input type="text" id="email" name="email">
        <label for="password">password</label>
        <input type="password" id="password" name="password">
    </fieldset>
    <input type="submit" value="Submit">
</form>