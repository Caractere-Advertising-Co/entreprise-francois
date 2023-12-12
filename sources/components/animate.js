const galleryHome = document.getElementById('partenaires');
const picofGallery = document.ge'

const observer = new IntersectionObserver( entries => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            entry.target.classList.add('slide-from-bottom-to-top');
        }
    })
});

observer.observe(galleryHome);