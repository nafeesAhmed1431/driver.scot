<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Requests /</span> All
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
                <p class="mb-1">Total Requests</p>
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
                <p class="mb-1">Total Approved Requests</p>
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
                <p class="mb-1">Total Pending Requests</p>
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
            <h5 class="card-header">Requests</h5>
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
                            <th>Pickup address <br> Drop address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php if (!empty($requests)) : ?>
                            <?php foreach ($requests as $request) : ?>
                                <tr>
                                    <td><?= $request->id ?></td>
                                    <td><a data-id="<?= $driver->id ?>" class="driverDetails" href="javascript:void(0);"><?= $request->driver_name ?></a></td>
                                    <td><?= $request->email ?></td>
                                    <td><a data-tracking-id="<?= $request->trackingID ?>" class="orderDetails" href="javascript:void(0);"><?= $request->trackingID ?></a></td>
                                    <td><?= $request->order_date ?></td>
                                    <td>Pickup <?= $request->strt_time ?><br>Drop <?= $request->end_time ?></td>
                                    <td>Pickup <?= $request->pickup_address ?><br>Drop <?= $request->delivery_address ?></td>
                                    <td><span class="badge bg-label-<?= $request->status == 1 ? "success" : "warning" ?>"><?= $request->status == 1 ? "Accepted" : "Pending" ?></span></td>
                                    <td><a href=""><span class="badge bg-info"><i class="bx bx-check"></i>Assign</span></a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5"><span class="text-warning">No Requests Found!!</span></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>