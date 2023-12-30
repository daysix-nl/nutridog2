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
