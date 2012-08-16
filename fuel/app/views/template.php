<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php echo Asset::css('bootstrap.css'); ?>

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;

            position: relative;

            background-color: white;
            background-repeat: repeat-x;
            background-position: 0 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <?php echo Asset::css('bootstrap-responsive.css'); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">

</head>
<body>

<div id="content_main">

    <?php echo $content; ?>

</div>

</body>
</html>