<template>
  <div>
  <header-view :settings.sync="settings"></header-view>
 <!--banner section-->
    <section class="home-banner-secton-bg">
        <div class="home-banner-content">
            <div class="home-banner-middle">
              <h1><span>Welcome to the</span> TOT World</h1>
              <p>Explore 1000+ exciting brands lorem ipsum <span>Sed ut perspiciatis unde omnis iste natus error sit.</span></p>
              <div class="scroll-dwon"><span>Scroll</span></div>
              <div class="delivering-text"> <span>We are delivering all across India except containment zones</span></div>
            </div>
        </div>
    </section>


    <!---explore tot section -->
	
	<section class="explore-section"  id="explore-section">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="explore-box">
                <div class="explore-img"><span><img src="/public/front/images/fashion-city.svg" alt="Fashion City"></span></div>
                <div class="explore-content">
                  <h2>Fashion City</h2>
                  <a href="#" class="explore-btn"><span>Explore Fashion & Apparel</span></a>
                </div>
              </div>
            </div>
          <div class="col-lg-4 col-md-4">
            <div class="explore-box">
                <div class="explore-img"><span><img src="/public/front/images/beauty-island.svg" alt="Beauty Island"></span></div>
                <div class="explore-content">
                  <h2>Beauty Island</h2>
                  <a href="#" class="explore-btn"><span>Explore Fashion & Apparel</span></a>
                </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="explore-box">
                <div class="explore-img"><span><img src="/public/front/images/food-park.svg" alt="Food Park"></span></div>
                <div class="explore-content">
                  <h2>Food Park</h2>
                  <a href="#" class="explore-btn"><span>Explore Fashion & Apparel</span></a>
                </div>
              </div>
          </div>
         </div>

         <div class="row">
           <div class="beauty-section">
             <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/hand-picked-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>Hand-picked <span>Brands</span></p></div>
           </div>

           <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/exciting-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>1000+ trendy <span>& exciting products</span></p></div>
           </div>

           <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/genuine-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>100% safe <span>& genuine</span></p></div>
           </div>

           <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/carefully-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>Carefully <span>vetted startups</span></p></div>
           </div>
           </div>
         </div>
      </div>
    </section>
	
	<section class="crunchy-delicious-section">
        <div class="crunchy-delicious-content">

           <div class="aos-all">
            <div class="aos-item" data-aos="fade-down-left">
              <div class="aos-item__inner icon cycle-icon"><img src="/public/front/images/cycle-icon.svg" alt=""></div>
            </div>
           </div>

          <div class="crunchy-delicious-box">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="row"><div class="crunchy-img"><img src="/public/front/images/crunchy-delicious-img.svg" alt="Crunchy Delicious Chips."></div></div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="row">
                  <div class="crunchy-detail">
                  <h3>Crunchy <span>Delicious</span> <span>Chips.</span></h3>
                  <p>To Be Honest now on <span>This or That</span></p>
                  <a href="JavaScript:void(0);" class="shop-btn">Shop Now</a>
                </div>
                </div>
              </div>
            </div>
          </div>

          <div class="aos-all">
            <div class="aos-item" data-aos="fade-up">
              <div class="aos-item__inner icon coffee-table-icon"><img src="/public/front/images/coffee-table-icon.svg" alt=""></div>
            </div>
           </div>


           <div class="aos-all">
            <div class="aos-item">
              <div class="aos-item__inner icon tree-icon"><img src="/public/front/images/tree-icon.svg" alt=""></div>
            </div>
           </div>
           

        </div>
    </section>
	
	 <section class="brand-slider-section" >
        <div class="brand-slider-content">
            <div class="brand-head">
              <h4>Brand <span>Square</span></h4>

              <div class="aos-all">
                <div class="aos-item" data-aos="fade-up">
                  <div class="aos-item__inner icon walk-icon"><img src="/public/front/images/walk-icon.svg" alt=""></div>
                </div>
               </div>

            </div>
            <div class="brand-square-slider-rgt">
              <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

              <div class="brand-slider">
                <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/pahadi-local-img.svg" alt="Pahadi Local"></div>
                    <div class="brand-content-head">Pahadi Local</div>
                  </div>
                </div>
                
                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/bare-anatomy-img.svg" alt="Bare Anatomy"></div>
                    <div class="brand-content-head">Bare Anatomy</div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/phool-img.svg" alt="Phool"></div>
                    <div class="brand-content-head">Phool</div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/the-tribe-concepts-img.svg" alt="The Tribe Concepts"></div>
                    <div class="brand-content-head">The Tribe Concepts</div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/ohria-royal-ayurveda-img.svg" alt="Pahadi Local"></div>
                    <div class="brand-content-head">Ohria Royal <span>Ayurveda</span></div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/the-tribe-concepts-img.svg" alt="The Tribe Concepts"></div>
                    <div class="brand-content-head">The Tribe Concepts</div>
                  </div>
                </div>

              </div>
            </div>
        </div>
    </section>
	
	<section class="brands-day-section">
        <div class="brand-day-head">Brands of the Day</div>

        <div class="brands-day-content">
            <div class="brands-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img"><img src="/public/front/images/brands-day-img01.svg" alt="Bare Anatomy"></div>
                <div class="brands-day-content">
                  <div class="brands-day-cont-img"><img src="/public/front/images/bare-anatomy-icon.svg" alt="Bare Anatomy"></div>
                  <div class="brands-day-cont-rgt">
                    <h5>Bare Anatomy</h5>
                    <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img"><img src="/public/front/images/brands-day-img02.svg" alt="Sleepy Owl"></div>
                <div class="brands-day-content">
                  <div class="brands-day-cont-img"><img src="/public/front/images/sleepy-owl-icon.svg" alt="Sleepy Owl"></div>
                  <div class="brands-day-cont-rgt">
                    <h5>Sleepy Owl</h5>
                    <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img"><img src="/public/front/images/brands-day-img03.svg" alt="Indian Peacock"></div>
                <div class="brands-day-content">
                  <div class="brands-day-cont-img"><img src="/public/front/images/indian-peacock-icon.svg" alt="Indian Peacock"></div>
                  <div class="brands-day-cont-rgt">
                    <h5>Indian Peacock</h5>
                    <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img"><img src="/public/front/images/brands-day-img01.svg" alt="Bare Anatomy"></div>
                <div class="brands-day-content">
                  <div class="brands-day-cont-img"><img src="/public/front/images/bare-anatomy-icon.svg" alt="Bare Anatomy"></div>
                  <div class="brands-day-cont-rgt">
                    <h5>Bare Anatomy</h5>
                    <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img"><img src="/public/front/images/brands-day-img02.svg" alt="Sleepy Owl"></div>
                <div class="brands-day-content">
                  <div class="brands-day-cont-img"><img src="/public/front/images/sleepy-owl-icon.svg" alt="Sleepy Owl"></div>
                  <div class="brands-day-cont-rgt">
                    <h5>Sleepy Owl</h5>
                    <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img"><img src="/public/front/images/brands-day-img03.svg" alt="Indian Peacock"></div>
                <div class="brands-day-content">
                  <div class="brands-day-cont-img"><img src="/public/front/images/indian-peacock-icon.svg" alt="Indian Peacock"></div>
                  <div class="brands-day-cont-rgt">
                    <h5>Indian Peacock</h5>
                    <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p>
                  </div>
                </div>
              </div>

            </div>

             <div class="aos-all">
              <div class="aos-item" data-aos="fade-up">
                <div class="aos-item__inner brands-bay-bottom-img"> <img src="/public/front/images/brands-bay-bottom-img.png" alt="Brands of the Day"></div>
              </div>
             </div>


        </div>
  </section>
  
  
