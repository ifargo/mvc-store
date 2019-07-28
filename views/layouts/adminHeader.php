<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OneTech - Dashboard</title>
<!--    <link href="/template/styles/bootstrap4/bootstrap.min.css" rel="stylesheet">-->
    <link href="/template/styles/bootstrap4/bootstrap.css" rel="stylesheet">
    <link href="/template/plugins/fontawesome-free-5.0.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/styles/datepicker3.css" rel="stylesheet">
    <link href="/template/styles/admin_styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]-->
    <script src="/template/js/html5shiv.min.js"></script>
    <script src="/template/js/respond.min.js"></script>
    <!--[endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/admin/"><span>Onetech</span>Admin</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">3 mins ago</small>
                                    <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">1 hour ago</small>
                                    <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle count-info" href="/">
                        <em class="fa fa-arrow-circle-right"></em><span class="label label-info">Site</span>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php $user = \testShop\models\User::getUserById($_SESSION['user']); echo $user['name'];?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li <?php if ($_SERVER['REQUEST_URI']=="/admin") {echo "class=\"active\"";}; ?>><a href="/admin"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li <?php if (preg_match("~/admin/product~",$_SERVER['REQUEST_URI'])) { echo "class=\"active\""; } ?>><a href="/admin/product"><em class="fa fa-cart-arrow-down">&nbsp;</em> Products</a></li>
        <li <?php if (preg_match("~/admin/category~",$_SERVER['REQUEST_URI'])) {echo "class=\"active\"";}; ?>><a href="/admin/category"><em class="fa fa-list">&nbsp;</em> Categories</a></li>
        <li <?php if (preg_match("~/admin/order~",$_SERVER['REQUEST_URI'])) {echo "class=\"active\"";}; ?>><a href="/admin/order"><em class="fa fa-bar-chart">&nbsp;</em> Orders</a></li>
<!--        <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>-->
<!--        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">-->
<!--                <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>-->
<!--            </a>-->
<!--            <ul class="children collapse" id="sub-item-1">-->
<!--                <li><a class="" href="#">-->
<!--                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1-->
<!--                    </a></li>-->
<!--                <li><a class="" href="#">-->
<!--                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2-->
<!--                    </a></li>-->
<!--                <li><a class="" href="#">-->
<!--                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3-->
<!--                    </a></li>-->
<!--            </ul>-->
<!--        </li>-->
        <li><a href="/user/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>

<!--Sidebar end-->






