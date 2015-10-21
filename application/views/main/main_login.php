
<?php $this->load->view('header'); ?>
<head>

    <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    <style>
        @import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
        body {
            background: #563c55 url(<?=$fullurl?>includes/images/blurred.jpg) no-repeat center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
        }
        .container > header h1,
        .container > header h2 {
            color: #fff;
            text-shadow: 0 1px 1px rgba(0,0,0,0.7);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <br><br>
        <header>
            <h1> <strong><?=$metaTitle?></strong></h1>			
        </header>
        <section class="main">
            <?php if (isset($error) && !empty($error)) : ?>
                <?php echo '<p id="errmsg" class="error">' . $error . '</p>'; ?>
            <?php endif; ?>
            <form action="<?=$fullurl?>main/login" method="post" accept-charset="utf-8" class="form-3">
                <p class="clearfix">
                    <label for="login">Username</label>
                    <input type="text" name="uname" id="uname" placeholder="Username">
                    <input type="hidden" name="ulink" id="ulink" />
                </p>
                <p class="clearfix">
                    <label for="password">Password</label>
                    <input type="password" name="ucode" id="ucode" placeholder="Password"> 
                </p>
                <p class="clearfix">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </p>
                <p class="clearfix">
                    <input type="submit" name="submit" value="Sign in">
                </p>       
            </form>​
            <?php echo form_close(); ?>
        </section>
    </div>
</body>
<script language="javascript">

//if(document.getElementById("uname").value == "")
    document.getElementById("uname").focus();

    /*        && document.getElementById("ucode").value != "")
     {
     document.forms[0].submit();
     }
     
     */
</script>
<?php $this->load->view('footer'); ?>