<section class="brands-day-section new-arrivals-section">
    <div class="brand-day-head">New Arrivals</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/new-arrivals-arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>

                    <div class="arrivals-rgt">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/like-icon.svg" alt="Like"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/book-icon.svg" alt="Book"></a></li>
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
                  <img src="/public/front/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-true-elements-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>

                    <div class="arrivals-rgt">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/like-icon.svg" alt="Like"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/book-icon.svg" alt="Book"></a></li>
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
                  <img src="/public/front/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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

        <div class="aos-all">
          <div class="aos-item" data-aos="fade-up">
            <div class="aos-item__inner new-arrivals-chair"><img src="/public/front/images/new-arrivals-chair.svg" alt="Chair"></div>
          </div>
         </div>

         <div class="aos-all">
          <div class="aos-item" data-aos="fade-up">
            <div class="aos-item__inner new-arrivals-walk"><img src="/public/front/images/new-arrivals-walk.svg" alt="Chair"></div>
          </div>
         </div>

          <div class="aos-all">
          <div class="aos-item" data-aos="fade-up">
            <div class="aos-item__inner lipstick-bar"><img src="/public/front/images/lipstick-bar.svg" alt="Chair"></div>
          </div>
         </div>

</section>


<section class="brands-day-section new-arrivals-section head-arrivals-section">
    <div class="brand-day-head">Head Turners</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/munchilious-granolas.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/ustraa-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/pahadilocal-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/munchilious-granolas.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/ustraa-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
