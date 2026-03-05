// Testimonial Section
jQuery(document).ready(function() {
  jQuery('.testimonial-section .owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    navText: ["<span class='left-btn p-3'></span>", "<span class='right-btn p-3'></span>"], 
    dots: false,
    rtl: false,
    responsive: {
    0: { 
      items: 1 
    },
    768: { 
      items: 2 
    },
    992: { 
      items: 2 
    },
    1200: { 
      items: 3 
    }
  },
  autoplay: true,
  });
});

// News Section
jQuery(document).ready(function() {
  jQuery('.news-section .owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: false, 
    dots: false,
    rtl: false,
    responsive: {
    0: { 
      items: 1 
    },
    768: { 
      items: 2 
    },
    992: { 
      items: 2 
    },
    1200: { 
      items: 3 
    }
  },
  autoplay: true,
  });
});

// Scroll to Top
window.onscroll = function() {
  const vw_cloud_kitchen_button = document.querySelector('.scroll-top-box');
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    vw_cloud_kitchen_button.style.display = "block";
  } else {
    vw_cloud_kitchen_button.style.display = "none";
  }
};

document.querySelector('.scroll-top-box a').onclick = function(event) {
  event.preventDefault();
  window.scrollTo({top: 0, behavior: 'smooth'});
};

// products tabs
document.addEventListener("DOMContentLoaded", () => {
  const vw_cloud_kitchen_tabTitles = [...document.querySelectorAll(".tab-title")];
  const vw_cloud_kitchen_tabContents = [...document.querySelectorAll(".tab-content")];

  if (!vw_cloud_kitchen_tabTitles.length) return;

  // Default: activate first tab
  vw_cloud_kitchen_tabTitles.forEach((tab, index) => {
    tab.classList.toggle("active", index === 0);
    tab.setAttribute("tabindex", "0"); // make focusable by keyboard
  });
  vw_cloud_kitchen_tabContents.forEach((content, index) => {
    content.classList.toggle("active", index === 0);
  });

  // Mouse click handling (FIXED)
  document.addEventListener("click", (e) => {
    const vw_cloud_kitchen_clickedTab = e.target.closest(".tab-title");
    if (vw_cloud_kitchen_clickedTab) {
      const vw_cloud_kitchen_clickedIndex = vw_cloud_kitchen_tabTitles.indexOf(vw_cloud_kitchen_clickedTab);
      if (vw_cloud_kitchen_clickedIndex !== -1) {
        vw_cloud_kitchen_setActive(vw_cloud_kitchen_clickedIndex);
      }
    }
  });

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    const vw_cloud_kitchen_activeIndex = vw_cloud_kitchen_tabTitles.findIndex(tab => tab.classList.contains("active"));
    let vw_cloud_kitchen_newIndex = vw_cloud_kitchen_activeIndex;

    if (e.key === "ArrowRight") {
      vw_cloud_kitchen_newIndex = (vw_cloud_kitchen_activeIndex + 1) % vw_cloud_kitchen_tabTitles.length;
      vw_cloud_kitchen_tabTitles[vw_cloud_kitchen_newIndex].focus();
      vw_cloud_kitchen_setActive(vw_cloud_kitchen_newIndex);
    } else if (e.key === "ArrowLeft") {
      vw_cloud_kitchen_newIndex = (vw_cloud_kitchen_activeIndex - 1 + vw_cloud_kitchen_tabTitles.length) % vw_cloud_kitchen_tabTitles.length;
      vw_cloud_kitchen_tabTitles[vw_cloud_kitchen_newIndex].focus();
      vw_cloud_kitchen_setActive(vw_cloud_kitchen_newIndex);
    } else if (e.key === "Enter" || e.key === " ") {
      const focusedIndex = vw_cloud_kitchen_tabTitles.indexOf(document.activeElement);
      if (focusedIndex !== -1) vw_cloud_kitchen_setActive(focusedIndex);
    }
  });

  function vw_cloud_kitchen_setActive(index) {
    vw_cloud_kitchen_tabTitles.forEach((tab, i) => tab.classList.toggle("active", i === index));
    vw_cloud_kitchen_tabContents.forEach((content, i) => content.classList.toggle("active", i === index));
  }
});

//  Single Product Link
document.addEventListener("click", function(e) {
  const vw_cloud_kitchen_btn = e.target.closest(".product-section .product-card .product-single-btn");
  if (!vw_cloud_kitchen_btn) return;

  const vw_cloud_kitchen_productItem = vw_cloud_kitchen_btn.closest("li.product");
  if (!vw_cloud_kitchen_productItem) return;

  const vw_cloud_kitchen_productLink = vw_cloud_kitchen_productItem.querySelector("a[href*='/product/']");
  if (vw_cloud_kitchen_productLink) {
    window.location.href = vw_cloud_kitchen_productLink.getAttribute("href");
  }
});