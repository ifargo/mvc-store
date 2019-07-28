<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active"><a href="/admin/category">Manage Categories</a></li>
            <li class="active">Update Category</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update category</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8 col-lg-offset-2">
        <div class="row">


            <form action="" method="post" >

                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $category['name'];?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Sort order</label>
                    <input class="form-control" type="text" name="sort_order" value="<?php echo $category['sort_order'];?>" placeholder="">
                </div>
<?php if (isset($options) && is_array($options)){print_r($options);} ?>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php if ($category['status'] == 1) echo "selected=\"selected\""?>>Visible</option>
                        <option value="0" <?php if ($category['status'] == 0) echo "selected=\"selected\""?>>Hidden</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Save category</button>


            </form>



            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
