import 'bootstrap/dist/css/bootstrap.css'
import cityCounties from './components/city/CityCounties.vue';
import cityDistricts from './components/city/CityDistricts.vue';

let app = new Vue({
    el: '#app',
    data: {
        message: 'Vue練習:',
        showText: '顯示郵遞區號!',
        countiesSelected: NaN,
        districtsSelected: NaN,
        countiesSelectedText: '',
        districtsSelectedText: '',
        btnStyle: 'btn btn-primary'
    },
    components: {
        'city-counties': cityCounties,
        'city-districts': cityDistricts
    },
    methods: {
        getDistrictsData(DistrictsSelectedText, DistrictsSelected) {
            this.districtsSelectedText = DistrictsSelectedText
            this.districtsSelected = DistrictsSelected
        },
        updateDistricts(CountiesSelectedText, CountiesSelected) {
            this.countiesSelectedText = CountiesSelectedText
            this.countiesSelected = CountiesSelected
            this.districtsSelected = NaN
        },
        showPostalCode() {
            let show_text = '請選擇縣市和市區'
            if (!isNaN(this.countiesSelected) && !isNaN(this.districtsSelected)) {
                show_text = this.countiesSelectedText + " " + this.districtsSelectedText + " 郵遞區號為：" + this.districtsSelected 
            }
            alert(show_text)
        }
    }
})