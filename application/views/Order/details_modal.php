<div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title" id="modalFullTitle">Order Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-sm-10 mt-3">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">Customer</h4>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td><?= $order->booking_first_last_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?= $order->bookig_email ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><?= $order->booking_phone ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-10 mt-3">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-warning"><i class="bx bxs-calendar"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">Date</h4>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order date :</td>
                                        <td><?= $order->created_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pickup date :</td>
                                        <td><?= $order->order_date ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pickup Time :</td>
                                        <td><?= $order->strt_time ?></td>
                                    </tr>
                                    <tr>
                                        <td>Drop Time :</td>
                                        <td><?= $order->end_time ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-10 mt-3">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-info"><i class="bx bxs-truck"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">Location</h4>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Pickup address</td>
                                        <td><?= $order->pickup_address ?></td>
                                    </tr>
                                    <tr>
                                        <td>Drop address</td>
                                        <td><?= $order->delivery_address ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pickup PostalCode</td>
                                        <td><?= $order->pickup_postal ?></td>
                                    </tr>
                                    <tr>
                                        <td>Drop PostalCode</td>
                                        <td><?= $order->delivery_postal ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-10 mt-3">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-danger"><i class="bx bxs-info-square"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">Details</h4>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Persons</td>
                                        <td><?= $order->persons ?> Persons</td>
                                    </tr>
                                    <tr>
                                        <td>Volume meter</td>
                                        <td><?= $order->product_volume ?> cm<sup>3</sup></td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td> <span class="badge bg-info"><?= ucwords(str_replace("_", " ", $order->order_type)) ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Floor</td>
                                        <td> <?= ucwords(str_replace("_to_", " -> ", $order->slug)) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Order Price</h5>
                            <div class="card-subtitle text-muted mb-3"></div>
                            <p class="card-text"></p>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Status</td>
                                            <td><span class="badge bg-<?= $order->status == 0 ? "warning" : ($order->status == 1 ? "success" : "danger") ?>"><?= $order->status == 0 ? "Pending" : ($order->status == 1 ? "Completed" : "Canceled") ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td>$<?= intval($order->order_price) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Distance</td>
                                            <td><?= $order->km ?> KM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Order Products</h5>
                            <?php $products = json_decode($order->products_list);  ?>
                            <!-- <div class="card-subtitle text-muted mb-3">Total Products : <= count($products) ?></div> -->
                            <p class="card-text"></p>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>Product</th>
                                        <th></th>
                                        <th class="text-center">Quantity</th>
                                    </thead>
                                    <tbody>
                                        <?php $total_products = 0; ?>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td><?= $product->name ?></td>
                                                <td>x</td>
                                                <td class="text-center"><?= $product->quantity ?></td>
                                            </tr>
                                            <?php $total_products += (int)$product->quantity ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>Total Products</b></td>
                                            <td></td>
                                            <td class="text-center"> <b><?= $total_products ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Special Instructions</h5>
                            <div class="card-subtitle text-muted mb-3">Orders Special instructions are as follows.</div>
                            <p class="card-text">
                                <?= $order->delivery_instructions ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>