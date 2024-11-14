<script>
export default {
  name: "index",

  data() {
    return {
      products: [],
      popupProduct: null,
      filterList: [],
      categories: [],
      colors: [],
      tags: [],
      prices: [],
        title: null,
        sort: 0,
        pagination: [],
    }
  },

  mounted() {
    $(document).trigger('upload')
    this.getProducts()
    this.getFilterList()
  },

  methods: {
    getProducts(page = 1) {
      this.axios.post("/api/products", {
        'categories' : this.categories,
        'colors' : this.colors,
        'tags' : this.tags,
        'prices' : this.prices,
        'sort' : this.sort,
        'page' : page,
          'title' : this.title,
      })
          .then(res => {
              this.products = res.data.data
              this.pagination = res.data.meta
          })
          .finally(f => {
            $(document).trigger('upload')
          })
    },

    getProduct(id) {
      this.axios.get(`/api/products/${id}`)
          .then(res => {
            this.popupProduct = res.data.data
          })
          .finally(f => {
            $(document).trigger('upload')
          })
    },

    getFilterList() {
      this.axios.get('/api/products/filters')
          .then(res => {
            this.filterList = res.data;
            //  Price Filter
            if ($("#price-range").length) {
              $("#price-range").slider({
                range: true,
                min: this.filterList.price.min,
                max: this.filterList.price.max,
                values: [this.filterList.price.min, this.filterList.price.max],
                slide: function (event, ui) {
                  $("#priceRange").val(ui.values[0] + " - " + ui.values[1]);
                }
              });
              $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));
            };
          })
          .finally(f => {
            $(document).trigger('upload')
          })
    },

    filter() {
      let prices = $('#priceRange').val()
      prices = prices.replaceAll(' ', '')
      prices = prices.replaceAll('$', '')
      prices = prices.split('-')
      this.prices = prices
      this.getProducts()
    },

    addColor(colorId) {
      if (!this.colors.includes(colorId)) {
        this.colors.push(colorId)
        document.getElementById('color' + colorId).style.height = '55px'
        document.getElementById('color' + colorId).style.width = '55px'
      }
      else {
        document.getElementById('color' + colorId).style.height = '45px'
        document.getElementById('color' + colorId).style.width = '45px'
        this.colors = this.colors.filter(elem => {
          return elem !== colorId
        })
      }
    },

    addTag(tagId) {
      if (!this.tags.includes(tagId)) {
        this.tags.push(tagId)
        document.getElementById('tag' + tagId).style.background = '#ccc'
      }
      else {
        document.getElementById('tag' + tagId).style.background = '#eee'
        this.tags = this.tags.filter(elem => {
          return elem !== tagId
        })
      }
    },

      resetFilters() {
        this.categories = []
        //reset filter colors
          this.colors.forEach(colorId => {
              document.getElementById('color' + colorId).style.height = '45px'
              document.getElementById('color' + colorId).style.width = '45px'
          })
        this.colors = []
          //reset filter tags
          this.tags.forEach(tagId => {
              document.getElementById('tag' + tagId).style.background = '#eee'
          })
        this.tags = []
          //reset filter prices
          if ($("#price-range").length) {
              $("#price-range").slider({
                  range: true,
                  min: this.filterList.price.min,
                  max: this.filterList.price.max,
                  values: [this.filterList.price.min, this.filterList.price.max],
                  slide: function (event, ui) {
                      $("#priceRange").val(ui.values[0] + " - " + ui.values[1]);
                  }
              });
              $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));
          };
          $(document).trigger('upload')
        this.prices = []
          //reset filter title
        this.title = null
          //update results
          this.getProducts()
      },

    addProductToCart(product) {
      let cart = localStorage.getItem('cart')
      let quantity = 1;
      if (document.getElementById('quantity' + product.id)) {
        quantity = document.getElementById('quantity' + product.id).value
        document.getElementById('quantity' + product.id).value = 1
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
      document.getElementById('add_cart' + product.id).innerHTML = 'Добавлено'
        let el = document.getElementById('add_cart_popup' + product.id)
        if (el) {
            el.innerHTML = 'Добавлено'
        }
    },

  }
}
</script>

