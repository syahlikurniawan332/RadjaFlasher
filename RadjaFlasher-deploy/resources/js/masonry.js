import Masonry from 'masonry-layout';
import imagesLoaded from 'imagesloaded';

document.addEventListener('DOMContentLoaded', () => {
    const grid = document.querySelector('#masonry-gallery');
    if (!grid) return;

    imagesLoaded(grid, () => {
        new Masonry(grid, {
            itemSelector: '.masonry-item',
            columnWidth: '.masonry-sizer',
            gutter: 16,
            percentPosition: false,
        });
    });
});