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

})($)
