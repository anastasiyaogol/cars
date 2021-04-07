<template>
    <aside>
        <form class="choice_form">
            <div class="choice_block">
                <span class="choice_text">Марка</span>
                <input type="text" v-model="filter_brand" class="choice">
            </div>
            <div class="choice_block">
                <span class="choice_text">Год от</span>
                <input type="number" v-model="filter_year" class="choice">
                <span class="choice_text">до</span>
                <input type="number" v-model="filter_year2" class="choice">
            </div>
            <div class="choice_block">
                <span class="choice_text">Пробег от</span>
                <input type="number" v-model="filter_mileage" class="choice">
                <span class="choice_text">до</span>
                <input type="number" v-model="filter_mileage2" class="choice">
                <span class="choice_text">тыс.км</span>
            </div>
            <div class="choice_block">
                <span class="choice_text">Цена от</span>
                <input type="number" v-model="filter_price" class="choice">
                <span class="choice_text">до</span>
                <input type="number" v-model="filter_price2" class="choice">
                <span class="choice_text">$</span>
            </div>
            <div class="btn_block">
                <button type="button" @click="btn_navbar" class="choice_btn">Найти</button>
            </div>
            <div class="err" v-if="err">
                Для фильтрации машин хотя бы одно поле должно быть заполнено
            </div>
        </form>
    </aside>
    <main>
        <div class="list">
            <div class="card" v-for="(value,index) in filters" :key=value>
                <div class="photo">
                    <img :src ="'http://project1/storage/'+value.img" class="car_photo">
                </div>
                <div class="description">
                    <div class="caption">{{value.brand}} {{ value.model}} {{ value.issue_year }}</div>
                    <div class="price">{{ value.price}}$</div>
                    <div class="short_description">
                        <div class="description_col_1">
                            <div class="options">
                                <img src="img/destination.png" class="icon">
                                <span>{{ value.city }}</span>
                            </div>
                            <div class="options">
                                <img src="img/brand.png" class="icon">
                                <span>{{value.brand}}</span>
                            </div>
                            <div class="options">
                                <img src="img/model.png" class="icon">
                                <span>{{ value.model }}</span>
                            </div>
                            <div class="options">
                                <img src="img/color.png" class="icon">
                                <span>{{ value.color }}</span>
                            </div>
                        </div>
                        <div class="description_col_2">
                            <div class="options">
                                <img src="img/issue_year.png" class="icon">
                                <span>{{ value.issue_year }}</span>
                            </div>
                            <div class="options">
                                <img src="img/fluel.png" class="icon">
                                <span>{{ value.fuel_name }}</span>
                            </div>
                            <div class="options">
                                <img src="img/mileage.png" class="icon">
                                <span>{{ value.mileage }} тыс.км</span>
                            </div>
                            <div class="options">
                                <img src="img/transmission.png" class="icon">
                                <span>{{value.transmission_name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="details_flex">
                        <router-link class="details"  :to="{
                            name: 'article',
                            params: {
                                id: value.id,
                                img: value.img,
                                city: value.city,
                                price: value.price,
                                brand: value.brand,
                                model: value.model,
                                color: value.color,
                                issue_year: value.issue_year,
                                fuel_name: value.fuel_name,
                                mileage: value.mileage,
                                transmission_name: value.transmission_name,
                                seller_name:value.seller_name,
                                seller_phone: value.seller_phone,
                                description: value.description
                            }
                        }">Детальнее</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="auto_not_found" v-if="filters.length == 0">
            По Вашему запросу авто не были найдены, проверьте корректность введённых данных
        </div>
    </main>
</template>
<script>
    export default {
        data() {
            return {
                filter_brand: '',
                filter_mileage: '',
                filter_mileage2:'',
                filter_price: '',
                filter_price2: '',
                filter_year: '',
                filter_year2: '',
                fltr_brand: '',
                fltr_mileage: '',
                fltr_mileage2:'',
                fltr_price: '',
                fltr_price2: '',
                fltr_year: '',
                fltr_year2: '',
                err: false
            }
        },
        created() {
            this.$store.dispatch('getAuto')
        },
        methods: {
            btn_navbar() {
                this.fltr_brand = this.filter_brand,
                this.fltr_mileage = this.filter_mileage,
                this.fltr_mileage2 = this.filter_mileage2,
                this.fltr_price = this.filter_price,
                this.fltr_price2 = this.filter_price2,
                this.fltr_year = this.filter_year,
                this.fltr_year2 = this.filter_year2
                if (this.fltr_brand == '' && this.fltr_mileage == '' && this.fltr_mileage2 == '' && this.fltr_price == '' && this.fltr_price2 == '' && this.fltr_year == '' && this.fltr_year2 == '') {
                    this.err = true
                }
                else {
                    this.err = false
                }
            }
        },
        computed: {
            filters() {
                let fl_year = this.fltr_year;
                let fl_year2 = this.fltr_year2;
                let fl_mileage = this.fltr_mileage;
                let fl_mileage2 = this.fltr_mileage2;
                let fl_price = this.fltr_price;
                let fl_price2 = this.fltr_price2;
                let fl_brand = this.fltr_brand;
                return this.$store.state.auto.filter(function (elem) {
                    if((elem.issue_year >= fl_year && elem.issue_year <= fl_year2) || (fl_year == '' && fl_year2 == '') || (elem.issue_year >= fl_year && fl_year2 == '') || (elem.issue_year <= fl_year2 && fl_year == '')) {
                        if ((elem.price >= fl_price && elem.price <= fl_price2) || (fl_price == '' && fl_price2 == '') || (elem.price >= fl_price && fl_price2 == '') || (elem.price <= fl_price2 && fl_price == '')) {
                            if ((elem.mileage >= fl_mileage && elem.mileage <= fl_mileage2) || (fl_mileage == '' && fl_mileage2 == '') || (elem.mileage >= fl_mileage && fl_mileage2 == '') || (elem.mileage <= fl_mileage2 && fl_mileage == '')) {
                                if (elem.brand == fl_brand || fl_brand == '') {
                                    return true;
                                }
                            }
                        }
                    }
                });
            }
        }
    }
</script>
