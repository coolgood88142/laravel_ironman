import keywordList from './components/keyword/List.vue';
import keywordEdit from './components/keyword/Edit.vue';
import NavbarPagination from './components/NavbarPagination.vue'

let app = new Vue({
    el: '#app',
    components: {
        'keyword-list': keywordList,
        'keyword-edit': keywordEdit,
        'navbar-pagination': NavbarPagination
    },
    data: {
        editTitle: '',
        showEdit: false,
        isAdd: false,
        keyword: [],
        urlAdd: '',
        urlUpdate: '',
        urlDelete: '',
        pagination: {},
        getPage:1,
        params: {
            'id': '',
            'en': '',
            'tc': ''
        },
        keywordDataIndex: null
    },
    mounted() {
        this.getKeywordData(1)
    },
    methods: {
        getPagination(getPage) {
            this.getKeywordData(getPage)
        },
        getKeywordData(page){
            axios.get('/getKeywordData?page=' + page).then(response => {
                this.keyword = response.data.keyword,
                this.urlAdd = response.data.add,
                this.urlUpdate = response.data.update,
                this.urlDelete = response.data.delete,
                this.pagination = response.data.pagination
            }).catch((error) => {
                //顯示請求資料失敗的錯誤訊息
                if (error.response){
                    //在log顯示response錯誤的資料、狀態、表頭
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                }else{
                    //在log顯示r錯誤訊息
                    console.log('Error',error.message);
                }
                
            })
        },
        getAddKeyword() {
            this.editTitle = '新增關鍵字'
            this.showEdit = true
            this.isAdd = true
            this.params = {
                'id': '',
                'en': '',
                'tc': ''
            }
        },
        updateKeyword(id, en, tc, index) {
            this.editTitle = '更新關鍵字'
            this.showEdit = true
            this.params = {
                'id': id,
                'en': en,
                'tc': tc
            }
            this.keywordDataIndex = index
        },
        updateKeywordData(params) {
            if (this.keywordDataIndex != null) {
                this.keyword[this.keywordDataIndex].tc = params.tc
                this.keyword[this.keywordDataIndex].en = params.en
            }
        },
        deleteKeywordData(index) {
            this.keywordDataIndex = index
            if (this.keywordDataIndex != null) {
                this.keyword.splice(this.keywordDataIndex, 1)
            }
        },
        isShowMessage(isSuccess, message){
            let isAdd =  this.isAdd
            swal({
                title: message,
                confirmButtonColor: "#e6b930",
                icon: isSuccess ? 'success':'error',
                showCloseButton: true
            }).then(function() {
                if (isSuccess && isAdd){
                    location.reload()
                }
            })

            if (isSuccess) {
                this.showEdit = false
            }
        }
    },
    
})