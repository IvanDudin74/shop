<script>

import api from "../../api";

export default {
  name: "show",

  data() {
    return{
      product: null,
        newReview: null,
        reviews: null,
        currentUser: null,
    }
  },

  mounted() {
    $(document).trigger('upload')
    this.getProduct()
      this.getReviews()
      this.getCurrentUser()
  },

  methods: {
    getProduct() {
      this.axios.get(`/api/products/${this.$route.params.id}`)
          .then(res => {
            this.product = res.data.data
          })
          .finally(f => {
            $(document).trigger('upload')
          })
    },

      addProductToCart(product) {
          let cart = localStorage.getItem('cart')
          let quantity = 1;
          if (document.getElementById('quantity')) {
              quantity = document.getElementById('quantity').value
          }
          let newProduct = [
              {
                  'id' : product.id,
                  'title' : product.title,
                  'product_images' : product.product_images,
                  'price' : product.price,
                  'quantity' : quantity
              }
          ]
          if (cart) {
              cart = JSON.parse(cart)
              cart.forEach(productInCart => {
                  if (productInCart.id === product.id) {
                      productInCart.quantity = Number(productInCart.quantity) + Number(quantity)
                      newProduct = null
                  }
              })
              Array.prototype.push.apply(cart, newProduct)
              localStorage.cart = JSON.stringify(cart)
          }
          else {
              localStorage.cart = JSON.stringify(newProduct)
          }
          this.$router.push({ name: 'product.index' })
      },

      sendReview() {
        api.post('/api/auth/reviews/', {
            content: this.newReview,
            product_id: this.product.id,
        })
            .then(res => {
                this.getReviews()
                document.getElementById('write_review').style.display = 'none'
            })
      },

      getReviews() {
        this.axios.post('/api/reviews', { product_id: this.$route.params.id })
            .then(res => {
                this.reviews = res.data.data
            })
      },

      getCurrentUser() {
          api.get('/api/auth/account')
              .then(res => {
                  this.currentUser = res.data.data
              })
      },

      deleteReview(id) {
          api.delete(`/api/auth/reviews/${id}`)
                .then(res => {
                    this.getReviews()
                })
      },
  }
}
</script>

