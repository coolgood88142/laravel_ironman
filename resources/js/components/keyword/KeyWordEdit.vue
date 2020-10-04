<template>
	<transition name="modal">
		<div class="modal-mask">
			<div class="modal-wrapper">
				<div class="modal-container">
                    <form action="" method="POST" class="sidebar-form">
                        <div class="modal-header">
                            <slot name="header">
                                <h3>{{ title }}</h3>
                            </slot>
                        </div>
                        <div class="modal-body">
                            <slot name="body">
                                <div class="form-group">
                                    <label for="inputEnglishName">英文名稱</label>
                                    <input type="text" class="form-control" id="inputEnglishName" v-model="enName">
                                </div>
                                <div class="form-group">
                                    <label for="inputChineseName">中文名稱</label>
                                    <input type="text" class="form-control" id="inputChineseName" v-model="chName">
                                </div>
                            </slot>
                        </div>
                        <div class="modal-footer">
                            <slot name="footer">
                                <div class="form-check form-check-inline">
                                    <input type="button" class="btn btn-primary" id="cancel" name="cancel"
                                            value="取消" @click="$emit('close')">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="button" class="btn btn-primary" id="save" name="save"
                                            value="儲存" @click="checkKeyWord()">
                                    </div>
                            </slot>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</transition>
</template>

<style>
	.modal-container{
		width:480px
	}
</style>

<script>
import swal from "sweetalert"

export default {
    props: {
        title: {
            type:String
        },
		params: {
			type:Object
        },
        urlData: {
            type:Object
        },
        isAdd: {
            type:Boolean
        }
	},
	data() {
		return {
			enName: this.params.enName,
            chName: this.params.chName,
            messageText: '',
		}
	},
	methods: {
		checkKeyWord() {
            let enName = this.enName
            let chName = this.chName
            let url = this.isAdd ? this.urlData.add : this.urlData.update
            this.messageText = ''

			if (enName === '' && chName === '') {
                this.messageText = "英文或中文名稱不能為空"
			} else if (enName === '') {
                this.messageText = "英文名稱不能為空"
            } else if(/[\u4e00-\u9fa5]/.test(enName)) {
                this.messageText = "英文名稱不能輸入中文"
			} else if (chName === '') {
                this.messageText = "中文名稱不能為空"
            } else if(/[A-Za-z]/.test(chName)) {
                this.messageText = "中文名稱不能輸入英文"
            } else {
                let params = {
                    'english_name' : enName,
                    'chinese_name' : chName,
                }

                if (!this.isAdd) {
                    params['id'] = this.params.id
                }
                this.$emit('send-data', url, params)
            }

            if (this.messageText != '') {
                this.$emit('is-show-message', true, this.messageText)
            }
        }
	},
}
</script>