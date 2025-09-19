export default class EventsPast { 
    constructor(el) {
        this.el = el;
        this.eventsContainer = this.el.querySelector('.events-container');
        this.pagination = this.el.querySelector('.pagination');
        this.currentPage = 1;
        this.isLoading = false;
        this.blockId = this.el.getAttribute('id');
        // Get locations data from data attribute
        this.locations = this.el.dataset.locations;
        
        this.init();
    }

    init() {
        // Bind pagination click events
        this.pagination.addEventListener('click', (e) => {
            e.preventDefault();
            
            const link = e.target.closest('a');
            if (!link) return;
            
            let targetPage = link.getAttribute('data-page');
            if (targetPage === 'newer') {
                targetPage = this.currentPage - 1;
            } else if (targetPage === 'older') {
                targetPage = this.currentPage + 1;
            } else {
                targetPage = parseInt(targetPage);
            }
            
            this.loadPage(targetPage);
        });

        // Handle browser back/forward
        window.addEventListener('popstate', (e) => {
            if (e.state && e.state.page && e.state.blockId === this.blockId) {
                this.loadPage(e.state.page, false);
            }
        });
    }

    async loadPage(page, updateHistory = true) {
        if (this.isLoading || page === this.currentPage) return;
        
        this.isLoading = true;
        this.showLoading();

        try {
            const response = await fetch(window.wpAjax.url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'load_past_events',
                    page: page,
                    block_id: this.blockId,
                    nonce: window.wpAjax.nonce,
                    locations: this.locations
                })
            });

            const data = await response.json();
            
            if (data.success) {
                // Scroll first
                const yOffset = -100;
                const y = this.el.getBoundingClientRect().top + window.pageYOffset + yOffset;
                window.scrollTo({ top: y, behavior: 'smooth' });

                // Update content after a brief delay to ensure scroll completes
                setTimeout(() => {
                    // Update events container with the html from response
                    this.eventsContainer.innerHTML = data.data.html;
                    // Update pagination with the pagination from response
                    this.pagination.innerHTML = data.data.pagination;
                    this.currentPage = page;
                    
                    if (updateHistory) {
                        const url = new URL(window.location);
                        url.searchParams.set('page', page);
                        url.hash = this.blockId;
                        history.pushState({ page, blockId: this.blockId }, '', url);
                    }
                }, 600);
            } else {
                console.error('Failed to load events:', data.message);
            }
        } catch (error) {
            console.error('Error loading events:', error);
        } finally {
            this.hideLoading();
            this.isLoading = false;
        }
    }

    showLoading() {
        // Removed loading indicators
    }

    hideLoading() {
        // Removed loading indicators
    }
}