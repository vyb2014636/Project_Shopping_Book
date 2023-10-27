$(document).ready(function () {
  const convertPriceToNumber = (price) => {
    const result = price.replace(/\D/g, "");
    return Number(result);
  };

  const convertNumberToPrice = (number) => {
    return number.toLocaleString("vi", { style: "currency", currency: "VND" });
  };

  let cart = new Array();

  $(".add-to-cart").click(function (e) {
    $product = $(this).parent().parent().parent();
    $body_product = $product.children().children(".body-product");
    $name = $body_product.find("h5").text();
    $author = $body_product.children("div").find(".name-author").text();
    $price = $body_product.children("div").find("span").children().text();
    $img = $product.children().find("img").attr("src");
    $quantity = 1;
    $item_cart = new Array($img, $name, $author, $price, $quantity);
    cart.push($item_cart);
    console.log(
      $("#menu-cart-shopping").children("#menu-cart-shopping-items").children()
    );
    showcart();
    $items_quantity_cart = $("#menu-cart-shopping") //số lượng trong giỏ hàng
      .children("#menu-cart-shopping-items")
      .children()
      .children().length;
    $("#quantity-in-cart").text($items_quantity_cart);
  });
  let i = 0;
  function showcart() {
    $products_cart = $("#menu-cart-shopping")
      .children("#menu-cart-shopping-items")
      .children();
    let str = "";
    for (i; i < cart.length; i++) {
      str +=
        ' <div class="product card flex-row border-0 mb-3" style="height: 70px"> <img src="' +
        cart[i][0] +
        '" alt="..." style="width: 10%; padding-top: 16px; object-fit: cover"/> <div class="card-body container" style="width: 90%"> <div class="row align-items-center"><div class="card-text col-md-9 mb-0"> <p class="text-truncate mb-0">' +
        cart[i][1] +
        '</p><div class="d-flex align-items-center gap-1"><p class="fs-5 fw-bold mb-0" style="color: black">' +
        cart[i][3] +
        ' </p></div></div><div class="col-md-2 justify-content-end"><input type="number" min="1" value="1" style="width: 100%" /></div> <div class="col-md-1"><i class="fa-solid fa-xmark fa-xl"></i> </div></div></div> </div>';
    }
    $(str).appendTo($products_cart);
    $("#cart-page").append($products_cart);
  }
});
