import 'bootstrap/dist/css/bootstrap.css'
import cityCounty from './components/city/County.vue';
import cityDistricts from './components/city/Districts.vue';

let app = new Vue({
    el: '#app',
    data: {
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        countySelected: null,
        districtsSelected: null,
        countySelectedText: '',
        districtsSelectedText: '',
        btnStyle: 'btn btn-primary'
    },
    components: {
        'city-county': cityCounty,
        'city-districts': cityDistricts
    },
    methods: {
        updateCounty(CountySelectedText, CountySelected) {
            this.countySelectedText = CountySelectedText
            this.countySelected = CountySelected
            this.districtsSelected = null
        },
        updateDistricts(DistrictsSelectedText, DistrictsSelected) {
            this.districtsSelectedText = DistrictsSelectedText
            this.districtsSelected = DistrictsSelected
        },
        showPostalCode() {
            let show_text = '請選擇縣市和市區'
            if (this.countySelectedText != '' && this.districtsSelectedText != '' && this.districtsSelected != null) {
                show_text = this.countySelectedText + " " + this.districtsSelectedText + " 郵遞區號為：" + this.districtsSelected 
            }
            alert(show_text)
        }
    }
})