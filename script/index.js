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
                spaceBetween: 10
            },
            // when window width is >= 480px
            1200: {
                slidesPerView: 8,
                spaceBetween: 10
            },
            // when window width is >= 640px
            1352: {
                slidesPerView: 9,
                spaceBetween: 10
            }
        },
    });
} catch (error) {
    console.error(error);
}



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