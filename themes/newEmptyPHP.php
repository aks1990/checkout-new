<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>

  <!-- Basic page needs ================================================== -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  {% if settings.favicon_enable %}
  <link rel="shortcut icon" href="{{ 'favicon.png' | asset_url }}" type="image/png" />
  {% endif %}

  <!-- Title and description ================================================== -->
  <title>
  {{ page_title }}{% if current_tags %}{% assign meta_tags = current_tags | join: ', ' %} &ndash; {{ 'general.meta.tags' | t: tags: meta_tags }}{% endif %}{% if current_page != 1 %} &ndash; {{ 'general.meta.page' | t: page: current_page }}{% endif %}{% unless page_title contains shop.name %} &ndash; {{ shop.name }}{% endunless %}
  </title>

  {% if page_description %}
  <meta name="description" content="{{ page_description | escape }}">
  {% endif %}

  <!-- Helpers ================================================== -->
  <link rel="canonical" href="{{ canonical_url }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="{{ settings.color_primary }}">

  <!-- CSS ================================================== -->
  {{ 'timber.scss.css' | asset_url | stylesheet_tag }}
  {{ 'theme.scss.css' | asset_url | stylesheet_tag }}

  {% include 'google-fonts' %}

  <!-- Header hook for plugins ================================================== -->
  {{ content_for_header }}

  {% include 'oldIE-js' %}

  {{ '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' | script_tag }}
  {{ 'modernizr.min.js' | asset_url | script_tag }}

  {{ 'checkout_v2.js' | asset_url | script_tag }}
  {{ 'countries.js' | asset_url | script_tag }}
  {{ 'stylesheet.css' | asset_url | stylesheet_tag }}

</head>

<body id="{{ page_title | handle }}" class="{% if customer %}customer-logged-in {% endif %}template-{{ template | replace: '.', ' ' | truncatewords: 1, '' | handle }}" >

        <div class="banner" data-header="">
            <div class="wrap">
                <a href="http://meynard-test-app-store.myshopify.com/" class="logo logo--left">
                    <h1 class="logo__text">Asters</h1>
                    <img class="logo__image logo__image--medium" alt="maroko" src="https://cdn.shopify.com/s/files/1/1097/6538/t/2/assets/logo.png?3019147448537631128">
                </a>
            </div>
        </div>

        <button class="order-summary-toggle order-summary-toggle--show" data-drawer-toggle="[data-order-summary]">
            <div class="wrap">
                <div class="order-summary-toggle__inner">
                    <div class="order-summary-toggle__icon-wrapper">
                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
                            <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path>
                        </svg>
                    </div>
                    <div class="order-summary-toggle__text order-summary-toggle__text--show">
                        <span>Show order summary</span>
                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                    </div>
                    <div class="order-summary-toggle__text order-summary-toggle__text--hide">
                        <span>Hide order summary</span>
                        <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path></svg>
                    </div>
                    <div class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
                        <span class="total-recap__final-price" data-checkout-payment-due-target="213047">Rf2,130.47</span>
                    </div>
                </div>
            </div>
        </button>

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
                                        <tr class="product" data-product-id="3795086913" data-variant-id="11042470913" data-product-type="">
                                            
                                        </tr>
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
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="main" role="main">
                    <div class="main__header">
                        <a href="http://meynard-test-app-store.myshopify.com/" class="logo logo--left">
                            <h1 class="logo__text">Asters</h1>
                        </a>
                        <ul class="breadcrumb ">
                            <li class="breadcrumb__item breadcrumb__item--completed">
                                <a class="breadcrumb__link" href="http://meynard-test-app-store.myshopify.com/cart">Cart</a>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--current">
                                Customer information
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--blank">
                                Payment method
                            </li>
                        </ul>
                    </div>
                        {{ content_for_layout }}
                    <div class="main__footer" role="contentinfo">
                        <div class="modals"></div>
                        <p class="copyright-text">
                            All rights reserved Asters
                        </p>
                    </div>
                </div>
            </div>
        </div>

  {{ 'fastclick.min.js' | asset_url | script_tag }}
  {{ 'timber.js' | asset_url | script_tag }}
  {{ 'theme.js' | asset_url | script_tag }}


</body>
</html>