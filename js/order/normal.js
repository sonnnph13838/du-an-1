var swiperInstances = {},
    $orderBar = $('#order-bar');

var $currentAtts = [];

if ($.cookie('customerFirstCart') === null) $.cookie('customerFirstCart', 'true');

$('.swiper-container').each(function(index, element) {
    var self = $(this),
        swiper_id = self.attr('id').match(/\d+/)[0];
        swiper_col = self.attr('id').match(/\d$/)[0];

    swiperInstances[swiper_id] = new Swiper('#' + self.attr('id'), {
        spaceBetween: 0,
        speed: 600,
        //loop: true,
        observer: true,
        observeParents: true,
        nextButton: '.swiper-button-next-' + swiper_id + '-' + swiper_col,
        prevButton: '.swiper-button-prev-' + swiper_id + '-' + swiper_col
    });
});
var hd = $('.banner-menu'), hh = hd.outerHeight();
function headerSingle() {   
    if ($('.banner-menu img').length >0){ p = $('.banner-menu img').height(); }else{ p = 0; }
    if(hd.hasClass('fixe')){
        // var ah = $('<div class="afterHeader"> ');
        // hd.after(ah.height(hh));
        $(window).scroll(function() {
            if ($(window).scrollTop() > p) $('.sidebar-menu-left').addClass('sticky');
            else $('.sidebar-menu-left').removeClass('sticky');
        });
    }
}

$(window).on('load', function(event) {
    event.preventDefault();
    $orderBar.scrollToFixed({
        zIndex: 99,
        bottom: 0,
        limit: $orderBar.offset().top,
        dontSetWidth: true
    });
    if ($(window).width() > 1024) {
        // $('.sidebar-menu-left').scrollToFixed({
        //     zIndex: 3
        // });
        // $('.sidebar-menu-left').addClass('sticky');
        $('html,body').animate({
           scrollTop: $('.sidebar-menu-left').offset().top
        });
    }
    // clearTimeout(loadtimeout);
    // loadtimeout = setTimeout(function() {
    //     $('html,body').animate({
    //         scrollTop: $('.sidebar-menu-left').offset().top
    //     }, 600);
    // }, 100);
    headerSingle();
});

$(window).resize(function() {
    headerSingle();
});


app.controller('CartController', ['$scope', '$http', function($scope, $http) {
    $scope.products = [];

    $scope.getCart = function() {
        $http.get('/cart').success(function(response) {
            var old = $scope.products.length;
            $scope.products = response.data;
            if (old === 0 && $scope.products.length > old) {
                setTimeout(function() { $(window).trigger('resize'); }, 50);
            }
        });
    };

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

    $scope.delete = function(index, product) {
        $http.post('/cart/id'.replace('id', product.rowId), {_method: 'DELETE'});
        $scope.products.splice(index, 1);
        if ($scope.products.length === 0) {
            setTimeout(function() { $orderBar.trigger('resize'); }, 50);
        }
        /* Tag Manager */
        var products = [
            {
                id: product.id,
                quantity: product.qty,
                name: getLocaleText(product.title, $('html').attr('lang'))
            }
        ];
        angular.foreach(products.options, function(value) {
            products.push({
                id: value.id,
                price: value.price,
                quantity: value.qty,
                name: getLocaleText(value.title, $('html').attr('lang'))
            });
        });
        if (typeof dataLayer !== "undefined") {
            dataLayer.push({
                'event': 'removeFromCart',
                'ecommerce': {
                    'remove': {
                        'products': products
                    }
                }
            });
        }
    };

    $scope.total = function() {
        var count = 0, total = 0;
        angular.forEach($scope.products, function(value, key) {
            count += value.qty;
            total += value.price * value.qty;
        });
        return {
            count: count,
            money: total.toMoney()
        };
    };

    $scope.getCart();
}]);






$('.add-to-cart.single').click(function(event) {
    event.preventDefault();

    // Check time
    if(!checkTime("9:00:00", "20:30:00")){
        var lang = $('html').attr('lang');
        if (lang == 'en') {
            $("#modal-coupon .modal-body").html('Order time from 9AM to 8:30PM!');
        }else{
            $("#modal-coupon .modal-body").html('Thời gian đặt hàng từ 9h tới 20h30!');
        }
        $("#modal-coupon").modal('show');
        return false;
    }

    var self = $(this),
        $item = self.closest('.dish-item'),
        $target = $orderBar;

    if ($.cookie('customerFirstCart') === 'true') {
        angular.element($customerLogin[0]).scope().openTab(4);
        return;
    }

    if ($item.hasClass('dish-combo')) {
        $item.toggleClass('active');
        return;
    }

    var $imgtodrag = $item.children('.item-wrapper').children('.img-responsive');
    flyToCart($imgtodrag, $target);

    $.ajax({
        url: '/cart',
        type: 'POST',
        dataType: 'json',
        beforeSend: function() {
            self.attr('disabled', true);
        },
        data: {id: self.data('id')},
    })
    .done(function(data) {
        if (data.status === 'success') angular.element($orderBar[0]).scope().getCart();
    })
    .always(function() {
        self.attr('disabled', false);
    });

    /* Push Data Layer Tag Manager */
    if (typeof dataLayer !== "undefined") {
        dataLayer.push({
            'event': 'addToCart',
            'ecommerce': {
                'currencycode': 'VND',
                'add': {
                    'products': [
                        {
                            'name': self.data('name'),
                            'id': self.data('id'),
                            'price': self.data('price')
                        }
                    ]
                }
            }
        });
    }
});

