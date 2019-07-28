<?php $headerLoadingFile = __FILE__;?>
<?php //require_once (ROOT.'/views/layouts/shopHeader.php');
require_once (ROOT.'/views/layouts/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if ($result): ?>
                <h2 style="padding-top: 50px; margin: auto;">Your profile has been updated!</h2>
            <?php else: ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail image" />
                                <div class="middle">
                                    <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                    <input type="file" style="display: none;" id="profilePicture" name="file" />
                                </div>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $user['name']; ?></a></h2>
                                <h6 class="d-block"><a href="javascript:void(0)">1,500</a> Video Uploads</h6>
                                <h6 class="d-block"><a href="javascript:void(0)">300</a> Blog Posts</h6>

                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                </li>
                            </ul>
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <div class="col-md-12 text-left" style="margin: auto;">
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li style="color: red;"> - <?php echo $error ?></li>
                                        <?php endforeach; ?>
                                        <hr/>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form class="login_form" action="" method="post">
                                <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Full Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>">
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">E-mail</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Password</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="password" class="form-control" name="password" value="<?php echo $user['password']; ?>">
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Phone number</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" name="phone_number" value="<?php echo $user['phone_number']; ?>">
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Birth date</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" name="birth_date" value="<?php echo $user['birth_date']; ?>">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Address</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" name="submit" class="btn btn-outline-primary">Save</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    Facebook, Google, Twitter Account that are connected to this account
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>


                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $imgSrc = $('#imgProfile').attr('src');
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgProfile').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#btnChangePicture').on('click', function () {
            // document.getElementById('profilePicture').click();
            if (!$('#btnChangePicture').hasClass('changing')) {
                $('#profilePicture').click();
            }
            else {
                // change
            }
        });
        $('#profilePicture').on('change', function () {
            readURL(this);
            $('#btnChangePicture').addClass('changing');
            $('#btnChangePicture').attr('value', 'Confirm');
            $('#btnDiscard').removeClass('d-none');
            // $('#imgProfile').attr('src', '');
        });
        $('#btnDiscard').on('click', function () {
            // if ($('#btnDiscard').hasClass('d-none')) {
            $('#btnChangePicture').removeClass('changing');
            $('#btnChangePicture').attr('value', 'Change');
            $('#btnDiscard').addClass('d-none');
            $('#imgProfile').attr('src', $imgSrc);
            $('#profilePicture').val('');
            // }
        });
    });
</script>

<?php require_once (ROOT.'/views/layouts/footer.php'); ?>