<section class="container-fluid">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 body-lotion-box">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <div class="row">
                <div class="body-lotion-img"><img src="/public/front/images/body-lotion-img.svg" alt="Body Lotion"> <label>Sponsored</label></div>
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
                <div class="body-lotion-img"><img src="/public/front/images/sneakers-img.svg" alt="Sneakers"> <label>Sponsored</label></div>
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
</section>

<section class="we-are-building container-fluid">
      <div class="we-are-building-slider">
        <div class="building-head" data-aos="fade-left"><h3>We are building healthy</h3></div>

        <div class="building-healthy-slider">
        <div class="building-box">
            <div class="row">
              <div class="we-are-building-box">
                <div class="building-img"><img src="/public/front/images/healthy-icon01.svg" alt="Healthy icon"></div>
              </div>
                <div class="building-text">
                  <p>Why we have the right collections <span> to cut through the noise around you</span></p>
                </div>
            </div>
        </div>

        <div class="building-box">
          <div class="row">
            <div class="we-are-building-box building-box-two">
                <div class="building-img"><img src="/public/front/images/healthy-icon02.svg" alt="Healthy icon"></div>
            </div>
            <div class="building-text">
              <p>Choose from experts collection <span>and most loved brands</span></p>
            </div>
          </div>
        </div>

        <div class="building-box">
          <div class="row">
            <div class="we-are-building-box building-box-three">
               <div class="building-img"><img src="/public/front/images/healthy-icon03.svg" alt="Healthy icon"></div>
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
          <div><img src="/public/front/images/best-summer-img.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-summer-img.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-summer-img.svg" alt="Best of Summer"></div>
        </div>

        <div class="slider-nav">
          <div><img src="/public/front/images/best-ummer-img01.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-ummer-img02.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-ummer-img03.svg" alt="Best of Summer"></div>
        </div>        
    </div>
    </div>

    <div class="col-lg-4 col-sm-6">
      <div class="curated-collections-slider">
        <h3>Premium Chocolate</h3>
        <div class="slider-for01">
          <div><img src="/public/front/images/premium-chocolate-img.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/premium-chocolate-img.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/premium-chocolate-img.svg" alt="Best of Summer"></div>
        </div>

        <div class="slider-nav01">
          <div><img src="/public/front/images/premium-chocolate-img01.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/premium-chocolate-img02.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/premium-chocolate-img03.svg" alt="Best of Summer"></div>
        </div>        
    </div>
    </div>

    <div class="col-lg-4 col-sm-6">
      <div class="curated-collections-slider">
        <h3>Best of Summer</h3>
        <div class="slider-for02">
          <div><img src="/public/front/images/best-summer-post-img.svg" alt="best summer"></div>
          <div><img src="/public/front/images/best-summer-post-img.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-summer-post-img.svg" alt="Best of Summer"></div>
        </div>

        <div class="slider-nav02">
          <div><img src="/public/front/images/best-summer-post-img01.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-summer-post-img02.svg" alt="Best of Summer"></div>
          <div><img src="/public/front/images/best-summer-post-img03.svg" alt="Best of Summer"></div>
        </div>        
    </div>
    </div>
    </div>

    <div class="collections-head-bottom">
      <h4>View All Collections <span>From the World of TOT</span></h4>
      <a href="JavaScript:void(0);"><img src="/public/front/images/collections-arrow.svg" alt="collections arrow"></a>
    </div>
</section>


