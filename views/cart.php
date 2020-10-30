<?php if(empty($products)): ?>
    <h1>Your cart is empty</h1>
<?php else: ?>
    <h1 class="mb-4">SHOPPING CART</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-group">
                            <?php foreach($products as $index=>$product) :?>
                            <div class="list-group-item" data-item-id="<?=$product['itemId']?>" data-item-price="<?=$product['price']?>" data-item-quantity="<?=$product['product-quantity']?>">
                                <div class="row">
                                        <div class="col-lg-2">
                                            <img class="img-fluid" src="../public/images/watches/<?=$product["url"]?>.jpg">
                                        </div>
                                        <div class="col-lg-3">
                                            <?=$product["name"]?>
                                        </div>
                                        <div class="col-lg-2">
                                            <?=$product["price"]?> €
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="number" value="<?=$product['product-quantity']?>" max=<?=$product['max-quantity']?> min="1" name="product-quantity" class="form-control item-quantity-cart"/>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-danger remove-item">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                </div>          
                            </div>
                            <?php endforeach;?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-group">
                            <div class="list-group-item">
                                <span class="font-weight-bold">Total items: </span><span id="total-quantity-cart"><?=$totalQuantity?></span> 
                            </div>
                            <div class="list-group-item">
                                <span class="font-weight-bold">Total price: </span><span id="total-price-cart"><?=$totalPrice?></span> €
                            </div>
                            <?php if(!empty($products)): ?>
                            <div class="list-group-item">
                                <a href="/checkout" class="button-primary">PROCEED TO CHECKOUT</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

