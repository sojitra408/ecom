<template>
  <div>
  <header-view :settings.sync="settings"></header-view>
    <!--banner section-->
    <section class="fashion_lifestyle_bg beauty-wellness-secton-bg">
       <div class="beauty-wellness-before-bgimage" v-bind:style="{'background': 'url('+slider.img1+') no-repeat'}"></div>
       <div class="beauty-wellness-after-bgimage" v-bind:style="{'background': 'url('+slider.img2+') no-repeat'}"></div>
        <div class="beauty-wellness-content">
            <div class="beauty-wellness-middle">
              <p>{{slider.heading}}</p>
              <h1>{{slider.title}}</h1>
              <div class="beauty-wellness-delivering-text"> <span>{{slider.description}}</span></div>
              <div class="beauty-wellness-scroll-dwon"><span>Scroll</span></div>
              <img class="beauty-wellness-comb" src="front/assets/images/comb_2.png">
              <img class="beauty-wellness-surfer" src="front/assets/images/3-surfer_1.png">
              <img class="beauty-wellness-lady-surfer" src="front/assets/images/lady_surfer_3.png">
            </div>
        </div>
    </section>

    <!--banner bottom section-->
    <section class="fashion_lifestyle_bottom_secton_bg beauty-bottom-wellness-secton-bg">
        
    </section>

    <section class="crunchy-delicious-section fashion_lifestyle_crunchy beauty-wellness-crunchy">
        <div class="crunchy-delicious-content">
          <div class="aos-all">
            <div class="aos-item" data-aos="fade-down-left">
              <div class="aos-item__inner icon cycle-icon"><img src="front/assets/images/cycle-icon.svg" alt=""></div>
            </div>
          </div>
          <div class="aos-all">
            <div class="aos-item" data-aos="fade-up">
              <div class="aos-item__inner icon coffee-table-icon"><img src="front/assets/images/coffee-table-icon.svg" alt=""></div>
            </div>
          </div>
          <div class="crunchy-delicious-box">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="crunchy-img"><img :src=single.img alt="Crunchy Delicious Chips."></div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="crunchy-detail">
                  <h3> <router-link :to="{ name: 'productdetails', params: { id:  single.product_id }}">{{single_name}}</router-link></h3>
                  <p>To Be Honest now on <span>This or That</span></p>
                  <a href="JavaScript:void(0);" class="shop-btn">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="aos-all">
            <div class="aos-item">
              <div class="aos-item__inner icon tree-icon"><img src="front/assets/images/tree-icon.svg" alt=""></div>
            </div>
          </div>
        </div>
    </section>

<section class="beauty-wellness-head head-turners-section brand-slider-section">
    <div class="brand-slider-content">
        <div class="brand-head">
          <h4>Head turners <span>in Men</span></h4>
        </div>
        <div class="brand-square-slider-rgt">
          <div class="brand-slider">
            <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Shampoo"></div>
                <div class="brand-content-head">Shampoo</div>
                <div class="brand-content-head-bottom">10% Off</div>
              </div>
            </div>
            
             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_119.png" alt="Moisturizer"></div>
                <div class="brand-content-head">Moisturizer</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Beard Oil"></div>
                <div class="brand-content-head">Beard Oil</div>
                <div class="brand-content-head-bottom">20% Off</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_120.png" alt="Trimmers"></div>
                <div class="brand-content-head">Trimmers</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_122.png" alt="Soaps"></div>
                <div class="brand-content-head">Soaps</div>
                <div class="brand-content-head-bottom">20% Off</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Shampoo"></div>
                <div class="brand-content-head">Shampoo</div>
                <div class="brand-content-head-bottom">10% Off</div>
              </div>
            </div>

          </div>
        </div>
    </div>
</section>

<section class="besties-pd wellness-brands-day brands-day-section new-arrivals-section">
    <div class="brand-day-head">From your besties</div>    

      <div class="brand-square-slider-rgt brands-day-content">

          <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

          <div class="new-day-slider">
            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-arata-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>

                  <div class="arrivals-rgt">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/like-icon.svg" alt="Like"></a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/book-icon.svg" alt="Book"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Arata</h5>
                  <p>Refreshing Fluoride-Free Toothpaste</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                    <p><u>₹ 349</u></p>
                    <div class="off-price">
                      5% off
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Sleepy Owl Box</h5>
                  <p>Assorted coffee box</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Bare Anatomy</h5>
                  <p>Hair Oil</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-true-elements-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>True elements</h5>
                  <p>Muesli</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-arata-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>

                  <div class="arrivals-rgt">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/like-icon.svg" alt="Like"></a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/book-icon.svg" alt="Book"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Arata</h5>
                  <p>Refreshing Fluoride-Free Toothpaste</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                    <p><u>₹ 349</u></p>
                    <div class="off-price">
                      5% off
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Sleepy Owl Box</h5>
                  <p>Assorted coffee box</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>
          </div>    
      </div>
