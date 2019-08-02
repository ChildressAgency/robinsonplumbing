jQuery(document).ready(function($){
  $('.carousel-heights .carousel-inner .carousel-item').carouselHeights();

  $('.coupon').on('click', function(e){
    e.preventDefault();

    var $coupon = document.getElementById($(this).attr('id'));

    printCoupon($coupon);
    window.print();
  });
});

$.fn.carouselHeights = function () {
  var items = $(this), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  var normalizeHeights = function () {
    items.each(function () { //add heights to array
      heights.push($(this).height());
    });
    tallest = Math.max.apply(null, heights); //cache largest value
    items.each(function () {
      $(this).css('min-height', tallest + 'px');
    });
  };

  normalizeHeights();

  $(window).on('resize orientationchange', function () {
    //reset vars
    tallest = 0;
    heights.length = 0;

    items.each(function () {
      $(this).css('min-height', '0'); //reset min-height
    });
    normalizeHeights(); //run it again 
  });
};

function printCoupon(elem, append, delimiter) {
  var domClone = elem.cloneNode(true);

  var $printSection = document.getElementById("printSection");

  if (!$printSection) {
    var $printSection = document.createElement("div");
    $printSection.id = "printSection";
    document.body.appendChild($printSection);
  }

  if (append !== true) {
    $printSection.innerHTML = "";
  }

  else if (append === true) {
    if (typeof (delimiter) === "string") {
      $printSection.innerHTML += delimiter;
    }
    else if (typeof (delimiter) === "object") {
      $printSection.appendChild(delimiter);
    }
  }

  $printSection.appendChild(domClone);
}