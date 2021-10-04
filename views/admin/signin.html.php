<?php
require TEMPLATES . DIRECTORY_SEPARATOR . "header.html.php";
?>
<h2>Se connecter</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
    </div>
    <div class="mb-3">
        <label for="passwordOne" class="form-label">Password</label>
        <input type="password" class="form-control" name="passwordOne" id="passwordOne">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require TEMPLATES . DIRECTORY_SEPARATOR . "footer.html.php";
?>