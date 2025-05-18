import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header");
    const hero = document.querySelector(".home__hero");

    if (hero) {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (!entry.isIntersecting) {
                    header.classList.add("header--scrolled");
                } else {
                    header.classList.remove("header--scrolled");
                }
            },
            {
                root: null,
                threshold: 0.1,
            }
        );

        observer.observe(hero);
    } else {
        // If no hero exists, assume we're not on the homepage and apply the scrolled style
        header.classList.add("header--scrolled");
    }
});
