$(document).on('click', '.orderDetails', function () {
    let trk_id = $(this).data('tracking-id');
    $.ajax({
        url: `${base_url}/order_details_modal`,
        dataType: 'json',
        method: 'GET',
        data: { trackingId: trk_id },
        success: res => {
            if (res.status) {
                $('#gm').html(res.html);
                $('#gm').modal('show');
            }
        }

    });
});

$(document).on('click', '.driverDetails', function () {
    $.ajax({
        url: `${base_url}/driver_details_modal`,
        dataType: 'json',
        method: 'GET',
        data: { driverId: $(this).data('driver-id') },
        success: res => {
            if (res.status) {
                $('#gm').html(res.html);
                $('#gm').modal('show');
            }
        }

    });
});