$('.add-to-cart.combo').click(function(event) {
    event.preventDefault();

    // Check time
    if(!checkTime("9:00:00", "20:30:00")){
        var lang = $('html').attr('lang');
        if (lang == 'en') {
            $("#modal-coupon .modal-body").html('Order time from 9AM to 8:30PM!');
        }else{
            $("#modal-coupon .modal-body").html('Thời gian đặt hàng từ 9h tới 20h30!');
        }
        $("#modal-coupon").modal('show');
        return false;
    }

    var self = $(this),
        $item = self.closest('.dish-item'),
        $container = $item.children('.combo-container'),
        $container2 = $item.children('.combo-container.style-2'),

        $target = $orderBar,
        subproducts = [],
        ids = [];

    if ($.cookie('customerFirstCart') === 'true') {
        angular.element($customerLogin[0]).scope().openTab(4);
        return;
    }

    // TEST
    // $container.children('.side-group').not('.hidden').each(function(index, el) {
    //     var chosen_dish = $(el).children('.swiper-container').find('.swiper-slide-active');

    //     // Nếu đổi size
    //     if ($(el).find('input.change-size').length > 0 && $(el).find('input.change-size').is(':checked')) {
    //         ids.push(chosen_dish.data('child-id'));
    //         subproducts.push({
    //             id: chosen_dish.data('child-id'),
    //             name: chosen_dish.data('child-name'),
    //             price: chosen_dish.data('child-price')
    //         })
    //     } else {
    //         ids.push(chosen_dish.data('id'));
    //         subproducts.push({
    //             id: chosen_dish.data('id'),
    //             name: chosen_dish.data('name'),
    //             price: chosen_dish.data('price')
    //         })
    //     }
    // });

    //#2019
    $container2.find('.panel-group .panel').not('.hidden').each(function(index, el) {
        var chosen_dish = $(el).find('.extra-group').children('.item.active');

        // Nếu đổi size
        if ($(el).find('input.change-size').length > 0 && $(el).find('input.change-size').is(':checked')) {
            ids.push(chosen_dish.data('child-id'));
            console.log('doi size');
            // subproducts.push({
            //     id: chosen_dish.data('child-id'),
            //     code: chosen_dish.data('child-code'),
            //     name: chosen_dish.data('child-name'),
            //     price: chosen_dish.data('child-price')
            // })
            // # NEW
            subproducts.push({
                id: chosen_dish.data('child-id'),
                code: chosen_dish.find('input.change-size:checked').data('code'),
                name: chosen_dish.find('input.change-size:checked').data('name'),
                price: chosen_dish.find('input.change-size:checked').data('price')
            })
            // # END NEW
        } else {
            console.log('không doi size');
            ids.push(chosen_dish.data('id'));
            subproducts.push({
                id: chosen_dish.data('id'),
                name: chosen_dish.data('name'),
                price: chosen_dish.data('price')
            })
        }

    });

    // console.log(subproducts);

    var $imgtodrag = $item.children('.item-wrapper').children('.img-responsive');
    flyToCart($imgtodrag, $target);

    $.ajax({
        url: '/cart',
        type: 'POST',
        dataType: 'json',
        beforeSend: function() {
            self.attr('disabled', true);
        },
        data: {id: self.data('id'), ids: ids, subproducts},
    })
    .done(function(data) {
        if (data.status === 'success') {
            $container.parent('.dish-item').toggleClass('active');
            angular.element($orderBar[0]).scope().getCart();
        }
    })
    .always(function() {
        self.attr('disabled', false);
    });

    /* Push Data Layer Tag Manager */
    var main_dish = $('.add-to-cart.single[data-id="'+self.data('id')+'"]');
    var product = {
        'name': main_dish.data('name'),
        'id': main_dish.data('id'),
        'price': main_dish.data('price')
    };
    subproducts.push(product);
    if (typeof dataLayer !== "undefined") {
        dataLayer.push({
            'event': 'addToCart',
            'ecommerce': {
                'currencycode': 'VND',
                'add': {
                    'products': subproducts
                }
            }
        });
    }
});
// #TODO:
// $('.extra-group li').click(function(){

