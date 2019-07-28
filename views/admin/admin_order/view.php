<?php require_once (ROOT."/views/layouts/adminHeader.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active">Manage Orders</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Orders</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Order #<?php echo $order['id'] ?></h2>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8">
        <div class="row">
            
            <table class="table table-striped table-hover">
                <tr>
                    <td>Order ID</td>
                    <td ><?php echo $order['id'] ?></td>
                </tr>
                <tr>
                    <td>Customer's name</td>
                    <td><?php echo $order['user_name'] ?></td>
                </tr>
                <tr>
                    <td>Customer's phone number</td>
                    <td><?php echo $order['user_phone'] ?></td>
                </tr>
                <tr>
                    <td>Customer's comment</td>
                    <td><?php echo $order['user_comment'] ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                <tr>
                    <td>Customer's ID</td>
                    <td><?php echo $order['user_id'] ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td>Date</td>
                    <td><?php echo $order['date'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php \testShop\models\Order::getStatusText($order['status']); ?></td>
                </tr>
            </table>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Products</h2>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Code</th>
                    <th scope="col" >Name</th>
                    <th scope="col" >Price</th>
                    <th scope="col" >Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td ><?php echo $product['id'] ?></td>
                        <td><?php echo $product['code'] ?></td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo $productQuantity[$product['id']]; ?></td>
                    </tr>
                <?php  endforeach; ?>
                </tbody>
            </table>

            <a href="/admin/order"><button type="button" name="back" class="btn btn-primary"><i class="fa fa-backward"></i> Back to orders</button></a>

        </div>
    </div>

</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
