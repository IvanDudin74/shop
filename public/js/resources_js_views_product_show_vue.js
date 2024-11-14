"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_product_show_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/product/show.vue?vue&type=script&lang=js":
/*!*************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/product/show.vue?vue&type=script&lang=js ***!
  \*************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../api */ "./resources/js/api.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "show",
  data: function data() {
    return {
      product: null,
      newReview: null,
      reviews: null,
      currentUser: null
    };
  },
  mounted: function mounted() {
    $(document).trigger('upload');
    this.getProduct();
    this.getReviews();
    this.getCurrentUser();
  },
  methods: {
    getProduct: function getProduct() {
      var _this = this;
      this.axios.get("/api/products/".concat(this.$route.params.id)).then(function (res) {
        _this.product = res.data.data;
      })["finally"](function (f) {
        $(document).trigger('upload');
      });
    },
    addProductToCart: function addProductToCart(product) {
      var cart = localStorage.getItem('cart');
      var quantity = 1;
      if (document.getElementById('quantity')) {
        quantity = document.getElementById('quantity').value;
      }
      var newProduct = [{
        'id': product.id,
        'title': product.title,
        'product_images': product.product_images,
        'price': product.price,
        'quantity': quantity
      }];
      if (cart) {
        cart = JSON.parse(cart);
        cart.forEach(function (productInCart) {
          if (productInCart.id === product.id) {
            productInCart.quantity = Number(productInCart.quantity) + Number(quantity);
            newProduct = null;
          }
        });
        Array.prototype.push.apply(cart, newProduct);
        localStorage.cart = JSON.stringify(cart);
      } else {
        localStorage.cart = JSON.stringify(newProduct);
      }
      this.$router.push({
        name: 'product.index'
      });
    },
    sendReview: function sendReview() {
      var _this2 = this;
      _api__WEBPACK_IMPORTED_MODULE_0__["default"].post('/api/auth/reviews/', {
        content: this.newReview,
        product_id: this.product.id
      }).then(function (res) {
        _this2.getReviews();
        document.getElementById('write_review').style.display = 'none';
      });
    },
    getReviews: function getReviews() {
      var _this3 = this;
      this.axios.post('/api/reviews', {
        product_id: this.$route.params.id
      }).then(function (res) {
        _this3.reviews = res.data.data;
      });
    },
    getCurrentUser: function getCurrentUser() {
      var _this4 = this;
      _api__WEBPACK_IMPORTED_MODULE_0__["default"].get('/api/auth/account').then(function (res) {
        _this4.currentUser = res.data.data;
      });
    },
    deleteReview: function deleteReview(id) {
      var _this5 = this;
      _api__WEBPACK_IMPORTED_MODULE_0__["default"]["delete"]("/api/auth/reviews/".concat(id)).then(function (res) {
        _this5.getReviews();
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/product/show.vue?vue&type=template&id=0c4f2bc8":
/*!*****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/product/show.vue?vue&type=template&id=0c4f2bc8 ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  key: 0
};
var _hoisted_2 = {
  "class": "shop-details-breadcrumb wow fadeInUp animated overflow-hidden"
};
var _hoisted_3 = {
  "class": "container"
};
var _hoisted_4 = {
  "class": "row"
};
var _hoisted_5 = {
  "class": "col-xl-12"
};
var _hoisted_6 = {
  "class": "shop-details-inner"
};
var _hoisted_7 = {
  "class": "shop-details-menu"
};
var _hoisted_8 = {
  "class": "shop-details-top two"
};
var _hoisted_9 = {
  "class": "container"
};
var _hoisted_10 = {
  "class": "row mt--30"
};
var _hoisted_11 = {
  "class": "col-xl-6 col-lg-6 mt-30 wow fadeInUp animated"
};
var _hoisted_12 = {
  key: 0,
  "class": "single-product-box one"
};
var _hoisted_13 = {
  "class": "big-product single-product-one slider-for"
};
var _hoisted_14 = {
  "class": "single-item"
};
var _hoisted_15 = ["src"];
var _hoisted_16 = {
  "class": "navholder"
};
var _hoisted_17 = {
  "class": "product-slicknav single-product-one-nav slider-nav"
};
var _hoisted_18 = {
  "class": "single-item"
};
var _hoisted_19 = ["src"];
var _hoisted_20 = {
  "class": "col-xl-6 col-lg-6 mt-30 wow fadeInUp animated"
};
var _hoisted_21 = {
  "class": "shop-details-top-right"
};
var _hoisted_22 = {
  "class": "shop-details-top-right-content-box"
};
var _hoisted_23 = {
  "class": "shop-details-top-title"
};
var _hoisted_24 = {
  "class": "shop-details-top-price-box"
};
var _hoisted_25 = {
  "class": "shop-details-top-color-sky-box"
};
var _hoisted_26 = {
  "class": "varients"
};
var _hoisted_27 = {
  "class": "shop-details-top-cart-box-btn"
};
var _hoisted_28 = {
  "class": "shop-details-top-category-tags"
};
var _hoisted_29 = {
  key: 0
};
var _hoisted_30 = {
  "class": "product pt-60 pb-60 wow fadeInUp overflow-hidden"
};
var _hoisted_31 = {
  "class": "container"
};
var _hoisted_32 = {
  "class": "row wow fadeInUp animated"
};
var _hoisted_33 = {
  "class": "tab-content",
  id: "pills-tabContent-two"
};
var _hoisted_34 = {
  "class": "tab-pane fade show active",
  id: "pills-description",
  role: "tabpanel",
  "aria-labelledby": "pills-description-tab"
};
var _hoisted_35 = {
  "class": "product-drescription"
};
var _hoisted_36 = {
  "class": "tab-pane fade",
  id: "pills-review",
  role: "tabpanel",
  "aria-labelledby": "pills-review-tab"
};
var _hoisted_37 = {
  "class": "product-drescription"
};
var _hoisted_38 = {
  "class": "review-single"
};
var _hoisted_39 = {
  "class": "left"
};
var _hoisted_40 = ["onClick"];
var _hoisted_41 = {
  id: "write_review",
  "class": "review-from-box mt-30"
};
var _hoisted_42 = {
  action: "#",
  "class": "review-from"
};
var _hoisted_43 = {
  "class": "row"
};
var _hoisted_44 = {
  "class": "col-12"
};
var _hoisted_45 = {
  "class": "form-group m-0"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_router_link = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("router-link");
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [$data.product ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("main", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("Start Shop Details Breadcrumb"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
    to: "/"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return _cache[3] || (_cache[3] = [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Главная")]);
    }),
    _: 1 /* STABLE */
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
    to: "/products"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return _cache[4] || (_cache[4] = [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Товары")]);
    }),
    _: 1 /* STABLE */
  })]), _cache[5] || (_cache[5] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", {
    "class": "active"
  }, "О товаре", -1 /* HOISTED */))])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("End Shop Details Breadcrumb"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("Start Shop Details Top"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("section", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [$data.product.product_images ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_12, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.product.product_images, function (image) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
      src: image.url,
      alt: ""
    }, null, 8 /* PROPS */, _hoisted_15), _cache[6] || (_cache[6] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
      "class": "ptag"
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
      "class": "one"
    }, "-20% ")], -1 /* HOISTED */))])]);
  }), 256 /* UNKEYED_FRAGMENT */))]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.product.product_images, function (image) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
      src: image.url,
      alt: ""
    }, null, 8 /* PROPS */, _hoisted_19)])]);
  }), 256 /* UNKEYED_FRAGMENT */))])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_23, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.product.title), 1 /* TEXT */), _cache[7] || (_cache[7] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.product.description), 1 /* TEXT */)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_24, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.product.price) + " ", 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("del", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.product.old_price), 1 /* TEXT */), _cache[8] || (_cache[8] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" руб"))])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("<div class=\"shop-details-top-size-box\">\n                    <h4>Size: (XS)</h4>\n                    <div class=\"shop-details-top-size-list-box\">\n                      <ul class=\"shop-details-top-size-list\">\n                        <li><a href=\"#0\">XS</a></li>\n                        <li><a href=\"#0\">S</a></li>\n                        <li><a href=\"#0\">M</a></li>\n                        <li><a href=\"#0\">XL</a></li>\n                      </ul>\n                      <p class=\"shop-details-top-size-guide\"><a href=\"#0\">Size Guide</a></p>\n                    </div>\n                  </div>"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [_cache[9] || (_cache[9] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", null, "Цвета: ", -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_26, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.product.colors, function (color) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
      "class": "mr-3",
      style: (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeStyle)("display: inline-block; width: 15px; height: 15px; background: #".concat(color.title, "; border: 1px solid;"))
    }, null, 4 /* STYLE */)]);
  }), 256 /* UNKEYED_FRAGMENT */))])]), _cache[12] || (_cache[12] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"product-quantity\"><h4>Количество</h4><div class=\"product-quantity-box d-flex align-items-center flex-wrap\"><div class=\"qty mr-2\"><div class=\"qtySelector text-center\"><span class=\"decreaseQty\"><i class=\"flaticon-minus\"></i></span><input type=\"number\" class=\"qtyValue\" value=\"1\" id=\"quantity\"><span class=\"increaseQty\"><i class=\"flaticon-plus\"></i></span></div></div></div></div><br>", 2)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: _cache[0] || (_cache[0] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
      return $options.addProductToCart($data.product);
    }, ["prevent"])),
    "class": "btn--primary style2",
    type: "submit"
  }, "Добавить в корзину")]), _cache[13] || (_cache[13] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */)), _cache[14] || (_cache[14] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_28, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [_cache[10] || (_cache[10] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Категория: ")), $data.product.category ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_29, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.product.category.title), 1 /* TEXT */)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [_cache[11] || (_cache[11] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Теги: ")), ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.product.tags, function (tag) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(tag.title) + " ", 1 /* TEXT */);
  }), 256 /* UNKEYED_FRAGMENT */))])]), _cache[15] || (_cache[15] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<ul class=\"shop-details-top-feature\"><li><div class=\"icon\"><i class=\"flaticon-portfolio\"></i></div><div class=\"text\"><p>Гарантия возврата денег</p></div></li><li><div class=\"icon\"><i class=\"flaticon-truck\"></i></div><div class=\"text\"><p>Бесплатная доставка и возврат</p></div></li><li><div class=\"icon\"><i class=\"flaticon-security\"></i></div><div class=\"text\"><p>Удобная поддержка</p></div></li></ul>", 1))])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("End Shop Details Top"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" productdrescription-tabStart "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("section", _hoisted_30, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [_cache[20] || (_cache[20] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "row wow fadeInUp animated"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "col-12"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", {
    "class": "nav product-details-nav nav-one nav-pills justify-content-center",
    id: "pills-tab-two",
    role: "tablist"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", {
    "class": "nav-item",
    role: "presentation"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "nav-link active",
    id: "pills-description-tab",
    "data-bs-toggle": "pill",
    "data-bs-target": "#pills-description",
    type: "button",
    role: "tab",
    "aria-controls": "pills-description",
    "aria-selected": "true"
  }, " Описание товара ")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", {
    "class": "nav-item",
    role: "presentation"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "nav-link",
    id: "pills-sizechart-tab",
    "data-bs-toggle": "pill",
    "data-bs-target": "#pills-sizechart",
    type: "button",
    role: "tab",
    "aria-controls": "pills-sizechart",
    "aria-selected": "false"
  }, " Таблица размеров ")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", {
    "class": "nav-item",
    role: "presentation"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "nav-link",
    id: "pills-review-tab",
    "data-bs-toggle": "pill",
    "data-bs-target": "#pills-review",
    type: "button",
    role: "tab",
    "aria-controls": "pills-review",
    "aria-selected": "false"
  }, " Отзывы ")])])])], -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_33, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_34, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [_cache[16] || (_cache[16] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", null, " Описание товара:", -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.product.content), 1 /* TEXT */)])]), _cache[19] || (_cache[19] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "tab-pane fade",
    id: "pills-sizechart",
    role: "tabpanel",
    "aria-labelledby": "pills-sizechart-tab"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "product-drescription"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "size-chirt"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", null, "Таблица размеров:"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "size-tabble"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("table", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("thead", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "Size"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "XXS - XS"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "XS - S"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "S - M"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "M - L"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "L - XL"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "XL - XXL")])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tbody", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Аргентина"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "7"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "8"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "9"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "10"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "11"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "12")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Боливия"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "8"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "9"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "10"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "11"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "12"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "13")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Колумбия"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "26"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "28"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "30"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "32"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "34"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "36")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Китай"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "34"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "36"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "38"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "40"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "42"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "44")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Мексика"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "32"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "34"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "36"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "38"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "40"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "42")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Мехико"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "32"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "34"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "36"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "38"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "40"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "42")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Австралия"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "6"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "8"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "10"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "12"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "14"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "16")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "США"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "33"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "44"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "55"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "66"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "77"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "88")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "Великобритания"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "6"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "8"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "10"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "12"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "14"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, "16")])])])])])])], -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(this.reviews, function (review) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_38, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_39, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(review.user_name), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(review.created_at) + " ", 1 /* TEXT */), $data.currentUser ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
      key: 0
    }, [$data.currentUser.id === review.user_id ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("i", {
      key: 0,
      onClick: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
        return $options.deleteReview(review.id);
      }, ["prevent"]),
      title: "Удалить комментарий",
      "class": "flaticon-cross",
      style: {
        "cursor": "pointer"
      }
    }, null, 8 /* PROPS */, _hoisted_40)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)], 64 /* STABLE_FRAGMENT */)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(review.content), 1 /* TEXT */)])]);
  }), 256 /* UNKEYED_FRAGMENT */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_41, [_cache[18] || (_cache[18] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h6", null, "Write a Review", -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", _hoisted_42, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_43, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_44, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_45, [_cache[17] || (_cache[17] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
    "for": "email"
  }, "BODY OF REVIEW (maximum 600 symbols)", -1 /* HOISTED */)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("textarea", {
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $data.newReview = $event;
    }),
    placeholder: "Write Your Comments Here",
    maxlength: "600"
  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $data.newReview]])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: _cache[2] || (_cache[2] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.sendReview && $options.sendReview.apply($options, arguments);
    }, ["prevent"])),
    type: "submit",
    "class": "btn--primary style2"
  }, "Submit Review")])])])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" productdrescription-tab End ")])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]);
}

