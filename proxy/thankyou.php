<script language="javascript" src="https://bml-app.herokuapp.com/proxy/checkout/checkout_v2.js"></script>
<script language="javascript" src="https://bml-app.herokuapp.com/proxy/checkout/countries.js" ></script>
<link href="https://bml-app.herokuapp.com/proxy/checkout/stylesheet.css" rel="stylesheet" type="text/css" />
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

                    <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
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
                    
		    <input id="total-amount" name="checkout[total_amount]" type="hidden" value="{{ cart.total_price | money_without_currency }}">
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

                    <div class="order-summary__section order-summary__section--total-lines shipping-subtotal" data-order-summary-section="payment-lines">
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
                                            <span>Rf</span><?= number_format($order->order->shipping_lines[0]->price, 2) ?>
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
                <a href="http://asters-2.myshopify.com/" class="logo logo--left">
                    <h1 class="logo__text">Asters</h1>
                </a>
            </div>

            <div class="main__content">
                <div class="section">
                    <div class="section__header os-header">
                        <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#000" stroke-width="2" class="os-header__hanging-icon os-header__hanging-icon--animate checkmark">
                            <path class="checkmark__circle" d="M25 49c13.255 0 24-10.745 24-24S38.255 1 25 1 1 11.745 1 25s10.745 24 24 24z"></path>
                            <path class="checkmark__check" d="M15 24.51l7.307 7.308L35.125 19"></path>
                        </svg>

                        <div class="os-header__heading">
                            <span class="os-order-number">
                                Order <?= $order->order->name ?>
                            </span>
                            <h2 class="os-header__title">
                                Thank you <?= $order->order->shipping_address->first_name ?>!
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section__content">
                        <div class="content-box">
                            <div class="content-box__row">
                                <h2 class="os-step__title">Your order is confirmed</h2>
                                <p class="os-step__description">
                                    We've accepted your order, and we're getting it ready. A confirmation email has been sent to <span class="emphasis"><?= $order->order->email ?></span>. Come back to this page for updates on your order status.
                                </p>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="content-box__row content-box__row--no-border">
                                <h2>Customer information</h2>
                            </div>
                            <div class="content-box__row">
                                <div class="section__content">
                                    <div class="section__content__column section__content__column--half">
                                        <h3>Shipping address</h3>
                                        <p>
					    
                                            <?= $order->order->shipping_address->first_name . " " . $order->order->shipping_address->last_name ?><br>
                                            <?= implode(", ", array($order->order->shipping_address->address1, $order->order->shipping_address->address2)) ?><br>
                                            <?= implode(" ", array($order->order->shipping_address->zip, $order->order->shipping_address->city, ($order->order->shipping_address->country != 'Maldives' ? $order->order->shipping_address->province : ''))) ?> <br>
                                            <?= $order->order->shipping_address->country ?><br>
                                            <?= $order->order->shipping_address->phone ?>
                                        </p>
                                        <h3>Shipping method</h3>
                                        <p><?= $order->order->shipping_lines[0]->title ?></p>
                                    </div>
                                    <div class="section__content__column section__content__column--half">
                                        <h3>Billing address</h3>
                                        <p>
                                            <?php if (!empty($order->order->billing_address)) { ?>
                                                <?= $order->order->billing_address->first_name . " " . $order->order->billing_address->last_name ?><br>
                                                <?= implode(", ", array($order->order->billing_address->address1, $order->order->billing_address->address2)) ?><br>
                                                <?= implode(" ", array($order->order->billing_address->zip, $order->order->billing_address->city, ($order->order->billing_address->country != 'Maldives' ? $order->order->billing_address->province : ''))) ?> <br>
                                                <?= $order->order->billing_address->country ?><br>
                                                <?= $order->order->billing_address->phone ?>
                                            <?php } else { ?>
                                                <?= $order->order->customer->default_address->first_name . " " . $order->order->customer->default_address->last_name ?><br>
                                                <?= implode(", ", array($order->order->customer->default_address->address1, $order->order->customer->default_address->address2)) ?><br>
                                                <?= implode(" ", array($order->order->customer->default_address->zip, $order->order->customer->default_address->city, ($order->order->customer->default_address->country != 'Maldives' ? $order->order->customer->default_address->province : ''))) ?> <br>
                                                <?= $order->order->customer->default_address->country ?><br>
                                                <?= $order->order->customer->default_address->phone ?>
                                            <?php } ?>
                                        </p>
                                        <h3>Payment method</h3>
                                        <ul class="payment-method-list">
                                            <li class="payment-method-list__item">
                                                <i class="payment-method-list__item__icon payment-icon">
                                                    <span><?php echo $checkout['payment_gateway']; ?></span>
                                                </i>
                                                <span class="payment-method-list__item__amount emphasis"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="step__footer">
                <a href="/" class="step__footer__continue-btn btn">
                    <span class="btn__content">Continue shopping</span>
                    <i class="btn__spinner icon icon--button-spinner"></i>
                </a>
                <p class="step__footer__info">
                    <i class="icon icon--os-question"></i>
                    <span>
                        Need help? <a href="mailto:meetika@budgetbuilders.in">Contact us</a>
                    </span>
                </p>
            </div>

            <div class="main__footer" role="contentinfo">
                <p class="copyright-text">
                    All rights reserved Asters
                </p>
            </div>

            <script>
                $(document).ready(function() {
                    	var total_price = "{{ cart.total_price | money_without_currency }}";
			var actual_price_without_reg = total_price.replace(",", "");
			var tax = parseFloat(actual_price_without_reg) * 0.06;
	
			$('.order-tax').html('Rf'+tax.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
                    	$.post('/cart/clear.js');

			var total_amount = $('#total-amount').val().replace(',', '');
	            	var shipping_destination = $('#checkout_shipping_address_city').val();
	            	var url = 'http://128.199.211.213/shipping/?total_amount=' + total_amount + "&shipping_destination=" + shipping_destination;
		            $.ajax({
		                url : url,
		                dataType: "json",
		                success: function(response) {
		                    if (response.rates) {
		                        var shipping_rate = response.rates.total_price;
		                        $('.payment-due__price').html('Rf'+(parseFloat(total_amount) + parseFloat(shipping_rate) + tax).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
					
					$('.payment-method-list__item__amount').html('Rf'+(parseFloat(total_amount) + parseFloat(shipping_rate) + tax).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
		                    }
		                }
		            });
                });
            </script>
        </div>
    </div>
</div>
