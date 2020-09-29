import VueRouter from 'vue-router';
Vue.use(VueRouter)

const test = { template: '<div>Show Test</div>' }
const bread1 = { template: '<div>Show bread1</div>' }
const bread2 = { template: '<div>Show bread2</div>' }
const params = { template: '<div>vue-router帶走了 {{ $route.params.key }}</div>' }

const router = new VueRouter({
    routes: [
        {
            path: '/test',
            component: test,
            props: true
        },
        {
            path: '/bread1',
            component: bread1,
            props: true
        },
        {
            path: '/bread2',
            component: bread2,
            props: true
        },
        {
            path: '/params/:key',
            component: params,
            props: true
        },
    ],
})

new Vue({
    el: '#app',
    data: {
        key: ''
    },
    computed: {
        params() {
            return '/params/' + this.key
        }
    },
    router
})