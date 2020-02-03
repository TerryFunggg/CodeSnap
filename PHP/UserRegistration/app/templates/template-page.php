<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
                if (!empty($GLOBALS['TEMPLATE']['title'])){
                    echo $GLOBALS['TEMPLATE']['title'];
                }
        ?>
    </title>
    <link rel="stylesheet" href="/css/styles.css">

    <?php
            if (!empty($GLOBALS["TEMPLATE"]['extra_head'])){
                echo $GLOBALS["TEMPLATE"]['extra_head'];
            }
     ?>
</head>
<body>
<div id="header">
    <?php
        if(!empty($GLOBALS['TEMPLATE']['title'])){
            echo $GLOBALS['TEMPLATE']['title'];
        }
    ?>
</div>
<div id="content">
    <?php
        if(!empty($GLOBALS['TEMPLATE']['content'])){
            echo $GLOBALS['TEMPLATE']['content'];
        }
    ?>
</div>
    <div id="footer">
        Copyright &copy;<?php echo date('Y');?>
    </div>

</body>
</html>