</section>

<section class="wellness-head-pd beauty-wellness-head head-turners-section brand-slider-section">
    <div class="brand-slider-content">
        <div class="brand-head">
          <h4>Head turners <span>For Women</span></h4>
        </div>
        <div class="brand-square-slider-rgt">
          <div class="brand-slider">
            <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Shampoo"></div>
                <div class="brand-content-head">Shampoo</div>
                <div class="brand-content-head-bottom">10% Off</div>
              </div>
            </div>
            
             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_119.png" alt="Moisturizer"></div>
                <div class="brand-content-head">Moisturizer</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Beard Oil"></div>
                <div class="brand-content-head">Beard Oil</div>
                <div class="brand-content-head-bottom">20% Off</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_120.png" alt="Trimmers"></div>
                <div class="brand-content-head">Trimmers</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_122.png" alt="Soaps"></div>
                <div class="brand-content-head">Soaps</div>
                <div class="brand-content-head-bottom">20% Off</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Shampoo"></div>
                <div class="brand-content-head">Shampoo</div>
                <div class="brand-content-head-bottom">10% Off</div>
              </div>
            </div>

          </div>
        </div>
    </div>
</section>

<section class="wellness-head-pd beauty-wellness-head head-turners-section brand-slider-section">
    <div class="brand-slider-content">
        <div class="brand-head">
          <h4>Head turners <span>For Kids</span></h4>
        </div>
        <div class="brand-square-slider-rgt">
          <div class="brand-slider">
            <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Shampoo"></div>
                <div class="brand-content-head">Shampoo</div>
                <div class="brand-content-head-bottom">10% Off</div>
              </div>
            </div>
            
             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_119.png" alt="Moisturizer"></div>
                <div class="brand-content-head">Moisturizer</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Beard Oil"></div>
                <div class="brand-content-head">Beard Oil</div>
                <div class="brand-content-head-bottom">20% Off</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_120.png" alt="Trimmers"></div>
                <div class="brand-content-head">Trimmers</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_122.png" alt="Soaps"></div>
                <div class="brand-content-head">Soaps</div>
                <div class="brand-content-head-bottom">20% Off</div>
              </div>
            </div>

             <div class="brand-square-content">
              <div class="brand-box">
                <div class="brand-img"><img src="front/assets/images/image_131.png" alt="Shampoo"></div>
                <div class="brand-content-head">Shampoo</div>
                <div class="brand-content-head-bottom">10% Off</div>
              </div>
            </div>

          </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
<section class="fashion_lifestyle_beauty_all_about beauty-all-about-secton">
    <p>It’s all about</p>
    <h1>Lorem ipsum</h1>
    <h6>Sed ut perspiciatis unde omnis iste natus error sit..</h6>
    <img class="beauty-all-about-image" src="front/assets/images/chair_1.png">
    <img class="beauty-all-about-image1" src="front/assets/images/45.png">
    <img class="beauty-all-about-image2" src="front/assets/images/Surfer_2.png">
    <img class="beauty-all-about-image3" src="front/assets/images/lady_surfer_2.png">
</section>

<section class="fashion_lifestyle_beauty_all_about brand-beauty-all-about-secton beauty-all-about-secton">
    <div class="brand-beauty-all-about-secton_bg">Brand</div>
    <p>It’s all about</p>
    <h1>Lorem ipsum</h1>
    <h6>Sed ut perspiciatis unde omnis iste natus error sit..</h6>
    <img class="beauty-all-about-image" src="front/assets/images/chair_1.png">
    <img class="beauty-all-about-image1" src="front/assets/images/45.png">
    <img class="beauty-all-about-image2" src="front/assets/images/Surfer_2.png">
    <img class="beauty-all-about-image3" src="front/assets/images/lady_surfer_2.png">
</section>

