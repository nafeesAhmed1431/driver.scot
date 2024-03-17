<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <h2>Driver Scot</h2>
                    </div>
                    <!-- /Logo -->
                    <div class="d-flex justify-content-center mt-3">
                        <div class="spinner-grow text-info" style="width: 7rem; height: 7rem;" role="status"></div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <span>Authenticating Driver. Please Wait....</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center error-tray mt-3" style="display: none;">
                        <div class="errors text-center"></div>
                        <div class="back text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let back_url = "<?= $_SERVER['HTTP_REFERER'] ?>";
    $(document).ready(function() {
        $.ajax({
            url: `${base_url}/app_auth`,
            dataType: 'json',
            method: 'POST',
            data: {
                token: "<?= $token ?>"
            },
            success: res => {
                $('.err_msg').remove();
                if (res.status) {
                    location.href = res.redirect_url;
                } else {
                    $('.errors').empty(); // Clear existing errors
                    // Append new errors
                    $.each(res.error, function(key, msg) {
                        $('.errors').append(`<span class="text-danger">${msg}</span>`);
                    });
                    $('.back').html(`<a href="${back_url}" class="btn btn-danger mt-2">Go Back</a>`); // Add back button
                    $('.spinner-grow').hide();
                    $('.error-tray').show();
                }
            },
        });
    });
</script>