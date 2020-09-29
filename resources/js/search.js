import 'bootstrap/dist/css/bootstrap.css'
import FuzzySearch from './components/search/FuzzySearch.vue';

let app = new Vue({
    el: '#app',
    components: {
        'fuzzy-search': FuzzySearch
    },
    data: {
        title: '模糊查詢',
    },
    
})