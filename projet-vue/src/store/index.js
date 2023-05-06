import { createStore } from 'vuex'
import axios from 'axios'
export default createStore({
  state: {
    baseUrl: "http://127.0.0.1:8000/api/",
    visiteur: [],
    visiteurDetail: {},
    
  },
  getters: {

  },
  mutations: {
    setVisiteur(state, payload) {
      state.visiteur = payload
    },
    setVisiteurDetail(state, payload) {
      state.visiteurDetail = payload
    }
  },
  actions: {

    // x ===> { state, commit, dispatch,getters }
    async getAllVisiteur({ commit, state }) {
      await axios.get(state.baseUrl + 'visiteur').then((res) => {
        commit('setVisiteur', res.data.visiteurs)
      }).catch((err) => {
        console.log(err);
      })
    },
    async recherche({ commit, state }, id) {
      await axios.get(state.baseUrl + 'visiteur/' + id).then((res) => {
        commit('setVisiteur', [res.data.visiteurs])
      }).catch((err) => {
        console.log(err);
      })
    },
    async getAllVisiteurDetails({ commit, state }, id) {
      await axios.get(state.baseUrl + 'visiteur/' + id).then((res) => {
        commit('setVisiteurDetail', res.data.visiteurs)
      }).catch((err) => {
        console.log(err);
      })
    }
  },
  modules: {
  }
})
