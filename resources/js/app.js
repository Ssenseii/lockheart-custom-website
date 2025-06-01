import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header");
    const hero = document.querySelector(".home__hero");
    const serviceHero = document.querySelector(
        ".service_page"
    ); 
    const products = document.querySelector(
        ".products"
    ); 
    const product = document.querySelector(".product_page"); 
    const contact = document.querySelector(".contact_page"); 

    if (serviceHero || products || product || contact) {
        header.style.position = "static"; 
        header.classList.add("header--scrolled"); 
        return; 
    }

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

