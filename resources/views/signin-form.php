<?php 
$pageTitle = 'Connexion';      
include(__DIR__.'/layout/header.php');  
?>     
<div class="col-12 col-md-4">
    <div class="card">
        <div class="card-header">Connexion</div>
        <div class="card-body">
            <form action="<?= route('signin_post') ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="editor" placeholder="">
                </div>
                <button type="submit" class="btn btn-success btn-block">Connexion</button>
            </form>
        </div>
    </div>
</div>
<?php include(__DIR__.'/layout/footer.php'); ?>