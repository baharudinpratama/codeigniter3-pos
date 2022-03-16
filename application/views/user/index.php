<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User
        <small>User List</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-user"></i> User</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-header">
                    <h3 class="box-title">User List</h3>
                    <div class="box-tools">
                        <div class="pull-right">
                            <a href="<?= site_url('user/create'); ?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-user-plus"></i> Add User
                            </a>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-border table-hover">
                        <thead>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users->result() as $key => $user) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->name ?></td>
                                    <td><?= $user->address ?></td>
                                    <td><?= $user->level == 1 ? "Admin" : "Cashier" ?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('user/edit/'); ?>" class="btn btn-warning btn-xs btn-flat">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <a href="<?= site_url('user/delete/'); ?>" class="btn btn-danger btn-xs btn-flat">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->