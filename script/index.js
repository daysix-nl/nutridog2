try {
  var swiperShop = new Swiper(".mySwiper-shop", {
    slidesPerView: 1,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next-shop",
      prevEl: ".swiper-button-prev-shop",
    },
  });
} catch (error) {
  console.error(error);
}

try {
  var swiperShop = new Swiper(".mySwiper-categorie", {
    slidesPerView: 3,
    loop: false,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next-categorie",
      prevEl: ".swiper-button-prev-categorie",
    },
    breakpoints: {
      // when window width is >= 320px
      768: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      // when window width is >= 480px
      1200: {
        slidesPerView: 8,
        spaceBetween: 10,
      },
      // when window width is >= 640px
      1352: {
        slidesPerView: 9,
        spaceBetween: 10,
      },
    },
  });
} catch (error) {
  console.error(error);
}

try {
  var swiperShop = new Swiper(".mySwiper-categorie-home", {
    slidesPerView: 3.3,
    loop: false,
    spaceBetween: 10,
    breakpoints: {
      // when window width is >= 320px
      500: {
        slidesPerView: 4.5,
        spaceBetween: 10,
      },
      // when window width is >= 320px
      600: {
        slidesPerView: 5.5,
        spaceBetween: 10,
      },
      // when window width is >= 320px
      768: {
        slidesPerView: 6.5,
        spaceBetween: 10,
      },
      // when window width is >= 480px
      1200: {
        slidesPerView: 9,
        spaceBetween: 10,
      },
      // when window width is >= 640px
      1352: {
        slidesPerView: 10,
        spaceBetween: 10,
      },
    },
  });
} catch (error) {
  console.error(error);
}

try {
  const navbarDropdown = document.querySelector(".navbar-dropdown");
  const closeNavbarDropdown = document.querySelector(".close-navbar-dropdown");
  const openNavbarDropdown = document.querySelector(".navbar-dropdown-btn");
  const navbarDropdownItems = document.querySelectorAll(".button-inner-navbar");
  const navbarDropdownItemsColumns =
    document.querySelectorAll(".column-menu-inner");
  const headerElements = document.querySelectorAll("header a, header button");

  const toggleActive = (element) => {
    element.classList.add("active");
  };

  const removeActive = (element) => {
    element.classList.remove("active");
  };

  const removeActiveFromColumns = () => {
    navbarDropdownItemsColumns.forEach((itemColumn) => {
      itemColumn.classList.remove("active");
    });
  };

  openNavbarDropdown.addEventListener("mouseover", () => {
    toggleActive(navbarDropdown);
    openNavbarDropdown.classList.add("active");
  });
  closeNavbarDropdown.addEventListener("click", () => {
    removeActive(navbarDropdown);
    openNavbarDropdown.classList.toggle("active");
  });

  navbarDropdownItems.forEach((item) => {
    item.addEventListener("mouseover", () => {
      removeActiveFromColumns();
      const id = item.getAttribute("data-columns");
      const columns = document.querySelector(`#div-submenu-${id}`);
      toggleActive(columns);
    });
  });

  headerElements.forEach((element) => {
    if (!element.classList.contains("navbar-dropdown-btn")) {
      element.addEventListener("mouseover", () => {
        removeActive(navbarDropdown);
        openNavbarDropdown.classList.remove("active");
      });
    }
  });
} catch (error) {
  console.error(error);
}
try {
  const createCookie = (name, value, days) => {
    try {
      let expires = "";
      if (days) {
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toGMTString();
      }
      document.cookie = name + "=" + value + expires + "; path=/";
    } catch (error) {
      console.error("Error in createCookie: ", error);
    }
  };

  const getCookie = (c_name) => {
    try {
      let c_start, c_end;
      if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
          c_start = c_start + c_name.length + 1;
          c_end = document.cookie.indexOf(";", c_start);
          c_end = c_end == -1 ? document.cookie.length : c_end;
          return decodeURIComponent(document.cookie.substring(c_start, c_end));
        }
      }
      return "";
    } catch (error) {
      console.error("Error in getCookie: ", error);
      return "";
    }
  };

  const addFavoriteButton = document.querySelectorAll(".add-favorite");
  if (!addFavoriteButton) {
    throw new Error("Favorite buttons not found");
  }

  addFavoriteButton.forEach((item) => {
    try {
      const json_str = getCookie("favoriteProducts");
      let arrBasic = json_str ? JSON.parse(json_str) : [];
      const getAttribute = item.getAttribute("id-data");

      if (!getAttribute) {
        throw new Error("Attribute 'id-data' not found on item");
      }

      if (arrBasic.includes(getAttribute)) {
        item.classList.add("active");
      }

      item.addEventListener("click", () => {
        try {
          const json_strClickEvent = getCookie("favoriteProducts");
          let arr = json_strClickEvent ? JSON.parse(json_strClickEvent) : [];

          if (arr.includes(getAttribute)) {
            arr = arr.filter((item) => item !== getAttribute);
            item.classList.remove("active");

            if (item.classList.contains("close-button-favorite")) {
              createCookie("favoriteProducts", JSON.stringify(arr), 20);
              window.location.reload();
            }
          } else {
            arr.push(getAttribute);
            item.classList.add("active");
          }

          createCookie("favoriteProducts", JSON.stringify(arr), 20);
        } catch (error) {
          console.error("Error in click event handler: ", error);
        }
      });
    } catch (error) {
      console.error("Error in forEach loop: ", error);
    }
  });
} catch (error) {
  console.error("Error in main try-catch block: ", error);
}





