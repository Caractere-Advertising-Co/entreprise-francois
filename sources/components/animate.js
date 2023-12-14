const page = document.getElementById('content-page-contact');

if (page) {
    const galleryHome = document.getElementById('partenaires');

    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5 // Déclencher l'animation lorsque 50% de la div est visible
    };
    
    const observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const items = entry.target.querySelectorAll('.logo_partenaires');
    
                items.forEach(item => {
                    item.classList.add('slide-from-bottom-to-top');
                });
                observer.unobserve(entry.target); // Arrête l'observation une fois que la div est visible
            }
        });
    }, options);
    
    observer.observe(galleryHome);
} else {
    console.log('L\'élément #content-page-contact n\'est pas présent sur cette page.');
}
