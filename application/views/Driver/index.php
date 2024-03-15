<div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Drivers /</span> All
        </h4>

        <!-- Card Border Shadow -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $total ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Registered Drivers</p>
                        <p class="mb-0">
                            <!-- <span class="fw-medium me-1">+18.2%</span> -->
                            <!-- <small class="text-muted">than last week</small> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-user"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $active ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Active Drivers</p>
                        <p class="mb-0">
                            <!-- <span class="fw-medium me-1">-8.7%</span>
                            <small class="text-muted">than last week</small> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-user"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $inactive ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Inactive Drivers</p>
                        <p class="mb-0">
                            <!-- <span class="fw-medium me-1">+4.3%</span>
                            <small class="text-muted">than last week</small> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <h5 class="card-header">Table Basic</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Business Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php if (!empty($drivers)) : ?>
                                    <?php foreach ($drivers as $driver) : ?>
                                        <tr>
                                            <td><a href="<?= base_url("driver_details/$driver->id") ?>"><?= $driver->first_name . " " . $driver->last_name ?></a></td>
                                            <td><?= $driver->email ?></td>
                                            <td><?= $driver->phone_number ?? "0000-0000000" ?></td>
                                            <td><?= $driver->bussiness_name ?? "NULL" ?></td>
                                            <td><span class="badge bg-label-<?= $driver->enable_bit ? "success" : "danger" ?> me-1"><?= $driver->enable_bit ? "Active" : "Inactive" ?></span></td>
                                            <td>
                                                <a href="" class="badge bg-info"><span class="bx bx-edit-alt"></span></a>
                                                <a href="" class="badge bg-danger"><span class="bx bx-trash"></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5"><span class="text-warning">No Drivers Found!!</span></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>