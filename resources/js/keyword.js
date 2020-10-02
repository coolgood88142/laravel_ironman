import 'bootstrap/dist/css/bootstrap.css'
import KeyWord from './components/keyword/KeyWord.vue';

let app = new Vue({
    el: '#app',
    components: {
        'key-word': KeyWord
    },
    data: {
        title: '關鍵字查詢',
    },
    
})