<template>
  <div>
    <main class="overflow-hidden ">
      <!--Start Breadcrumb Style2-->
      <div class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg.png);">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                <h2>Сетка товаров</h2>
                <div class="breadcrumb-menu">
                  <ul>
                    <li><router-link to="/"><i class="flaticon-home pe-2"></i>Главная</router-link></li>
                    <li> <i class="flaticon-next"></i> </li>
                    <li class="active">Товары</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Breadcrumb Style2-->
      <!--Start Product Categories One-->
      <section class="product-categories-one pb-60">
      </section>
      <!--End Product Categories One-->
      <!--Start product-grid-->
      <div class="product-grid pt-60 pb-120">
        <div class="container">
          <div class="row gx-4">
            <div class="col-xl-3 col-lg-4">
              <div class="shop-grid-sidebar">
                <button class="remove-sidebar d-lg-none d-block">
                  <i class="flaticon-cross"></i>
                </button>
                <div class="sidebar-holder">
                  <form action="#0" class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated">
                    <div class="footer-input-box p-0 ">
                      <input type="text" placeholder="Enter word" v-model="title">
                      <button type="submit" class="subscribe_btn" @click.prevent="filter">
                        <i class="flaticon-magnifying-glass"></i>
                      </button>
                    </div>
                  </form>
                  <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                    <h4>Выбирите категорию:</h4>
                    <div class="checkbox-item">
                      <form v-if="this.filterList.categories" v-for="category in this.filterList.categories">
                        <div class="form-group">
                          <input type="checkbox" :id="category.id" v-model="categories" :value="category.id">
                          <label :for="category.id">{{ category.title }}</label>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                    <h4>Выбирите цвет: </h4>
                    <ul  class="color-option">
                      <li v-if="filterList.colors" v-for="color in filterList.colors">
                        <a href="#0" @click.prevent="addColor(color.id)" class="color-option-single" :style="`background: #${color.title}`" :id="`color${color.id}`">
                          <span> {{ color.title }}</span>
                        </a>
                      </li>
                    </ul>
                  </div>

                  <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                    <h4>Цена</h4>
                    <div class="slider-box">
                      <div id="price-range" class="slider"></div>
                      <div class="output-price">
                        <label for="priceRange" style="width: 110px">Цена, руб:</label>
                        <input type="text" id="priceRange" readonly>
                      </div>
                      <button class="filterbtn" type="submit" @click.prevent="filter"> Поиск </button> &nbsp;&nbsp;
                        <button class="filterbtn" type="submit" @click.prevent="resetFilters"> Сброс </button>
                    </div>
                  </div>

                  <div class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0 ">
                    <h4>Теги </h4>
                    <ul class="popular-tag">
                      <li v-if="filterList.tags" v-for="tag in filterList.tags">
                        <a href="#0" @click.prevent="addTag(tag.id)" :id="`tag${tag.id}`">{{ tag.title }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9 col-lg-8">
              <div class="row">
                <div class="col-xl-12">
                  <div class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                    <div class="left-box wow fadeInUp animated">
                        <template v-if="products">
                            <p v-if="products.length > 0">
                                Показано {{ this.pagination.from }} –
                                {{ this.pagination.to }} позиций из
                                {{ this.pagination.total }}
                            </p>
                        </template>
                        <template v-if="products">
                            <p v-if="products.length == 0">
                                Ничего не нашлось
                            </p>
                        </template>
                    </div>
                    <div class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                      <div>
                        <input type="radio" id="sort0" v-model="sort" value="0" @change.prevent="filter()" style="width:30px"> <label for="sort0">Показывать в случайном порядке</label><br>
                        <input type="radio" id="sort1" v-model="sort" value="1" @change.prevent="filter()" style="width:30px"> <label for="sort1">Сортировать по возрастанию цены</label><br>
                        <input type="radio" id="sort2" v-model="sort" value="2" @change.prevent="filter()" style="width:30px"> <label for="sort2">Сортировать по убыванию цены</label><br>
                      </div>
                      <!--<div class="short-by">
                        <div class="select-box">
                          <select class="wide" name="sort" id="sort" @change.prevent="filter()" v-model="sort">
                            <option value="1">Price, low to high</option>
                            <option value="2">Price, high to low</option>
                          </select>
                        </div>
                      </div>-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                         aria-labelledby="pills-grid-tab">
                      <div class="row">

                        <div v-for="product in products" class="col-xl-4 col-lg-6 col-6 ">
                          <div class="products-three-single w-100  mt-30">
                            <div class="products-three-single-img">
                              <a href="shop-details-3.html" class="d-block">
                                <img v-if="product.product_images[0]" :src="product.product_images[0].url" class="first-img" alt="" />
                                  <img v-if="product.product_images[1]" :src="product.product_images[1].url" alt="" class="hover-img" />
                                  <img v-if="(!product.product_images[1]) && product.product_images[0]" :src="product.product_images[0].url" alt="" class="hover-img" />
                              </a>
                              <div class="products-grid-one__badge-box">
                                <span class="bg_base badge new ">New</span>
                              </div>
                              <a @click.prevent="addProductToCart(product)" href="cart.html" class="addcart btn--primary style2" :id="`add_cart${ product.id }`"> в корзину</a>
                              <div class="products-grid__usefull-links">
                                <ul>
                                  <li>
                                    <a :href="`#popup${ product.id }`" @click="getProduct(product.id)" class="popup_link">
                                      <i class="flaticon-visibility"></i>
                                      <span> quick view</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div :id="`popup${ product.id }`" class="product-gird__quick-view-popup mfp-hide">
                              <div v-if="popupProduct" class="container">
                                <div class="row justify-content-between align-items-center">
                                  <div class="col-lg-6">
                                    <div class="quick-view__left-content">
                                      <div class="tabs">
                                        <div class="popup-product-thumb-box">
                                          <ul>
                                            <li v-for="product_image in popupProduct.product_images" class="tab-nav popup-product-thumb">
                                              <a :href="`#tabb${product_image.id}`">
                                                <img :src="product_image.url" alt="" />
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="popup-product-main-image-box">
                                          <div v-for="product_image in popupProduct.product_images" :id="`tabb${product_image.id}`" class="tab-item popup-product-image">
                                            <div class="popup-product-single-image">
                                              <img :src="product_image.url" alt="" />
                                            </div>
                                          </div>
                                            <button v-if="popupProduct.product_images.length > 1" class="prev">
                                              <i class="flaticon-back"></i>
                                            </button>
                                            <button v-if="popupProduct.product_images.length > 1" class="next">
                                              <i class="flaticon-next"></i>
                                            </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="popup-right-content">
                                      <h3>{{ popupProduct.title }}</h3>
                                      <p class="text">
                                        {{ popupProduct.description }}
                                      </p>
                                      <div class="price">
                                        <h2><del>{{ popupProduct.old_price }}</del> {{ popupProduct.price }} руб</h2>
                                        <!--<h6>In stuck</h6>-->
                                      </div>
                                      <div v-for="color in popupProduct.colors" class="color-varient">
                                        <a :style="`background: #${ color.title }`">
                                          <span>{{ color.title }}</span>
                                        </a>
                                      </div>

                                      <div class="add-product">
                                        <h6>Qty:</h6>
                                        <div class="button-group">
                                          <div class="qtySelector text-center">
                                            <span class="decreaseQty">
                                              <i class="flaticon-minus"></i>
                                            </span>
                                            <input type="number" class="qtyValue" value="1" :id="`quantity${popupProduct.id}`"/>
                                            <span class="increaseQty" @click.prevent="increaseQuantity()">
                                              <i class="flaticon-plus"></i>
                                            </span>
                                          </div>
                                          <button class="btn--primary " @click.prevent="addProductToCart(popupProduct)" :id="`add_cart_popup${ popupProduct.id }`"> в корзину </button>
                                        </div>
                                      </div>

                                      <div class="payment-method">
                                        <img src="assets/images/payment_method/method_1.png" alt=""> &nbsp;
                                        <img src="assets/images/payment_method/method_2.png" alt=""> &nbsp;
                                        <img src="assets/images/payment_method/method_3.png" alt=""> &nbsp;
                                        <img src="assets/images/payment_method/method_4.png" alt="">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="products-three-single-content text-center">
                              <span v-if="product.category">{{ product.category.title }}</span>
                              <h5><router-link :to="{ name: 'product.show', params: { id: product.id } }">{{ product.title }}</router-link></h5>
                              <p><del>{{ product.old_price }}</del> {{ product.price }} руб</p>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <template v-if="pagination">
                    <div class="row" v-if="pagination.last_page > 1">
                        <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                            <ul class="pagination text-center">
                                <li v-if="pagination.current_page !== 1" class="next">
                                    <a href="#0" @click.prevent="getProducts(pagination.current_page - 1)">
                                        <i class="flaticon-left-arrows" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li v-for="link in this.pagination.links">
                                    <template v-if="Number(link.label) &&
                      ((Math.abs(pagination.current_page - link.label) < 2)
                      || (link.label == 1) || (link.label == pagination.last_page))">
                                        <a :class="(link.active) ? 'active' : ''" @click.prevent="getProducts(link.label)" href="#0">{{ link.label }}</a>
                                    </template>
                                    <template v-if="Number(link.label) &&
                      ((Math.abs(pagination.current_page - link.label) === 2) && (link.label != 1) && (link.label != pagination.last_page))">
                                        <a>...</a>
                                    </template>
                                </li>
                                <li v-if="pagination.current_page !== pagination.last_page" class="next">
                                    <a href="#0" @click.prevent="getProducts(pagination.current_page + 1)">
                                        <i class="flaticon-next-1" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </template>
            </div>
          </div>
        </div>
      </div>
      <!--End product-grid-->
    </main>
  </div>
</template>

<style>

</style>
