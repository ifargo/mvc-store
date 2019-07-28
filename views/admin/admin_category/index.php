<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active">Manage Categories</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Categories</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8">
        <div class="row">
            <a href="/admin/category/create/">
                <button type="button" class="btn btn-lg btn-primary" style="margin-bottom: 35px;"><i class="fa fa-plus"></i> Add new category</button>
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Status</th>
                        <th class="align-middle text-center">Edit</th>
                        <th class="align-middle text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td ><?php echo $category['id'] ?></td>
                        <td><?php echo $category['name'] ?></td>
                        <td><?php if ($category['status'] == 1){echo "Visible";} else {echo "Hidden";} ?></td>
                        <td class="align-middle text-center"><a href="/admin/category/update/<?php echo $category['id'] ?>"><i class="fa fa-pencil"></i></a></td>
                        <td class="align-middle text-center"><a href="/admin/category/delete/<?php echo $category['id'] ?>" class="remove-product"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php  endforeach; ?>
                </tbody>
            </table>
            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
