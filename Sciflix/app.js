// Timeline default
const tl = gsap.timeline({defaults: {ease:"power1.out"}});

// Element selection and animation

// Move text
tl.to(".text", {y:"0%", duration: 1, stagger: 0.25});
// Move slider
tl.to(".slider", {y:"-100%", duration: 1.5, delay: 0.75});
// Move image
tl.to(".intro", {y:"-100%", duration:1}, "-=1");
// Navbar Animation
tl.fromTo("nav", {opacity: 0}, {opacity: 1, duration: 1});
// Main text animation
tl.fromTo(".main-text", {opacity: 0}, {opacity: 1, duration: 1}, "-=1");