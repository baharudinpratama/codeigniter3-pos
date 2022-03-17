<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Supplier
        <small>List</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-header">
                    <h3 class="box-title">Supplier Table</h3>
                    <div class="box-tools">
                        <div class="pull-right">
                            <a href="<?= site_url('supplier/create'); ?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Add Supplier
                            </a>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-border table-hover">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($suppliers->result() as $key => $supplier) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $supplier->name ?></td>
                                    <td><?= $supplier->phone ?></td>
                                    <td><?= $supplier->address ?></td>
                                    <td><?= $supplier->description ?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('supplier/delete/' . $supplier->id); ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Are you sure?');">
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