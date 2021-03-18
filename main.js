import "tailwindcss/tailwind.css"
import './node_modules/@splidejs/splide/dist/css/splide.min.css'

import { Loader } from '@googlemaps/js-api-loader';

import Splide from '@splidejs/splide';

const splide = new Splide( '.splide', {
    type   : 'fade',
    autoplay: true,
    perPage: 1,
    gap: 0,
    arrows: false,
    pagination: false,
} ).mount();

window.addEventListener('DOMContentLoaded', () => {
  const body = document.getElementsByTagName('body')[0];
  console.log(document.getElementsByTagName('body'));
  function isMobile (){
    if (window.innerWidth < 301){
      if (!body.classList.contains('mobile')){
        body.classList.add('mobile')
      }
    }
    else{
      if (body.classList.contains('mobile')){
        body.classList.remove('mobile')
      }
    }
  }
  window.onresize = function(){isMobile()}

  isMobile();

  const mobileReviewLink = document.getElementById('reviews-opener');

  mobileReviewLink.onclick = function(){
    const reviewsIframe = window.parent.document.getElementById('reviews-iframe');
    if (reviewsIframe){
      reviewsIframe.classList.add('open');
      body.classList.remove('mobile')
    }
  }
});

function getReviewsFromGoogle(){
    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -33.866, lng: 151.196 },
        zoom: 15,
    });
    const request = {
        placeId: document.getElementsByName('mcd_google_place_id')[0].getAttribute('content'),
        fields: ["reviews"],
    };
    const service = new google.maps.places.PlacesService(map);
    const container = document.getElementById("reviews-container");
    const template = document.getElementById("review-template");
    const starTemplate = document.getElementById('star');
    service.getDetails(request, (place, status) => {
        if (
            status === google.maps.places.PlacesServiceStatus.OK
        ) {
            const reviewLinkURL = document.getElementsByName('mcd_google_reviews_link')[0].getAttribute('content');
            place.reviews.forEach((review) => {
                if(Number(review.rating) < Number(document.getElementsByName('mcd_minimum_star_rating')[0].getAttribute('content'))){
                    return;
                }
                let clone = template.content.firstElementChild.cloneNode(true);
                clone.querySelector('.reviewer-name').innerText = review.author_name;
                let smallerPhoto = review.profile_photo_url.replace('=s128-c', '=s50-c');
                clone.querySelector('.reviewer-photo').src = smallerPhoto;
                clone.querySelector('.review-time').innerText = review.relative_time_description;
                clone.querySelector('.reviews-link').href = reviewLinkURL;
                let stars = clone.querySelector('.stars')
                for(let i = 0; i < review.rating; i++){
                    let star = starTemplate.content.firstElementChild.cloneNode(true);
                    stars.appendChild(star);
                }

                container.appendChild(clone);
                splide.add(clone);
                splide.mount();
            })
        }
    });
}

if (typeof google !== "undefined" && typeof google.maps !== "undefined" && typeof google.maps.places !== 'undefined'){
    getReviewsFromGoogle();
} else {
    const loader = new Loader({
        apiKey: document.getElementsByName('mcd_google_api_key')[0].getAttribute('content'),
        version: "weekly",
        libraries: ["places"]
    });
    loader
        .load()
        .then(() => {
            getReviewsFromGoogle();
        })
}


