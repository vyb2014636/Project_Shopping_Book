$(document).ready(function () {
  const convertPriceToNumber = (price) => {
    const result = price.replace(/\D/g, "");
    return Number(result);
  };

  const convertNumberToPrice = (number) => {
    return number.toLocaleString("vi", { style: "currency", currency: "VND" });
  };

  // let cart = new Array();

  // $(".add-to-cart").click(function (e) {
  //   $product = $(this).parent().parent().parent();
  //   $body_product = $product.children().children(".body-product");
  //   $name = $body_product.children(".card-name").children().children().text();
  //   // $author = $body_product.children("div").find(".name-author").text();
  //   $price = $body_product.children(".card-price").find("span").text();
  //   $img = $product.children().find("img").attr("src");
  //   $quantity = 1;
  //   $idx = 0;
  //   for (let j = 0; j < cart.length; j++) {
  //     if (cart[j][1] === $name) {
  //       $quantity = cart[j][3] + 1;
  //       cart[j][3] = $quantity;
  //       $idx = 1;
  //       break;
  //     }
  //   }
  //   if ($idx == 0) {
  //     $item_cart = new Array($img, $name, $price, $quantity);
  //     cart.push($item_cart);
  //     showcart();
  //   }
  //   $items_quantity_cart = $("#menu-cart-shopping") //số lượng trong giỏ hàng
  //     .children("#menu-cart-shopping-items")
  //     .children()
  //     .children().length;
  //   $("#quantity-in-cart").text($items_quantity_cart);
  // });
  // let i = 0;
  // function showcart() {
  //   $products_cart = $("#menu-cart-shopping")
  //     .children("#menu-cart-shopping-items")
  //     .children();
  //   let str = "";
  //   for (i; i < cart.length; i++) {
  //     str +=
  //       ' <div class="product card flex-row border-0 mb-3" style="height: 70px;"> <img src="' +
  //       cart[i][0] +
  //       '" alt="..." style="width: 15%; padding-top: 16px; object-fit: contain"/> <div class="card-body container" style="width: 84%"> <div class="row align-items-center"><div class="card-text col-md-9 mb-0"> <p class="text-truncate mb-0">' +
  //       cart[i][1] +
  //       '</p><div class="d-flex align-items-center gap-1"><p class="fs-5 fw-bold mb-0" style="color: black">' +
  //       cart[i][2] +
  //       ' </p></div></div><div class="col-md-2 justify-content-end price-in-card-cart"><input type="number" min="1" value="' +
  //       cart[i][3] +
  //       '" style="width: 100%" /></div> <div class="col-md-1"><i class="fa-solid fa-xmark fa-xl"></i> </div></div></div> </div>';
  //   }

  //   $(str).appendTo($products_cart);
  //   $("#cart-page").append($products_cart);
  // }

  // Chọn tỉnh thành / huyện / xã
  var citis = document.getElementById("city");
  var districts = document.getElementById("district");
  var wards = document.getElementById("ward");
  var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
  };
  var promise = axios(Parameter);
  promise.then(function (result) {
    renderCity(result.data);
  });

  function renderCity(data) {
    for (const x of data) {
      citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function () {
      district.length = 1;
      ward.length = 1;
      if (this.value != "") {
        const result = data.filter((n) => n.Id === this.value);

        for (const k of result[0].Districts) {
          district.options[district.options.length] = new Option(k.Name, k.Id);
        }
      }
    };
    district.onchange = function () {
      ward.length = 1;
      const dataCity = data.filter((n) => n.Id === citis.value);
      if (this.value != "") {
        const dataWards = dataCity[0].Districts.filter(
          (n) => n.Id === this.value
        )[0].Wards;

        for (const w of dataWards) {
          wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }
      }
    };
  }
});
