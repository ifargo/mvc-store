<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active">Manage Products</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Products</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8">
        <div class="row">
            <a href="/admin/product/create/">
                <button type="button" class="btn btn-lg btn-primary" style="margin-bottom: 35px;"><i class="fa fa-plus"></i> Add new product</button>
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Code</th>
                        <th scope="col" >Name</th>
                        <th class="align-middle text-center">Edit</th>
                        <th class="align-middle text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td ><?php echo $product['id'] ?></td>
                        <td><?php echo $product['code'] ?></td>
                        <td><?php echo $product['name'] ?></td>
                        <td class="align-middle text-center"><a href="/admin/product/update/<?php echo $product['id'] ?>"><i class="fa fa-pencil"></i></a></td>
                        <td class="align-middle text-center"><a href="/admin/product/delete/<?php echo $product['id'] ?>" class="remove-product"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php  endforeach; ?>
                </tbody>
            </table>
            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
