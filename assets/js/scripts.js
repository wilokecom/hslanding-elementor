(function () {
  "use-strict";
  // javascript
  _wilTabFilter();
  // _showAllDemo();
  _slickSliderTestimonial();
  _slickSliderAppSreenShot();
  // _fixedNavigation();
})();

function _wilTabFilter() {
  filterSelection("all");
  var btnContainer = document.getElementById("wilTabFilterMenu");
  if (!btnContainer) return;
  var btns = btnContainer.getElementsByClassName("wilTabFilterMenuItem");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
      for (var i = 0; i < btns.length; i++) {
        btns[i].className = btns[i].className.replace(" active", "");
      }

      // var current = document.getElementsByClassName("active");
      // current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
}

function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("wilTabFilterItem");
  if (c == "all") c = "";
  _showAllDemo(c);
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

function _showAllDemo(c) {
  const itemClass = c
    ? `.sectionDemoImg__demoItem--${c}`
    : ".sectionDemoImg__demoItem";
  const $button = document.getElementById("wil-show-all-demo");
  const $demos = document.querySelectorAll(itemClass);
  const $overlay = document.querySelector(".sectionDemoImg__overlay");
  if (!$button || !$demos || !$overlay) return;

  // moi lan change TabFilte thi reShow overlay and button toggle ---
  $button.style.display = "";
  $overlay.style.display = "";

  // If length < 12 item thi hide overlay ---
  if ($demos.length <= 12) {
    $button.style.display = "none";
    $overlay.style.display = "none";
    return;
  }

  // hide nhung item co index > 12 and halfPath nhung  8 < item < 12
  for (let index = 0; index < $demos.length; index++) {
    const element = $demos[index];

    element.classList.remove("sectionDemoImg__demoItemHalf");
    element.classList.remove("hide");

    if ($demos.length < 12) return;

    if (index < 12 && index >= 8) {
      element.classList.add("sectionDemoImg__demoItemHalf");
    }
    if (index >= 12) {
      element.classList.add("hide");
      element.classList.remove("show");
    }
  }

  // event Click then show all item and hide overlay
  $button.addEventListener("click", function (event) {
    event.preventDefault();
    $button.style.display = "none";
    $overlay.style.display = "none";

    for (let index = 0; index < $demos.length; index++) {
      const element = $demos[index];
      element.classList.add("show");
      element.classList.remove("hide");
      element.classList.remove("sectionDemoImg__demoItemHalf");
    }
  });
}

function _slickSliderTestimonial() {
  $(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
  });
  $(".slider-nav").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    arrows: false,
    dots: true,
    adaptiveHeight: true,
    fade: true,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 500,
  });
}
function _slickSliderAppSreenShot() {
  $(".sectionAppSlider__slick").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    infinite: true,
    initialSlide: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnHover: false,
    speed: 300,
  });
}

function _fixedNavigation() {
  const $nav = document.querySelector(".wil-navigation");
  if (!$nav) return;
  window.addEventListener("scroll", _windownScroll);
}

function _windownScroll(event) {
  const $nav = document.querySelector(".wil-navigation");
  const top = window.scrollY;
  if (top > 100) {
    // window.removeEventListener("scroll", _windownScroll);
    $nav.style.background = "white";
    $nav.classList.add("wil-shadow--1");
  } else {
    $nav.style.background = "unset";
    $nav.classList.remove("wil-shadow--1");
  }
}
