<script>

import api from "../../api";

export default {
  name: "index",

  data() {
    return{
      productsInCart: [],
      totalSum : 0,
    }
  },

  mounted() {
    $(document).trigger('upload')
    window.scrollTo(0,0);
    this.getProductsFromStorage()
    this.getTotalSum()
      this.createOrder()
  },


  methods: {
    getProductsFromStorage() {
        if(localStorage.getItem('cart')) {
            this.productsInCart = localStorage.getItem('cart')
            this.productsInCart = JSON.parse(this.productsInCart)
        }
    },

    getTotalSum() {
        this.totalSum = 0
        this.productsInCart.forEach(productInCart => {
            this.totalSum += productInCart.price * productInCart.quantity
        })
    },

      createOrder() {
        api.post('/api/auth/orders/', {
            products: JSON.stringify(this.productsInCart),
            total_sum: this.totalSum,
        })
            .then(res => {
            })
            .catch(error => {
            })
      },

  }
}
</script>

<template>
  <div>
    <main class="overflow-hidden ">
      <!--Start Breadcrumb Style2-->
      <section class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg.png);">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="breadcrumb-content text-center wow fadeInUp animated">
                <h2>Оформление заказа</h2>
                <div class="breadcrumb-menu">
                  <ul>
                    <li><router-link to="/"><i class="flaticon-home pe-2"></i>Главная</router-link></li>
                    <li> <i class="flaticon-next"></i> </li>
                    <li class="active">Оформление заказа</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End Breadcrumb Style2-->
      <!--Start cart area-->
      <section class="cart-area pt-120 pb-120">
        <div class="container">
          <div class="row wow fadeInUp animated">
          </div>
          <div class="row mb-3">
          </div>
          <div class="row mt--30">
            <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
              <div class="cart-check-out mt-30">
                <h3>Итоги:</h3>
                <ul class="cart-check-out-list">
                  <li>
                    <div class="left">
                      <p>Итого за товары, руб</p>
                    </div>
                    <div class="right">
                      <p>{{ this.totalSum }}</p>
                    </div>
                  </li>
                  <li>
                    <div class="left">
                      <p>Доставка, руб</p>
                    </div>
                    <div class="right">
                      <p>0</p>
                    </div>
                  </li>
                  <li>
                    <div class="left">
                      <p>ИТОГО, руб:</p>
                    </div>
                    <div class="right">
                      <p>{{ this.totalSum }}</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
              <div class="cart-button-box">
                  <div class="cart-button-box-right wow fadeInUp animated">
                      <a href="#" class="btn--primary mt-30">Оплатить</a>
                  </div>
              </div>
          </div>
        </div>
      </section>
      <!--End cart area-->
    </main>
  </div>
</template>

<style>

</style>