<section class="day-beauty-all-about-secton directors-section">
    <div class="day-beauty-all-about-secton-title">Brand of the Day</div>
    <div class="directors-content">
      <div class="day-beauty-all-about-secton-left">
          <img :src="brandofdays.thumbnail">
          <p><span>20% off</span></p>
      </div>
      <div class="day-beauty-all-about-secton-right">
        <div class="day-beauty-all-about-secton-heading">Brand of the Day</div>
        <div class="directors-shot-text">
            <div class="directors-top">
              <img :src="brandofdays.thumbnail" alt="pahadi local">

              <div class="directors-pahadiinfo">{{brandofdays.brand_name}}<p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p></div>
            </div>

            <div class="directors-product-info">
              <p>Your hair is unique. Get hair care custom made for your hair type, goals & lifestyle.</p>

              <ul>
                <li>Clean</li>
                <li>Vegan</li>
                <li>PETA Certified</li>
              </ul>

              <a href="JavaScript:void(0);" class="shop-btn">More About Brand</a>
            </div>
        </div>
      </div>
    </div>
</section>

<section class="show_stoppers_section brand-slider-section" >
    <div class="brand-slider-content">
        <div class="brand-head">
          <h4>Show <span>Stoppers</span></h4>

          <div class="aos-all">
            <div class="aos-item" data-aos="fade-up">
              <div class="aos-item__inner icon walk-icon"><img src="front/assets/images/walk-icon.svg" alt=""></div>
            </div>
           </div>

        </div>
        <div class="brand-square-slider-rgt">
          <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

          <div class="brand-slider">
            <div v-for="item in brands" v-bind:key="item.id"  class="brand-square-content" >
              <div class="brand-box">
                <div class="brand-img"><img :src="item.thumbnail" alt="Pahadi Local"></div>
                <div class="brand-content-head">{{item.brand_name}}</div>
              </div>
            </div>
            
            

          </div>
        </div>
    </div>
</section>

<section class="besties-pd brands-day-section new-arrivals-section">
    <div class="brand-day-head">Trending Products</div>    

      <div class="brand-square-slider-rgt brands-day-content">

          <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

          <div class="new-day-slider">
            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-arata-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>

                  <div class="arrivals-rgt">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/like-icon.svg" alt="Like"></a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/book-icon.svg" alt="Book"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Arata</h5>
                  <p>Refreshing Fluoride-Free Toothpaste</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                    <p><u>₹ 349</u></p>
                    <div class="off-price">
                      5% off
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Sleepy Owl Box</h5>
                  <p>Assorted coffee box</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Bare Anatomy</h5>
                  <p>Hair Oil</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-true-elements-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>True elements</h5>
                  <p>Muesli</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-arata-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>

                  <div class="arrivals-rgt">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/like-icon.svg" alt="Like"></a></li>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/book-icon.svg" alt="Book"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Arata</h5>
                  <p>Refreshing Fluoride-Free Toothpaste</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                    <p><u>₹ 349</u></p>
                    <div class="off-price">
                      5% off
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img">
                <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                <div class="new-arrivals-hov">
                  <div class="new-arrivals-lft">
                    <ul>
                      <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brands-day-content new-arrivals-content">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <h5>Sleepy Owl Box</h5>
                  <p>Assorted coffee box</p>
                  <ul>
                    <li>Minimal</li>
                    <li>Premium Quality</li>
                  </ul>
                  <div class="price-arrival">
                    <p>₹ 314</p>
                  </div>
                </div>
              </div>
            </div>
          </div>    
      </div>
</section>

