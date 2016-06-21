<div id="payment-method-form" class="checkout-forms">
    <div class="step__sections">
        <div class="section section--payment-method" data-payment-method="">
            <div class="section__header">
                <h2 class="section__title">Payment method</h2>
                <p class="section__text">
                    All transactions are secure and encrypted. Credit card information is never stored.
                </p>
            </div>

            <div class="section__content">
                <div data-payment-subform="required" class="radio-field--required">
                    <div class="content-box">
                        <div class="radio-wrapper content-box__row bml_payment_gw" data-gateway-group="direct" data-select-gateway="bml">
                            <div class="radio__input">
                                <input class="input-radio" type="radio" value="BML" name="checkout[payment_gateway]">
                            </div>

                            <label class="radio__label content-box__emphasis " for="checkout_payment_gateway_bml">
                                <div class="radio-wrapper">
                                    <div class="checkbox__label">
                                        BML
                                    </div>
                                    <div class="radio__accessory"></div>
                                </div>
                            </label>          
                        </div>

                        <div class="radio-wrapper content-box__row hidden" data-gateway-group="direct" data-select-gateway="paypal">
                            <div class="radio__input">
                                <input class="input-radio" type="radio" value="Paypal" name="checkout[payment_gateway]">
                            </div>

                            <label class="radio__label content-box__emphasis" for="checkout_payment_gateway_paypal">
                                <div class="radio-wrapper">
                                    <div class="checkbox__label">
                                        Paypal
                                    </div>
                                    <div class="radio__accessory"></div>
                                </div>
                            </label>          
                        </div>

                        <div class="radio-wrapper content-box__row cod_payment_gw" data-gateway-group="manual" data-select-gateway="cod">
                            <div class="radio__input">
                                <input class="input-radio" type="radio" value="COD" name="checkout[payment_gateway]">
                            </div>

                            <label class="radio__label content-box__emphasis " for="checkout_payment_gateway_cod">
                                <div class="radio-wrapper">
                                    <div class="checkbox__label">
                                        Cash on Delivery (COD)
                                    </div>
                                    <div class="radio__accessory"></div>
                                </div>
                            </label>          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            
            <div class="section__content">
                <div data-payment-subform="contact_information" class="field--required">
                    <div class="section__header">
                        <h2 class="section__title">Contact Information</h2>
                    </div>

                    <div class="fieldset">
                        <div class="field field--required">
                            <div class="field__input-wrapper">
                                <label class="field__label" for="name">Name</label>
                                <input placeholder="Name" class="field__input" size="30" type="text" name="checkout[note_attributes][name]" id="checkout_note_attributes_name" />
                            </div>
                        </div>
                        
                        <div class="field field--required">
                            <div class="field__input-wrapper">
                                <label class="field__label" for="contact-number">Contact Number</label>
                                <input placeholder="Contact Number" class="field__input" size="30" type="text" name="checkout[note_attributes][contact_number]" id="checkout_note_attributes_contact_number" />
                            </div>
                        </div>
                        
                        <div class="field field--required">
                            <div class="field__input-wrapper">
                                <label class="field__label" for="island-name">Island Name</label>
                                <input placeholder="Island Name" class="field__input" size="30" type="text" name="checkout[note_attributes][island_name]" id="checkout_note_attributes_island_name" />
                            </div>
                        </div>

			<input placeholder="delivery" class="field__input" size="30" type="hidden" name="checkout[note_attributes][delivery to]" id="checkout_note_attributes_delivery_name" />
                        
                        <div class="field field--required">
                            <div class="field__input-wrapper">
                                <label class="field__label" for="house-name">House Name</label>
                                <input placeholder="House Name" class="field__input" size="30" type="text" name="checkout[note_attributes][house_name]" id="checkout_note_attributes_house_name" />
                            </div>
                        </div>
			
			
                                <input placeholder="note" class="field__input" size="30" type="hidden" name="checkout[note_attributes][note]" id="checkout_note_attributes_note_name" />
                           
                        
                        <div class="field field--required">
                            <div class="field__input-wrapper">
                                <label class="field__label" for="road-name">Road Name</label>
                                <input placeholder="Road Name" class="field__input" size="30" type="text" name="checkout[note_attributes][road_name]" id="checkout_note_attributes_road_name" />
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="section section--optional">
            <div class="section__content">
                <div class="checkbox-wrapper">
                    <div class="checkbox__input">
                        <input class="input-checkbox" data-backup="buyer_accepts_marketing" type="checkbox" value="1" name="checkout[buyer_accepts_marketing]" id="checkout_buyer_accepts_marketing">
                       
                    </div>
                    <label class="checkbox__label" for="checkout_buyer_accepts_marketing">
                        Subscribe to our newsletter
                    </label>            
                </div>
            </div>
        </div>
    </div>

    <div class="step__footer">
        <input type="hidden" name="complete" value="1">
        <button name="button" type="submit" class="btn complete-order-btn" data-parent_form="payment-method-form">
            <span class="btn__content">Complete order</span>
            <i class="btn__spinner icon icon--button-spinner"></i>
        </button>

        <a class="step__footer__previous-link" href="#?step=shipping-method" data-previous_form="shipping-method-form">
            <svg class="previous-link__icon icon--chevron icon" xmlns="http://www.w3.org/2000/svg" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
            <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
            </svg>
            Return to shipping method
        </a>
    </div>
</div>
