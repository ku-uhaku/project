// Define the variables
const spinner = document.querySelector("#spinner");
const stickyNav = document.querySelector(".sticky-top");
const backToTop = document.querySelector(".back-to-top");
const backToTopButton = document.querySelector(".back-to-top");

// Spinner
window.addEventListener("load", function () {
    spinner.classList.remove("show");
});

// Sticky Navbar
window.addEventListener("scroll", function () {
    if (window.pageYOffset > 300) {
        stickyNav.classList.add("shadow-sm");
        stickyNav.style.top = "0px";
    } else {
        stickyNav.classList.remove("shadow-sm");
        stickyNav.style.top = "-100px";
    }
});

// Back to top button
window.addEventListener("scroll", function () {
    if (window.pageYOffset > 300) {
        backToTop.classList.remove("d-none");
        backToTop.classList.add("d-flex");
    } else {
        backToTop.classList.remove("d-flex");
        backToTop.classList.add("d-none");
    }
});

backToTopButton.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
});

const items = document.querySelectorAll(".counter");
const endDelay = 200;

items.forEach((item) => {
    let iniValue = 0;
    const endValue = item.getAttribute("data-end");
    let delayValue = Math.abs(endValue) / 10000000; // Use the absolute value of endValue for delay calculation

    if (endValue - iniValue > 500) {
        iniValue = endValue - 500;
    }

    const animation = () => {
        if (iniValue <= endValue) {
            item.innerHTML = iniValue;
            const delay =
                Math.abs(endValue - iniValue) <= 10 ? endDelay : delayValue; // Use the absolute difference for delay check
            setTimeout(animation, delay);
            iniValue++;
        } else {
            item.innerHTML = endValue; // Set the final value after the animation completes
        }
    };

    animation();
});
