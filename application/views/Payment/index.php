<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Payments /</span> All
        </h4>

        <!-- Card Border Shadow -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-money"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $total ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Total Payments</p>
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
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-calendar-check"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $transfered ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Transfered Payments</p>
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
                                <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-time"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $pending ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Pending Payments</p>
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
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-calendar"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"><?= $scheduled ?? 0 ?></h4>
                        </div>
                        <p class="mb-1">Scheduled Payments</p>
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
                    <h5 class="card-header">Table Payments</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Listing ID</th>
                                    <th>Driver </th>
                                    <th>Order Tracking</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Completed At</th>
                                    <th>Scheduled</th>
                                    <th>Transfered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php if (!empty($payments)) : ?>
                                    <?php foreach ($payments as $payment) : ?>
                                        <tr>
                                            <td><?= ucfirst($payment->payment_id) ?></td>
                                            <td><a data-driver-id="<?= $payment->driver_id ?>" class="driverDetails" href="javascript:void(0)"><?= $payment->name ?></a></td>
                                            <td><a data-tracking-id="<?= $payment->trackingId ?>" class="orderDetails" href="javascript:void(0);"><?= $payment->trackingId ?></a></td>
                                            <td>$<?= intval($payment->amount) ?></td>
                                            <td> <span class="badge bg-label-<?= $payment->status == 1 ? "success" : ($payment->status == 2 ? "danger" : "warning") ?>"><?= $payment->status == 1 ? "Transfered" : ($payment->status == 2 ? "Pending" : "Scheduled") ?></span></td>
                                            <td><?= $payment->created_at ?></td>
                                            <td><?= $payment->scheduled ?? "----/--/--" ?></td>
                                            <td><?= $payment->transfered ?? "----/--/--" ?></td>
                                            <td>
                                                <?php if ($payment->status == 1) : ?>
                                                    <a data-id="<?= $payment->id ?>" class="btn btn-sm btn-danger remove_payment" href="javascript:void(0)"><span class="bx bx-trash-alt"></span>Remove</a>
                                                <?php elseif ($payment->status == 2) : ?>
                                                    <a data-id="<?= $payment->id ?>" class="btn btn-sm btn-warning schedule_payment" href="javascript:void(0)"><span class="bx bx-calendar"></span>Schedule</a>
                                                <?php else : ?>
                                                    <a data-id="<?= $payment->id ?>" class="btn btn-sm btn-success transfer_payment" href="javascript:void(0)"><span class="bx bx-share"></span>Transfer</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5"><span class="text-warning">No Payments Found!!</span></td>
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

<script>
    $('.remove_payment').on('click', function() {
        alert('this is to chek');
    });

    $('.schedule_payment').on('click', function() {
        var id = $(this).data('id');
        Swal.fire({
                title: 'Date for Payment Schedule',
                html: '<input type="date" class="form-control" id="schedule_date" >',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: 'blue',
                cancelButtonColor: 'tomato',
                icon: 'question'
            })
            .then(res => {
                if (res.isConfirmed && ($('#schedule_date').val() !== "")) {
                    schedule_date = $('#schedule_date').val();

                    $.post("<?= base_url('schedule_payment') ?>", {
                            date: schedule_date,
                            payment_id: id
                        }, function(data, status, xhr) {
                            res = JSON.parse(data);
                            if (res.status) {
                                Swal.fire({
                                    title: 'Success',
                                    text: res.msg,
                                    toast: true,
                                    timer: 1500,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    icon: 'success'
                                }).then(res => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Warning',
                                    text: res.msg,
                                    toast: true,
                                    timer: 1500,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    icon: 'warning'
                                });
                            }
                        })
                        .fail(res => {
                            Swal.fire({
                                title: 'Warning',
                                text: "Something Went Wrong!!",
                                toast: true,
                                timer: 1500,
                                position: 'top-end',
                                showConfirmButton: false,
                                showCancelButton: false,
                                icon: 'error'
                            });
                        });
                }
            })
            .catch(swal.noop);
    });

    $('.transfer_payment').on('click', function() {
        var id = $(this).data('id');
        Swal.fire({
                title: 'Date for Transfer Schedule',
                html: '<input type="date" class="form-control" id="transfer_date" >',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: 'blue',
                cancelButtonColor: 'tomato',
                icon: 'question'
            })
            .then(res => {
                if (res.isConfirmed && ($('#transfer_date').val() !== "")) {
                    transfer_date = $('#transfer_date').val();

                    $.post("<?= base_url('admin/transferPayment') ?>", {
                            date: transfer_date,
                            payment_id: id
                        }, function(data, status, xhr) {
                            res = JSON.parse(data);
                            if (res.status) {
                                Swal.fire({
                                    title: 'Success',
                                    text: res.msg,
                                    toast: true,
                                    timer: 1500,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    icon: 'success'
                                }).then(res => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Warning',
                                    text: res.msg,
                                    toast: true,
                                    timer: 1500,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    icon: 'warning'
                                });
                            }
                        })
                        .fail(res => {
                            Swal.fire({
                                title: 'Warning',
                                text: "Something Went Wrong!!",
                                toast: true,
                                timer: 1500,
                                position: 'top-end',
                                showConfirmButton: false,
                                showCancelButton: false,
                                icon: 'error'
                            });
                        });
                }
            })
            .catch(swal.noop);
    });
</script>