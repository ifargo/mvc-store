<?php require_once (ROOT."/views/layouts/adminHeader.php");?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--    Breadcrumbs-->
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin/">
                    <em class="fa fa-home"> Dashboard </em>
                </a></li>
            <li class="active"><a href="/admin/product">Manage Products</a></li>
            <li class="active">Update Product</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update product</h1>
        </div>
    </div>
    <!--/Breadcrumbs-->
    <div class="col-lg-8 col-lg-offset-2">
        <div class="row">


            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $product['name'];?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input class="form-control" type="text" name="code" value="<?php echo $product['code'];?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Price, $</label>
                    <input class="form-control" type="text" name="price" value="<?php echo $product['price'];?>" placeholder="">
                </div>

                <div class="form-group">
                    <label>Category</label>

                    <select class="form-control" name="category_id">
                        <?php if ((isset($categoriesList))&&(is_array($categoriesList))): ?>
                            <?php foreach ($categoriesList as $category): ?>
                                <option value="<?php echo $category['id'];?>"
                                <?php if ($product['category_id'] == $category['id']) echo "selected='selected'"?>>
                                    <?php echo $category['name'];?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                </div>

                <div class="form-group">
                    <label>Brand</label>
                    <input class="form-control" name="brand" value="<?php echo $product['brand'];?>" placeholder="">
                </div>

                <div class="form-group">
                    <label>Product image</label>
                    <img src="<?php $img = \testShop\models\Product::getImage($product['id']); echo $img; ?>" alt="" width="200">
                    <input type="file" name="image" value="<?php echo \testShop\models\Product::getImage($product['id']); ?>">

                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description"><?php echo $product['description'];?></textarea>
                </div>

                <div class="form-group">
                    <label>In stock</label>
                    <select class="form-control" name="availability">
                        <option value="1" <?php if ($product['availability'] == 1) echo "selected=\"selected\""?>>Yes</option>
                        <option value="0" <?php if ($product['availability'] == 0) echo "selected=\"selected\""?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Is new</label>
                    <select class="form-control" name="is_new">
                        <option value="1" <?php if ($product['is_new'] == 1) echo "selected=\"selected\""?>>Yes</option>
                        <option value="0" <?php if ($product['is_new'] == 0) echo "selected=\"selected\""?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Is recommended</label>
                    <select class="form-control" name="is_recommended">
                        <option  value="1" <?php if ($product['is_recommended'] == 1) echo "selected=\"selected\""?>>Yes</option>
                        <option value="0" <?php if ($product['is_recommended'] == 0) echo "selected=\"selected\""?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option  value="1" <?php if ($product['status'] == 1) echo "selected=\"selected\""?>>Visible</option>
                        <option value="0" <?php if ($product['status'] == 0) echo "selected=\"selected\""?>>Hidden</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Save product</button>


            </form>



            <br/>
        </div>
    </div>
</div>
<?php require_once (ROOT."/views/layouts/adminFooter.php");?>
