$(document).ready(function(){
    var cartShopping = (function(){
        cart =[];
//        contructor
        function Item(name,price,count){
            this.name = name;
            this.price = price;
            this.count = count;
        }
        function saveCart(cart){
            sessionStorage.setItem('shoppingCart',cart);
        }
        function getCart(){
            sessionStorage.getItem('shoppingCart');
        }
        if(sessionStorage.getItem('shoppingCart') != null){
            getCart();
        }
        obj =[];
        //additem
        obj.addItem = function(name,price,count){
            for(var item in cart){
                if(cart[item].name==name){
                    cart[item].count ++;
                    saveCart();
                    return;
                }
            }
            var item = new Item(name,price,count);
            cart.push(item);
            saveCart();
        }
        //deleteitem
        obj.deleteItem = function(name){
            for(var item in cart){
                if(cart[item].name == name){
                    cart.splice(item,1);
                }
            }
//            console.log(cart);
            saveCart();
        }
        //countchange
        obj.countChange = function(name,count){
            for(var item in cart){
                if(cart[item].name == name){
                    cart[item].count = count;
                }
            }
            saveCart();
        }
        //total
        obj.total = function(){
            cartCopy=[];
            for(var i in cart){
                item=cart[i];
                itemCopy= {};
                for(var p in item){
                    itemCopy[p]=item[p];
                }
                itemCopy.total= Number(itemCopy.count * itemCopy.price)
//                console.log(itemCopy.name);
                cartCopy.push(itemCopy);
            }
            return cartCopy;
        }
        //
        return obj;
    })();
    $('.add-item').on('click',function(e){
        e.preventDefault();
        var name = $('option:selected').attr('data-tenmon');
        var price = Number($('option:selected').attr('data-giatien'));
        cartShopping.addItem(name,price,1);
        cartDisplay();
    });
    $('.show-cart').on('click','.delete-item',function(e){
        e.preventDefault();
        var name = $(this).data('tenmon');
//        console.log(name);
        cartShopping.deleteItem(name);
        cartDisplay();
    });
    $('.show-cart').on('change','.count-item',function(e){
        var name = $(this).data('tenmon');
        var count = $(this).val();
        console.log(name);
        cartShopping.countChange(name,count);
        cartDisplay();
    });
    $('.money-receive').on('change',function(){
        cartDisplay();
    })
    function cartDisplay(){
        var cartArr = cartShopping.total();
        var total = 0;
        var totalAll= 0;
        html ='';
        inputHtml ='';
        cartName = [];
        cartCount =[];
        for(i in cartArr){
            html+='<tr><th scope="row"></th><td>'+cartArr[i].name+'</td>' +
                '<td><input type="number" step="any" class="form-control count-item" name="shopping-number" data-tenmon="'+cartArr[i].name+'" value='+cartArr[i].count+'></td>' +
                '<td>'+cartArr[i].total+'</td>' +
                '<td><button data-tenmon="'+cartArr[i].name+'" data-giatien="'+cartArr[i].price+'" class="delete-item btn bg-danger text-light">X</button></td>' +
                '</tr>';
            total +=cartArr[i].total;
            cartName.push(cartArr[i].name);
            cartCount.push(cartArr[i].count);
        }
        inputHtml ='<input type="hidden" name="name_food" value="'+cartName+'">'+
            '<input type="hidden" name="count_food" value="'+cartCount+'">';
        $('.get-order').next().html(inputHtml);

        $('.show-cart').html(html);
        $('.total-price').html(Number(total));
        var moneyreceive = Number($('.money-receive').val());
        var tralai = total;
        $('.tralai').html(Number(moneyreceive-tralai));
        ;
        var getTotalPrice = $('.price-total-day').text();
        var arrNumberGetTotalPrice = getTotalPrice.split('đ');
        for (var n in arrNumberGetTotalPrice){
            totalAll += Number(arrNumberGetTotalPrice[n]);
        }
        $('.getTotalDay').html(totalAll);
    }
    cartDisplay();

});
