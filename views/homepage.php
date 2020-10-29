<div class="row">
<?php
foreach($products as $product):?>
                    <div class="col-md-4">
                        <div class="card"> 
                            <a href="/product/<?=$product["url"]?>">
                                <img class="img-fluid" src="public/images/watches/<?=$product["url"]?>.jpg">
                                <div class="card-body text-center">
                                        <div class="cart-title"><?=$product["name"]?></div> 
                                        <div class="cart-text font-weight-bold text-center"><?=$product["price"]?> €</div> 
                                </div>
                            </a>
                        </div>
                    </div>
<?php endforeach?>
<div>


