<h5 class="card-header"><?= $table_title ?></h5>
<table class="table table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Phone <hr> Email</th>
            <th>Price <hr> Distance </th>
            <th>Type<hr> Floor</th>
            <th>Volume <hr> Persons</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($jobs)) : ?>
            <?php foreach ($jobs as $job) : ?>
                <tr>
                    <td>
                        <small> <a href="<?= base_url("order_details/$job->id") ?>"> <?= $job->trackingID ?? 0 ?></a></small>
                    </td>
                    <td>
                        <small><?= $job->booking_phone ?><br><?= $job->bookig_email ?></small>
                    </td>
                    <td>
                        <small><?= intval($job->order_price) ?>$<br><?= $job->km ?> km</small>
                    </td>
                    <td>
                        <small><?= $job->order_type ?><br><?= $job->slug ?></small>
                    </td>
                    <td>
                        <small><?= $job->product_volume ?> cm<sup>3</sup><br><?= $job->persons ?> Persons</small>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td class="text-center" colspan="5"><span class="text-info">No Jobs Found!!!</span></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>