<section class="wellness-like-never like-never-before">
    <div class="building-head" data-aos="fade-left"><h3>Like never before</h3></div>
    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon cart-icon"> <img src="front/assets/images/cart-icon.svg" alt="cart"></div>
      </div>
    </div>
    <div class="brand-day-head">Best Deals in Town</div>
    <div class="brands-day-content">
        <div class="brands-day-slider">
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/make-img.svg" alt="Make Up">
              <div class="deals-town-text">
              <h6>Make Up</h6>
              <p>20% off</p>
            </div>
            </div>
          </div>

          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/shirts-img.svg" alt="Shirts">
              <div class="deals-town-text">
              <h6>Shirts</h6>
              <p>20% off</p>
            </div>
            </div>
          </div>

          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/unisex-clothing-img.svg" alt="Unisex Clothing">
              <div class="deals-town-text">
              <h6>Unisex Clothing</h6>
              <p>20% off</p>
            </div>
            </div>
          </div>
        </div>
    </div>
    <div class="best-town-bg">
      <div class="row">
        <div class="col-lg-3 col-sm-12">
          <div class="best-town-box">
            <div class="best-town-img"><img src="front/assets/images/baby-care-img.svg" alt="Baby Care"></div>
            <div class="best-twon-text">
              <h6>Baby Care <u>20% off</u> </h6>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12">
          <div class="best-town-box color-two">
            <div class="best-town-img"><img src="front/assets/images/maternity-care.svg" alt="Maternity Care"></div>
            <div class="best-twon-text">
              <h6>Maternity Care <u>20% off</u> </h6>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12">
          <div class="best-town-box">
            <div class="best-town-img"><img src="front/assets/images/fragrances-img.svg" alt="Fragrances"></div>
            <div class="best-twon-text">
              <h6>Fragrances <u>20% off</u> </h6>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12">
          <div class="best-town-box color-two">
            <div class="best-town-img"><img src="front/assets/images/bath-body-img.svg" alt="Bath and Body"></div>
            <div class="best-twon-text">
              <h6>Bath and Body <u>20% off</u> </h6>
            </div>
          </div>
        </div>
      </div>

      <div class="collections-head-bottom">
          <h4>5 More Categories <span>From the World of TOT</span></h4>
          <a href="JavaScript:void(0);"><img src="front/assets/images/world-arrow.svg" alt="More Categories"></a>
      </div>

      <div class="best-tool-word-bg">
          <div class="best-tool-img" data-aos="fade-up">
            <img src="front/assets/images/woman-img.svg" alt="woman">
          </div>
      </div>
    </div>
</section>

<!-- Head Turners section -->
<section class="brands-day-section new-arrivals-section head-arrivals-section">
    <div class="brand-day-head">For Dudes and dads</div>    
      <div class="brand-square-slider-rgt brands-day-content">
        <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>
        <div class="new-day-slider">
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Sleepy Owl Box</h5>
                <p>Assorted coffee box</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/pahadilocal-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Pahadilocal</h5>
                <p>Akhrot ka Tel</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!--Body Lotion Section-->
<section class="brands-day-section new-arrivals-section body-lotion-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 body-lotion-box">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="row">
              <div class="body-lotion-img"><img src="front/assets/images/body-lotion-img.svg" alt="Body Lotion"> <label>Sponsored</label></div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="row">
              <div class="body-lotion-content">
                <div class="body-lotion-head">
                  <h3> Body <span>Lotion</span> <label>by Arata</label></h3>

                  <div class="price-body">20% <span>off</span></div>

                  <p>To softens and hydrates your <span>skin with restorative, plant-based</span> ingredients.</p>
                </div>

                <div class="body-lotion-detils">
                  <h5><u>₹ 1650</u> ₹ 1500</h5>

                  <a href="JavaScript:void(0);" class="body-shop-btn">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 body-lotion-box sneakers-box">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="row">
              <div class="body-lotion-img"><img src="front/assets/images/sneakers-img.svg" alt="Sneakers"> <label>Sponsored</label></div>
            </div>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="row">
              <div class="body-lotion-content">
                <div class="body-lotion-head">
                  <h3> Sneakers  <label>by Neemans</label></h3>

                  <div class="price-body">20% <span>off</span></div>

                  <p>Be gentle to your skin & Be safe. <span>Preserve your skins natural barrier</span> <span>by using natural gentle cleansers</span> <span>free of all harmful chemicals.</span> </p>
                </div>

                <div class="body-lotion-detils">
                  <h5><u>₹ 1650</u> ₹ 1500</h5>

                  <a href="JavaScript:void(0);" class="body-shop-btn">Shop Now</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<div class="recent-section-img">
    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon recent-img"><img src="front/assets/images/recent-img.svg" alt="recent"></div>
      </div>
    </div>

    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon cycling-img"><img src="front/assets/images/cycling-img02.svg" alt="cycling"></div>
      </div>
    </div>

    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon milk-img"><img src="front/assets/images/milk-img.svg" alt="milk"></div>
      </div>
    </div>
</div>



