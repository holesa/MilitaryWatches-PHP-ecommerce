<div class="container">
      <div class="row">
          <div class="col-md col-xs-4">
              <img class="img-fluid" src="../public/images/watches/<?=$url?>.jpg">
          </div>
          <div class="col-md col-xs-4">
              <form method="POST" action="cart" id="add-to-cart-form">
                  <div class="product-title">
                      <h1 class="h2 mb-3"><?=$name?></h1>
                      <!-- Hidden fields -->
                      <input type="hidden" name="id" value="<?=$id?>">
                      <input type="hidden" name="name" value="<?=$name?>">
                      <input type="hidden" name="url" value="<?=$url?>">
                      <input type="hidden" name="max-quantity" value="<?=$quantity?>">
                      <input type="hidden" name="price" value="<?=$price?>">
                  </div>
                  <div class="product-price">
                      <h3 class="font-weight-light"><?=$price?> €</h3>
                  </div> 
                  <div class="product-avalibility">
                      <p><span class="font-weight-bold">Avalibility: </span><?=$avalibility?><span></h3>
                  </div> 
                  <div class="product-quantity">
                      <div class="form-group">
                          <label class="font-weight-bold" for="form-product-quantity">Quantity</label>
                          <input type="number" value="1" min="1" name="product-quantity" max=<?=$quantity?> id="form-product-quantity" class="form-control"/>
                      </div>
                  </div>
                  <div class="add-to-cart text-center">
                      <button type="submit" name="add-to-cart" class="button-primary">ADD TO CART</button>
                  </div>
              </form>       
          </div>
      </div>

      <div class="row mt-4">
          <div class="col">
              <div class="accordion" id="accordion-product">
                  <div class="card">
                    <div class="card-header bg-light" id="header-description">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-dark bg-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          DESCRIPTION
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="header-description" data-parent="#accordion-product">
                      <div class="card-body">
                          <p><?=nl2br($description)?></p>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header bg-light" id="header-specifications">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-dark bg-light" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          SPECIFICATIONS
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="header-specifications" data-parent="#accordion-product">
                      <div class="card-body">
                          <p><?=nl2br($specifications)?></p>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
      </div>   
</div>



