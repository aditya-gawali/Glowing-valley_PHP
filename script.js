
var mobileNav = document.querySelector("#mobile-nav");
var menu = document.querySelector("#menu");
var cross = document.querySelector("#cross");

var searchBtn = document.querySelector("#search-div");
var search = document.querySelector("#search");
var searchcross = document.querySelector("#searchcross");

var t4 = gsap.timeline();

t4.pause()

t4.to("#mobile-nav", {
    right: 0,

})

t4.from("#mobile-nav h1", {
    opacity: 0,
    x: 30,
    stagger: 0.2
})
// t4.from("#mobile-nav i", {
//     opacity: 0,
//     x: 30,
// })


menu.addEventListener("click", () => {
    mobileNav.style.display = "flex";
    t4.play()
})
cross.addEventListener("click", async () => {
    let myPromise = new Promise(function (resolve) {
        t4.reverse()
        setTimeout(function () { resolve("none"); }, 2300);
    });
    mobileNav.style.display = await myPromise;
})

search.addEventListener("click", () => {
    searchBtn.style.display = "flex";
})

searchcross.addEventListener("click", async () => {
    searchBtn.style.display = "none";
})

const tabs = new Swiper('.tabs', {
    // Optional parameters
    direction: 'horizontal',

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    effect: 'slide',
    speed: 1200,
    spaceBetween: 100,

});

let currentSlideIndex = 0;


const htab = document.querySelector("#htab");
const btab = document.querySelector("#btab");


htab.addEventListener("click", () => {
    if (currentSlideIndex == 0) {
        tabs.slideNext();
    }
})


btab.addEventListener("click", () => {
    if (currentSlideIndex == 1) {
        tabs.slidePrev();
    }
})


tabs.on('slideChange', function () {


    (currentSlideIndex === 0) ? currentSlideIndex = currentSlideIndex + 1 : currentSlideIndex = currentSlideIndex - 1;

    if (currentSlideIndex == 1) {

        document.querySelector("#htab").classList = "text-center text-xl md:text-2xl font-bold p-2 rounded-r-xl bg-[#041e42] text-white";
        document.querySelector("#btab").classList = "text-center text-xl md:text-2xl font-bold p-2 rounded-l-xl";
    } else {
        document.querySelector("#btab").classList = "text-center text-xl md:text-2xl font-bold p-2 rounded-l-xl bg-[#041e42] text-white";
        document.querySelector("#htab").classList = "text-center text-xl md:text-2xl font-bold p-2 rounded-r-xl";
    }

});






// tabs.slideNext()


const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    effect: 'fade',
    speed: 1200,
    spaceBetween: 10,
    autoplay: {
        delay: 3000, // Delay between transitions (in milliseconds)
    },
});



