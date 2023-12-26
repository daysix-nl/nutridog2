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