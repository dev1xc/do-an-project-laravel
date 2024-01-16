<script>
	$(document).ready(function () {
		$('a.cart_quantity_up').click(function () {
				let id = $(this).closest('tr').attr('id')
				let now = $('tr#' + id).find('input.cart_quantity_input').val()
				let tempCart = $('tr#' + id).find('p.cart_total_price').text()
				let countItem = $('div.shop-menu').find('li:eq(3)').find('a').text();

				tempCart = Number(tempCart) / Number(now)

				console.log(tempCart);
				countItem ++
				now++
				tempCart = tempCart * now
				// console.log(now);
				$('tr#' + id).find('input.cart_quantity_input').attr('value', now)
				$('tr#' + id).find('p.cart_total_price').text(tempCart)
				$('div.shop-menu').find('li:eq(3)').find('a').text(countItem)
				console.log(now);
				let loopTotal = 0
				$('p.cart_total_price').each(function (index) {
						loopTotal += Number($(this).text())
				})
					$('div.total_area').find('li:eq(3) span').text(loopTotal)

				$.ajax({
						method: "POST",
						url: "ajax-handle.php", //	k co html va chi chay ngầm
						data: {
							xx: id,
							yy:loopTotal,
						},
						success : function(res){
							// ket qua ben php tra ve lai
							console.log(res)
							// $("a")
						}
					});
					$.ajax({
						method: "POST",
						url: "ajax-handle-cart.php", //	k co html va chi chay ngầm
						data: {
							yy: countItem,
						},
						success : function(res){
							// ket qua ben php tra ve lai
							console.log(res)
							// $("a")
						}
					});

			});
			$('a.cart_quantity_down').click(function () {
				let id = $(this).closest('tr').attr('id')
				let now = $('tr#' + id).find('input.cart_quantity_input').val()
				let tempCart = $('tr#' + id).find('p.cart_total_price').text()
				let countItem = $('div.shop-menu').find('li:eq(3)').find('a').text();
				tempCart = Number(tempCart) / Number(now)
				countItem --
				now--
				tempCart =tempCart * now
				// console.log(now);
				$('tr#' + id).find('input.cart_quantity_input').attr('value', now)
				$('tr#' + id).find('p.cart_total_price').text(tempCart)
				$('div.shop-menu').find('li:eq(3)').find('a').text(countItem)
				console.log(now);
				let loopTotal = 0
				if(now < 1) {
					$('tr#' + id).remove();
				}
				$('p.cart_total_price').each(function (index) {
						loopTotal += Number($(this).text())
				})
					$('div.total_area').find('li:eq(3) span').text(loopTotal)

				$.ajax({
						method: "POST",
						url: "ajax-handle-minus.php", //	k co html va chi chay ngầm
						data: {
							xx: id,
							yy: loopTotal,
						},
						success : function(res){
							// ket qua ben php tra ve lai
							console.log(res)
							// $("a")
						}
					});
					$.ajax({
						method: "POST",
						url: "ajax-handle-cart.php", //	k co html va chi chay ngầm
						data: {
							yy: countItem,
						},
						success : function(res){
							// ket qua ben php tra ve lai
							console.log(res)
							// $("a")
						}
					});
			})
			$('a.cart_quantity_delete').click(function () {
				let id = $(this).closest('tr').attr('id')
				let now = $('tr#' + id).find('input.cart_quantity_input').val()
				let countItem = $('div.shop-menu').find('li:eq(3)').find('a').text();
				$('tr#' + id).remove();
				countItem = countItem - now
				let loopTotal = 0
				$('p.cart_total_price').each(function (index) {
						loopTotal += Number($(this).text())
				})
					$('div.total_area').find('li:eq(3) span').text(loopTotal)
					$('div.shop-menu').find('li:eq(3)').find('a').text(countItem)
				$.ajax({
						method: "POST",
						url: "ajax-handle-delete.php", //	k co html va chi chay ngầm
						data: {
							xx: id,
							yy: loopTotal,
						},
						success : function(res){
							// ket qua ben php tra ve lai
							console.log(res)
							// $("a")
						}
					});
					$.ajax({
						method: "POST",
						url: "ajax-handle-cart.php", //	k co html va chi chay ngầm
						data: {
							yy: countItem,
						},
						success : function(res){
							// ket qua ben php tra ve lai
							console.log(res)
							// $("a")
						}
					});
			 })
	});

</script>