app.controller('MyController', ['$scope', '$http', function($scope, $http) {
    $scope.items = $currentAtts;

     $scope.addItem = function (item) {
        $scope.items.push(item);
        $scope.item = "";
    };
    $scope.removeItem = function (index) {
        $scope.items.splice(index, 1);
    };

}]);

function renderSelectItems($msgChosenDish){
    // .msgChosenDishes
    $msgChosenDish.html('');
    $.each($currentAtts, function(index, value){
        var html = "<div>";
        if(value['item']!= "" && value['item']['name']){
            html += value['item']['name'];
            if( value['size'] != undefined && value['size'] != ''){
                html += '<span class="upsize"> ( ' + value['size']["name"] + " )</span>";
            }
        }
        

        $msgChosenDish.append(html);

    });

}


function updateSelectedItems($this){
    $this.closest('.combo-container.style-2 .panel').each(function(){
        $group = $(this).data("group");

        $li = $(this).find('.list-thumb-left.extra-group li.active');
        var $confirm = $(this).closest('.panel-group').siblings('.confirm');
        var $msgChosenDish = $confirm.find('.msgChosenDishes');

        var $index = $currentAtts.findIndex(x => x.group === $group);

        if($li.length > 0){
            $checkbox = $li.find('input.change-size:checked');

            if($checkbox.length > 0){
                 var wrapper = $this.closest('.change-size-wrapper');
                 if($(wrapper).data('name')!= undefined){
                    $msgChosenDish.find('.upsize').remove();

                    if($index >=0 ){
                         var attr = {};
                        attr["name"] =  $(wrapper).data('name').trim();
                        attr["parent"] =  $li.data('id');
                        attr["code"] =  $(wrapper).data('code');
                        $currentAtts[$index]["size"] = attr;
                    }

                   
                 }
                
            }
            else{
                //khi uncheck upsize
                if($this.hasClass('change-size')){
                    //remove thang upsize thoi
                    // var $index = $currentAtts.findIndex(x => x.group === $group);

                    $currentAtts[$index]["size"] = "";

                }
                else{
                    var attr = {};
                    attr["name"] =  $this.text().trim();
                    attr["id"] =  $li.data('id');

                    // var $index = $currentAtts.findIndex(x => x.group === $group);
                    if($index >= 0 ){
                        $currentAtts[$index]["item"] = attr;
                        $currentAtts[$index]["size"] = "";
                    }
                    else{
                        $groupItem = {};
                        $groupItem["group"] = $group;
                        $groupItem["item"] = [];


                        $groupItem["item"]= attr;
                        $currentAtts.push($groupItem);
                    }
                }
            }
        }
        else{
            $currentAtts[$index]["item"] = "";
            $currentAtts[$index]["size"] = "";
        }

        renderSelectItems($msgChosenDish);
    });
}



$( document ).ready(function() {

    $('.extra-group .combo-title').on('click',function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        e.stopPropagation();

        var $this = $(this);
        var $parent = $this.parent('li');
        var $confirm = $parent.closest('.panel-group').siblings('.confirm');

        // Click lần 2
        if($parent.hasClass('active')){
            $parent.removeClass('active');

        }else{

            // bỏ click cũ
            var listLi = $(this).closest('.list-thumb-left').children('li');
            listLi.each(function(){
                $(this).removeClass('active');
                var attributes = $(this).find('.attributes');
                attributes.children('p').each(function(){
                    $(this).find('input').prop("checked", false);
                });
            });
            // add active vào click
            $parent.addClass('active');

        }

        // tính tiền
        // Giá gốc 
        var basePrice = $confirm.find('input[name="comboPrice"]').val();
        // console.log('gia goc: '+basePrice);
        var panelGroup = $this.closest('.panel-group');
        panelGroup.children('div').each(function(){
            var extraGroup = $(this).find('.extra-group');
            var groupActive = extraGroup.children('li.active')
            var groupPrice = groupActive.data('price');
            var priceAttribute;

            if(typeof groupPrice === 'undefined'){
                groupPrice = 0;

            }
            // Kiểm tra có chọn con trong group
            var attributes = groupActive.find('.change-options');
            attributes.children('p.attribute').each(function(){
                var checkbox = $(this).find('input');
                if(checkbox.prop("checked") == true){
                    priceAttribute = $(this).data('price');
                    return false;
                    // return $(this).data('price');
                    // return ;
                    // console.log('Combo: '+ groupPrice)
                    // return comboPrice;
                }

            });
            // console.log(comboPrice);

            if (typeof priceAttribute  !== "undefined"){
                groupPrice = priceAttribute;
            }
            // if (typeof groupPrice  === "undefined"){
            //     groupPrice = 0;
            // }
            console.log('cong them: '+groupPrice);
            basePrice = parseInt(basePrice) + parseInt(groupPrice);

        });


        $confirm.find('.combo-price').html(basePrice.toMoney());
        updateSelectedItems($(this));

    });
});




