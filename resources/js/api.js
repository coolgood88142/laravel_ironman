import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios'

let app = new Vue({
    el: '#app',
    data: {
        title: 'API串接資料',
        articles: []
    },
    mounted() {
        this.getData()
    },
    methods: {
        getData(){
            axios.get('https://my-json-server.typicode.com/coolgood88142/json_server/articles')
            .then(
                response => (
                this.articles = response.data  
            ))
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        },
        runApi(){
            let data = {
                'articles': this.articles
            }
            axios.post('/test3', data).then((response) => {
                console.log(response)
            }).catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                } else {
                    console.log('Error', error.message);
                }
            })
        }
    }   

})
