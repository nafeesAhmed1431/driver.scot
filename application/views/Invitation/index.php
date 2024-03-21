<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="main_content">
            <?= $html ?>
        </div>
    </div>
    <div class="content-backdrop fade"></div>
</div>
<script>
    function refresh_content() {
        $.get(<?= base_url('invitation_main_content') ?>).done(res => {
            $('.main_content').html(res);
        });
    }
</script>