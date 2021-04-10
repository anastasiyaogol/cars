<template>
    <body class="body_profile">
    <div class="wrapper_profile">
        <aside v-if="visib">
            <form v-for="(value,index) in filters_update">
                <div class="add_auto_block">
                    <span class="add_auto_text">Местоположение авто</span>
                    <input type="text" class="add_auto" @input="form.city = $event.target.value; value.city = $event.target.value" :value="value.city">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Марка</span>
                    <input type="text" @input="form.brand = $event.target.value; value.brand = $event.target.value" class="add_auto" :value="value.brand">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Модель</span>
                    <input type="text" @input="form.model = $event.target.value; value.model = $event.target.value" class="add_auto" :value="value.model">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Цвет</span>
                    <input type="text" @input="form.color = $event.target.value; value.color = $event.target.value" class="add_auto" :value="value.color">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Дата выпуска</span>
                    <input type="number" @input="form.issue_year = $event.target.value; value.issue_year = $event.target.value" class="add_auto" :value="value.issue_year">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Топливо</span>
                    <select @input="form.fuel_id = $event.target.value; value.fuel_id = $event.target.value" name="fuels" class="add_auto" :value="value.fuel_id">
                        <option value="1">Бензин</option>
                        <option value="2" selected>Дизель</option>
                        <option value="3">Газ</option>
                        <option value="4">Электро</option>
                    </select>
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Пробег в тыс.км</span>
                    <input @input="form.mileage = $event.target.value; value.mileage = $event.target.value" type="number" class="add_auto" :value="value.mileage">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Тип коробки передач</span>
                    <select @input="form.transmission_id = $event.target.value; value.transmission_id = $event.target.value" name="transmissions" class="add_auto" :value="value.transmission_id">
                        <option value="1">Механика</option>
                        <option value="2" selected>Автомат</option>
                    </select>
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Тип кузова</span>
                    <select @input="form.type_id = $event.target.value; value.type_id = $event.target.value" name="types" class="add_auto" :value="value.type_id">
                        <option value="1">Седан</option>
                        <option value="2" selected>Универсал</option>
                        <option value="3">Хетчбек</option>
                        <option value="4">Пикап</option>
                        <option value="5">Кабриолет</option>
                    </select>
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Цена в $</span>
                    <input @input="form.price = $event.target.value; value.price = $event.target.value" type="number" class="add_auto" :value="value.price">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Имя владельца</span>
                    <input @input="form.seller_name = $event.target.value; value.seller_name = $event.target.value" type="text" class="add_auto" :value="value.seller_name">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Номер телефона владельца</span>
                    <input @input="form.seller_phone = $event.target.value; value.seller_phone = $event.target.value" type="number" class="add_auto" :value="value.seller_phone">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Выберите фото авто</span>
                    <input ref="img" @change="selectFile()" type="file" class="add_auto">
                </div>
                <div class="add_auto_block">
                    <span class="add_auto_text">Описание авто</span>
                    <textarea @input="form.description = $event.target.value; value.description = $event.target.value" class="add_auto_textarea" :value="value.description"></textarea>
                </div>
                <div class="add_auto_block">
                    <button class="add_auto_btn" @click.prevent="save_changes(value.id)">Редактировать</button>
                </div>
                <div class="err" v-if="success">
                    Ваше объявление было успешно обновлено
                </div>
                <div class="err" v-if="err">
                    Проверьте првальность введенных данных,все поля обязательны для редакирования
                </div>
            </form>
        </aside>
        <main>
            <div v-if="filters.length == 0" class="error">
                У Вас пока нет добавленных авто
            </div>
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
                        <button type="button" @click="del_auto(value.id)" class="details">Удалить</button>
                        <button type="button" @click="update_auto(value.id)" class="details">Редактировать</button>
                    </div>
                </div>
            </div>
        </main>
        <Footer/>
    </div>
    </body>
</template>
<script>
import Footer from './Footer.vue';
import MainAdd from "./MainAdd";
export default {
    props:['user'],
    data: () => ({
        err: false,
        success: false,
        auto: [],
        visib: false,
        post_number: '',
        form: {
            user_id: "",
            city: "" ,
            brand: "",
            model: "",
            color: "",
            issue_year: "",
            fuel_id: "",
            mileage: "",
            transmission_id: "",
            type_id: "",
            price: "",
            seller_name: "",
            seller_phone: "",
            img: "",
            description: ""
        }
    }),
    mounted() {
        this.load();
        this.form.user_id = this.user
        console.log(this.form.user_id);

    },
    methods: {
        selectFile() {
            this.form.img = this.$refs.img.files[0]
        },
        load() {
            axios.get('/api/autos')
                .then(res => {
                    this.auto = res.data;
                    console.log(res.data)
                })
        },
        del_auto(id) {
            axios.delete('api/autos/'+id)
                .then(this.load)
        },
        update_auto(id) {
            this.visib = true;
            this.post_number = id;
            this.success = false
            this.err = false
        },
        save_changes(id) {
            let formData = new FormData();
            formData.append('img',this.form.img)
            formData.append('user_id',this.form.user_id)
            formData.append('city',this.form.city)
            formData.append('brand',this.form.brand)
            formData.append('model',this.form.model)
            formData.append('color',this.form.color)
            formData.append('issue_year',this.form.issue_year)
            formData.append('fuel_id',this.form.fuel_id)
            formData.append('mileage',this.form.mileage)
            formData.append('transmission_id',this.form.transmission_id)
            formData.append('type_id',this.form.type_id)
            formData.append('price',this.form.price)
            formData.append('seller_name',this.form.seller_name)
            formData.append('seller_phone',this.form.seller_phone)
            formData.append('description',this.form.description)
            formData.append('_method', 'PATCH');
            axios.post('api/autos/'+id,formData,{
                headers: {
                    "Content-type": 'multipart/form-data'
                }
            })
            .then(res => {
                this.err = false
                this.load()
                this.success = true
            })
            .catch(err => {
                this.err = true
                this.success = false
            })
        }
    },
    components: {
        MainAdd,
        Footer
    },
    computed: {
        filters() {
            let auto = this.auto;
            let user = this.user;
            return auto.filter(function (elem) {
                if(elem.user_id == user) {
                    return true;
                }
            });
        },
        filters_update() {
            let auto = this.auto;
            let user = this.user;
            let post_number = this.post_number;
            return auto.filter(function (elem) {
                if(elem.user_id == user) {
                    if(elem.id == post_number) {
                        return true;
                    }
                }
            });
        }
    }

}
</script>


