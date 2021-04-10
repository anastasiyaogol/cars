import { createStore } from "vuex";
import axios from 'axios';
export default createStore({
    state() {
        return{
            auto:[],
            user_id: ''
        }
    },
    mutations: {
        setAuto(state,auto) {
            state.auto = auto;
        }
    },
    actions: {
        getAuto({commit}) {
            return axios.get('/api/autos')
                .then(res =>  {
                    commit('setAuto',res.data);
                    console.log(res.data);
                });
        }
    }
})
