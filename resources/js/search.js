import 'bootstrap/dist/css/bootstrap.css'
import Fuzzy from './components/search/Fuzzy.vue';

let app = new Vue({
    el: '#app',
    components: {
        'fuzzy-search': Fuzzy
    },
    data: {
        title: '模糊查詢',
    },
    
})