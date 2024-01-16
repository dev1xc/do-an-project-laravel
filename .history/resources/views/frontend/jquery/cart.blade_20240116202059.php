<script>
    $(document).ready(function () {
        let obj = localStorage.getItem('baitap')
        let objCha = {}
        let objToJson = {}
        let html = ''
        let totalAll = 0
        let allTax = 0
        let allTotal = 0
        if (obj) {

            objCha = JSON.parse(obj)
            Object.keys(objCha).map((key, index) => {

                html += "<tr class='" + key + "'>" +
                    "<td class='cart_product'>" +
                    "<a href=''>" + "<img src='" + objCha[key]['img'] + "' alt=''>" + "</a>" +
                    "</td>" +
                    "<td class='cart_description'>" +
                    "<h4>" + "<a href=''>" + objCha[key]['name'] + "</a>" + "</h4>" +
                    "</td>" +
                    "<td class='cart_price'>" +
                    "<p>" + objCha[key]['price'] + "</p>" +
                    "</td>" +
                    "<td class='cart_quantity'>" +
                    "<div class='cart_quantity_button'>" +
                    "<a class='cart_quantity_up'>" + "+" + "</a>" +
                    "<input class='cart_quantity_input' type='text' name='quantity' value='" + objCha[key]['qty'] + "' autocomplete='off' size='2'>" +
                    "<a class='cart_quantity_down' >" + "-" + "</a>" +
                    "</div>" +
                    "</td>" +
                    "<td class='cart_total'>" +
                    "<p class='cart_total_price'>" + (objCha[key]['price'] * objCha[key]['qty']) + "</p>" +
                    "</td>" +
                    "<td class='cart_delete'>" +
                    "<a class='cart_quantity_delete' href=''><i class='fa fa-times'></i></a>" +
                    "</td>" +
                    "</tr>"


            })
            $("table tbody").append(html)

            let loopTotal = 0
            $('p.cart_total_price').each(function (index) {
                loopTotal += Number($(this).text())
            })
            totalAll = loopTotal
            allTax = parseFloat((totalAll * 0.1).toFixed(2))
            console.log(totalAll);
            console.log(allTax);
            let allTotal = parseFloat(totalAll + allTax)
            $('div.total_area').find('li:eq(0) span').text(totalAll)
            $('div.total_area').find('li:eq(1) span').text(allTax)
            $('div.total_area').find('li:eq(3) span').text(allTotal)

        }
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
