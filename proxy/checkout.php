<script language="javascript" src="http://128.199.211.213/proxy/checkout/checkout_v2.js"></script>
<script language="javascript" src="http://128.199.211.213/proxy/checkout/countries.js" ></script>
<link href="http://128.199.211.213/proxy/checkout/stylesheet.css" rel="stylesheet" type="text/css" />
<div class="content" data-content="">
    <div class="wrap">
        <div class="sidebar">
            <div class="sidebar__content">
                <div class="order-summary order-summary--is-collapsed" data-order-summary="">
                    <div class="order-summary__section order-summary__section--product-list">
                        <table class="product-table">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Description</span></th>
                                    <th scope="col"><span class="visually-hidden">Price</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                {% if cart.item_count > 0 %}
                                    {% for item in cart.items %}
                                    <tr class="product" data-product-id="{{ item.product_id }}" data-variant-id="{{ item.variant_id }}" data-product-type="">
                                        <td class="product__image">
                                            <div class="product__image__inner">
                                                <span class="product__quantity">
                                                    {{ item.quantity }}
                                                </span>
                                                <div class="product__image__wrapper">
                                                    <img src="{{ item | img_url: 'medium' }}" alt="{{ item.title | escape }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product__description">
                                            <span class="product__description__name order-summary__emphasis">
                                                {{ item.product.title }}
                                            </span>
                                            <span class="product__description__variant order-summary__small-text">
                                                {% unless item.variant.title contains 'Default' %}
                                                    {{ item.variant.title }}
                                                {% endunless %}
                                            </span>
                                        </td>
                                        <td class="product__price">
                                            <span class="order-summary__emphasis">{{ item.price | money }}</span>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                {% endif %}
                            </tbody>
                        </table>
                    </div>

                    <div class="order-summary__section order-summary__section--total-lines">
                        <table class="total-line-table">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Description</span></th>
                                    <th scope="col"><span class="visually-hidden">Price</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-line total-line--subtotal">
                                    <td class="total-line__name">Subtotal</td>
                                    <td class="total-line__price">
                                        <span class="order-subtotal" data-checkout-subtotal-price-target="213047">
                                            {{ cart.total_price | money }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="order-summary__section order-summary__section--total-lines">
                        <table class="total-line-table">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Description</span></th>
                                    <th scope="col"><span class="visually-hidden">Price</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-line total-line--tax">
                                    <td class="total-line__name">Tax</td>
                                    <td class="total-line__price">
                                        <span class="order-tax" data-checkout-tax-price-target="">
                                            
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="order-summary__section order-summary__section--total-lines shipping-subtotal hidden" data-order-summary-section="payment-lines">
                        <table class="total-line-table">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Description</span></th>
                                    <th scope="col"><span class="visually-hidden">Price</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-line total-line--subtotal">
                                    <td class="total-line__name">Shipping</td>
                                    <td class="total-line__price">
                                        <span class="order-shipping-due" data-checkout-shipping-price-target="">

                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="order-summary__section order-summary__section--total" data-order-summary-section="payment-due">
                        <table class="total-line-table">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Description</span></th>
                                    <th scope="col"><span class="visually-hidden">Price</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-line">
                                    <td class="total-line__name payment-due-label">
                                        Total
                                    </td>
                                    <td class="total-line__price payment-due">
                                        <span class="payment-due__currency">{{ shop.currency }}</span>
                                        <span class="payment-due__price" data-checkout-payment-due-target="213047">
                                            {{ cart.total_price | money }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>

        <div class="main" role="main">
            <div class="main__header">
                <a href="/" class="logo logo--left">
                    <h1 class="logo__text">Asters</h1>
                </a>
                <ul class="breadcrumb">
                    <li class="breadcrumb__item breadcrumb__item--completed">
                      <a class="breadcrumb__link" href="/cart">Cart</a>
   	
                    </li>
                    <li id="breadcrumb-customer-information" class="breadcrumb__item breadcrumb__item--current">
                       <!-- <a class="breadcrumb__link" href="#?step=customer-information">Customer information</a>-->
                  
                    </li>
                    <li id="breadcrumb-shipping-method" class="breadcrumb__item breadcrumb__item--blank">
                        <!--<a class="breadcrumb__link" href="#?step=shipping-method">Shipping method</a>-->
                    Shipping Method
                    </li>
                    <li id="breadcrumb-payment-method" class="breadcrumb__item breadcrumb__item--blank">
                       <!-- <a class="breadcrumb__link" href="#?step=payment-method">Payment method</a>-->
                    Payment Method
                    </li>
                </ul>
            </div>

            <div class="main__content">
                <div class="step" data-step="contact_information">

                    <form id="checkout-form" class="animate-floating-labels" method="post" action="" accept-charset="UTF-8" novalidate>
                        <input name="utf8" type="hidden" value="✓">
                        <input name="shop" type="hidden" value="{{ shop.permanent_domain }}">
                        <input id="total-amount" name="checkout[total_amount]" type="hidden" value="{{ cart.total_price | money_without_currency }}">
                        <input id="shipping-fee" name="checkout[shipping_fee]" type="hidden" value="" />
                        {% for item in cart.items %}
                        <input name="checkout[line_items][product_id][]" type="hidden" value="{{ item.product_id }}" />
                        <input name="checkout[line_items][product_title][{{ item.product_id }}]" type="hidden" value="{{ item.product.title }}" />
                        <input name="checkout[line_items][variant_id][{{ item.product_id }}]" type="hidden" value="{{ item.variant_id }}" />
                        <input name="checkout[line_items][variant_title][{{ item.product_id }}]" type="hidden" value="{{ item.variant.title }}" />
                        <input name="checkout[line_items][quantity][{{ item.product_id }}]" type="hidden" value="{{ item.quantity }}" />
                        <input name="checkout[line_items][price][{{ item.product_id }}]" type="hidden" value="{{ item.price | money_without_currency }}" />
			
                       
			 {% endfor %}
                        <?php include_once 'checkout/customer-information.php'; ?>

                        <?php include_once 'checkout/shipping-method.php'; ?>

                        <?php include_once 'checkout/payment-method.php'; ?>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .checkout-forms {
        display: none;
    }
    .checkout-forms.active {
        display: block;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {

$('#breadcrumb-customer-information').html('<a href="#?step=customer-information" class="breadcrumb__link">Customer Information</a>');
$("#btn1").click(function(){

$('#breadcrumb-shipping-method').html('<a href="#?step=shipping-method" class="breadcrumb__link">Shipping Method</a>');
})
$("#btn2").click(function(){

$('#breadcrumb-payment-method').html('<a href="#?step=payment-method" class="breadcrumb__link">Payment Method</a>');
})
$('#breadcrumb-customer-information').click(function(){
$('#breadcrumb-shipping-method').html('Shipping Method').removeClass('breadcrumb__item--current');
$('#breadcrumb-payment-method').html('Payment Method').removeClass('breadcrumb__item--current');
})
if (jQuery.cookie('email') && jQuery.cookie('name') && jQuery.cookie('lname') && jQuery.cookie('addr')  && jQuery.cookie('country') && jQuery.cookie('phone') && jQuery.cookie('remember') && jQuery.cookie('city') && jQuery.cookie('pincode') && jQuery.cookie('island') && jQuery.cookie('delivery')) {

var email=$.cookie('email');
var name=$.cookie('name')+" "+$.cookie('lname');
var fname=$.cookie('name');
var lname=$.cookie('lname');
var address=$.cookie('addr');
var country=$.cookie('country');
var phone=$.cookie('phone');
var remember=$.cookie('remember');
var cityZip = $.cookie('city')+" "+$.cookie('pincode');
var city = $.cookie('city');
var pincode = $.cookie('pincode');
var island=$.cookie('island');
var delivery=$.cookie('delivery');


var island_split = delivery.split(':');
$('#checkout_note_attributes_delivery_name').val(island_split[1]);
$('.island_delivery').text(delivery);

if(island!='MALE'){
 $('.cod_payment_gw').css('display','none');
}
else{
 $('.cod_payment_gw').css('display','block');
}

$('#checkout_email_address').val(email);
$('#checkout_shipping_address_first_name').val(fname);
$('#checkout_shipping_address_last_name').val(lname);
$('#checkout_shipping_address_address1').val(address);
$('#checkout_shipping_address_phone').val(phone);
$("#checkout_shipping_address_city").val(city);
$("#checkout_shipping_address_zip").val(pincode);
$('#checkout_shipping_address_island').val(island);
$('#remember_me').prop('checked', remember);
$('#shipping-contact').empty();
$("#shipping-contact").append(name);
$('#shipping-address').empty();
$("#shipping-address").append(address);
$('#shipping-country').empty();
$("#shipping-country").append(country);
$('#shipping-city-zip').empty();
$("#shipping-city-zip").append(cityZip);


}else{
var island_delivery_txt = $('.island_delivery').text();
var island_split = island_delivery_txt.split(':');
$('#checkout_note_attributes_delivery_name').val(island_split[1]);

}	
        var total_price = "{{ cart.total_price | money_without_currency }}";
        var actual_price_without_reg = total_price.replace(",", "");
        var tax = parseFloat(actual_price_without_reg) * 0.06;
       
        $('.order-tax').html('Rf'+tax.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        
        total_price = parseFloat(total_price.replace(',', '')) + parseFloat(tax);
        $('#total-amount').val(total_price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        $('.payment-due__price').html('Rf'+total_price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        
        $('.checkout-forms.active .field__input:first-child').focus();
        $('.btn').click(function() {
            //e.preventDefault();
            
            var error = 0;
            var form_container = $(this).data('parent_form');
            //console.log($('#'+form_container).find('.field--required .field__input').length);
            if (form_container === "payment-method-form") {
                if ($('.radio-field--required .input-radio:checked').length < 1) {
                    error++;
                    alert("Please select a payment method");
                    return false;
                }
                $('#'+form_container).find('.field--required .field__input').each(function() {
                    if ($.trim($(this).val()) === "") {
                        error++;
                        var message = $(this).siblings('label').html();
                        alert('Please enter your ' + message.toLowerCase());
                        $(this).focus();
                        return false;
                    }
                    //console.log($(this).attr('name') + ": " +$(this).val());
                });
            } else {
                $('#'+form_container).find('.field--required .field__input').each(function() {
                    if ($.trim($(this).val()) === "") {
                        error++;
                        var message = $(this).siblings('label').html();
                        alert('Please enter your ' + message.toLowerCase());
                        $(this).focus();
                        return false;
                    }
                    //console.log($(this).attr('name') + ": " +$(this).val());


if(document.getElementById('remember_me').checked==true){
if($(this).attr('name')=='checkout[email]' && 'checkout[shipping_address][first_name]' && 'checkout[shipping_address][last_name]' && 'checkout[shipping_address][address1]' && 'checkout[shipping_address][city]' && 'checkout[shipping_address][zip]' && 'checkout[shipping_address][country]' && 'checkout[shipping_address][phone]' && 'checkout[shipping_address][island]'){
 $.cookie("email",$("#checkout_email_address").val());
 $.cookie("name", $("#checkout_shipping_address_first_name").val());
 $.cookie("lname", $("#checkout_shipping_address_last_name").val());
 $.cookie("addr", $("#checkout_shipping_address_address1").val());
 $.cookie("country", $("#checkout_shipping_address_country").val());
 $.cookie("city", $("#checkout_shipping_address_city").val());
 $.cookie("pincode", $("#checkout_shipping_address_zip").val());
 $.cookie("island",$("#checkout_shipping_address_island").val());
 $.cookie("phone", $("#checkout_shipping_address_phone").val());
 $.cookie("remember",$('#remember_me').is(":checked"));
 



var name=$.cookie('name')+" "+$.cookie('lname');
var address=$.cookie('addr');
var phone=$.cookie('phone');
var country=$.cookie('country');
var city_zip=$.cookie('city')+" "+$.cookie('pincode');
var city = $.cookie('city');
var pincode = $.cookie('pincode');
var island=$.cookie('island');

if(island!='other'){
$.cookie("delivery", $('.island_delivery').text());
var island_delivery_txt = $('.island_delivery').text();
var island_split = island_delivery_txt.split(':');
$('#checkout_note_attributes_delivery_name').val(island_split[1]);
}else{
var deliver_other = $('.delivery_to_other').val();
$('#checkout_note_attributes_delivery_name').val(deliver_other);
$.cookie("delivery", deliver_other);
}

var delivery=$.cookie('delivery');



$('#checkout_note_attributes_name').val(name);
$('#checkout_note_attributes_contact_number').val(phone);
$("#checkout_shipping_address_city").val(city);
$("#checkout_shipping_address_zip").val(pincode);
$('#checkout_note_attributes_island_name').val(island);
$('#checkout_note_attributes_road_name').val(country);
$('#shipping-contact').empty();
$("#shipping-contact").append(name);
$('#shipping-address').empty();
$("#shipping-address").append(address);
$('#shipping-country').empty();
$("#shipping-country").append(country);
$('#shipping-city-zip').empty();
$("#shipping-city-zip").append(city_zip);

}
}
else {

if($(this).attr('name')=='checkout[shipping_address][first_name]' && 'checkout[shipping_address][last_name]' && 'checkout[shipping_address][address1]' && 'checkout[shipping_address][country]' && 'checkout[shipping_address][phone]'){
var name= $('#checkout_shipping_address_first_name').val();
var lname=$('#checkout_shipping_address_last_name').val();
var res = name.concat(" "+lname);
var addr=$('#checkout_shipping_address_address1').val();
var country=$('#checkout_shipping_address_country').val();
var phone=$('#checkout_shipping_address_phone').val();
var city = $("#checkout_shipping_address_city").val();
var pincode = $("#checkout_shipping_address_zip").val();
var cityZip = city.concat(" "+pincode);

$('#shipping-contact').empty();
$("#shipping-contact").append(res);
$('#shipping-address').empty();
$("#shipping-address").append(addr);
$('#shipping-country').empty();
$("#shipping-country").append(country);
$('#shipping-city-zip').empty();
$("#shipping-city-zip").append(cityZip);


}
}
                });
            }
            var add_note_val = $('.add_note_checkout').val();
            if(add_note_val){
              $('#checkout_note_attributes_note_name').val(add_note_val);
	    }
            if (error === 0) {
                if (form_container === 'customer-information-form') {
                    var total_amount = $('#total-amount').val().replace(',', '');
                    var shipping_destination = $('#checkout_shipping_address_city').val();
                    var url = 'http://128.199.211.213/shipping/?total_amount=' + total_amount + "&shipping_destination=" + shipping_destination;
                    $.ajax({
                        url : url,
                        dataType: "json",
                        success: function(response) {
                            if (response.rates) {
                                var shipping_rate = response.rates.total_price;
                                $('#checkout_shipping_method_name').val(response.rates.service_name);
                                $('#checkout_shipping_method_rate').val(shipping_rate);
                                $('.shipping-name').html(response.rates.service_name);
                                $('.shipping-rate').html('MVR ' + shipping_rate);
                                $('.shipping-subtotal').removeClass('hidden').css('display', 'block!important');
                                $('.order-shipping-due').html('Rf'+shipping_rate.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
                                $('.payment-due__price').html('Rf'+(parseFloat(total_amount) + parseFloat(shipping_rate)).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
                            }
                        }
                    });
                }

                var breadcrumb = '#breadcrumb-' + form_container.replace('-form', '');
                $(breadcrumb).removeClass('breadcrumb__item--current').addClass('breadcrumb__item--completed');
                $(breadcrumb + ' > a').attr('disabled', false);
                $(breadcrumb).next('.breadcrumb__item').removeClass('breadcrumb__item--blank').addClass('breadcrumb__item--current');
                $('#' + form_container).removeClass('active');
                $('#' + form_container).next('.checkout-forms').addClass('active');
            }
        });
        
        $('.step__footer__previous-link').click(function() {
            var previous_form = $(this).data('previous_form');
            $('.checkout-forms').removeClass('active');
            $('#' + previous_form).addClass('active');
        });
        
        $('.breadcrumb__item a').click(function(e) {
            if ($(this).hasClass('breadcrumb__item--current') || $(this).hasClass('breadcrumb__item--blank')) {
                e.preventDefault();
                return false;
            }
            
            var previous_form = $(this).attr('href').replace('#?step=', '') + '-form';
            $('.checkout-forms').removeClass('active');
            $('#' + previous_form).addClass('active');
        });
    });
	
    $(document).on('change', '#checkout_shipping_address_island', function() {
	var island_val = $('#checkout_shipping_address_island').val();
        var delivery_to = $('#checkout_shipping_address_island option:selected').data("delivery");
        
        if(delivery_to!='other'){
         $('.island_delivery').html('Delivery to:'+delivery_to);
	 $('#checkout_note_attributes_delivery_name').val(delivery_to);
	}
        else{
	$('.island_delivery').html('Delivery to any Jetty in Male:<input type="textbox" class="delivery_to_other">');
	}
	if(island_val!='MALE'){
	 $('.cod_payment_gw').css('display','none');
	}
	else{
	 $('.cod_payment_gw').css('display','block');
	}
    });
</script>

