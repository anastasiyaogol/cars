<template>
    <aside></aside>
    <main>
        <form>
            <div class="uk-alert-danger" uk-alert v-if="this.$userId == null">
                <a class="uk-alert-close" uk-close></a>
                <p class="error">Для отправки формы войдите или зарегистрируйтесь</p>
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Местоположение авто</span>
                <input type="text" v-model="form.city" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Марка</span>
                <input type="text" v-model="form.brand" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Модель</span>
                <input type="text" v-model="form.model" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Цвет</span>
                <input type="text" v-model="form.color" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Дата выпуска</span>
                <input type="number" v-model="form.issue_year" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Топливо</span>
                <select v-model="form.fuel_id" name="fuels" class="add_auto">
                    <option value="1">Бензин</option>
                    <option value="2" selected>Дизель</option>
                    <option value="3">Газ</option>
                    <option value="4">Электро</option>
                </select>
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Пробег в тыс.км</span>
                <input v-model="form.mileage" type="number" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Тип коробки передач</span>
                <select v-model="form.transmission_id" name="transmissions" class="add_auto">
                    <option value="1">Механика</option>
                    <option value="2" selected>Автомат</option>
                </select>
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Тип кузова</span>
                <select v-model="form.type_id" name="types" class="add_auto">
                    <option value="1">Седан</option>
                    <option value="2" selected>Универсал</option>
                    <option value="3">Хетчбек</option>
                    <option value="4">Пикап</option>
                    <option value="5">Кабриолет</option>
                </select>
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Цена в $</span>
                <input v-model="form.price" type="number" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Имя владельца</span>
                <input v-model="form.seller_name" type="text" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Номер телефона владельца</span>
                <input v-model="form.seller_phone" type="number" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Выберите фото авто</span>
                <input ref="img" @change="selectFile()" type="file" class="add_auto">
            </div>
            <div class="add_auto_block">
                <span class="add_auto_text">Описание авто</span>
                <textarea v-model="form.description" class="add_auto_textarea">></textarea>
            </div>
            <div>{{this.$root.foo}}</div>
            <div class="add_auto_block">
                <button class="add_auto_btn" @click.prevent="store">Опубликовать</button>
            </div>
        </form>
        <div class="uk-alert-danger" uk-alert v-if="this.$userId == null">
            <a class="uk-alert-close" uk-close></a>
            <p class="error">Для отправки формы войдите или зарегистрируйтесь,иначе Ваша форма не будет отправлена</p>
        </div>
        <div class="uk-alert-danger" uk-alert v-if="error">
            <a class="uk-alert-close" uk-close></a>
            <p class="error">Все поля обязательны для заполнения,проверьте правильность введенных данных</p>
        </div>
    </main>
</template>
<script>
import axios from "axios";
export default {
    props:['usr'],
    data: () => ({
        form: {
            user_id: "",
            city: "",
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
        },
        error:false
    }),
    methods: {
        selectFile() {
            this.form.img = this.$refs.img.files[0]
        },
        store() {
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
            console.log(formData)
            axios.post('api/autos',formData,{
                headers: {
                    "Content-type": 'multipart/form-data'
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/')
                    }
                    else {
                        this.error = true
                    }
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        }
    },
    mounted() {
        this.form.user_id = this.$userId
        console.log(this.$userId);
    }
}
</script>
