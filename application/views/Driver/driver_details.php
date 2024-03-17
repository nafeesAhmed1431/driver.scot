<div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Drivers /</span> View
        </h4>
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class=" d-flex align-items-center flex-column">
                                <img class="img-fluid rounded my-4" src="<?= base_url('assets/img/avatars/1.png') ?>" height="110" width="110" alt="User avatar">
                                <div class="user-info text-center">
                                    <h4 class="mb-2"><?= $driver->first_name . " " . $driver->last_name ?></h4>
                                    <span class="badge bg-label-secondary"><?= $driver->sub_driver ? "Sub Driver" : "Driver" ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                            <div class="d-flex align-items-start me-4 mt-3 gap-3">
                                <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-check bx-sm"></i></span>
                                <div>
                                    <h5 class="mb-0"><?= $total_jobs_count ?></h5>
                                    <span>Total Jobs</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mt-3 gap-3">
                                <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-customize bx-sm"></i></span>
                                <div>
                                    <h5 class="mb-0"><?= $total_completed_jobs_count ?></h5>
                                    <span>Completed Jobs</span>
                                </div>
                            </div>
                        </div>
                        <h5 class="pb-2 border-bottom mb-4">Details</h5>
                        <div class="info-container">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td><?= $driver->user_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?= $driver->email ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <span class="badge bg-label-<?= $driver->enable_bit ? "success" : "danger" ?> me-1"><?= $driver->enable_bit ? "Active" : "Inactive" ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            <span><?= $driver->sub_driver ? "Sub Driver" : "Driver" ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            <span><?= $driver->sub_driver ? "Sub Driver" : "Driver" ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>
                                            <span><?= $driver->mobile_number ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>
                                            <span><?= $driver->phone_number ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Country / City</td>
                                        <td>
                                            <span><?= ucfirst($driver->country) . " / " . ucfirst($driver->city) ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center pt-3">
                                <a href="javascript:void(0);" class="btn btn-primary me-1">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->


            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- User Pills -->
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link load_jobs active" data-type="1" href="javascript:void(0);"><i class="bx bx-check me-1"></i>Completed</a></li>
                    <li class="nav-item"><a class="nav-link load_jobs" data-type="0" href="javascript:void(0);"><i class="bx bx-lock-alt me-1"></i>Pending</a></li>
                    <li class="nav-item"><a class="nav-link load_jobs" data-type="2" href="javascript:void(0);"><i class="bx bx-times me-1"></i>Canceled</a></li>
                    <li class="nav-item"><a class="nav-link load_jobs" data-type="3" href="javascript:void(0);"><i class="bx bx-bell me-1"></i>All</a></li>
                </ul>
                <!--/ User Pills -->

                <div class="card mb-4 table_section"></div>
            </div>
            <!--/ User Content -->
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>

<script>
    let driver_id = <?= $driver->id ?>;
    $(document).ready(function() {
        load_jobs(1);
    });

    $(document).on('click', '.load_jobs', function() {
        load_jobs($(this).data('type'));
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    function load_jobs(type) {
        $.ajax({
            url: `${base_url}/driver/get_jobs`,
            dataType: 'json',
            method: "GET",
            data: {
                type: type,
                driver_id: driver_id
            },
            success: res => {
                if (res.status) {
                    $('.table_section').html(res.html);
                }
            }

        });
    }
</script>