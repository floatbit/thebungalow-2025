import $ from 'jquery'
import ImageSlider from '@/blocks/image-slider'
import FoodDrink from '@/blocks/food-drink'
import EventsPast from '@/blocks/events-past'

(function ($) {
  
  document.querySelectorAll('.block-image-slider').forEach(el => {
    new ImageSlider(el)
  })

  document.querySelectorAll('.block-food-drink').forEach(el => {
    new FoodDrink(el)
  })

  document.querySelectorAll('.block-events-past').forEach(el => {
    new EventsPast(el)
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
  let lastKnownState = window.scrollY >= 200 ? 'minimized' : 'expanded'
  let lastUpdateTime = 0
  
  // Initialize state on page load
  if (lastKnownState === 'minimized') {
    document.body.classList.add('header-minimized')
  }
  
  const updateHeaderState = () => {
    const now = Date.now()
    const timeSinceLastUpdate = now - lastUpdateTime
    
    // Throttle to max once every 150ms to prevent rapid changes
    if (timeSinceLastUpdate < 150) {
      return
    }
    
    const scrollY = window.scrollY
    let newState
    
    // Very large hysteresis buffer: add at 220px, remove at 100px
    if (scrollY >= 220) {
      newState = 'minimized'
    } else if (scrollY <= 100) {
      newState = 'expanded'
    } else {
      // In the buffer zone (100-220px), don't change anything
      return
    }
    
    // Only update if state actually needs to change
    if (newState !== lastKnownState) {
      if (newState === 'minimized') {
        document.body.classList.add('header-minimized')
      } else {
        document.body.classList.remove('header-minimized')
      }
      lastKnownState = newState
      lastUpdateTime = now
    }
  }
  
  // Use passive listener for better scroll performance
  window.addEventListener('scroll', updateHeaderState, { passive: true })

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
        
        // Close mobile menu if open
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileToggle = document.querySelector('.mobile-toggle');
        if (mobileMenu.classList.contains('translate-y-0')) {
          mobileMenu.classList.remove('translate-y-0');
          mobileMenu.classList.add('-translate-y-full');
          document.body.classList.remove('mobile-menu-open', 'overflow-hidden');
          if (mobileToggle) {
            mobileToggle.innerHTML = 'Menu';
          }
        }

        const yOffset = -100;
        const y = jumpLinkTarget.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
      }
    })
  })

})($)