<section class="we-are-building container-fluid">
  <div class="we-are-building-slider">
    <div class="building-head" data-aos="fade-left"><h3>We are building healthy</h3></div>

    <div class="building-healthy-slider">
    <div class="building-box">
        <div class="row">
          <div class="we-are-building-box">
            <div class="building-img"><img src="front/assets/images/healthy-icon01.svg" alt="Healthy icon"></div>
          </div>
            <div class="building-text">
              <p>Why we have the right collections <span> to cut through the noise around you</span></p>
            </div>
        </div>
    </div>

    <div class="building-box">
      <div class="row">
        <div class="we-are-building-box building-box-two">
            <div class="building-img"><img src="front/assets/images/healthy-icon02.svg" alt="Healthy icon"></div>
        </div>
        <div class="building-text">
          <p>Choose from experts collection <span>and most loved brands</span></p>
        </div>
      </div>
    </div>

    <div class="building-box">
      <div class="row">
        <div class="we-are-building-box building-box-three">
           <div class="building-img"><img src="front/assets/images/healthy-icon03.svg" alt="Healthy icon"></div>
        </div>

        <div class="building-text">
          <p>Lorem ipsum dolor sit amet,<span> consectetur adipiscing elit.</span></p>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<section class="curated-collections-section container-fluid">
    <div class="brand-day-head">Curated Collections</div>


    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="curated-collections-slider">
          <h3>Best of Summer</h3>
          <div class="slider-for">
            <div><img src="front/assets/images/best-summer-img.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-summer-img.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-summer-img.svg" alt="Best of Summer"></div>
          </div>

          <div class="slider-nav">
            <div><img src="front/assets/images/best-ummer-img01.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-ummer-img02.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-ummer-img03.svg" alt="Best of Summer"></div>
          </div>        
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="curated-collections-slider">
          <h3>Premium Chocolate</h3>
          <div class="slider-for01">
            <div><img src="front/assets/images/premium-chocolate-img.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/premium-chocolate-img.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/premium-chocolate-img.svg" alt="Best of Summer"></div>
          </div>

          <div class="slider-nav01">
            <div><img src="front/assets/images/premium-chocolate-img01.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/premium-chocolate-img02.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/premium-chocolate-img03.svg" alt="Best of Summer"></div>
          </div>        
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="curated-collections-slider">
          <h3>Best of Summer</h3>
          <div class="slider-for02">
            <div><img src="front/assets/images/best-summer-post-img.svg" alt="best summer"></div>
            <div><img src="front/assets/images/best-summer-post-img.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-summer-post-img.svg" alt="Best of Summer"></div>
          </div>

          <div class="slider-nav02">
            <div><img src="front/assets/images/best-summer-post-img01.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-summer-post-img02.svg" alt="Best of Summer"></div>
            <div><img src="front/assets/images/best-summer-post-img03.svg" alt="Best of Summer"></div>
          </div>        
        </div>
      </div>
    </div>

    <div class="collections-head-bottom">
      <h4>View All Collections <span>From the World of TOT</span></h4>
      <a href="JavaScript:void(0);"><img src="front/assets/images/collections-arrow.svg" alt="collections arrow"></a>
    </div>
</section>

<section class="brands-day-section new-arrivals-section head-arrivals-section">
      <div class="brand-day-head">For Misses and moms</div>    
      <div class="brand-square-slider-rgt brands-day-content">
        <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>
        <div class="new-day-slider">
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Sleepy Owl Box</h5>
                <p>Assorted coffee box</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/pahadilocal-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Pahadilocal</h5>
                <p>Akhrot ka Tel</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<section class="brands-day-section new-arrivals-section head-arrivals-section">
      <div class="brand-day-head">For Little Grown-ups</div>    
      <div class="brand-square-slider-rgt brands-day-content">
        <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>
        <div class="new-day-slider">
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Sleepy Owl Box</h5>
                <p>Assorted coffee box</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/pahadilocal-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Pahadilocal</h5>
                <p>Akhrot ka Tel</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<section class="wellness-slick-track brands-day-section new-arrivals-section head-arrivals-section">
      <div class="brand-day-head">My recent check-in</div>    
      <div class="brand-square-slider-rgt brands-day-content">
        <div class="new-day-slider">
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<section class="brands-day-section new-arrivals-section head-arrivals-section">
    <div class="brand-day-head">Top Recommends</div>    
      <div class="brand-square-slider-rgt brands-day-content">
        <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>
        <div class="new-day-slider">
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Sleepy Owl Box</h5>
                <p>Assorted coffee box</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/pahadilocal-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Pahadilocal</h5>
                <p>Akhrot ka Tel</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/munchilious-granolas.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Munchilious Granolas</h5>
                <p>Refreshing Granolas</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                  <p><u>₹ 349</u></p>
                  <div class="off-price">
                    5% off
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="brands-day-box">
            <div class="brands-day-img">
              <img src="front/assets/images/ustraa-img.svg" alt="Arata">
              <div class="new-arrivals-hov">
                <div class="new-arrivals-lft">
                  <ul>
                    <li><a href="JavaScript:void(0);"><img src="front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="brands-day-content new-arrivals-content">
              <div class="brands-day-cont-rgt new-arrivals-rgt">
                <h5>Ustraa</h5>
                <p>Body Lotion - 200 ml</p>
                <ul>
                  <li>Minimal</li>
                  <li>Premium Quality</li>
                </ul>
                <div class="price-arrival">
                  <p>₹ 314</p>
                   <p><u>₹ 349</u></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!-- trending search section -->
