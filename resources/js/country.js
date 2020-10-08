import countryCity from './components/country/City.vue';
import countryDistricts from './components/country/Districts.vue';

let app = new Vue({
    el: '#app',
    data: {
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        city:{
            selected: null,
            text: ''
        },
        districts:{
            selected: null,
            text: ''
        },
        btnStyle: 'btn btn-primary'
    },
    components: {
        'country-city': countryCity,
        'country-districts': countryDistricts
    },
    methods: {
        updateCity(CitySelectedText, CitySelected) {
            this.city.text = CitySelectedText
            this.city.selected = CitySelected
            this.districts.selected = null
        },
        updateDistricts(DistrictsSelectedText, DistrictsSelected) {
            this.districts.text = DistrictsSelectedText
            this.districts.selected = DistrictsSelected
        },
        showPostalCode() {
            let show_text = '請選擇縣市和市區'
            if (this.city.text != '' && this.districts.text != '' && this.districts.selected  != null) {
                show_text = this.city.text + " " + this.districts.text  + " 郵遞區號為：" + this.districts.selected
            }
            alert(show_text)
        }
    }
})