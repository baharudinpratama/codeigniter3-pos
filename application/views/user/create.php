<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User
        <small>Add User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> User</a></li>
        <li class="active"><a href="#">Create</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-header">
                    <h3 class="box-title">User Form</h3>
                    <div class="box-tools">
                        <div class="pull-right">
                            <a href="<?= site_url('user'); ?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
                                    <label for="">Name *</label>
                                    <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control">
                                    <span class="help-block"><?= form_error('name') ?></span>
                                </div>
                                <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                    <label for="">Username *</label>
                                    <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                                    <span class="help-block"><?= form_error('username') ?></span>
                                </div>
                                <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                    <label for="">Password *</label>
                                    <input type="password" name="password" class="form-control">
                                    <span class="help-block"><?= form_error('password') ?></span>
                                </div>
                                <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                                    <label for="">Confirm Password *</label>
                                    <input type="password" name="passconf" class="form-control">
                                    <span class="help-block"><?= form_error('passconf') ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" id="" class="form-control"><?= set_value('address') ?></textarea>
                                </div>
                                <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                                    <label for="">Level *</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="">Select one</option>
                                        <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                        <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Cashier</option>
                                    </select>
                                    <span class="help-block"><?= form_error('level') ?></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                                    <button type="reset" class="btn btn-default btn-flat">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <!--  -->
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->