$(document).on('change','.panel.panel-default  input.change-size', function(event) {
    var value = parseInt($(this).closest('p').text().replace(/\D/g, '')),
        $target = $(this).closest('.panel-group').siblings('.confirm').find('.combo-price'),
        targetValue = parseInt($target.text().replace(/\D/g, ''));

    //tim silblings
    var wrapper = $(this).closest('.change-size-wrapper');
    var checkboxSibling = wrapper.siblings('.change-size-wrapper').find('input.change-size');

    $(checkboxSibling).each(function(){
        var valuleSibling = parseInt($(this).closest('p').text().replace(/\D/g, ''));
        if($(this).is(':checked')) targetValue -= valuleSibling;
    });
    

    //price goc
    // var $comboPrice = $(this).closest('.panel-group').siblings('.confirm').find('input[name="comboPrice"]');
    // var comboPriceValue = parseInt($comboPrice.val());

    // if ($(this).is(':checked')) targetValue += value;
    // else {
    //     targetValue -= value;
    // }
    // $target.text(targetValue.toMoney());
    var panelGroup = $(this).closest('.panel-group');

    var $confirm = panelGroup.siblings('.confirm');
    var basePrice = $confirm.find('input[name="comboPrice"]').val();
    panelGroup.children('div').each(function(){
        var extraGroup = $(this).find('.extra-group');
        var groupActive = extraGroup.children('li.active');
        var groupPrice = groupActive.data('price');
        if(typeof groupPrice === 'undefined'){
            groupPrice = 0;

        }
        var priceAttribute;
        // Kiểm tra có chọn con trong group
        var attributes = groupActive.find('.change-options');
        attributes.children('p.attribute').each(function(){
            // console.log($(this).data('price'));
            var groupPrice = 0;
            var checkbox = $(this).find('input');
            if(checkbox.prop("checked") == true){
                priceAttribute = $(this).data('price');
                return false;
            }
        });
        if (typeof priceAttribute  !== "undefined"){
            groupPrice = priceAttribute;
        }
        // console.log('cong them: '+ groupPrice);
        basePrice = parseInt(basePrice) + parseInt(groupPrice);
    });
    $confirm.find('.combo-price').html(basePrice.toMoney());

    checkboxSibling.prop('checked', false);
    updateSelectedItems($(this));

});


$('.side-group input.change-size').change(function(event) {
    var value = parseInt($(this).closest('p').text().replace(/\D/g, '')),
        $target = $(this).closest('.side-group').siblings('.confirm').children('.combo-price'),
        targetValue = parseInt($target.text().replace(/\D/g, ''));

    if ($(this).is(':checked')) targetValue += value;
    else targetValue -= value;
    $target.text(targetValue.toMoney());


});

$('.side-group input.change-col').change(function(event) {
    var $col = $(this).closest('.side-group'),
        $changeSize = $col.find('input.change-size');

    if ($changeSize.is(':checked')) $changeSize.prop('checked', false).change();

    var value = parseInt($(this).closest('p').text().replace(/\D/g, '')),
        $target = $(this).closest('.side-group').siblings('.confirm').children('.combo-price'),
        targetValue = parseInt($target.text().replace(/\D/g, ''));


    targetValue = ($(this).is(':checked')) ? targetValue + value : targetValue - value;
    $col.toggleClass('hidden').next('.side-group').toggleClass('hidden');
    $target.text(targetValue.toMoney());

    /*if ($col.hasClass('col-1') || $col.hasClass('col-2'))
        $('.side-group.col-1, .side-group.col-2').toggleClass('hidden');
    else if ($col.hasClass('col-3') || $col.hasClass('col-4'))
        $('.side-group.col-3, .side-group.col-4').toggleClass('hidden');*/
});

$('.combo-close').click(function(event) {
    $(this).parent('.combo-container').parent('.dish-item').toggleClass('active');
});

$('.order-toggle').click(function(event) {
    $orderBar.slideUp('fast', function() {
        $orderBar.toggleClass('active')/*.trigger('resize')*/;
        $orderBar.slideDown(400);
    });
});


function checkTime(start_time, end_time) {
    var dt = new Date();

    //convert both time into timestamp
    var stt = new Date((dt.getMonth() + 1) + "/" + dt.getDate() + "/" + dt.getFullYear() + " " + start_time);

    stt = stt.getTime();
    var endt = new Date((dt.getMonth() + 1) + "/" + dt.getDate() + "/" + dt.getFullYear() + " " + end_time);
    endt = endt.getTime();

    var time = dt.getTime();

    if (time > stt && time < endt) {
        return true;

    } else {
        return false;

    }
}