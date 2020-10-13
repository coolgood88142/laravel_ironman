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
									<label for="inputTraditionalChineseName">中文名稱</label>
									<input type="text" class="form-control" id="inputTraditionalChineseName" v-model="tcName">
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
											value="儲存" @click="saveKeyword()">
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
		urlAdd: {
			type:String
		},
		urlUpdate: {
			type:String
		},
		isAdd: {
			type:Boolean
		}
	},
	data() {
		return {
			enName: this.params.en,
			tcName: this.params.tc,
			messageText: '',
		}
	},
	methods: {
		checkKeyword(enName, tcName) {
			let isSuccess = false
			this.messageText = ''
			
			if (enName === '' && tcName === '') {
				this.messageText = "英文或中文名稱不能為空"
			} else if (enName === '') {
				this.messageText = "英文名稱不能為空"
			} else if(/[\u4e00-\u9fa5]/.test(enName)) {
				this.messageText = "英文名稱不能輸入中文"
			} else if (tcName === '') {
				this.messageText = "中文名稱不能為空"
			} else if(/[A-Za-z]/.test(tcName)) {
				this.messageText = "中文名稱不能輸入英文"
			} 

			if (this.messageText == '') {
				isSuccess = true
			} else {
				this.$emit('is-show-message', isSuccess, this.messageText)
			}
			return isSuccess
		},
		saveKeyword(){
			let enName = this.enName
			let tcName = this.tcName
			let url = this.isAdd ? this.urlAdd : this.urlUpdate
			let isSuccess = this.checkKeyword(enName, tcName)

			if (isSuccess) {
				let data = {
					'en' : enName,
					'tc' : tcName,
				}

				if (!this.isAdd) {
					data['id'] = this.params.id
				}

				axios.post(url, data).then((response) => {
					let isSuccess = response.data.status == 'success' ? true : false
					if (isSuccess && !this.isAdd) {
						this.$emit('update-keyword-data', data)
					}
					this.$emit('is-show-message', isSuccess, response.data.message)
				}).catch((error) => {
					if (error.response) {
						console.log(error.response.data);
						console.log(error.response.status);
						console.log(error.response.headers);
					} else {
						console.log('Error', error.message);
					}
					this.$emit('is-show-message', false, '發生意外錯誤!')
				})
			}
			
		}
	},
}
</script>