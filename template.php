<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviews Float</title>
    <link rel="preconnect" href="https://lh3.googleusercontent.com" />
    <meta name="mcd_google_api_key" content="<?php echo carbon_get_theme_option( 'mcd_google_api_key' );?>">
    <meta name="mcd_minimum_star_rating" content="<?php echo carbon_get_theme_option( 'mcd_star_minimum' );?>">
    <meta name="mcd_google_place_id" content="<?php echo carbon_get_theme_option( 'mcd_google_place_id' );?>">
    <meta name="mcd_google_reviews_link" content="<?php echo carbon_get_theme_option( 'mcd_google_reviews_link' );?>">
    <style>
        .mobile .splide{
            display: none!important;
        }
        #reviews-opener{
            display: none!important;
        }
        .mobile #reviews-opener{
            display: block!important;
        }
    </style>
    <script type="module" crossorigin src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/index.a10b32ec.js"></script>
    <link rel="modulepreload" href="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/vendor.5e464d04.js">
    <link rel="stylesheet" href="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/index.719353de.css">
</head>
<body>
<div id="map"></div>
<div id="app">
    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list" id="reviews-container"></ul>
        </div>
    </div>
    <span class="relative bg-white rounded-full p-2 w-14 cursor-pointer ml-3" id="reviews-opener">
        <img
                class="block w-full h-full"
                src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/google-logo.27d4df7a.svg"
                alt=""
        />
        <div class="absolute top-0 left-0 flex" style="margin: 40px 0 0 -11px;">
          <img class="w-4 h-4" src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/star.b21b72eb.svg" alt="">
          <img class="w-4 h-4" src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/star.b21b72eb.svg" alt="">
          <img class="w-4 h-4" src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/star.b21b72eb.svg" alt="">
          <img class="w-4 h-4" src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/star.b21b72eb.svg" alt="">
          <img class="w-4 h-4" src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/star.b21b72eb.svg" alt="">
        </div>
      </span>
</div>
<template id="review-template">
    <li class="splide__slide">
        <a class="reviews-link bg-white overflow-hidden rounded-lg p-4 border-2 block" target="_blank">
            <div class="flex items-start h-full">
                <div class="flex-shrink-0">
                    <div class="inline-block relative">
                        <div class="relative w-16 h-16 rounded-full overflow-hidden">
                            <img
                                    class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover reviewer-photo"
                                    src="https://picsum.photos/id/646/200/200"
                                    alt="Profile picture"
                            />
                            <div
                                    class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"
                            ></div>
                        </div>
                        <img
                                class="bg-white rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1"
                                src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/dist/assets/google-logo.27d4df7a.svg"
                                alt=""
                        />
                    </div>
                </div>
                <div class="ml-6">
                    <p class="flex items-baseline">
                <span class="text-gray-600 font-bold reviewer-name"
                >Mary T.</span
                >
                        <span class="text-light text-gray-400"
                        >&nbsp;left a review</span
                        >
                    </p>
                    <div class="flex items-center mt-1 stars"></div>
                    <div class="mt-1">
                <span class="font-light review-time text-gray-400 italic"
                >Sapien consequat eleifend!</span
                >
                    </div>
                </div>
            </div>
        </a>
    </li>
</template>
<template id="star">
    <svg
            class="w-4 h-4 fill-current text-yellow-600"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
    >
        <path
                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
        />
    </svg>
</template>


</body>
</html>
