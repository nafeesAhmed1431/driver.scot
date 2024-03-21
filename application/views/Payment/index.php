<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="main_content">
            <?= $html ?>
        </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>

<script>
    function refresh_content() {
        $.get(<?= base_url('payment_main_content') ?>).done(res => {
            $('.main_content').html(res);
        });
    }
</script>

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