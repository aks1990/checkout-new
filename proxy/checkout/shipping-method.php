<div id="shipping-method-form" class="checkout-forms">
    <div class="step__sections">
        <div class="section section--contact-information">
            <div class="section__header">
                <h2 class="section__title">Shipping address</h2>
            </div>
            <div class="section__content">
                <p>
                <div id="shipping-contact"></div>
                <div id="shipping-address"></div>
                <div id="shipping-city-zip"></div>
                <div id="shipping-country"></div>
                </p>
            </div> 
        </div> 

        <div class="section section--billing-address" data-billing-address="" data-update-order-summary="">
            <div class="section__header">
                <h2 class="section__title">
                    Shipping method
                </h2>
            </div>
            <div class="section__content">
                <div class="fieldset">
                    <div class="radio-wrapper content-box__row " data-gateway-group="manual" data-select-gateway="cod">
                        <div class="radio__input">
                            <input class="input-radio" type="radio" value="" id="checkout_shipping_method_name" name="checkout[shipping_method][name]" checked="" readonly="">
                            <input type="hidden" id="checkout_shipping_method_rate" name="checkout[shipping_method][price]" value="" />
                        </div>
                        <label class="radio__label content-box__emphasis " for="checkout_payment_gateway_cod">
                            <div class="radio-wrapper">
                                <div class="checkbox__label shipping-name">

                                </div>
                                <div class="radio__accessory shipping-rate">

                                </div>
                            </div>
                        </label>          
                    </div>
                </div> 
            </div> 
        </div> 
    </div>

    <div class="step__footer">
        <button name="button" type="button" class="btn" id="btn2" data-parent_form="shipping-method-form" onclick="window.location.href='#?step=payment_method'">
            <span class="btn__content">Continue to payment method</span>
            <i class="btn__spinner icon icon--button-spinner"></i>
        </button>
        <a class="step__footer__previous-link" href="#?step=customer_information" data-previous_form="customer-information-form">
            <svg class="previous-link__icon icon--chevron icon" xmlns="http://www.w3.org/2000/svg" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
            <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
            </svg>
            Return to customer information
        </a>
    </div>
</div>
