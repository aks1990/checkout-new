<div id="customer-information-form" class="checkout-forms active">
    <div class="step__sections active-form">
        <div class="section section--contact-information">
            <div class="section__header">
                <h2 class="section__title">Customer information</h2>
            </div>

            <div class="section__content">
                <div class="field field--required">
                    <div class="field__input-wrapper">
                        <label class="field__label" for="checkout_shipping_address_email">Email address</label>
                        <input placeholder="Email address" autocomplete="shipping email-address" data-backup="email" class="field__input" size="30" type="text" name="checkout[email]" id="checkout_email_address" value="{{ customer.email }}" />
                    </div>
                </div>
            </div> 
        </div> 

        <div class="section section--shipping-address" data-shipping-address="" data-update-order-summary="">
            <div class="section__header">
                <h2 class="section__title">
                    Shipping address
                </h2>
            </div>

            <div class="section__content">
                <div class="fieldset">
                    <div class="field--half field field--required">
                        <div class="field__input-wrapper">
                            <label class="field__label" for="checkout_shipping_address_first_name">First name</label>
                            <input placeholder="First name" autocomplete="shipping given-name" data-backup="first_name" class="field__input" size="30" type="text" name="checkout[shipping_address][first_name]" id="checkout_shipping_address_first_name" />
                        </div>
                    </div>

                    <div class="field--half field field--required">
                        <div class="field__input-wrapper">
                            <label class="field__label" for="checkout_shipping_address_last_name">Last name</label>
                            <input placeholder="Last name" autocomplete="shipping family-name" data-backup="last_name" class="field__input" size="30" type="text" name="checkout[shipping_address][last_name]" id="checkout_shipping_address_last_name" />
                        </div>
                    </div>

                    

                    <div class="field--two-thirds field field--required">
                        <div class="field__input-wrapper">
                            <label class="field__label" for="checkout_shipping_address_address1">Address</label>
                            <input placeholder="Address" autocomplete="shipping address-line1" data-backup="address1" data-google-places-input="true" class="field__input" size="30" type="text" name="checkout[shipping_address][address1]" id="checkout_shipping_address_address1">
                        </div>
                    </div>


                    <div class="field field--required">
                        <div class="field__input-wrapper">
                            <label class="field__label" for="checkout_shipping_address_city">City</label>
                            <input placeholder="City" autocomplete="shipping address-level2" data-backup="city" class="field__input" size="30" type="text" name="checkout[shipping_address][city]" id="checkout_shipping_address_city" />
                        </div>
                    </div>

                    <div data-country-section="1" class="field field--required field--three-eights field--show-floating-label">
                        <div class="field__input-wrapper field__input-wrapper--select">
                            <label class="field__label" for="checkout_shipping_address_country">Country</label>
                            <select size="1" autocomplete="shipping country" data-backup="country" class="field__input field__input--select" name="checkout[shipping_address][country]" id="checkout_shipping_address_country">
                                <option data-code="MV" selected="selected" value="Maldives">Maldives</option>
                            </select>
                        </div>
                    </div>

                    <input class="visually-hidden" autocomplete="shipping address-level1" tabindex="-1" data-autocomplete-field="province" size="30" type="text" name="checkout[shipping_address][province]" />

                   
		    <div data-island-section="1" class="field field--required field--three-eights field--show-floating-label">
			    <div class="field__input-wrapper field__input-wrapper--select">
				<label class="field__label" for="checkout_shipping_address_island">Island</label>
				<select size="1"  data-backup="island" class="field__input field__input--select" name="checkout[shipping_address][island]" id="checkout_shipping_address_island">
				    <option selected="selected" data-delivery="Home / office" value="MALE">MALE</option>
				    <option data-delivery="Hulhumale Cargo Ferry" value="HULHUMALE">HULHUMALE</option>
				    <option data-delivery="Villingili Ferry" value="VILLINGLILI">VILLINGLILI</option>
				    <option data-delivery="other" value="other Island">other Island</option>
				</select>
				<span class="product__description__property order-summary__small-text island_delivery">
				    Delivery to:Home / office
				</span>
			    </div>
                    </div>

                    <div data-zip-section="1" class="field field--required field--quarter">
                        <div class="field__input-wrapper">
                            <label class="field__label" for="checkout_shipping_address_zip">Postal code</label>
                            <input placeholder="Postal code" autocomplete="shipping postal-code" data-backup="zip" class="field__input field__input--zip" size="30" type="text" name="checkout[shipping_address][zip]" id="checkout_shipping_address_zip" />
                        </div>
                    </div>

                    <div class="field field--required field--optional">
                        <div class="field__input-wrapper">
                            <label class="field__label" for="checkout_shipping_address_phone">Phone</label>
                            <input placeholder="Phone" autocomplete="shipping tel" data-backup="phone" class="field__input" size="30" type="tel" name="checkout[shipping_address][phone]" id="checkout_shipping_address_phone" />
                        </div>
                    </div>

		    <div class="remember_me_section">
			<div class="section__content">
			  <div class="checkbox-wrapper">
			    <div class="checkbox__input">
			      <input type="hidden" value="false" name="remember_me">
			      <input type="checkbox" data-backup="remember_me" class="input-checkbox" value="true" id="remember_me" name="remember_me">
			    </div>
			    <label for="remember_me" class="checkbox__label">
			      Save this information for next time
			    </label>          
			  </div>
			</div>
                   </div>
		  
		   <div id="checkout-addnote">
			<label for="note" style="display: block;"> Add Note:</label>
			<textarea id="note" class="field__input add_note_checkout" name="checkout[note]" placeholder="Maximum 140 characters" class="hide" style="display:block">{{ cart.note }}</textarea>
		   </div>
		 
                </div> 
            </div> 
        </div> 
    </div>

    <div class="step__footer">
        <button name="button" type="button" class="btn"id="btn1" data-parent_form="customer-information-form" onclick="window.location.href='#?step=shipping_method'">
            <span class="btn__content">Continue to shipping method</span>
            <i class="btn__spinner icon icon--button-spinner"></i>
        </button>
        <a class="step__footer__previous-link" href="/cart">
            <svg class="previous-link__icon icon--chevron icon" xmlns="http://www.w3.org/2000/svg" width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
            <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
            </svg>
            Return to cart
        </a>
    </div>
</div>