<section class="brand-slider-section selling-categories-section">
        <div class="brand-slider-content">
            <div class="brand-head">
              <b><img src="/public/front/images/categories-star.svg" alt="Selling Categories"></b>
              <h4> Top Selling <span>Categories</span></h4>

            </div>
            <div class="brand-square-slider-rgt">

              <div class="brand-slider">
                <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="images/slippers-img.svg" alt="Slippers"></div>
                    <div class="brand-content-head">Slippers</div>
                  </div>
                </div>
                
                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/swimwear-img.svg" alt="Swimwear"></div>
                    <div class="brand-content-head">Swimwear</div>
                    <div class="brand-content-text">20% Off</div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/winter-wear-img.svg" alt="Winter Wear"></div>
                    <div class="brand-content-head">Winter Wear</div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/flip-flops-img.svg" alt="Flip flops"></div>
                    <div class="brand-content-head">Flip flops</div>
                    <div class="brand-content-text">20% Off</div>
                  </div>
                </div>

                 <div class="brand-square-content">
                  <div class="brand-box">
                    <div class="brand-img"><img src="/public/front/images/summer-wear-img.svg" alt="Summer Wear"></div>
                    <div class="brand-content-head">Summer Wear</div>
                    <div class="brand-content-text">20% Off</div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>


<section class="like-never-before">
  <div class="building-head" data-aos="fade-left"><h3>Like never before</h3></div>

    <div class="aos-all">
    <div class="aos-item" data-aos="fade-up">
      <div class="aos-item__inner icon cart-icon"> <img src="/public/front/images/cart-icon.svg" alt="cart"></div>
    </div>
    </div>


  <div class="brand-day-head">Best Deals in Town</div>
        <div class="brands-day-content">
            <div class="brands-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/make-img.svg" alt="Make Up">
                  <div class="deals-town-text">
                  <h6>Make Up</h6>
                  <p>20% off</p>
                </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/shirts-img.svg" alt="Shirts">
                  <div class="deals-town-text">
                  <h6>Shirts</h6>
                  <p>20% off</p>
                </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/unisex-clothing-img.svg" alt="Unisex Clothing">
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
                  <div class="best-town-img"><img src="/public/front/images/baby-care-img.svg" alt="Baby Care"></div>
                  <div class="best-twon-text">
                    <h6>Baby Care <u>20% off</u> </h6>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-12">
                <div class="best-town-box color-two">
                  <div class="best-town-img"><img src="/public/front/images/maternity-care.svg" alt="Maternity Care"></div>
                  <div class="best-twon-text">
                    <h6>Maternity Care <u>20% off</u> </h6>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-12">
                <div class="best-town-box">
                  <div class="best-town-img"><img src="/public/front/images/fragrances-img.svg" alt="Fragrances"></div>
                  <div class="best-twon-text">
                    <h6>Fragrances <u>20% off</u> </h6>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-12">
                <div class="best-town-box color-two">
                  <div class="best-town-img"><img src="/public/front/images/bath-body-img.svg" alt="Bath and Body"></div>
                  <div class="best-twon-text">
                    <h6>Bath and Body <u>20% off</u> </h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="collections-head-bottom">
                <h4>5 More Categories <span>From the World of TOT</span></h4>
                <a href="JavaScript:void(0);"><img src="/public/front/images/world-arrow.svg" alt="More Categories"></a>
            </div>

            <div class="best-tool-word-bg">
                <div class="best-tool-img" data-aos="fade-up">
                  <img src="/public/front/images/woman-img.svg" alt="woman">
                </div>
            </div>
          </div>
</section>


