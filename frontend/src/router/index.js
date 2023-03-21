import { createRouter, createWebHistory } from 'vue-router'
import FormPage from '../views/FormPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'form',
      component: FormPage
    },
  ]
})

export default router
