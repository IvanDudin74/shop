<script>

export default {
  name: "index",

  data() {
    return{
      productsInCart: [],
    }
  },

  mounted() {
    $(document).trigger('upload')
    window.scrollTo(0,0);
    this.getProductsFromStorage()
  },

  methods: {
    getProductsFromStorage() {
        if(localStorage.getItem('cart')) {
            this.productsInCart = localStorage.getItem('cart')
            this.productsInCart = JSON.parse(this.productsInCart)
        }
    },

    decreaseQuantity(productInCart) {
      if (productInCart.quantity === 1) {
        return
      }
      productInCart.quantity --
      this.updateStorage()
    },

    increaseQuantity(productInCart) {
      productInCart.quantity ++
      this.updateStorage()
    },

    deleteProductFromCart(id) {
      this.productsInCart = this.productsInCart.filter(productInCart => {
          return productInCart.id !== id
        })
      this.updateStorage()
    },

    updateStorage() {
      localStorage.cart = JSON.stringify(this.productsInCart)
    },
  },

    computed: {
        totalSum() {
            let sum = 0
            this.productsInCart.forEach(productInCart => {
                sum += productInCart.price * productInCart.quantity
            })
            return sum
        }
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
                <h2>Корзина</h2>
                <div class="breadcrumb-menu">
                  <ul>
                    <li><router-link to="/"><i class="flaticon-home pe-2"></i>Главная</router-link></li>
                    <li> <i class="flaticon-next"></i> </li>
                    <li class="active">Корзина</li>
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
          <p v-if="this.productsInCart.length === 0" class="align-content-center">
            Корзина пуста
          </p>
          <div v-if="this.productsInCart.length !== 0" class="row wow fadeInUp animated">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="cart-table-box">
                <div class="table-outer">
                  <table class="cart-table">
                    <thead class="cart-header">
                    <tr>
                      <th class="">Товар</th>
                      <th class="price">Цена, руб</th>
                      <th>Количество, шт</th>
                      <th>Подсумма, руб</th>
                      <th class="hide-me"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="productInCart in productsInCart">
                      <td>
                        <div class="thumb-box">
                          <router-link :to="{ name: 'product.show', params: { id : productInCart.id} }" class="thumb">
                            <img :src="productInCart.product_images[0].url" :alt="productInCart.title">
                          </router-link>
                          <router-link :to="`products/${productInCart.id}`" class="title">
                            <h5> {{ productInCart.title }} </h5>
                          </router-link>
                        </div>
                      </td>
                      <td>{{ productInCart.price }}</td>
                      <td class="qty">
                        <div class="qtySelector text-center">
                          <span @click.prevent="decreaseQuantity(productInCart)" class="decreaseQty"><i class="flaticon-minus"></i></span>
                          <input type="number" class="qtyValue" :value="productInCart.quantity" />
                          <span @click.prevent="increaseQuantity(productInCart)" class="increaseQty"> <i class="flaticon-plus"></i> </span>
                        </div>
                      </td>
                      <td class="sub-total">{{ productInCart.price * productInCart.quantity }}</td>
                      <td>
                        <div class="remove" @click.prevent="deleteProductFromCart(productInCart.id)"> <i class="flaticon-cross"></i> </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-xl-12">
              <div class="cart-button-box">
                <div class="cart-button-box-right wow fadeInUp animated">
                  <router-link class="btn--primary mt-30" type="submit" to="/products">Продолжить покупки</router-link>
                </div>
              </div>
            </div>
          </div>
          <div v-if="this.productsInCart.length !== 0" class="row mt--30">
            <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
              <div class="cart-check-out mt-30">
                <ul class="cart-check-out-list">
                  <li>
                    <div class="left">
                      <h3>Итого за товары, руб</h3>
                    </div>
                    <div class="right">
                      <p>{{ totalSum }}</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
              <div class="cart-button-box">
                  <div class="cart-button-box-right wow fadeInUp animated">
                      <router-link class="btn--primary mt-30" :to="{ name: 'order' }">Оформить заказ</router-link>
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