<section class="directors-section">
    <div class="directors-content">
        <div class="directors-list">
          <div class="directors-lft">
        <h5><span><img src="/public/front/images/icon-directorschoice.svg" alt="directorschoice"></span> Director's This</h5>
        <div class="directors-img"><img src="/public/front/images/directors-img.svg" alt="Directors"></div>
        <div class="directors-name">
          <h5>Rohit Pugalia <ins>Director</ins> </h5>
        </div>
      </div>

      <div class="directors-rgt">
          <div class="info-icon"><img src="/public/front/images/info-tag.svg" alt="info tag"></div>

          <div class="director-info">
            <p>Director’s Choice is non deserunt ullamco est <span>sit aliqua dolor do amet sint.</span></p>
          </div>
      </div>
        </div>

        <div class="directors-shot-text">
            <div class="directors-top">
              <img src="/public/front/images/pahadi-local.svg" alt="pahadi local">

              <div class="directors-pahadiinfo">Pahadi Local <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p></div>
            </div>

            <div class="directors-product-info">
              <p>Every product of Pahadi Local is tested for purity in accredited laboratories and they are committed to delve deeper into raw material research to meet international quality and scientific standards.</p>

              <ul>
                <li>Clean</li>
                <li>Vegan</li>
                <li>PETA Certified</li>
              </ul>

              <a href="JavaScript:void(0);" class="shop-btn">More About Brand</a>
            </div>
        </div>
    </div>

    <div class="directors-content-rgt">
      <div class="directors-content-slider">
        <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/hair-oil-img.svg" alt="Hair Oil">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
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
                  <img src="/public/front/images/akhrot-tel.svg" alt="Akhrot ka Tel">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
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
      </div>
    </div>
</section>


<section class="editor-that-section">
    <div class="directors-content editor-head-top">
      <div class="directors-lft">
        <h5><span><img src="/public/front/images/editorschoice.svg" alt="editorschoice"></span> Editor’s That</h5>
        <div class="directors-img"><img src="/public/front/images/soniya-mehra-img.svg" alt="Soniya"></div>
        <div class="directors-name">
          <h5>Soniya Mehra <ins>Style Expert</ins> </h5>
        </div>
      </div>
    </div>


      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/neeman’s-img.svg" alt="Neeman’s">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Neeman’s</h5>
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
                  <img src="/public/front/images/ustraa-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/crunchies-img01.svg" alt="TBH Crunchies">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>TBH Crunchies</h5>
                    <p>Spiced OKRA</p>
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
                  <img src="/public/front/images/brand-name-img02.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Brand Name</h5>
                    <p>Ear Rings</p>
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
                  <img src="/public/front/images/neeman’s-img.svg" alt="Neeman’s">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Neeman’s</h5>
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
                  <img src="/public/front/images/ustraa-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/neeman’s-img.svg" alt="Neeman’s">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Neeman’s</h5>
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
                  <img src="/public/front/images/ustraa-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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


<section class="brands-day-section new-arrivals-section deals-in-town-section border-radius">
    <div class="brand-day-head">Best Deals in Town</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
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
                  <img src="/public/front/images/ohria-img.svg" alt="Ohria">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Ohria</h5>
                    <p>Pure Copper Eye Cups : Netra Shudhi</p>
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
                  <img src="/public/front/images/hair-oil-img.svg" alt="Pahadilocal">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
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
                  <img src="/public/front/images/arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
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
                      <p><u>₹ 349</u></p>
                      <div class="off-price">
                        5% off
                      </div>
                    </div>
                  </div>
                </div>
              </div>       
            </div>    
        </div>

</section>


<section class="brands-day-section new-arrivals-section deals-in-town-section border-radius">
    <div class="brand-day-head">My Recent Check-ins</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/new-arrivals-arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/brand-name-img02.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Brand Name</h5>
                    <p>Ear Rings</p>
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
                  <img src="/public/front/images/ustraa-img.svg" alt="Ustraa">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                       <div class="off-price">
                        5% off
                      </div>
                    </div>
                  </div>
                </div>
              </div>    

              <div class="brands-day-box"></div>    
            </div>    
        </div>
</section>

<div class="recent-section-img">
    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon recent-img"><img src="/public/front/images/recent-img.svg" alt="recent"></div>
      </div>
    </div>

    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon cycling-img"><img src="/public/front/images/cycling-img02.svg" alt="cycling"></div>
      </div>
    </div>

    <div class="aos-all">
      <div class="aos-item" data-aos="fade-up">
        <div class="aos-item__inner icon milk-img"><img src="/public/front/images/milk-img.svg" alt="milk"></div>
      </div>
    </div>
</div>

<!-- TOT Recommends section-->
<div class="brands-day-section new-arrivals-section deals-in-town-section border-radius">
    <div class="brand-day-head">TOT Recommends</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
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
                  <img src="/public/front/images/ohria-img.svg" alt="Ohria">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Ohria</h5>
                    <p>Pure Copper Eye Cups : Netra Shudhi</p>
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
                  <img src="/public/front/images/hair-oil-img.svg" alt="Pahadilocal">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
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
                  <img src="/public/front/images/arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
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
                      <p><u>₹ 349</u></p>
                      <div class="off-price">
                        5% off
                      </div>
                    </div>
                  </div>
                </div>
              </div>       
            </div>    
        </div>
