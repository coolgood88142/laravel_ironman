import 'bootstrap/dist/css/bootstrap.css'
import countiesCity from './components/counties/City.vue';
import countiesDistricts from './components/counties/Districts.vue';

let app = new Vue({
    el: '#app',
    data: {
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        citySelected: null,
        districtsSelected: null,
        citySelectedText: '',
        districtsSelectedText: '',
        btnStyle: 'btn btn-primary'
    },
    components: {
        'counties-city': countiesCity,
        'counties-districts': countiesDistricts
    },
    methods: {
        updateCity(CitySelectedText, CitySelected) {
            this.citySelectedText = CitySelectedText
            this.citySelected = CitySelected
            this.districtsSelected = null
        },
        updateDistricts(DistrictsSelectedText, DistrictsSelected) {
            this.districtsSelectedText = DistrictsSelectedText
            this.districtsSelected = DistrictsSelected
        },
        showPostalCode() {
            let show_text = '請選擇縣市和市區'
            if (this.citySelectedText != '' && this.districtsSelectedText != '' && this.districtsSelected != null) {
                show_text = this.citySelectedText + " " + this.districtsSelectedText + " 郵遞區號為：" + this.districtsSelected 
            }
            alert(show_text)
        }
    }
})