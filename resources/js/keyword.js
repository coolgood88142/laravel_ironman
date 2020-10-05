import 'bootstrap/dist/css/bootstrap.css'
import keyword from './components/keyword/Keyword.vue';
import keywordEdit from './components/keyword/KeywordEdit.vue';
import NavbarPagination from './components/NavbarPagination.vue'

let app = new Vue({
    el: '#app',
    components: {
        'keyword': keyword,
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
        keyWordId: [],
        pagination: {},
        getPage:1,
        params: {
            'id': '',
            'enName': '',
            'chName': ''
        }
    },
    mounted: function () {
        this.getKeyWordData(1)
    },
    methods: {
        getPagination: function (getPage){
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
        getAddKeyWord(){
            this.editTitle = '新增關鍵字'
            this.showEdit = true
            this.isAdd = true
            this.params = {
                'id': '',
                'enName': '',
                'chName': ''
            }
        },
        updateKeyWord(id, enName, chName, index){
            this.editTitle = '更新關鍵字'
            this.showEdit = true
            this.params = {
                'id': id,
                'enName': enName,
                'chName': chName,
                'index' : index
            }
        },
        getKeyWordId(id){
            this.keyWordId = id
        },
        deleteKeyWord(){
            if (this.keyWordId.length > 0) {
                let params = {
                    id: this.keyWordId
                }
                if (this.urlDelete  != '') {
                    axios.post(this.urlDelete, params).then((response) => {
                        let isSuccess = response.data.status == 'success' ? true : false
                        this.isShowMessage(!isSuccess, response.data.message)
                    }).catch((error) => {
                        if (error.response) {
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        } else {
                            console.log('Error', error.message);
                        }
                        this.isShowMessage(true, '發生意外錯誤!')
                    })
                } else {
                    this.isShowMessage(true, '發生意外錯誤!')
                }
            } else {
                this.isShowMessage(true, '至少勾選一個關鍵字')
            }
        },
        isShowMessage(isError, message){
            swal({
                title: message,
                confirmButtonColor: "#e6b930",
                icon: !isError ? 'success':'error',
                showCloseButton: true
            }).then(function() {
                if (!isError && isAdd){
                    location.reload()
                } else if (isAdd){

                }
            })
        }
    },
    
})