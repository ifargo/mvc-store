<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active"><a href="/admin/order">Manage Orders</a></li>
            <li class="active">Remove Order</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Remove Order</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->

    <h4>Are you sure you wish to remove order # <strong><?php echo $id ;?></strong>?</h4>

    <form method="post">
        <input type="submit" name="submit" value="Remove order">
    </form>

</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
