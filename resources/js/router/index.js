import { createRouter, createWebHistory } from 'vue-router'

const route = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'main',
      component: () => import('../views/main/index.vue')
    },
    {
      path: '/products',
      name: 'product.index',
      component: () => import('../views/product/index.vue')
    },
    {
      path: '/products/:id',
      name: 'product.show',
      component: () => import('../views/product/show.vue')
    },
    {
      path: '/cart',
      name: 'cart.index',
      component: () => import('../views/cart/index.vue')
    },
    {
      path: '/contacts',
      name: 'contact.index',
      component: () => import('../views/contact/index.vue')
    },
      {
          path: '/registration',
          name: 'registration',
          component: () => import('../views/auth/registration.vue')
      },
      {
          path: '/login',
          name: 'login',
          component: () => import('../views/auth/login.vue')
      },
      {
          path: '/account',
          name: 'account',
          component: () => import('../views/auth/account.vue')
      },
      {
          path: '/order',
          name: 'order',
          component: () => import('../views/order/index.vue')
      },
      {
          path: '/:pathMatch(.*)*',
          component: () => import('../views/error/index.vue'),
          name: '404',
      },
  ]
})

route.beforeEach((to, from, next) => {
        const accesToken = localStorage.getItem('access_token')

        if (!accesToken) {
            if ((to.name === 'account') || (to.name === 'order')) {
                return next({ name: 'login' })
            }
            else {
                return next()
            }
        }
        else {
            if (to.name === 'login' || to.name === 'registration') {
                return next({ name: 'account' })
            }
        }
    next()
})

export default route
