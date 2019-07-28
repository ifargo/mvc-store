<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active"><a href="/admin/order">Manage Orders</a></li>
            <li class="active">Update order</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update order</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8 col-lg-offset-2">
        <div class="row">


            <form action="" method="post" >

                <div class="form-group">
                    <label>Customer's Name</label>
                    <input class="form-control" type="text" name="user_name" value="<?php echo $order['user_name'];?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Customer's Phone</label>
                    <input class="form-control" type="text" name="user_phone" value="<?php echo $order['user_phone'];?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Customer's Comment</label>
                    <textarea class="form-control" rows="3" name="user_comment"><?php echo $order['user_comment'];?></textarea>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control" type="text" name="date" value="<?php echo $order['date'];?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php if ($order['status'] == 1) echo "selected=\"selected\""?>><?php \testShop\models\Order::getStatusText(1) ?></option>
                        <option value="2" <?php if ($order['status'] == 2) echo "selected=\"selected\""?>><?php \testShop\models\Order::getStatusText(2) ?></option>
                        <option value="3" <?php if ($order['status'] == 3) echo "selected=\"selected\""?>><?php \testShop\models\Order::getStatusText(3) ?></option>
                        <option value="4" <?php if ($order['status'] == 4) echo "selected=\"selected\""?>><?php \testShop\models\Order::getStatusText(4) ?></option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Save order</button>


            </form>



            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
