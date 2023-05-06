import { createRouter, createWebHistory } from 'vue-router'


import Visiteur from "@/views/Visiteur.vue"
import VisiteurDetails from "@/views/VisiteurDetails.vue"

const routes = [
  
  {
    path: "/",
    name: "home",
    component: Visiteur
  },
  {
    path: "/visiteur",
    name: "visiteur",
    component: Visiteur
  },
  {
    path: "/visiteur-detail",
    name: "detail-visiteur",
    component: VisiteurDetails
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