/***/ }),

/***/ "./resources/js/api.js":
/*!*****************************!*\
  !*** ./resources/js/api.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var _router__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./router */ "./resources/js/router/index.js");


var api = axios__WEBPACK_IMPORTED_MODULE_1__["default"].create();

//start request
api.interceptors.request.use(function (config) {
  if (localStorage.getItem('access_token')) {
    config.headers.authorization = "Bearer ".concat(localStorage.getItem('access_token'));
  }
  return config;
}, function (error) {});
//end request

//start response
api.interceptors.response.use({}, function (error) {
  if (error.response) {
    if (error.response.data.message === 'Token has expired') {
      return axios__WEBPACK_IMPORTED_MODULE_1__["default"].post('/api/auth/refresh', {}, {
        headers: {
          'authorization': "Bearer ".concat(localStorage.getItem('access_token'))
        }
      }).then(function (res) {
        localStorage.access_token = res.data.access_token;
        error.config.headers.authorization = "Bearer ".concat(res.data.access_token);
        return api.request(error.config);
      });
    }
  }
  if (!localStorage.getItem('access_token')) {
    _router__WEBPACK_IMPORTED_MODULE_0__["default"].push({
      name: 'login'
    });
  }
});
//end response

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (api);

/***/ }),

/***/ "./resources/js/views/product/show.vue":
/*!*********************************************!*\
  !*** ./resources/js/views/product/show.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _show_vue_vue_type_template_id_0c4f2bc8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./show.vue?vue&type=template&id=0c4f2bc8 */ "./resources/js/views/product/show.vue?vue&type=template&id=0c4f2bc8");
/* harmony import */ var _show_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./show.vue?vue&type=script&lang=js */ "./resources/js/views/product/show.vue?vue&type=script&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_show_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_show_vue_vue_type_template_id_0c4f2bc8__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/product/show.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/product/show.vue?vue&type=script&lang=js":
/*!*********************************************************************!*\
  !*** ./resources/js/views/product/show.vue?vue&type=script&lang=js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_show_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_show_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./show.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/product/show.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/product/show.vue?vue&type=template&id=0c4f2bc8":
/*!***************************************************************************!*\
  !*** ./resources/js/views/product/show.vue?vue&type=template&id=0c4f2bc8 ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_show_vue_vue_type_template_id_0c4f2bc8__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_show_vue_vue_type_template_id_0c4f2bc8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./show.vue?vue&type=template&id=0c4f2bc8 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/product/show.vue?vue&type=template&id=0c4f2bc8");


/***/ })

}]);