</div>

<!--Bargain House section-->
<section class="brands-day-section new-arrivals-section deals-in-town-section border-radius">
    <div class="brand-day-head">Bargain House</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/public/front/images/arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/neeman’s-img.svg" alt="Neeman’s">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                         <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Neeman’s</h5>
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
                  <img src="/public/front/images/new-arrivals-arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/public/front/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/public/front/images/indian-peacock.svg" alt="indian peacock">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                         <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);" tabindex="0"><img src="/public/front/images/icon-tel.svg" alt="Hair Oil"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="brands-day-content new-arrivals-content">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <h5>Indian Peacock</h5>
                    <p>Body Lotion - 200 ml</p>
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
            </div>    
        </div>
</section>


<!-- trending search section -->
<div class="trending-search-section">
    <div class="row">
      <div class="col-lg-6">
        <div class="brand-day-head">Bargain House</div>
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
            <div class="aos-item__inner icon trending-search-img"><img src="/public/front/images/trending-search-img.svg" alt="milk"></div>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- Welcome to the land section -->
<section class="land-section container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="land-img"><img src="/public/front/images/land-img.svg" alt="land this or that"></div>
        </div>

        <div class="col-lg-6">
          <div class="land-info">
            <h4>Welcome to the land of <span>This or That!</span></h4>
            <p>Enjoy a truly unique shopping experience as you <span>explore our world of the latest and most exciting</span> 
             <span>products, from the very best, thoroughly vetted</span> start-ups.</p>

            <div class="land-beauty-section">
             <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/hand-picked-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>Hand-picked <span>Brands</span></p></div>
           </div>

           <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/exciting-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>1000+ trendy <span>&amp; exciting products</span></p></div>
           </div>

           <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/genuine-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>100% safe <span>&amp; genuine</span></p></div>
           </div>

           <div class="beauty-iocn-box">
             <div class="beauty-img"><img src="/public/front/images/carefully-brands-icon.svg" alt=""></div>
             <div class="beauty-text"><p>Carefully <span>vetted startups</span></p></div>
           </div>
           </div>

           <div class="faq-section">
              <div id="accordion">
                <div class="card">
                  <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                      7 Unique features of TOT
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    I would like to introduce my Startup Brand on TOT
                  </a>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                      More about TOT
                    </a>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                  </div>
                </div>
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>


    <div class="aos-all">
        <div class="aos-item" data-aos="fade-up">
          <div class="aos-item__inner icon land-shop-img"><img src="/public/front/images/land-shop-img.svg" alt="milk"></div>
        </div>
    </div>

    <div class="aos-all">
        <div class="aos-item" data-aos="fade-up">
          <div class="aos-item__inner icon land-shop-tree-img"><img src="/public/front/images/land-shop-tree-img.svg" alt="milk"></div>
        </div>
    </div>
</section>
  

<!--TOT Corner section-->

