<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reviews Float</title>
  <link rel="preconnect" href="https://lh3.googleusercontent.com">
    <meta name="mcd_google_api_key" content="<?php echo carbon_get_theme_option( 'mcd_google_api_key' );?>">
    <meta name="mcd_minimum_star_rating" content="<?php echo carbon_get_theme_option( 'mcd_star_minimum' );?>">
    <meta name="mcd_google_place_id" content="<?php echo carbon_get_theme_option( 'mcd_google_place_id' );?>">
    <meta name="mcd_google_reviews_link" content="<?php echo carbon_get_theme_option( 'mcd_google_reviews_link' );?>">
<script type="module" crossorigin src="<?php echo plugins_url();?>/mcdaniel-wp-reviews/assets/index.3db1a6f4.js"></script>
  <link rel="modulepreload" href="<?php echo plugins_url();?>/mcdaniel-wp-reviews/assets/vendor.5e464d04.js">
  <link rel="stylesheet" href="<?php echo plugins_url();?>/mcdaniel-wp-reviews/assets/index.fbba41bd.css">
</head>
<body>

<div id="map"></div>
<div id="app">
  <div class="splide">
    <div class="splide__track">
      <ul class="splide__list" id="reviews-container" >

      </ul>
    </div>
  </div>
</div>
<template id="review-template">
  <li class="splide__slide">
    <section class="bg-white overflow-hidden rounded-lg p-4 border-2">
      <a class="reviews-link" target="_blank">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="inline-block relative">
              <div class="relative w-16 h-16 rounded-full overflow-hidden">
                <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover reviewer-photo" src="https://picsum.photos/id/646/200/200" alt="Profile picture">
                <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
              </div>
              <svg class="bg-white rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg"><path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/><path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/><path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/><path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/></svg>
            </div>
          </div>
          <div class="ml-6">
            <p class="flex items-baseline">
              <span class="text-gray-600 font-bold reviewer-name">Mary T.</span>
              <span class="text-light text-gray-400">&nbsp;left a review</span>
            </p>
            <div class="flex items-center mt-1 stars">
            </div>
            <div class="mt-1">
              <span class="font-light review-time text-gray-400 italic">Sapien consequat eleifend!</span>
            </div>
          </div>
        </div>
      </a>

    </section>

  </li>
</template>
<template id="star">
  <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
</template>



</body>
</html>
