<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href=" <?php echo base_url('frontend/css/c4.css') ?>" rel="stylesheet">
</head>
<body>
  <div class="container">
    <?php
    if ($this->session->flashdata('success')) {
    ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?> </div>
    <?php
    } elseif ($this->session->flashdata('error')) {
    ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?> </div>
    <?php
    }
    ?>
    <div class="main">
      <h1 class="login__heading">ĐĂNG NHẬP HỆ THỐNG (ADMIN)</h1>
      <div class="login__group"> <a class="aaaa" href="<?php echo base_url('/') ?>"><img width="200px" src=" <?php echo base_url('uploads/brand/logo.jpg')  ?>" alt="" /></a> </div>
      <form class="login__form" action="<?php echo base_url('login-user') ?>" method="POST">
        <div class="login__group">
          <label class="login__label" for="email"><b>Email Address:</b></label>
          <input class="login__input" type="text" placeholder="Nhập tên tài khoản" required name="email">
        </div>
        <div class="login__group">
          <label class="login__label" for="psw"><b>Password:</b></label>
          <input class="login__input" type="password" placeholder="Nhập Mật Khẩu" required name="password">
        </div>
        <div class="login__signup">
          <button type="submit" name="submit" class="login__btn">Login</button>
          <button type="reset" name="reset" class="login__btn">Cancel</button> <br>
        </div>
      </form>
    </div>
</body>
</html>