try {
  const overlayShopCart = document.querySelector(".sidecart-overlay");
  const sidecart = document.querySelector("#sidecart-menu");
  const sidecartClose = document.querySelector("#sidecart-close");
  const sidecartButton = document.querySelectorAll(".sidecar");
  // const closeHandler = document.querySelector("#hamburger-menu");

  for (let i = 0; i < sidecartButton.length; i++) {
    sidecartButton[i].addEventListener("click", () => {
      // closeHandler.classList.add("hidden");
      overlayShopCart.classList.toggle("sidecart-overlay-active");
      sidecart.classList.toggle("sidecart-hidden");
    });
  }

  overlayShopCart.addEventListener("click", () => {
    overlayShopCart.classList.toggle("sidecart-overlay-active");
    sidecart.classList.toggle("sidecart-hidden");
  });

  sidecartClose.addEventListener("click", () => {
    overlayShopCart.classList.toggle("sidecart-overlay-active");
    sidecart.classList.toggle("sidecart-hidden");
  });
} catch (error) {
  console.error(error);
}



try {
  var swiperHero = new Swiper(".swiperhero", {
    spaceBetween: 40,
    lazy: false,
    freeMode: true,
    loop: true,
    speed: 100000,

    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
    slidesPerView: "auto",
    breakpoints: {
      640: {
        speed: 100000,
      },
      768: {
        speed: 100000,
      },
      1024: {
        speed: 100000,
      },
    },
  });
} catch (error) { }


try {
  // JavaScript-code om class te togglen
  document.getElementById('menu').addEventListener('click', function () {
    // Verkrijg het body-element
    var bodyElement = document.body;

    // Toggle class 'active' en 'non-active' op het body-element
    bodyElement.classList.toggle('menu-active');
    bodyElement.classList.toggle('menu-non-active');
  });
} catch (error) { }


let labels = ["Al een account? Je kan hier inloggen", "Nog geen account? Registreer hier"];
var swiper = new Swiper(".mySwiperAccount", {
  effect: "cube",
  grabCursor: true,
  cubeEffect: {
    shadow: false,
    slideShadows: false,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
  pagination: {
    el: ".swiper-pagination-account",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '"><span class="tab-text">' + labels[index] + "</span></span>";
    },
  },
});



/**********************/
/**** accordion ***/
/**********************/
try {
  const acc = document.getElementsByClassName("accordion");

  for (let i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      const panel = this.nextElementSibling;
      this.classList.toggle("active");
      panel.style.height =
        panel.style.height === panel.scrollHeight + "px"
          ? "0"
          : panel.scrollHeight + "px";

      for (let j = 0; j < acc.length; j++) {
        if (this !== acc[j]) {
          acc[j].classList.remove("active");
          acc[j].nextElementSibling.style.height = "0";
        }
      }
    });
  }
} catch (error) { }

try {
  var swiperInsta = new Swiper(".mySwiperInsta", {
    slidesPerView: 2,
    spaceBetween: 10,

    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 25,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 25,
      },
    },

  });
} catch (error) { }