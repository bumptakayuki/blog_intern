<?php
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>
    <!-- Bootstrap core CSS -->
    <link href="./public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="./public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <link href="./public/css/clean-blog.min.css" rel="stylesheet">
    <link href="./public/css/login.css" rel="stylesheet">
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form method="post" action="./login">
            <h2>ログイン</h2>
            <div class="form-group">
                <input type="email"  class="form-control" name="email" placeholder="メールアドレス" required />
                <p class="error"><?php echo isset($errors['email']) ? $errors['email'] :''; ?></p>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="パスワード" required />
                <p class="error"><?php echo isset($errors['password']) ? $errors['password'] :''; ?></p>
            </div>
            <p><input class="btn btn-primary" name="submit" type="submit" value="ログイン"></p>
            <a href="./user/add">会員登録はこちら</a>
        </form>
    </div><!-- /card-container -->
</div><!-- /container -->