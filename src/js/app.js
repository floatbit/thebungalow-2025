import $ from 'jquery'
import ImageSlider from '@/blocks/image-slider'

(function ($) {
  
  document.querySelectorAll('.block-image-slider').forEach(el => {
    new ImageSlider(el)
  })

  // TO DO: Random line
  document.querySelectorAll('.line').forEach(el => {
    
  })

})($)
