<script>
    let cartCount = 0
    $(document).ready(function() {
        let objCha = {}
        let objCon = {}
        let cartCount = 0
        let cartCountObj = {}
        let slCart = 1
        let id = 0
        let cartFather = 0
        $('a.add-to-cart').click(function() {
                let img = $(this).closest('div.single-products').find('img').attr('src')
                let price = $(this).closest('div.single-products').find('div.productinfo h2').text()
                let name = $(this).closest('div.product-overlay').find('p').text()
                id = $(this).closest('div.single-products').attr('id')
                // let id2 = $(this).closest('div.overlay-content').attr('id')
                objCon = {
                    img: img,
                    price: price,
                    name: name,
                    qty: 1
                }

                objCha[id] = {
                    ...objCon
                }
                let temp = 0
                Object.keys(objCha).map((key, value) => {
                    temp += objCha[key]['qty']
                })
                cartCount = temp
                console.log(cartCount);
                $('div.shop-menu').find('ul.nav.navbar-nav li:eq(3) a').text(`Cart is ${cartCount}`)
                cartCountObj = JSON.stringify(cartCount)
                localStorage.setItem('demSLCart', cartCountObj)
                let getOBJJSON = localStorage.getItem('baitap')
                if (getOBJJSON) {
                    objCha = JSON.parse(getOBJJSON)

                    if (Object.keys(objCha).includes(id)) {
                        let count = objCha[id]['qty']
                        count++
                        objCha[id]['qty'] = count
                        cartFather = count
                        let temp = 0
                        Object.keys(objCha).map((key, value) => {
                            temp += objCha[key]['qty']
                        })
                        cartCount = temp
                        console.log(cartCount);
                        $('div.shop-menu').find('ul.nav.navbar-nav li:eq(3) a').text(`Cart is ${cartCount}`)
                        cartCountObj = JSON.stringify(cartCount)
                        localStorage.setItem('demSLCart', cartCountObj)
                    } else {
                        objCha[id] = {
                            ...objCon
                        }
                    }
                }
                let objToJson = JSON.stringify(objCha)
                localStorage.setItem('baitap', objToJson)
                console.log(objCha)
                console.log(id);
                console.log(objCha[id]['qty']);
            }

        );
        let getSLCart = localStorage.getItem('demSLCart')
        if (getSLCart) {
            slCart = JSON.parse(getSLCart)
            // let numberslCart = Number(slCart)
            $('div.shop-menu').find('ul.nav.navbar-nav li:eq(3) a').text(`Cart is ${slCart}`)
        }
        $.ajax({
            type: "GET",
            url: "/cart",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                qty: cartFather
            },
            dataType: "dataType",
            success: function(response) {
                console.log('success');
            }
        });

    });
</script>
