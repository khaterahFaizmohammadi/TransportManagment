<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/build/css/login.css'); ?>">
</head>


<body>
    <div class="loginPage">    
        <header>
            <h2>VSMS Login</h2>
        </header>
        <?php echo validation_errors(); ?>
        
        <?php echo form_open('login/checklogin'); ?>
            <input placeholder="Email" type="email" name="email">
            <input placeholder="Password" type="password" name="password">
            <div class="checkbox">
                <label>
                    <input style="display:inline; width:15%" name="lang" checked="checked" type="radio" value="english">English
                    <input style="display:inline; width:15%" name="lang" type="radio" value="persion">فارسی
                </label>
            </div>
            <section class="links">
                <button class="button"><span>LOGIN</span></button>
                <br><br>
            </section>
        </form>
    </div>
</body>
</html>