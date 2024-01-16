<script>
    $(document).ready(function () {
        let obj = localStorage.getItem('baitap')
        let objCha = {}
        let objToJson = {}
        let html = ''
        let totalAll = 0
        let allTax = 0
        let allTotal = 0
        $('a.cart_quantity_up').click(function () {
            let id = $(this).closest('tr').attr('class')
            let now = $('tr.' + id).find('input.cart_quantity_input').val()
            now++
            // console.log(now);
            $('tr.' + id).find('input.cart_quantity_input').attr('value', now)

            let getSLCart = localStorage.getItem('demSLCart')
            if (getSLCart) {
                let slCart = JSON.parse(getSLCart)
                ++slCart
                // let numberslCart = Number(slCart)
                $('div.shop-menu').find('ul.nav.navbar-nav li:eq(3) a').text(`Cart is ${slCart}`)
                let cartCountObj = JSON.stringify(slCart)
                localStorage.setItem('demSLCart', cartCountObj)
            }
            if (Object.keys(objCha).includes(id)) {
                let count = objCha[id]['qty']
                count++
                objCha[id]['qty'] = count
                let total = 0
                let price = objCha[id]['price']
                total = price * count
                $(this).closest('tr.' + id).find('p.cart_total_price').text(total)

                let loopTotal = 0
                $('p.cart_total_price').each(function (index) {
                    loopTotal += Number($(this).text())
                })
                totalAll = loopTotal
                allTax = parseFloat((totalAll * 0.1).toFixed(2))
                console.log(totalAll);
                console.log(allTax);
                allTotal = parseFloat(totalAll + allTax)
                $('div.total_area').find('li:eq(0) span').text(totalAll)
                $('div.total_area').find('li:eq(1) span').text(allTax)
                $('div.total_area').find('li:eq(3) span').text(allTotal)

            } else {
                objCha[id] = { ...obj }
            }
            objToJson = JSON.stringify(objCha)
            localStorage.setItem('baitap', objToJson)
        })
        $('a.cart_quantity_down').click(function () {
            let id = $(this).closest('tr').attr('class')
            let now = $('tr.' + id).find('input.cart_quantity_input').val()
            now--
            $('tr.' + id).find('input.cart_quantity_input').attr('value', now)

            let getSLCart = localStorage.getItem('demSLCart')
            if (getSLCart) {
                let slCart = JSON.parse(getSLCart)
                --slCart
                // let numberslCart = Number(slCart)
                $('div.shop-menu').find('ul.nav.navbar-nav li:eq(3) a').text(`Cart is ${slCart}`)
                let cartCountObj = JSON.stringify(slCart)
                localStorage.setItem('demSLCart', cartCountObj)
            }
            if (Object.keys(objCha).includes(id)) {
                let count = objCha[id]['qty']
                count--
                objCha[id]['qty'] = count
                let total = 0
                let price = objCha[id]['price']
                total = price * count
                $(this).closest('tr.' + id).find('p.cart_total_price').text(total)
                let loopTotal = 0
                $('p.cart_total_price').each(function (index) {
                    loopTotal += Number($(this).text())
                })
                totalAll = loopTotal
                allTax = parseFloat((totalAll * 0.1).toFixed(2))
                console.log(totalAll);
                console.log(allTax);
                allTotal = parseFloat(totalAll + allTax)
                $('div.total_area').find('li:eq(0) span').text(totalAll)
                $('div.total_area').find('li:eq(1) span').text(allTax)
                $('div.total_area').find('li:eq(3) span').text(allTotal)
                if (count == 0) {
                    $('tr.' + id).remove()
                    delete objCha[id]
                }

            } else {
                objCha[id] = { ...obj }
            }
            objToJson = JSON.stringify(objCha)
            localStorage.setItem('baitap', objToJson)
        })
        $('a.cart_quantity_delete').click(function () {
            let id = $(this).closest('tr').attr('class')
            if (Object.keys(objCha).includes(id)) {
                delete objCha[id]
                objToJson = JSON.stringify(objCha)
                localStorage.setItem('baitap', objToJson)
            }
        })
        let getSLCart = localStorage.getItem('demSLCart')
        if (getSLCart) {
            let slCart = JSON.parse(getSLCart)
            // let numberslCart = Number(slCart)
            $('div.shop-menu').find('ul.nav.navbar-nav li:eq(3) a').text(`Cart is ${slCart}`)
        }
    });
</script>
