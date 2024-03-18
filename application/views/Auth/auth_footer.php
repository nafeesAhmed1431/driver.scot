<script>
    $(document).ajaxStart(function() {
        $('.ajax_loader').show();
        $("button[type='submit']").attr('disabled','disabled');
    });

    $(document).ajaxStop(function() {
        $('.ajax_loader').hide();
    });
</script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>