<div class="wellness-trending-search trending-search-section">
    <div class="row">
      <div class="col-lg-6">
        <div class="brand-day-head">Trending search in Fashion & Lifestyle</div>
        <div class="search-tag">
          <ul>
            <li><a href="JavaScript:void(0);">Tag Search</a></li>
            <li><a href="JavaScript:void(0);">Home Made Beauty Products</a></li>
            <li><a href="JavaScript:void(0);">Beard Care</a></li>
            <li><a href="JavaScript:void(0);">Beard Care</a></li>
            <li><a href="JavaScript:void(0);">Eco Friendly</a></li>
            <li><a href="JavaScript:void(0);">Vegan</a></li>
            <li><a href="JavaScript:void(0);">100% Aurveda Products</a></li>
            <li><a href="JavaScript:void(0);">Eco Friendly</a></li>
            <li><a href="JavaScript:void(0);">Skin Care</a></li>
            <li><a href="JavaScript:void(0);">Pee Safe</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="aos-all">
          <div class="aos-item" data-aos="fade-up">
            <div class="aos-item__inner icon trending-search-img"><img src="front/assets/images/trending-search-img.svg" alt="milk"></div>
          </div>
        </div>
      </div>
    </div>
</div>

<!--TOT Corner section-->
<section class="brands-day-section new-arrivals-section deals-in-town-section border-radius">
    <div class="brand-day-head">TOT Corner</div>    
    <div class="brand-square-slider-rgt brands-day-content">

          <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

          <div class="new-day-slider">
            <div class="brands-day-box">
              <div class="brands-day-img tot-corner-img">
                <img src="front/assets/images/tot-corner-img.svg" alt="tot corner">

                <label>Food & Beverages</label>
              </div>
              <div class="new-arrivals-content tot-corner">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <div class="corner-sad">
                    <label><img src="front/assets/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                    <label><img src="front/assets/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                    <label><img src="front/assets/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                  </div>
  
                  <p>Eating Healthy <span><img src="front/assets/images/line.svg" alt="line"></span> Healthy Living</p>
                  <h6>How can you keep your breakfast healthy and tasty?</h6>

                  <ul>
                    <li>Aug 6</li>
                    <li> <span><img src="front/assets/images/icon-video.svg" alt="icon video"></span> 3:00 min</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img tot-corner-img">
                <img src="front/assets/images/tot-corner02-img.svg" alt="tot corner">

                <label>Food & Beverages</label>
              </div>
              <div class="new-arrivals-content tot-corner">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <div class="corner-sad">
                    <label><img src="front/assets/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                    <label><img src="front/assets/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                    <label><img src="front/assets/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                  </div>
  
                  <p>Eating Healthy <span><img src="front/assets/images/line.svg" alt="line"></span> Healthy Living</p>
                  <h6>How can you keep your breakfast healthy and tasty?</h6>

                  <ul>
                    <li>Aug 6</li>
                    <li> <span><img src="front/assets/images/icon-read.svg" alt="icon read"></span> 3:00 min</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img tot-corner-img">
                <img src="front/assets/images/tot-corner03-img.svg" alt="tot corner">

                <label>Sports & Nutrition</label>
              </div>
              <div class="new-arrivals-content tot-corner">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <div class="corner-sad">
                    <label><img src="front/assets/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                    <label><img src="front/assets/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                    <label><img src="front/assets/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                  </div>
  
                  <p>Eating Healthy <span><img src="front/assets/images/line.svg" alt="line"></span> Healthy Living</p>
                  <h6>How can you keep your breakfast healthy and tasty?</h6>

                  <ul>
                    <li>Aug 6</li>
                    <li> <span><img src="front/assets/images/icon-read.svg" alt="icon read"></span> 3:00 min</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img tot-corner-img">
                <img src="front/assets/images/tot-corner04-img.svg" alt="tot corner">

                <label>Sports & Nutrition</label>
              </div>
              <div class="new-arrivals-content tot-corner">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <div class="corner-sad">
                    <label><img src="front/assets/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                    <label><img src="front/assets/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                    <label><img src="front/assets/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                  </div>
  
                  <p>Eating Healthy <span><img src="front/assets/images/line.svg" alt="line"></span> Healthy Living</p>
                  <h6>How can you keep your breakfast healthy and tasty?</h6>

                  <ul>
                    <li>Aug 6</li>
                    <li> <span><img src="front/assets/images/icon-video.svg" alt="icon read"></span> 3:00 min</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img tot-corner-img">
                <img src="front/assets/images/tot-corner-img.svg" alt="tot corner">

                <label>Food & Beverages</label>
              </div>
              <div class="new-arrivals-content tot-corner">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <div class="corner-sad">
                    <label><img src="front/assets/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                    <label><img src="front/assets/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                    <label><img src="front/assets/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                  </div>
  
                  <p>Eating Healthy <span><img src="front/assets/images/line.svg" alt="line"></span> Healthy Living</p>
                  <h6>How can you keep your breakfast healthy and tasty?</h6>

                  <ul>
                    <li>Aug 6</li>
                    <li> <span><img src="front/assets/images/icon-video.svg" alt="icon video"></span> 3:00 min</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="brands-day-box">
              <div class="brands-day-img tot-corner-img">
                <img src="front/assets/images/tot-corner02-img.svg" alt="tot corner">

                <label>Food & Beverages</label>
              </div>
              <div class="new-arrivals-content tot-corner">
                <div class="brands-day-cont-rgt new-arrivals-rgt">
                  <div class="corner-sad">
                    <label><img src="front/assets/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                    <label><img src="front/assets/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                    <label><img src="front/assets/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                  </div>
  
                  <p>Eating Healthy <span><img src="front/assets/images/line.svg" alt="line"></span> Healthy Living</p>
                  <h6>How can you keep your breakfast healthy and tasty?</h6>

                  <ul>
                    <li>Aug 6</li>
                    <li> <span><img src="front/assets/images/icon-read.svg" alt="icon read"></span> 3:00 min</li>
                  </ul>
                </div>
              </div>
            </div>

          </div>    
    </div>
