<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active"><a href="/admin/category">Manage Categories</a></li>
            <li class="active">Create category</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create category</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8 col-lg-offset-2">
        <div class="row">

            <?php if (isset($errors) && is_array($errors)) {
                foreach ($errors as $error) {
                    echo "<p style='color: red;'>-".$error."</p>";
                }
            } ?>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="" placeholder="">
                </div>
                <div class="form-group">
                    <label>Sort order</label>
                    <input class="form-control" type="text" name="sort_order" value="" placeholder="">
                </div>


                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" selected="selected">Visible</option>
                        <option value="0">Hidden</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Save category</button>
                <button type="submit" name="submit-next" class="btn btn-primary">Save and add new</button>

            </form>

            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
