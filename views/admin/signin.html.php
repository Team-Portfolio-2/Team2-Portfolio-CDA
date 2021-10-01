<?php
require TEMPLATES . DIRECTORY_SEPARATOR . "header.html.php";
?>
<h2>Se connecter</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="email">
    </div>
    <div class="mb-3">
        <label for="passwordOne" class="form-label">Password</label>
        <input type="password" class="form-control" id="passwordOne">
    </div>
    <div class="mb-3">
        <label for="passwordTwo" class="form-label">Password</label>
        <input type="password" class="form-control" id="passwordTwo">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require TEMPLATES . DIRECTORY_SEPARATOR . "footer.html.php";
?>