</section>

<section class="building-healthy-section">
  <h3 data-aos="fade-left">We are building a healthy <span>culture around you</span></h3>

  <div class="back-to-top">
    <img src="front/assets/images/back-to-top.svg" alt="back to top">
    <span>Back to Top</span>
  </div>

  <div class="back-to-top-img-bottom">
    <div class="aos-all">
        <div class="aos-item" data-aos="fade-up">
          <div class="aos-item__inner icon">
             <img src="front/assets/images/back-to-top-img-bottom.svg" alt="back  to top">
          </div>
        </div>
    </div>
  </div>
</section>

<!-- more informetion section -->
<div class="more-info-tot">
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#more-info-tot">
        More about shoping at TOT
      </a>
    </div>
    <div id="more-info-tot" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <p><b>More Trending in Fasion and Apparel</b> - Makeup  |  Dresses For Girls  |  T-Shirts  |  Sandals  |  Headphones  |  Babydolls  |  Blazers For Men  |  Handbags  |  Ladies Watches  |  Bags  |  Sport Shoes  |  Reebok Shoes  |  Puma Shoes  |  Boxers  |  Wallets  |  Tops  |  Earrings  | Brand name Watches  |  Kurtis  |  Indian Peacock  |  Smart Watches  |  Blazers For Men  |  Handbags  |  Ladies Watches  |  Bags  |  Sport Shoes  |  Reebok Shoes  |  Puma Shoes  |  Boxers  |  Wallets  |  Tops  </p>

         <p><b>T-Shirts</b> - Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  | Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts</p>

         <p><b>Best selling on TOT</b> - Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts  for Girls  |  Plain T-Shirts  |  Brand name designed T-Shirt  |  T-Shirts for Girls  |  Plain T-Shirts</p>

         <div class="info-emi">
           <h5>No cost EMI</h5>
           <p>In an attempt to make high-end products accessible to all, our No Cost EMI plan enables you to shop with us under EMI, without shelling out any processing fee. Applicable on select shoping. You can now shop without burning a hole in your pocket. If you've been eyeing a product for a long time, chances are it may be up for a no cost EMI. Take a look ASAP! Terms and conditions apply.</p>
         </div>

         <div class="info-emi">
           <h5>EMI on Debit Cards</h5>
           <p>Did you know debit card holders account for 79.38 crore in the country, while there are only 3.14 crore credit card holders? After enabling EMI on Credit Cards, in another attempt to make online shopping accessible to everyone, TOT introduces EMI on Debit Cards, empowering you to shop confidently with us without having to worry about pauses in monthly cash flow. At present, we have partnered with Axis Bank, HDFC Bank, State Bank of India and ICICI Bank for this facility. More power to all our shoppers! Terms and conditions apply. </p>
         </div>

         <div class="info-emi">
           <h5>Lorem ipsum dolor</h5>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare non ligula et fringilla. Integer convallis libero vel arcu dignissim hendrerit. Phasellus ut ultricies ante, vel dapibus lacus. Nunc ullamcorper purus vel nunc viverra, nec maximus lorem dictum. Cras eleifend augue sed feugiat iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In id facilisis diam, sit amet fermentum lacus. Pellentesque congue sapien ligula, accumsan ultrices ligula mollis nec. Mauris faucibus ex nibh, sed dapibus mauris viverra vel. Nulla finibus pellentesque enim, non luctus velit aliquet ullamcorper.</p>
         </div>
      </div>
    </div>
  </div>
