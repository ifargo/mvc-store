<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active"><a href="/admin/product">Manage Products</a></li>
            <li class="active">Create Product</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create product</h1>
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
                    <label>Code</label>
                    <input class="form-control" type="text" name="code" value="" placeholder="">
                </div>
                <div class="form-group">
                    <label>Price, $</label>
                    <input class="form-control" type="text" name="price" value="" placeholder="">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <?php if ((isset($categoriesList))&&(is_array($categoriesList))): ?>
                            <?php foreach ($categoriesList as $category): ?>
                                <option value="<?php echo $category['id'];?>">
                                    <?php echo $category['name'];?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input class="form-control" name="brand" value="" placeholder="">
                </div>

                <div class="form-group">
                    <label>Product image</label>
                    <p>Please upload file of .png, .jpg or .jpeg formats.</p>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>In stock</label>
                    <select class="form-control" name="availability">
                        <option value="1" selected="selected">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Is new</label>
                    <select class="form-control" name="is_new">
                        <option value="1" selected="selected">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Is recommended</label>
                    <select class="form-control" name="is_recommended">
                        <option  value="1" selected="selected">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option  value="1" selected="selected">Visible</option>
                        <option value="0">Hidden</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Save product</button>
                <button type="submit" name="submit-next" class="btn btn-primary">Save and add new</button>


            </form>



            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