<section class="brands-day-section new-arrivals-section deals-in-town-section border-radius">
    <div class="brand-day-head">TOT Corner</div>    

      <div class="brand-square-slider-rgt brands-day-content">

            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>

            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img tot-corner-img">
                  <img src="/public/front/images/tot-corner-img.svg" alt="tot corner">

                  <label>Food & Beverages</label>
                </div>
                <div class="new-arrivals-content tot-corner">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <div class="corner-sad">
                      <label><img src="/public/front/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                      <label><img src="/public/front/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                      <label><img src="/public/front/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                    </div>
    
                    <p>Eating Healthy <span><img src="/public/front/images/line.svg" alt="line"></span> Healthy Living</p>
                    <h6>How can you keep your breakfast healthy and tasty?</h6>

                    <ul>
                      <li>Aug 6</li>
                      <li> <span><img src="/public/front/images/icon-video.svg" alt="icon video"></span> 3:00 min</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img tot-corner-img">
                  <img src="/public/front/images/tot-corner02-img.svg" alt="tot corner">

                  <label>Food & Beverages</label>
                </div>
                <div class="new-arrivals-content tot-corner">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <div class="corner-sad">
                      <label><img src="/public/front/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                      <label><img src="/public/front/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                      <label><img src="/public/front/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                    </div>
    
                    <p>Eating Healthy <span><img src="/public/front/images/line.svg" alt="line"></span> Healthy Living</p>
                    <h6>How can you keep your breakfast healthy and tasty?</h6>

                    <ul>
                      <li>Aug 6</li>
                      <li> <span><img src="/public/front/images/icon-read.svg" alt="icon read"></span> 3:00 min</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img tot-corner-img">
                  <img src="/public/front/images/tot-corner03-img.svg" alt="tot corner">

                  <label>Sports & Nutrition</label>
                </div>
                <div class="new-arrivals-content tot-corner">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <div class="corner-sad">
                      <label><img src="/public/front/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                      <label><img src="/public/front/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                      <label><img src="/public/front/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                    </div>
    
                    <p>Eating Healthy <span><img src="/public/front/images/line.svg" alt="line"></span> Healthy Living</p>
                    <h6>How can you keep your breakfast healthy and tasty?</h6>

                    <ul>
                      <li>Aug 6</li>
                      <li> <span><img src="/public/front/images/icon-read.svg" alt="icon read"></span> 3:00 min</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img tot-corner-img">
                  <img src="/public/front/images/tot-corner04-img.svg" alt="tot corner">

                  <label>Sports & Nutrition</label>
                </div>
                <div class="new-arrivals-content tot-corner">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <div class="corner-sad">
                      <label><img src="/public/front/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                      <label><img src="/public/front/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                      <label><img src="/public/front/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                    </div>
    
                    <p>Eating Healthy <span><img src="/public/front/images/line.svg" alt="line"></span> Healthy Living</p>
                    <h6>How can you keep your breakfast healthy and tasty?</h6>

                    <ul>
                      <li>Aug 6</li>
                      <li> <span><img src="/public/front/images/icon-video.svg" alt="icon read"></span> 3:00 min</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img tot-corner-img">
                  <img src="/public/front/images/tot-corner-img.svg" alt="tot corner">

                  <label>Food & Beverages</label>
                </div>
                <div class="new-arrivals-content tot-corner">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <div class="corner-sad">
                      <label><img src="/public/front/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                      <label><img src="/public/front/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                      <label><img src="/public/front/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                    </div>
    
                    <p>Eating Healthy <span><img src="/public/front/images/line.svg" alt="line"></span> Healthy Living</p>
                    <h6>How can you keep your breakfast healthy and tasty?</h6>

                    <ul>
                      <li>Aug 6</li>
                      <li> <span><img src="/public/front/images/icon-video.svg" alt="icon video"></span> 3:00 min</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="brands-day-box">
                <div class="brands-day-img tot-corner-img">
                  <img src="/public/front/images/tot-corner02-img.svg" alt="tot corner">

                  <label>Food & Beverages</label>
                </div>
                <div class="new-arrivals-content tot-corner">
                  <div class="brands-day-cont-rgt new-arrivals-rgt">
                    <div class="corner-sad">
                      <label><img src="/public/front/images/reaction-thumb.svg" alt="reaction thumb"> <span>12</span> </label>
                      <label><img src="/public/front/images/reaction-sad.svg" alt="reaction sad"> <span>6</span> </label>
                      <label><img src="/public/front/images/reaction-love.svg" alt="reaction love"> <span>2</span> </label>
                    </div>
    
                    <p>Eating Healthy <span><img src="/public/front/images/line.svg" alt="line"></span> Healthy Living</p>
                    <h6>How can you keep your breakfast healthy and tasty?</h6>

                    <ul>
                      <li>Aug 6</li>
                      <li> <span><img src="/public/front/images/icon-read.svg" alt="icon read"></span> 3:00 min</li>
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
    <img src="/public/front/images/back-to-top.svg" alt="back to top">
    <span>Back to Top</span>
  </div>

  <div class="back-to-top-img-bottom">
    <div class="aos-all">
        <div class="aos-item" data-aos="fade-up">
          <div class="aos-item__inner icon">
             <img src="/public/front/images/back-to-top-img-bottom.svg" alt="back  to top">
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
   
  }
  },
   components: { HeaderView },
  methods:{
     
     
    
  },
      mounted() {
         
      }
  }
</script>