</div>

</div>
</template>
<script>
import HeaderView from "../layout/headerview";
    
  export default {
    data() {
  return {
    settings: [],
    pageData: {},
    slider:[],
    single:[],
    brands:[],
    brandofdays:[],
    newarrivals:[],
    turners:[],
    sponsors:[],
    topsellings:[],
    bestdeals:[],
    recommends:[],
   single_name:'',
  }
  },
   components: { HeaderView },
  methods:{
     homeSlider() {
        axios.get(this.$config.baseApiUrl+'/fashionslider')
        .then((response) => {
		 
		  this.slider=response.data.result;
           
        })
        .catch(function(error) {         
        });
      },
      homeSingle() {
        axios.get(this.$config.baseApiUrl+'/fashionsingle')
        .then((response) => {
		
		  this.single=response.data.result;
        this.single_name=response.data.result.products.product_name;
        })
        .catch(function(error) {         
        });
      },
      homeBrand() {
        axios.get(this.$config.baseApiUrl+'/fashionbrands')
        .then((response) => {
		
		  this.brands=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeBrandofDays() {
        axios.get(this.$config.baseApiUrl+'/fashionbrandofdays')
        .then((response) => {
		
		  this.brandofdays=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeNewArrival() {
        axios.get(this.$config.baseApiUrl+'/fashionnewarrival')
        .then((response) => {
		
		  this.newarrivals=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeTurner() {
        axios.get(this.$config.baseApiUrl+'/fashionturner')
        .then((response) => {
		
		  this.turners=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeSponsor() {
        axios.get(this.$config.baseApiUrl+'/fashionsponsor')
        .then((response) => {
		
		  this.sponsors=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeTopSelling() {
        axios.get(this.$config.baseApiUrl+'/fashiontopselling')
        .then((response) => {
		
		  this.topsellings=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeBestDeal() {
        axios.get(this.$config.baseApiUrl+'/fashionbestdeal')
        .then((response) => {
		
		  this.bestdeals=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeTotRecommened() {
        axios.get(this.$config.baseApiUrl+'/fashiontotrecommened')
        .then((response) => {
		
		  this.recommends=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
    
  },
      mounted() {
         this.homeSlider();
          this.homeSingle();
          this.homeBrand();
          this.homeBrandofDays();
          this.homeNewArrival();
          this.homeTurner();
          this.homeSponsor();
          this.homeTopSelling();
          this.homeBestDeal();
          this.homeTotRecommened();
      }
  }
</script>
