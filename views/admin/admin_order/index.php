<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

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
    <!--/Breadcrumbs-->
    <div class="col-lg-8">
        <div class="row">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col" >Customer's Name</th>
                        <th scope="col" >Customer's Phone #</th>
                        <th scope="col" >Order date</th>
                        <th scope="col" >Status</th>
                        <th class="align-middle text-center"></th>
                        <th class="align-middle text-center"></th>
                        <th class="align-middle text-center"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td ><?php echo $order['id'] ?></td>
                        <td><?php echo $order['user_name'] ?></td>
                        <td><?php echo $order['user_phone'] ?></td>
                        <td><?php echo $order['date'] ?></td>
                        <td><?php \testShop\models\Order::getStatusText($order['status']) ?></td>
                        <td class="align-middle text-center"><a href="/admin/order/view/<?php echo $order['id'] ?>"><i class="fa fa-eye"></i></a></td>
                        <td class="align-middle text-center"><a href="/admin/order/update/<?php echo $order['id'] ?>"><i class="fa fa-pencil"></i></a></td>
                        <td class="align-middle text-center"><a href="/admin/order/delete/<?php echo $order['id'] ?>" class="remove-product"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php  endforeach; ?>
                </tbody>
            </table>
            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
