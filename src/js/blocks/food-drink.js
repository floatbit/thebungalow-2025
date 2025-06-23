export default class ImageSlider { 
    constructor(el) {
        this.el = el;
        this.init();
    }

    init() {
        const menuLinks = this.el.querySelectorAll('.menu-links a')
        const menus = this.el.querySelectorAll('.menus .menu')
        menuLinks.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                menuLinks.forEach(link => {
                    link.classList.remove('active')
                })
                e.target.classList.add('active')
                menus.forEach(menu => {
                    menu.classList.remove('block')
                    menu.classList.add('hidden')
                })
                
                // Show the menu that corresponds to the clicked link index
                if (menus[index]) {
                    menus[index].classList.remove('hidden')
                    menus[index].classList.add('block')
                }
                
                e.preventDefault()
            })
        })
    }
}