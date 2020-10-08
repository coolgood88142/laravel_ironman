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
        title: '關鍵字查詢',
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
            'enName': '',
            'chName': ''
        },
        keyWordDataIndex: null
    },
    mounted: function () {
        this.getKeyWordData(1)
    },
    methods: {
        getPagination(getPage) {
            this.getKeyWordData(getPage)
        },
        getKeyWordData(page){
            axios.get('/getKeyWordData?page=' + page).then(response => {
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
        getAddKeyWord() {
            this.editTitle = '新增關鍵字'
            this.showEdit = true
            this.isAdd = true
            this.params = {
                'id': '',
                'enName': '',
                'chName': ''
            }
        },
        updateKeyword(id, enName, chName, index) {
            this.editTitle = '更新關鍵字'
            this.showEdit = true
            this.params = {
                'id': id,
                'enName': enName,
                'chName': chName
            }
            this.keyWordDataIndex = index
        },
        updateKeywordData(params) {
            if (this.keyWordDataIndex != null) {
                this.keyword[this.keyWordDataIndex].chinese_name = params.chinese_name
                this.keyword[this.keyWordDataIndex].english_name = params.english_name
            }
        },
        deleteKeywordData(index) {
            this.keyWordDataIndex = index
            if (this.keyWordDataIndex != null) {
                this.keyword.splice(this.keyWordDataIndex, 1)
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