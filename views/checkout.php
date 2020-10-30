<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
        <h3 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Order summary</span>
            <span class="badge badge-secondary badge-pill"><?=$totalQuantity?></span>
        </h3>
        <ul class="list-group mb-3">
            <?php foreach($products as $product):?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="img-fluid" src="../public/images/watches/<?=$product["url"]?>.jpg">
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <span class="my-0"><?=$product["name"]?></span>
                            <span class="text-muted">(<?=$product["product-quantity"]?>)</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span class="text-muted"><?=$product["price"]?> €</span>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (EUR)</span>
                <span class="font-weight-bold"><span><?=$totalPrice?></span> €</span>
            </li>
        </ul>
    </div>

        <div class="col-md-8 order-md-1">
            <h3 class="mb-3">Billing address</h3>
            <form method="POST" action="success">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="billing-address">First name</label>
                        <input type="text" class="form-control" name="first-name" id="billing-address" placeholder="" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last-name">Last name</label>
                    <input type="text" class="form-control" name="last-name" id="last-name" placeholder="" value="" required>
                </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" required>
                    <div class="invalid-feedback">
                        Please enter your Country.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="postal-code">Postal Code</label>
                    <input type="text" class="form-control" name="postal-code" id="postal-code" required>
                    <div class="invalid-feedback">
                        Please enter your Postal Code.
                    </div>
                </div>

                <h3 class="mb-3">Payment</h3>

                <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="payment" value="credit" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="payment" value="debit" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" name="payment" value="paypal" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
                </div>
                <button type="submit" name="submit" class="button-primary btn-lg btn-block mt-5 mb-5">Place order</button>
            </form>
        </div>
    </div>
</div>