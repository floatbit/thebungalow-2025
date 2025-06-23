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
