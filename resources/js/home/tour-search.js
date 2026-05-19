import { initTourDestinationSearch } from '../tour/tour-destination-search.js';

document.addEventListener('DOMContentLoaded', function () {
    initTourDestinationSearch({
        formSelector: '#home-tour-search-form',
        searchInputSelector: '#tour-destination-search',
    });
});
