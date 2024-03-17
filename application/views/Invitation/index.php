<div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Invitations /</span> All
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
                        <p class="mb-1">Total Invitations</p>
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
                            <h4 class="ms-1 mb-0"><?= $approved ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Approved Invitations</p>
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
                            <h4 class="ms-1 mb-0"><?= $pending ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Pending Invitations</p>
                        <p class="mb-0">
                            <!-- <span class="fw-medium me-1">+4.3%</span>
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
                            <h4 class="ms-1 mb-0"><?= $rejected ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Rejected Invitations</p>
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
                    <h5 class="card-header">Invitations</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SR</th>
                                    <th>Driver</th>
                                    <th>Email</th>
                                    <th>Order</th>
                                    <th>Order Date</th>
                                    <th>Pickup time <br> Drop time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php if (!empty($invitations)) : ?>
                                    <?php foreach ($invitations as $invitation) : ?>
                                        <tr>
                                            <td><?= $invitation->id ?></td>
                                            <td><a href="<?= base_url("driver_details/$invitation->driver_id") ?>"><?= $invitation->driver_name ?></a></td>
                                            <td><?= $invitation->email ?></td>
                                            <td><a data-tracking-id="<?= $invitation->trackingID ?>" class="orderDetails" href="javascript:void(0);"><?= $invitation->trackingID ?></a></td>
                                            <td><?= $invitation->order_date ?></td>
                                            <td>Pickup <?= $invitation->strt_time ?><br>Drop <?= $invitation->end_time ?></td>
                                            <td>
                                                <span class="badge bg-label-<?= $invitation->status == 0 ? "warning" : ($invitation->status == 1 ? "success" : "danger") ?>">
                                                    <?= $invitation->status == 0 ? "Pending" : ($invitation->status == 1 ? "Accepted" : "Rejected") ?>
                                                </span>
                                            </td>
                                            <td><a href=""><span class="badge bg-danger">Remove</span></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center"><span class="text-danger">No Invitations Found!!</span></td>
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