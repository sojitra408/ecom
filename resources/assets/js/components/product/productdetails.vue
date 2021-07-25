<template>
  <div>
  <header-view :settings.sync="settings"></header-view>
  <section class="product_list_area_top">
        <div class="container-fluid">
            <ul>
              <li>
                <a href="#"><i class="fa fa-home"></i></a>
                <span>/</span>
              </li>
              <li>
                <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                <span>/</span>
              </li>
              <li>
                <a href="#">
                  <select id="selectpicker" class="selectpicker" data-live-search="true">
                        <option>Fashion & Apparel</option>
                        <option value="" data-subtext="">Linen</option>
                        <option value="" data-subtext="">Cotton</option>
                        <option value="" data-subtext="">Satin</option>
                        <option value="" data-subtext="">Soft Cotton</option>
                        <option value="" data-subtext="">Chicken</option>
                        <option value="" data-subtext="">Woven</option>
                  </select>
                </a>
                <span>/</span>
              </li>
              <li>
                <a href="#">
                  <select id="selectpicker" class="selectpicker" data-live-search="true">
                        <option>Men</option>
                        <option value="" data-subtext="">Linen</option>
                        <option value="" data-subtext="">Cotton</option>
                        <option value="" data-subtext="">Satin</option>
                        <option value="" data-subtext="">Soft Cotton</option>
                        <option value="" data-subtext="">Chicken</option>
                        <option value="" data-subtext="">Woven</option>
                  </select>
                </a>
                <span>/</span>
              </li>
              <li>
                <a href="#">Shirts</a>
              </li>
            </ul>
        </div>
    </section>

    <div class="product_detail_top_area">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-7">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="product_detail_top_image">
                              <img src="/front/assets/images/brands-day-img03.svg">
                          </div>
                          <div class="product_detail_top_image">
                              <img src="/front/assets/images/brands-day-img03.svg">
                          </div>
                          <div class="product_detail_top_image">
                              <img src="/front/assets/images/brands-day-img03.svg">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="product_detail_top_image">
                              <img src="/front/assets/images/brands-day-img03.svg">
                          </div>
                          <div class="product_detail_top_image">
                              <img src="/front/assets/images/brands-day-img03.svg">
                          </div>
                          <div class="product_detail_top_image">
                              <img src="/front/assets/images/brands-day-img03.svg">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="product_detail_top_right">
                      <h4>{{products.product_name}}</h4>
                      <ul>
                          <li>
                              <a href="#"><i class="fa fa-star" aria-hidden="true"></i> 4.5</a>
                              <span>|</span>
                          </li>

                          <li>
                              <a href="#">16 Reviews</a>
                          </li>
                          <li>
                              <a href="#">New</a>
                          </li>
                          <li>
                              <a href="#"><img src="/front/assets/images/icon-tel.svg" alt=""></a>
                          </li>
                          <li>
                              <a href="#"><img src="/front/assets/images/bargain-icon.svg" alt=""></a>
                          </li>
                          <div class="product_detail_top_right_share">
                              <li>
                                <a href="#"><img src="/front/assets/images/icon6.jpg" alt=""></a>
                              </li>
                              <li>
                                <a href="#"><img src="/front/assets/images/icon7.jpg" alt=""></a>
                              </li>
                          </div>
                      </ul>
                      <div class="product_detail_top_color">
                          <p>Color : <span>Yellow and Grey</span></p>
                        <!--  <img  src="/front/assets/images/color1.jpg">
                          <img src="/front/assets/images/color2.jpg">
                          <img src="/front/assets/images/color3.jpg">-->
                          <a  v-for="item in products.colors" v-bind:key="item.id"  href="#">({{item.value_name}}) </a>
                      </div>
                      <div class="product_detail_top_size">
                          <p>Size</p>
                          <ul>
                            <li>
                              <a  v-for="item in products.sizes" v-bind:key="item.id" href="#">{{item.value_name}}</a>
                              
                            </li>
                            <h5><a href="#">Find my fit</a></h5>
                          </ul>
                          <h6>Size out of stock?<a href="#">View Similar Product</a></h6>
                      </div>
                      <div class="product_detail_top_rupee">
                        <h5>₹ 1500<u>₹ 1650</u> <span>40% off</span></h5>
                        <p>Inclusive of all taxes</p>
                      </div>
                      <div class="product_detail_top_add_remove">
                        <ul>
                            <li>
                              <a href="#"><i class="fa fa-window-minimize"></i></a>
                              <a href="#">1</a>
                              <a href="#"><i class="fa fa-plus"></i></a>
                            </li>
                            <h5><a href="#"><i class="fa fa-heart"></i></a></h5>
                          </ul>
                      </div>
                      <div class="product_detail_top_add_bag">
                        <a class="shop-btn" href="#"><i class="fa fa-shopping-bag"></i> Add to Bag</a>
                      </div>
                      <div class="product_detail_top_timer">
                        <p><img src="/front/assets/images/bargain-icon.svg" alt="">Bragain This <u>00:30:10</u> <span><img src="/front/assets/images/trial.jpg" alt=""></span></p>
                      </div>
                      <div class="product_detail_top_color">
                          <p>Reward : <span>20 TOT Point</span></p>
                          <p>Available offers</p>
                          <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
                          <h6>Lorem ipsum dolor sit amet, consecteturs</h6>
                      </div>
                      <div class="product_detail_top_deliver">
                          <p>Deliver To</span></p>
                          <ul>
                            <li>
                              <input type="text" placeholder="Enter pin code" name="">
                              <button>Check</button>
                            </li>
                            <li>Lorem ipsum dolor sit amet, consecte cons adipisicing elit</li>
                          </ul>
                      </div>
                      <div class="product_detail_top_return">
                          <ul>
                            <li>
                              <img src="/front/assets/images/delivery1.jpg">
                              <span>14 Days return policy</span>
                            </li>
                            <li>
                              <img src="/front/assets/images/delivery2.jpg">
                              <span>14 Days return policy</span>
                            </li>
                            <li>
                              <img src="/front/assets/images/delivery3.jpg">
                              <span>14 Days return policy</span>
                            </li>
                          </ul>
                      </div>
                      <div class="product_detail_top_trial_room">
                        <img class="product_trial_room_img" src="/front/assets/images/trial_room.jpg">
                        <h4>Lorem ipsum dolor sit amet <span>Lorem ipsum dolor sit amet, consecteturs</span></h4>
                        <a href="#"><img src="/front/assets/images/arrow-rgt.svg" alt=""></a>
                      </div>
                      <div class="product_detail_top_organic">
                          <ul>
                            <li>Minimal</li>
                            <li>Premium Quality</li>
                          </ul>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                          <a href="#"><i class="fa fa-plus"></i> More</a>
                      </div>
                      <div class="product_listing_detail_accordion faq-section">
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header">
                              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                Size & Fit
                              </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                                <p>The Model (Height 6') is wearing a size M</p>
                                <ul>
                                  <li>Fit <span>Slim Fit</span></li>
                                  <li>Lenght <span>Regular</span></li>
                                  <li>Neck <span>Pollo</span></li>
                                  <li>Sleeve <span>Regular Sleeve</span></li>
                                  <li>Fit <span>Slim Fit</span></li>
                                  <li>Lenght <span>Regular</span></li>
                                  <li>Neck <span>Pollo</span></li>
                                  <li>Sleeve <span>Regular Sleeve</span></li>
                                </ul>
                                <h6>Product Code: 11199988</h6>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                              Material & Care
                            </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion" style="margin-left: -151px;">
                              <div class="card-body">
                                <p>The Model (Height 6') is wearing a size M</p>
                                <ul>
                                  <li>Fit <span>Slim Fit</span></li>
                                  <li>Lenght <span>Regular</span></li>
                                  <li>Neck <span>Pollo</span></li>
                                  <li>Sleeve <span>Regular Sleeve</span></li>
                                  <li>Fit <span>Slim Fit</span></li>
                                  <li>Lenght <span>Regular</span></li>
                                  <li>Neck <span>Pollo</span></li>
                                  <li>Sleeve <span>Regular Sleeve</span></li>
                                </ul>
                                <h6>Product Code: 11199988</h6>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                Specifications
                              </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion" style="margin-left: -303px;">
                              <div class="card-body">
                                <p>The Model (Height 6') is wearing a size M</p>
                                <ul>
                                  <li>Fit <span>Slim Fit</span></li>
                                  <li>Lenght <span>Regular</span></li>
                                  <li>Neck <span>Pollo</span></li>
                                  <li>Sleeve <span>Regular Sleeve</span></li>
                                  <li>Fit <span>Slim Fit</span></li>
                                  <li>Lenght <span>Regular</span></li>
                                  <li>Neck <span>Pollo</span></li>
                                  <li>Sleeve <span>Regular Sleeve</span></li>
                                </ul>
                                <h6>Product Code: 11199988</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
 
    <section class="day-beauty-all-about-secton product_detail_all_about directors-section">
      <div class="directors-content">
        <div class="day-beauty-all-about-secton-left">
            <img src="/front/assets/images/Screenshot-2020-10-09.png">
            <p><span>20% off</span></p>
        </div>
        <div class="day-beauty-all-about-secton-right">
          <div class="day-beauty-all-about-secton-heading">Brand of the Day</div>
          <div class="directors-shot-text">
              <div class="directors-top">
                <img src="/front/assets/images/bare_anatomy.png" alt="pahadi local">

                <div class="directors-pahadiinfo">Bare Anatomy <p><span><i class="fa fa-star" aria-hidden="true"></i></span> 4.5</p></div>
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

    <div class="product_detail_review_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="product_detail_review_rating">
                        <h4>Reviews</h4>
                        <ul>
                          <li>
                              <i class="fa fa-star" aria-hidden="true"></i> 4.5
                          </li>
                          <li>
                              16 Reviews
                          </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product_detail_review_progress">
                        <label for="file">True to size</label>
                        <div class="progress" style="height:5px">
                          <div class="progress-bar" style="width:100%;height:5px"></div>
                        </div>
                        <span>10</span>
                    </div>
                    <div class="product_detail_review_progress">
                        <label for="file">Small</label>
                        <div class="progress" style="height:5px">
                          <div class="progress-bar" style="width:20%;height:5px"></div>
                        </div>
                        <span>2</span>
                    </div>
                    <div class="product_detail_review_progress">
                        <label for="file">Large</label>
                        <div class="progress" style="height:5px">
                          <div class="progress-bar" style="width:40%;height:5px"></div>
                        </div>
                        <span>4</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product_detail_review_right">
                        <a href="#">Write a Review</a>
                    </div>
                </div>
            </div>
            <div class="product_detail_review_all">
              <div class="row">
                  <div class="col-md-4">
                      <div class="product_detail_review_all_left">
                          <p>All Reviews (16)</p>
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="product_detail_review_all_right">
                          <ul>
                            <li>
                              <select id="ajax-select-multiple" class="selectpicker with-ajax" multiple data-live-search="true">
                                        <option>Fashion & Apparel</option>
                                        <option value="" data-subtext="">Linen</option>
                                        <option value="" data-subtext="">Cotton</option>
                                        <option value="" data-subtext="">Satin</option>
                                        <option value="" data-subtext="">Soft Cotton</option>
                                        <option value="" data-subtext="">Chicken</option>
                                        <option value="" data-subtext="">Woven</option>
                              </select>
                              <p>Selected values <span><i class="fa fa-times"></i></span></p>
                            </li>
                            <li>
                              <select id="ajax-select-multiple" class="selectpicker with-ajax" multiple data-live-search="true">
                                        <option>Fashion & Apparel</option>
                                        <option value="" data-subtext="">Linen</option>
                                        <option value="" data-subtext="">Cotton</option>
                                        <option value="" data-subtext="">Satin</option>
                                        <option value="" data-subtext="">Soft Cotton</option>
                                        <option value="" data-subtext="">Chicken</option>
                                        <option value="" data-subtext="">Woven</option>
                                  </select>
                              <p>Selected values <span><i class="fa fa-times"></i></span></p>
                            </li>
                            <li>
                              <select id="ajax-select-multiple" class="selectpicker with-ajax" multiple data-live-search="true">
                                        <option>Fashion & Apparel</option>
                                        <option value="" data-subtext="">Linen</option>
                                        <option value="" data-subtext="">Cotton</option>
                                        <option value="" data-subtext="">Satin</option>
                                        <option value="" data-subtext="">Soft Cotton</option>
                                        <option value="" data-subtext="">Chicken</option>
                                        <option value="" data-subtext="">Woven</option>
                                  </select>
                              <p>Selected values <span><i class="fa fa-times"></i></span></p>
                            </li>
                            <li>
                              <select id="ajax-select-multiple" class="selectpicker with-ajax" multiple data-live-search="true">
                                        <option>Fashion & Apparel</option>
                                        <option value="" data-subtext="">Linen</option>
                                        <option value="" data-subtext="">Cotton</option>
                                        <option value="" data-subtext="">Satin</option>
                                        <option value="" data-subtext="">Soft Cotton</option>
                                        <option value="" data-subtext="">Chicken</option>
                                        <option value="" data-subtext="">Woven</option>
                                  </select>
                              <p>Selected values <span><i class="fa fa-times"></i></span></p>
                            </li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
            <div class="product_detail_review_quality">
                <div class="row">
                    <div class="col-md-4" style="padding-right: 50px;">
                        <div class="product_detail_review_quality_box">
                            <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              4
                            </span>
                            <h4>Nice Quality</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Overall Fit</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Size</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Color</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="product_detail_review_quality_details">
                                <h5>TOT Buyer, Jaipur</h5>
                                <h6>2 days ago</h6>
                            </div>
                            <div class="product_detail_review_quality_like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3</div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding: 0 25px;">
                        <div class="product_detail_review_quality_box">
                            <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              4
                            </span>
                            <h4>Nice Quality</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Overall Fit</h5>
                                        <h6>True to size</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Size</h5>
                                        <h6>True to size</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Color</h5>
                                        <h6>True to size</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="product_detail_review_quality_details">
                                <h5>TOT Buyer, Jaipur</h5>
                                <h6>2 days ago</h6>
                            </div>
                            <div class="product_detail_review_quality_like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3</div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 50px;">
                        <div class="product_detail_review_quality_box">
                            <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              4
                            </span>
                            <h4>Nice Quality</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Overall Fit</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                        <h5>TOT Buyer, Jaipur</h5>
                                        <h6>2 days ago</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Size</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Color</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="product_detail_review_quality_like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_detail_review_quality">
                <div class="row">
                    <div class="col-md-4" style="padding-right: 50px;">
                        <div class="product_detail_review_quality_box">
                            <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              4
                            </span>
                            <h4>Nice Quality</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Overall Fit</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Size</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Color</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="product_detail_review_quality_details">
                                <h5>TOT Buyer, Jaipur</h5>
                                <h6>2 days ago</h6>
                            </div>
                            <div class="product_detail_review_quality_like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3</div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding: 0 25px;">
                        <div class="product_detail_review_quality_box">
                            <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              4
                            </span>
                            <h4>Nice Quality</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Overall Fit</h5>
                                        <h6>True to size</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Size</h5>
                                        <h6>True to size</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Color</h5>
                                        <h6>True to size</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="product_detail_review_quality_details">
                                <h5>TOT Buyer, Jaipur</h5>
                                <h6>2 days ago</h6>
                            </div>
                            <div class="product_detail_review_quality_like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3</div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 50px;">
                        <div class="product_detail_review_quality_box">
                            <span>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              4
                            </span>
                            <h4>Nice Quality</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Overall Fit</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                        <h5>TOT Buyer, Jaipur</h5>
                                        <h6>2 days ago</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Size</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product_detail_review_quality_box_inner">
                                        <h5>Color</h5>
                                        <h6>True to size</h6>
                                        <img src="/front/assets/images/brands-day-img03.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="product_detail_review_quality_like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination_area product_detail_pagination">
        <div class="pagination">
          <a href="#">&laquo;</a>
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">6</a>
          <a href="#">&raquo;</a>
        </div>
    </div>

    <section class="brands-day-section new-arrivals-section" style="padding-top: 110px;padding-bottom: 50px;margin: 0;">
        <div class="brand-day-head">Similar Product</div>    
        <div class="brand-square-slider-rgt brands-day-content">
            <div class="brand-view-btn"><a href="JavaScript:void(0);">View All</a></div>
            <div class="new-day-slider">
              <div class="brands-day-box">
                <div class="brands-day-img">
                  <img src="/front/assets/images/new-arrivals-arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>

                    <div class="arrivals-rgt">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/like-icon.svg" alt="Like"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/book-icon.svg" alt="Book"></a></li>
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
                  <img src="/front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/front/assets/images/new-arrivals-bare-anatomy-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/front/assets/images/new-arrivals-true-elements-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
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
                  <img src="/front/assets/images/new-arrivals-arata-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);" class="new-arrivals-btn">new</a></li>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
                      </ul>
                    </div>

                    <div class="arrivals-rgt">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/like-icon.svg" alt="Like"></a></li>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/book-icon.svg" alt="Book"></a></li>
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
                  <img src="/front/assets/images/new-arrivals-sleepy-owl-box-img.svg" alt="Arata">
                  <div class="new-arrivals-hov">
                    <div class="new-arrivals-lft">
                      <ul>
                        <li><a href="JavaScript:void(0);"><img src="/front/assets/images/bargain-icon.svg" alt="Bargain"></a></li>
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

   

    <section class="building-healthy-section">
      <h3 data-aos="fade-left">We are building a healthy <span>culture around you</span></h3>

      <div class="back-to-top">
        <img src="/front/assets/images/back-to-top.svg" alt="back to top">
        <span>Back to Top</span>
      </div>

      <div class="back-to-top-img-bottom">
        <div class="aos-all">
            <div class="aos-item" data-aos="fade-up">
              <div class="aos-item__inner icon">
                 <img src="/front/assets/images/back-to-top-img-bottom.svg" alt="back  to top">
              </div>
            </div>
        </div>
      </div>
    </section>

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
    products:[],
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
    productDetails() {
    
        axios.get(this.$config.baseApiUrl+'/productdetails/'+ this.$route.params.id)
        .then((response) => {
		 console.log(response.data.result);
		  this.products=response.data.result;
           
        })
        .catch(function(error) {         
        });
      },
     homeSlider() {
        axios.get(this.$config.baseApiUrl+'/homeslider')
        .then((response) => {
		 
		  this.slider=response.data.result;
           
        })
        .catch(function(error) {         
        });
      },
      homeSingle() {
        axios.get(this.$config.baseApiUrl+'/homesingle')
        .then((response) => {
		
		  this.single=response.data.result;
        this.single_name=response.data.result.products.product_name;
        })
        .catch(function(error) {         
        });
      },
      homeBrand() {
        axios.get(this.$config.baseApiUrl+'/homebrands')
        .then((response) => {
		
		  this.brands=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeBrandofDays() {
        axios.get(this.$config.baseApiUrl+'/homebrandofdays')
        .then((response) => {
		
		  this.brandofdays=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeNewArrival() {
        axios.get(this.$config.baseApiUrl+'/homenewarrival')
        .then((response) => {
		
		  this.newarrivals=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeTurner() {
        axios.get(this.$config.baseApiUrl+'/hometurner')
        .then((response) => {
		
		  this.turners=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeSponsor() {
        axios.get(this.$config.baseApiUrl+'/homesponsor')
        .then((response) => {
		
		  this.sponsors=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeTopSelling() {
        axios.get(this.$config.baseApiUrl+'/hometopselling')
        .then((response) => {
		
		  this.topsellings=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeBestDeal() {
        axios.get(this.$config.baseApiUrl+'/homebestdeal')
        .then((response) => {
		
		  this.bestdeals=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
      homeTotRecommened() {
        axios.get(this.$config.baseApiUrl+'/hometotrecommened')
        .then((response) => {
		
		  this.recommends=response.data.result;
        
        })
        .catch(function(error) {         
        });
      },
    
  },
      mounted() {
        this.productDetails();
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
