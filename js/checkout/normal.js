app.controller('CheckoutController', ['$scope', '$http', function($scope, $http) {
	$scope.swiper = {};
	$scope.cities = $scope.districts = $scope.products = $scope.voucher = [];
	$scope.city = cookieCity;
    $scope.district = cookieDistrict;
	$scope.extras = extras;

	$http.get('/api/area').success(function(response) {
        $scope.cities = response.cities;
        $scope.districts = response.districts;
    });

	$http.get('/cart').success(function(response) {
		$scope.products = response.data;
		if(typeof(response.voucher) != "undefined" && response.voucher !== null){
			$scope.voucher['price'] = response.voucher.price;
			$scope.voucher['voucher'] = response.voucher.voucher;
			if(typeof(response.voucher.price) != "undefined" && response.voucher.price !== null){
				$scope.voucher['text'] = '-'+response.voucher.price.toMoney()+' ('+response.voucher.voucher+')';
			}else{
				$scope.voucher['text'] = '';
			}
		}
	});


	$scope.increase = function(product) {
		product.qty++;
		$http.post('/cart/rowId'.replace('rowId', product.rowId), {qty: product.qty, _method: 'PUT'});
	};

	$scope.decrease = function(product) {
		if (product.qty > 1) {
			product.qty--;
			$http.post('/cart/rowId'.replace('rowId', product.rowId), {qty: product.qty, _method: 'PUT'});
		}
	};

	$scope.addvoucher = function() {
		$('#images_loading').show();
		var voucherInput = $('input[name="coupon"]').val();
		if(voucherInput.length<3){
			$('#images_loading').hide();
			// $("#modal-coupon .modal-body").html('required input');
			// $("#modal-coupon").modal('show');
			var lang = document.documentElement.lang;
			console.log(lang);
			if(lang == 'vi'){
				swal("Oops...",'Mã giảm giá phải từ 3 ký tự trở lên',"error");
			}else{
				swal("Oops...",'Coupon code must be 3 characters or more',"error");
			}
			
		}else{
			$http.post('/cart/voucher', {voucherInput: voucherInput, _method: 'POST'}).success(function(response){
				$scope.voucher['price'] = response.price;
				$scope.voucher['voucher'] = response.voucher;
				$scope.voucher['text'] = '';
				if(response.price != 0){
					$scope.voucher['text'] = '-'+response.price.toMoney()+' ('+response.voucher+')';
				}
				console.log(response);
				if(response.status == 'fail'){
					swal("Oops...",response.message,"error");
				}else{
					swal(response.message,response.message,"success");
				}
				$('#images_loading').hide();
				// $("#modal-coupon .modal-body").html(response.message);
				
				// $("#modal-coupon").modal('show');
				
			});
		}
		
		
	};

	$scope.delete = function(index, product) {
		$scope.products.splice(index, 1);
		$http.post('/cart/id'.replace('id', product.rowId), {_method: 'DELETE'});
		if (product.extra) {
			$('#extra-' + product.id).prop('checked', false);
			$('#extra-xs-' + product.id).prop('checked', false);
		}
	};

	$scope.total = function() {
		var count = 0, total = 0;
		angular.forEach($scope.products, function(value, key) {
			count += value.qty;
			total += value.price * value.qty;
		});
		// cons	ole.log($scope.voucher.price);
		if(typeof $scope.voucher.price !== "undefined"){
			total = total - $scope.voucher.price;
		}
		// console.log(total);
		return {
			count: count,
			money: total.toMoney()
		};
	};

	$scope.changeExtra = function($event, extra) {
		if ($event.target.checked) {
			$scope.products.push(extra);
			$scope.swiper.slideNext(true, 0);
		} else {
			var index = $scope.products.indexOf(extra);
			if (index !== -1) $scope.products.splice(index, 1);
		}
	};

}]);
 
