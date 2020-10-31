// Add the item to shopping cart
const cartUrl = document.location.origin + "/cart";
$("#add-to-cart-form").submit(function(e){
    e.preventDefault();
    const quantity = parseInt($("#form-product-quantity").val(),10);
    const maxQuantity = parseInt($("#form-product-quantity").attr("max"),10);
    if(quantity>maxQuantity) return false;
    $.ajax({
        url:cartUrl,
        type:"POST",
        data:{productData : $("#add-to-cart-form").serialize()},
        success:function() {
            const newValue =  parseInt($("#cart-quantity-icon").text(),10) + quantity;
            $("#cart-quantity-icon").text(newValue);
        },
        error:function(){
            alert("Please enter a valid product quantity.")
        }
    })
})


// Remove the item from shopping cart
$(".remove-item").click(function(e){
    e.preventDefault();
    const current = $(this).closest(".list-group-item");
    const id = current.attr("data-item-id");
    const oldQuantity = current.attr("data-item-quantity");
    const oldPrice = parseInt(current.attr("data-item-price"),10) * parseInt(oldQuantity,10);
    $.ajax({
        url:cartUrl,
        type:"POST",
        data:{removeItemId:id}, 
        success:function(){
             // Remove the element from HTML
             current.remove();
            // Update total price and quantity
            updateTotalPriceAndQuantity(oldQuantity,0,oldPrice,0)   
        }
    })
})

// Change the quantity of the item in shopping cart
    $(".item-quantity-cart").on("change paste keyup", function(e){
        e.preventDefault();
        const current = $(this).closest(".list-group-item");
        const oldQuantity= parseInt(current.attr("data-item-quantity"),10);
        let newQuantity = parseInt($(this).val(),10);
        const maxQuantity = parseInt($(this).attr("max"),10);
        // Check if the new quantity is not more than the maximum available
        if(newQuantity > maxQuantity) {
            $(this).val(maxQuantity);
            newQuantity = maxQuantity;
         }
        const id = current.attr("data-item-id");
        const oldPrice = parseInt(current.attr("data-item-price"),10) * parseInt(oldQuantity,10);
        const newPrice = parseInt(current.attr("data-item-price"),10) * parseInt(newQuantity,10);   
        $.ajax({
            url:cartUrl,
            type:"POST",
            data:{changeQuantityId:id, newQuantity:newQuantity, maxQuantity:maxQuantity}, 
            success:function(){
                // Update the item quantity
                current.attr("data-item-quantity",newQuantity);
                // Update total price and quantity
                updateTotalPriceAndQuantity(oldQuantity,newQuantity,oldPrice,newPrice) 
            }
        })
    })


    function updateTotalPriceAndQuantity(oldQuantity, newQuantity, oldPrice, newPrice){
        const newTotalQuantity =  parseInt($("#cart-quantity-icon").text(),10) - oldQuantity + newQuantity;
        const newTotalPrice = parseInt($("#total-price-cart").text(),10) - oldPrice + newPrice;
          // Update total quantity
          $("#cart-quantity-icon").text(newTotalQuantity);
          $("#total-quantity-cart").text(newTotalQuantity);
          // Update total price 
          $("#total-price-cart").text(newTotalPrice);
    }
