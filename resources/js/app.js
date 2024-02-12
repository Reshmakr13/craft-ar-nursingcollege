import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import page from '@/components/page';
import utils from '@/components/utils';
import progressbar from '@/components/progressbar';


window.Alpine = Alpine;
Alpine.plugin(persist);

window.sleep = function(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
};


Alpine.store('app', {
    xpages: [],
    pageloading: false
});

Alpine.data('initPage', page);
Alpine.data('progressBar', progressbar);
Alpine.start();