<template>
  <div>
    <main v-if="product">
      <!--Start Shop Details Breadcrumb-->
      <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="shop-details-inner">
                <ul class="shop-details-menu">
                  <li><router-link to="/">Главная</router-link></li>
                  <li><router-link to="/products">Товары</router-link></li>
                  <li class="active">О товаре</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Shop Details Breadcrumb-->
      <!--Start Shop Details Top-->
      <section class="shop-details-top two ">
        <div class="container">
          <div class="row mt--30">
            <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
              <div v-if="product.product_images" class="single-product-box one">
                <div class="big-product single-product-one slider-for">
                  <div v-for="image in product.product_images">
                    <div class="single-item">
                      <img :src="image.url" alt="">
                      <div class="ptag">
                        <span class="one">-20% </span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="navholder">
                  <div class="product-slicknav single-product-one-nav slider-nav">
                    <div v-for="image in product.product_images">
                      <span class="single-item">
                        <img :src="image.url" alt="">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
              <div class="shop-details-top-right ">
                <div class="shop-details-top-right-content-box">
                  <div class="shop-details-top-title">
                    <h3>{{ product.title }}</h3>
                    <br>
                    <p>{{ product.description }}</p>
                  </div>
                  <div class="shop-details-top-price-box">
                    <h3>{{ product.price }} <del>{{ product.old_price }}</del> руб</h3>
                  </div>
                  <!--<div class="shop-details-top-size-box">
                    <h4>Size: (XS)</h4>
                    <div class="shop-details-top-size-list-box">
                      <ul class="shop-details-top-size-list">
                        <li><a href="#0">XS</a></li>
                        <li><a href="#0">S</a></li>
                        <li><a href="#0">M</a></li>
                        <li><a href="#0">XL</a></li>
                      </ul>
                      <p class="shop-details-top-size-guide"><a href="#0">Size Guide</a></p>
                    </div>
                  </div>-->
                  <div class="shop-details-top-color-sky-box">
                    <h4>Цвета: </h4>
                    <ul class="varients">
                      <li v-for="color in product.colors">
                          <div class="mr-3" :style="`display: inline-block; width: 15px; height: 15px; background: #${color.title}; border: 1px solid;`"></div>
                      </li>
                    </ul>
                  </div>
                  <div class="product-quantity">
                    <h4>Количество</h4>
                    <div class="product-quantity-box d-flex align-items-center flex-wrap">
                      <div class="qty mr-2">
                        <div class="qtySelector text-center">
                          <span class="decreaseQty"><i class="flaticon-minus"></i></span>
                          <input type="number" class="qtyValue" value="1" id="quantity"/>
                          <span class="increaseQty">
                            <i class="flaticon-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="shop-details-top-cart-box-btn">
                      <button @click.prevent="addProductToCart(product)" class="btn--primary style2 " type="submit">Добавить в корзину</button>
                  </div>
                  <br>
                  <br>
                  <ul class="shop-details-top-category-tags">
                    <li>Категория: <span v-if="product.category">{{ product.category.title }}</span></li>
                    <li>Теги:
                      <template v-for="tag in product.tags">
                        <span>{{ tag.title }}&nbsp;</span>
                      </template>
                    </li>
                  </ul>
                  <ul class="shop-details-top-feature">
                    <li>
                      <div class="icon"> <i class="flaticon-portfolio"></i> </div>
                      <div class="text">
                        <p>Гарантия возврата денег</p>
                      </div>
                    </li>
                    <li>
                      <div class="icon"> <i class="flaticon-truck"></i> </div>
                      <div class="text">
                        <p>Бесплатная доставка и возврат</p>
                      </div>
                    </li>
                    <li>
                      <div class="icon"> <i class="flaticon-security"></i> </div>
                      <div class="text">
                        <p>Удобная поддержка</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End Shop Details Top-->

      <!-- productdrescription-tabStart -->
      <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden ">
        <div class="container">
          <div class="row wow fadeInUp animated">
            <div class="col-12">
              <ul class="nav product-details-nav nav-one nav-pills justify-content-center" id="pills-tab-two" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                    Описание товара
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-sizechart-tab" data-bs-toggle="pill" data-bs-target="#pills-sizechart" type="button" role="tab" aria-controls="pills-sizechart" aria-selected="false">
                    Таблица размеров
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review" aria-selected="false">
                    Отзывы
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <div class="row wow fadeInUp animated">
            <div class="tab-content" id="pills-tabContent-two">
              <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                <div class="product-drescription">
                  <h4> Описание товара:</h4>
                  <p> {{ product.content }} </p>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-sizechart" role="tabpanel"
                   aria-labelledby="pills-sizechart-tab">
                <div class="product-drescription">
                  <div class="size-chirt">
                    <h4>Таблица размеров:</h4>
                    <div class="size-tabble">
                      <table>
                        <thead>
                        <tr>
                          <th>Size</th>
                          <th>XXS - XS</th>
                          <th>XS - S</th>
                          <th>S - M</th>
                          <th>M - L</th>
                          <th>L - XL</th>
                          <th>XL - XXL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Аргентина</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>12</td>
                        </tr>
                        <tr>
                          <td>Боливия</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>12</td>
                          <td>13</td>
                        </tr>
                        <tr>
                          <td>Колумбия</td>
                          <td>26</td>
                          <td>28</td>
                          <td>30</td>
                          <td>32</td>
                          <td>34</td>
                          <td>36</td>
                        </tr>
                        <tr>
                          <td>Китай</td>
                          <td>34</td>
                          <td>36</td>
                          <td>38</td>
                          <td>40</td>
                          <td>42</td>
                          <td>44</td>
                        </tr>
                        <tr>
                          <td>Мексика</td>
                          <td>32</td>
                          <td>34</td>
                          <td>36</td>
                          <td>38</td>
                          <td>40</td>
                          <td>42</td>
                        </tr>
                        <tr>
                          <td>Мехико</td>
                          <td>32</td>
                          <td>34</td>
                          <td>36</td>
                          <td>38</td>
                          <td>40</td>
                          <td>42</td>
                        </tr>
                        <tr>
                          <td>Австралия</td>
                          <td>6</td>
                          <td>8</td>
                          <td>10</td>
                          <td>12</td>
                          <td>14</td>
                          <td>16</td>
                        </tr>
                        <tr>
                          <td>США</td>
                          <td>33</td>
                          <td>44</td>
                          <td>55</td>
                          <td>66</td>
                          <td>77</td>
                          <td>88</td>
                        </tr>
                        <tr>
                          <td>Великобритания</td>
                          <td>6</td>
                          <td>8</td>
                          <td>10</td>
                          <td>12</td>
                          <td>14</td>
                          <td>16</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                <div class="product-drescription">
                  <div v-for="review in this.reviews" class="review-single">
                    <div class="left">
                      <div>
                          <span>
                              <b>{{ review.user_name }}</b> {{ review.created_at }}
                              <template v-if="currentUser">
                                  <i v-if="currentUser.id === review.user_id" @click.prevent="deleteReview(review.id)" title="Удалить комментарий" class="flaticon-cross" style="cursor: pointer"></i>
                              </template>
                          </span>
                      </div>
                        <p> {{ review.content }}</p>
                    </div>
                  </div>
                  <div id="write_review" class="review-from-box mt-30">
                    <h6>Write a Review</h6>
                    <form action="#" class="review-from">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group m-0">
                              <label for="email">BODY OF REVIEW (maximum 600 symbols)</label>
                              <textarea v-model="newReview" placeholder="Write Your Comments Here" maxlength="600"></textarea>
                          </div>
                        </div>
                      </div>
                        <button @click.prevent="sendReview" type="submit" class="btn--primary style2 ">Submit Review</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> <!-- productdrescription-tab End -->
    </main>
  </div>
</template>

<style>

</style>
