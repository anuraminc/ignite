<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$metaTitle?></title>
        <link rel="stylesheet" type="text/css" href="<?=$fullurl?>includes/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?=$fullurl?>includes/css/login-style.css">
        <link rel="stylesheet" type="text/css" href="<?=$fullurl?>includes/css/jquery.dataTables.css">
        <link type="text/css" href="<?=$fullurl?>includes/css/menu.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$fullurl?>includes/js/jquery-menu.js"></script>
        <script type="text/javascript" src="<?=$fullurl?>includes/js/menu.js"></script>
        <script type="text/javascript" src="<?=$fullurl?>includes/js/jquery.js"></script>
        <script type="text/javascript" src="<?=$fullurl?>includes/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?=$fullurl?>includes/js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="<?=$fullurl?>includes/js/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="<?=$fullurl?>includes/js/ajax.js"></script>
        <script language="javascript">
            window.status = "{elapsed_time} secs";
        </script>
        <style type="text/css">
* { margin:0;
    padding:0;
}
//body { background:rgb(74,81,85); }
div#menu { margin:5px auto; }
div#copyright {
    font:11px 'Trebuchet MS';
    color:#222;
    text-indent:30px;
    padding:40px 0 0 0;
}
div#copyright a { color:#eee; }
div#copyright a:hover { color:#222; }
</style>

        <?php if($this->session->userdata('is_logged_in') == TRUE) : ?>
            <div id="menu">
                <ul class="menu">
                    <li><a href="<?=$fullurl?>site" class="parent" accesskey="B"><span><b><?=$this->session->userdata('username')?></b></span></a>                        
                    </li>
                    <?php echo($this->session->userdata('accessObj')); ?>
                    <li><a href="#" accesskey="H"><span>Help</span></a></li>
                    <li><a href="<?=$fullurl?>main/logout" accesskey="L"><span>Logout</span></a></li>
                    <li class="last">&nbsp;<input type="text" id="univ_search_text" size="20" accesskey="Q"></li>
                </ul>
            </div>
        <?php endif; ?>
    </head>
    <body>
