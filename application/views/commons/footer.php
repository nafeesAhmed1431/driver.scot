<div class="content-backdrop fade"></div>

</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<div class="modal fade" id="gm"></div>
<!-- / Layout wrapper -->
<script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>

<script>
    $(document).ajaxStart(function() {
        $('#ajax_loader').show();
    });
    $(document).ajaxComplete(function() {
        $('#ajax_loader').hide();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script src="<?= base_url('assets/js/dashboards-analytics.js') ?>"></script>
<script src="<?= base_url('assets/js/core.js') ?>"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>