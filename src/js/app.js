import $ from 'jquery'
import ImageSlider from '@/blocks/image-slider'
import FoodDrink from '@/blocks/food-drink'

(function ($) {
  
  document.querySelectorAll('.block-image-slider').forEach(el => {
    new ImageSlider(el)
  })

  document.querySelectorAll('.block-food-drink').forEach(el => {
    new FoodDrink(el)
  })

  document.querySelectorAll('.mobile-toggle').forEach(el => {
    el.addEventListener('click', () => {
      const mobileMenu = document.getElementById('mobile-menu')
      mobileMenu.classList.toggle('translate-y-0')
      mobileMenu.classList.toggle('-translate-y-full')
      document.body.classList.toggle('mobile-menu-open')
      document.body.classList.toggle('overflow-hidden')
      
      // Scroll mobile menu to top when opening
      if (mobileMenu.classList.contains('translate-y-0')) {
        mobileMenu.scrollTo({ top: 0, behavior: 'smooth' })
        el.innerHTML = 'Close'
      } else {
        el.innerHTML = 'Menu'
      }
    })
  })
  
  // TO DO: Random line
  document.querySelectorAll('.line').forEach(el => {
    const lines = document.querySelectorAll('.lines-bank .line-item')
    const randomLine = lines[Math.floor(Math.random() * lines.length)]
    const tempDiv = document.createElement('div')
    tempDiv.innerHTML = randomLine.innerHTML
    while (tempDiv.firstChild) {
      el.appendChild(tempDiv.firstChild)
    }
  })

  // header
  window.addEventListener('scroll', () => {
    if (window.scrollY >= 200) {
      document.body.classList.add('header-minimized')
    } else {
      document.body.classList.remove('header-minimized')
    }
  })

  // hash on page load
  var hash = window.location.hash
  if (hash) {
    const jumpLinkId = hash.replace('#', '')
    const jumpLinkTarget = document.querySelector(`.acf-block[data-jump-link-id="${jumpLinkId}"]`)
    if (jumpLinkTarget) {
      const yOffset = -100; 
      const y = jumpLinkTarget.getBoundingClientRect().top + window.pageYOffset + yOffset;

      window.scrollTo({top: y, behavior: 'smooth'});
    }
  }

  // hash click
  document.querySelectorAll('a[href*="#"]').forEach(el => {
    el.addEventListener('click', (e) => {
      const jumpLinkId = el.hash.replace('#', '');
      const jumpLinkTarget = document.querySelector(`.acf-block[data-jump-link-id="${jumpLinkId}"]`);
      if (jumpLinkTarget) {
        e.preventDefault();
        const yOffset = -100;
        const y = jumpLinkTarget.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
      }
    })
  })

})($)
