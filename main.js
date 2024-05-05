const navElements = document.querySelector("header.sticky-navbar");
document.addEventListener('scroll', () => {
  if (window.scrollY > 18) {
    navElements.classList.add('scrolling');
  } else {
    navElements.classList.remove('scrolling');
  }
});
