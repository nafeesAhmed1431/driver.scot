<h5 class="card-header"><?= $table_title ?></h5>
<table class="table table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Phone
                <br> Email
            </th>
            <th>Price
                <br> Distance
            </th>
            <th>Type
                <br> Floor
            </th>
            <th>Volume
                <br> Persons
            </th>
            <th>
                Status
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($jobs)) : ?>
            <?php foreach ($jobs as $job) : ?>
                <tr>
                    <td>
                        <small> <a data-tracking-id="<?= $job->trackingID ?>" class="orderDetails" href="javascript:void(0);"> <?= $job->trackingID ?? 0 ?></a></small>
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
                    <td>
                        <small>
                            <span class="badge bg-label-<?= $job->status == 0 ? "warning" : ($job->status == 1 ? "success" : "danger") ?>">
                                <?= $job->status == 0 ? "Pending" : ($job->status == 1 ? "Completed" : "Canceled") ?>
                            </span>
                        </small>
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