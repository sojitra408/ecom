
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">



  <!-- Sidebar - Brand -->

  <a class="sidebar-brand d-flex align-items-center justify-content-left" href="#">

    <div class="sidebar-brand-icon rotate-n-15">

     <!-- <i class="fas fa-laugh-wink"></i>-->

   </div>

   <div class="sidebar-brand-text mx-3">ADMIN PANEL</div>

 </a>



 <!-- Divider -->

 <hr class="sidebar-divider my-0">



 <!-- Nav Item - Dashboard -->

 <li class="nav-item active">

  <a class="nav-link" href="{{route('admin.home')}}">

    <i class="fas fa-fw fa-tachometer-alt"></i>

    <span>Dashboard</span></a>

  </li>



  <!-- Divider -->

  <hr class="sidebar-divider">



  



  <!-- Nav Item - Pages Collapse Menu -->

  @if(Auth::user()->can('media'))
  <li class="nav-item">

    <a class="nav-link " href="{{route('media.list')}}">

      <i class="fas fa-fw fa-cog"></i>

      <span>Media</span>

    </a>

    

  </li>
  @endif
  @if(Auth::user()->can('seller-list') || Auth::user()->can('seller-add') || Auth::user()->can('seller-edit') || Auth::user()->can('seller-view') || Auth::user()->can('seller-delete'))
  <li class="nav-item">

    <a class="nav-link " href="{{route('admin.seller')}}">

      <i class="fas fa-fw fa-cog"></i>

      <span>Seller List</span>

    </a>

    

  </li>
  @endif
  
  
  @if(Auth::user()->can('brands') || Auth::user()->can('brands-add') || Auth::user()->can('brands-edit')|| Auth::user()->can('brands-view')|| Auth::user()->can('brands-delete')|| Auth::user()->can('brand-fashion-category') || Auth::user()->can('brand-fashion-category-add')|| Auth::user()->can('brand-fashion-category-edit')|| Auth::user()->can('brand-fashion-category-view')|| Auth::user()->can('brand-fashion-category-delete') || Auth::user()->can('brand-beauty-category') || Auth::user()->can('brand-beauty-category-add')|| Auth::user()->can('brand-beauty-category-edit')|| Auth::user()->can('brand-beauty-category-view')|| Auth::user()->can('brand-beauty-category-delete') || Auth::user()->can('brand-food-category') || Auth::user()->can('brand-food-category-add')|| Auth::user()->can('brand-food-category-edit')|| Auth::user()->can('brand-food-category-view')|| Auth::user()->can('brand-food-category-delete'))
  <li class="nav-item">

    <a class="nav-link collapsed" data-toggle="collapse" data-target="#brandcategories" aria-expanded="true" aria-controls="collapseTwo" href="#">

      <i class="fas fa-fw fa-cog"></i>

      <span>Brands</span>

    </a>
    
    
    <div id="brandcategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">
        @if(Auth::user()->can('brands') || Auth::user()->can('brands-add') || Auth::user()->can('brands-edit')|| Auth::user()->can('brands-view')|| Auth::user()->can('brands-delete'))
        <a class="collapse-item" href="{{route('admin.brand')}}">Brands</a>
        @endif
        @if(Auth::user()->can('brand-fashion-category') || Auth::user()->can('brand-fashion-category-add')|| Auth::user()->can('brand-fashion-category-edit')|| Auth::user()->can('brand-fashion-category-view')|| Auth::user()->can('brand-fashion-category-delete'))
        <a class="collapse-item" href="{{route('admin.brandfashioncategories')}}">Brand Fashion Category </a>
        @endif
        @if(Auth::user()->can('brand-beauty-category') || Auth::user()->can('brand-beauty-category-add')|| Auth::user()->can('brand-beauty-category-edit')|| Auth::user()->can('brand-beauty-category-view')|| Auth::user()->can('brand-beauty-category-delete') )
        <a class="collapse-item" href="{{route('admin.brandbeautycategories')}}">Brand Beauty Category </a>
        @endif
        @if(Auth::user()->can('brand-food-category') || Auth::user()->can('brand-food-category-add')|| Auth::user()->can('brand-food-category-edit')|| Auth::user()->can('brand-food-category-view')|| Auth::user()->can('brand-food-category-delete'))
        <a class="collapse-item" href="{{route('admin.brandfoodcategories')}}">Brand Food Category </a>
        @endif

        

      </div>

    </div>

  </li>
  @endif
  
  @if(Auth::user()->can('categories'))
  <li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseTwo">

      <i class="fas fa-fw fa-cog"></i>

      <span>Categories</span>

    </a>

    <div id="collapseLeads" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">

        <a class="collapse-item" href="{{route('admin.category')}}">Category List</a>

        

      </div>

    </div>

  </li>
  @endif

  @if(Auth::user()->can('attributes') || Auth::user()->can('attributes-add') || Auth::user()->can('attributes-edit') || Auth::user()->can('attributes-view') || Auth::user()->can('attributes-delete'))
  <li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeads1" aria-expanded="true" aria-controls="collapseTwo">

      <i class="fas fa-fw fa-cog"></i>

      <span>Attributes</span>

    </a>

    <div id="collapseLeads1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">

        <a class="collapse-item" href="{{route('admin.attributes')}}">Attributes List</a>

        

      </div>

    </div>

  </li>
  @endif

  <!-- Nav Item - Utilities Collapse Menu -->

  @if(Auth::user()->can('products') || Auth::user()->can('products-add') || Auth::user()->can('products-edit') || Auth::user()->can('products-view') || Auth::user()->can('products-delete') || Auth::user()->can('products-status'))
  <li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

      <i class="fas fa-fw fa-wrench"></i>

      <span>Products</span>

    </a>

    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">



        <a class="collapse-item" href="{{route('admin.product')}}">Products</a>

        

      </div>

    </div>

  </li>
  @endif



  <!-- Nav Item - Utilities Collapse Menu -->

  
  @if(Auth::user()->can('view-orders') || Auth::user()->can('view-orders-edit') ||Auth::user()->can('view-orders-view') || Auth::user()->can('view-orders-delete') || Auth::user()->can('transactions') || Auth::user()->can('orders-return'))
  <li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders" aria-expanded="true" aria-controls="orders">

      <i class="fas fa-fw fa-wrench"></i>

      <span>Orders</span>

    </a>

    <div id="orders" class="collapse" aria-labelledby="orders" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">


        @if(Auth::user()->can('view-orders')|| Auth::user()->can('view-orders-edit') ||Auth::user()->can('view-orders-view') || Auth::user()->can('view-orders-delete'))
        <a class="collapse-item" href="{{route('admin.order')}}">View Orders</a>

        
        @endif
        @if(Auth::user()->can('transactions'))
        <a class="collapse-item" href="{{route('admin.transaction')}}">Transactions</a>
        @endif
        @if(Auth::user()->can('orders-return'))
        <a class="collapse-item" href="{{route('admin.return.order')}}">Orders Return</a>
        @endif
      </div>

    </div>

  </li>

  @endif

  <!-- Divider -->

  <hr class="sidebar-divider">



  <!-- Heading -->

  <div class="sidebar-heading">

    Addons

  </div>



  <!-- Nav Item - Pages Collapse Menu -->
  @if(Auth::user()->can('report'))
  <li class="nav-item"> 

    <a class="nav-link" href="{{route('admin.report')}}">

      <i class="fas fa-fw fa-folder"></i>

      <span>Report</span>

    </a>

    

  </li>
  @endif
  @if(Auth::user()->can('sub-users')|| Auth::user()->can('sub-users-add')|| Auth::user()->can('sub-users-edit')|| Auth::user()->can('sub-users-view')|| Auth::user()->can('sub-users-delete'))
  <li class="nav-item"> 

    <a class="nav-link" href="{{route('admin.sub.users')}}">

      <i class="fas fa-fw fa-folder"></i>

      <span>Sub Users</span>

    </a>

    

  </li>
  @endif
  @if(Auth::user()->can('users')||Auth::user()->can('users-add')||Auth::user()->can('users-edit')||Auth::user()->can('users-view')||Auth::user()->can('users-delete'))
  <li class="nav-item"> 

    <a class="nav-link" href="{{route('admin.users')}}">

      <i class="fas fa-fw fa-folder"></i>

      <span>Users</span>

    </a>

    

  </li>



  <!-- Nav Item - Charts -->
  @endif
  @if(Auth::user()->can('taxes')||Auth::user()->can('taxes-add')|| Auth::user()->can('taxes-edit')|| Auth::user()->can('taxes-view')||Auth::user()->can('taxes-delete'))
  <li class="nav-item">

    <a class="nav-link" href="{{route('admin.tax')}}">

      <i class="fas fa-fw fa-chart-area"></i>

      <span> Taxes</span></a>

    </li>



    <!-- Nav Item - Tables -->
    @endif
    @if(Auth::user()->can('shipping')||Auth::user()->can('shipping-add')||Auth::user()->can('shipping-edit')||Auth::user()->can('shipping-view')||Auth::user()->can('shipping-delete'))
    <li class="nav-item">

      <a class="nav-link" href="{{route('admin.shipping')}}">

        <i class="fas fa-fw fa-table"></i>

        <span> Shipping</span></a>

      </li>

      @endif
      @if(Auth::user()->can('discount')||Auth::user()->can('discount-add')||Auth::user()->can('discount-edit')||Auth::user()->can('discount-view')||Auth::user()->can('discount-delete'))

      <li class="nav-item">

        <a class="nav-link" href="{{route('admin.discount')}}">

          <i class="fas fa-fw fa-table"></i>

          <span> Discount </span></a>

        </li>

        @endif
        @if(Auth::user()->can('static-page') || Auth::user()->can('about-page') || Auth::user()->can('contact-page') || Auth::user()->can('page-guide') || Auth::user()->can('payment-gateway-offer')|| Auth::user()->can('payment-gateway-offer-add')|| Auth::user()->can('payment-gateway-offer-edit')|| Auth::user()->can('payment-gateway-offer-view')|| Auth::user()->can('payment-gateway-offer-delete') || Auth::user()->can('hsn-code-list') || Auth::user()->can('hsn-code-list-add')|| Auth::user()->can('hsn-code-list-edit')|| Auth::user()->can('hsn-code-list-view')|| Auth::user()->can('hsn-code-list-delete') || Auth::user()->can('product-usp-list') || Auth::user()->can('product-usp-list-add')|| Auth::user()->can('product-usp-list-edit')|| Auth::user()->can('product-usp-list-view')|| Auth::user()->can('product-usp-list-delete') || Auth::user()->can('material-care') || Auth::user()->can('material-care-add')|| Auth::user()->can('material-care-edit')|| Auth::user()->can('material-care-view')|| Auth::user()->can('material-care-delete') || Auth::user()->can('size-fit') || Auth::user()->can('cuisine') || Auth::user()->can('cuisine-add')|| Auth::user()->can('cuisine-edit')|| Auth::user()->can('cuisine-view')|| Auth::user()->can('cuisine-delete') || Auth::user()->can('material') || Auth::user()->can('item-form') || Auth::user()->can('flavour') || Auth::user()->can('age') || Auth::user()->can('fabric') || Auth::user()->can('fabric-add')|| Auth::user()->can('fabric-edit')|| Auth::user()->can('fabric-view')|| Auth::user()->can('fabric-delete') || Auth::user()->can('fit') || Auth::user()->can('hair-type') || Auth::user()->can('length') || Auth::user()->can('neck') || Auth::user()->can('neck-add')|| Auth::user()->can('neck-edit')|| Auth::user()->can('neck-view')|| Auth::user()->can('neck-delete') || Auth::user()->can('pattern') || Auth::user()->can('pattern-add')|| Auth::user()->can('pattern-edit')|| Auth::user()->can('pattern-view')|| Auth::user()->can('pattern-delete') || Auth::user()->can('rise') || Auth::user()->can('scent') || Auth::user()->can('skin-type') || Auth::user()->can('sleeve') || Auth::user()->can('sole-material') || Auth::user()->can('product-type')|| Auth::user()->can('product-type-add')|| Auth::user()->can('product-type-edit')|| Auth::user()->can('product-type-view')|| Auth::user()->can('product-type-delete'))
        <li class="nav-item">

          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true" aria-controls="settings">

            <i class="fas fa-fw fa-wrench"></i>

            <span>Settings</span>

          </a>

          <div id="settings" class="collapse" aria-labelledby="settings" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

              @if(Auth::user()->can('static-page'))
              <a class="collapse-item" href="{{route('admin.setting')}}">Static Page</a>
              @endif
              @if(Auth::user()->can('about-page'))

              <a class="collapse-item" href="{{route('admin.about')}}">About Page</a>

              @endif
              @if(Auth::user()->can('contact-page'))
              <a class="collapse-item" href="{{route('admin.contact')}}">Contact Page</a>
              @endif
              @if(Auth::user()->can('page-guide'))

              <a class="collapse-item" href="{{route('admin.guide')}}">Page Guide</a>
              @endif
              @if(Auth::user()->can('payment-gateway-offer')|| Auth::user()->can('payment-gateway-offer-add')|| Auth::user()->can('payment-gateway-offer-edit')|| Auth::user()->can('payment-gateway-offer-view')|| Auth::user()->can('payment-gateway-offer-delete'))
              <a class="collapse-item" href="{{route('admin.payment_offer')}}">Payment Gateway Offer</a>
              @endif
              @if(Auth::user()->can('hsn-code-list')|| Auth::user()->can('hsn-code-list-add')|| Auth::user()->can('hsn-code-list-edit')|| Auth::user()->can('hsn-code-list-view')|| Auth::user()->can('hsn-code-list-delete'))
              <a class="collapse-item" href="{{route('admin.hsn_code')}}">HSN code list</a>
              @endif
              @if(Auth::user()->can('product-usp-list')|| Auth::user()->can('product-usp-list-add')|| Auth::user()->can('product-usp-list-edit')|| Auth::user()->can('product-usp-list-view')|| Auth::user()->can('product-usp-list-delete'))
              <a class="collapse-item" href="{{route('admin.product_usp')}}">Product USP list</a>
              @endif
              @if(Auth::user()->can('material-care')|| Auth::user()->can('material-care-add')|| Auth::user()->can('material-care-edit')|| Auth::user()->can('material-care-view')|| Auth::user()->can('material-care-delete'))
              <a class="collapse-item" href="{{route('admin.material_care')}}">Material & Care</a>
              @endif
              @if(Auth::user()->can('size-fit'))
              <a class="collapse-item" href="{{route('admin.size_fit')}}">Size & Fit</a>
              @endif
              @if(Auth::user()->can('cuisine')|| Auth::user()->can('cuisine-add')|| Auth::user()->can('cuisine-edit')|| Auth::user()->can('cuisine-view')|| Auth::user()->can('cuisine-delete'))
              
              <a class="collapse-item" href="{{route('admin.cuisine')}}">Cuisine</a>
              @endif
              @if(Auth::user()->can('material'))
              <a class="collapse-item" href="{{route('admin.material')}}">Material</a>
              @endif
              @if(Auth::user()->can('item-form'))
              <a class="collapse-item" href="{{route('admin.item_form')}}">Item Form</a>
              @endif
              @if(Auth::user()->can('flavour'))
              <a class="collapse-item" href="{{route('admin.flavour')}}">Flavour</a>
              @endif
              @if(Auth::user()->can('age'))
              
              <a class="collapse-item" href="{{route('admin.age')}}">Age</a>
              @endif
              @if(Auth::user()->can('fabric') || Auth::user()->can('fabric-add')|| Auth::user()->can('fabric-edit')|| Auth::user()->can('fabric-view')|| Auth::user()->can('fabric-delete'))
              <a class="collapse-item" href="{{route('admin.fabric')}}">Fabric</a>
              @endif
              @if(Auth::user()->can('fit'))
              <a class="collapse-item" href="{{route('admin.fit')}}">Fit</a>
              @endif
              @if(Auth::user()->can('hair-type'))
              <a class="collapse-item" href="{{route('admin.hair_type')}}">Hair Type</a>
              @endif
              @if(Auth::user()->can('length'))

              <a class="collapse-item" href="{{route('admin.length')}}">Length</a>
              @endif
              @if(Auth::user()->can('neck')|| Auth::user()->can('neck-add')|| Auth::user()->can('neck-edit')|| Auth::user()->can('neck-view')|| Auth::user()->can('neck-delete'))
              <a class="collapse-item" href="{{route('admin.neck')}}">Neck</a>
              @endif
              @if(Auth::user()->can('pattern')|| Auth::user()->can('pattern-add')|| Auth::user()->can('pattern-edit')|| Auth::user()->can('pattern-view')|| Auth::user()->can('pattern-delete'))
              <a class="collapse-item" href="{{route('admin.pattern')}}">Pattern</a>
              @endif
              @if(Auth::user()->can('rise'))
              <a class="collapse-item" href="{{route('admin.rise')}}">Rise</a>
              @endif
              @if(Auth::user()->can('scent'))
              <a class="collapse-item" href="{{route('admin.scent')}}">Scent</a>
              @endif
              @if(Auth::user()->can('skin-type'))
              <a class="collapse-item" href="{{route('admin.skin_type')}}">Skin Type</a>
              @endif
              @if( Auth::user()->can('sleeve'))
              <a class="collapse-item" href="{{route('admin.sleeve')}}">Sleeve</a>
              @endif
              @if(Auth::user()->can('sole-material'))
              <a class="collapse-item" href="{{route('admin.sole_material')}}">Sole Material</a>
              @endif
              @if(Auth::user()->can('product-type')|| Auth::user()->can('product-type-add')|| Auth::user()->can('product-type-edit')|| Auth::user()->can('product-type-view')|| Auth::user()->can('product-type-delete'))
              
              <a class="collapse-item" href="{{route('admin.product_type')}}">Product Type</a>
              @endif

            </div>

          </div>

        </li>



        <!-- <li class="nav-item">

        <a class="nav-link" href="{{route('admin.setting')}}">

          <i class="fas fa-fw fa-table"></i>

          <span> Settings</span></a>

        </li> -->

        @endif
        @if(Auth::user()->can('home-page'))

        <li class="nav-item">

          <a class="nav-link " href="{{route('sliders.index')}}" >

            <i class="fas fa-fw fa-cog"></i>

            <span>Home page</span>

          </a>

          

        </li>
        @endif
        @if(Auth::user()->can('fashion-category'))
        <li class="nav-item">

          <a class="nav-link " href="{{route('fashion.banner')}}" >

            <i class="fas fa-fw fa-cog"></i>

            <span>Fashion Category</span>

          </a>

          

        </li>
        @endif
        @if(Auth::user()->can('beauty-category'))

        <li class="nav-item">

          <a class="nav-link " href="{{route('beauty.banner')}}" >

            <i class="fas fa-fw fa-cog"></i>

            <span>Beauty Category</span>

          </a>

          

        </li>
        @endif
        @if(Auth::user()->can('food-category'))

        <li class="nav-item">

          <a class="nav-link " href="{{route('food.banner')}}" >

            <i class="fas fa-fw fa-cog"></i>

            <span>Food Category</span>

          </a>

          

        </li>
        @endif
        @if(Auth::user()->can('features-master'))
        <li class="nav-item">

          <a class="nav-link" href="{{route('admin.features')}}">

            <i class="fas fa-fw fa-table"></i>

            <span> Features Master</span></a>

          </li>
          @endif
          @if(Auth::user()->can('size-master')||Auth::user()->can('size-master-add')||Auth::user()->can('size-master-edit')||Auth::user()->can('size-master-view')||Auth::user()->can('size-master-delete'))
          <li class="nav-item">

            <a class="nav-link" href="{{route('admin.size_master')}}">

              <i class="fas fa-fw fa-table"></i>

              <span> Size Master</span></a>

            </li>

            @endif
            @if(Auth::user()->can('faq-master'))
            <li class="nav-item">

              <a class="nav-link" href="{{route('admin.faq')}}">

                <i class="fas fa-fw fa-table"></i>

                <span> FAQ Master</span></a>

              </li>
              @endif
              @if(Auth::user()->can('help-center')||Auth::user()->can('help-center-add')||Auth::user()->can('help-center-edit')||Auth::user()->can('help-center-view')||Auth::user()->can('help-center-delete'))
              <li class="nav-item">

                <a class="nav-link" href="{{route('admin.help_center')}}">

                  <i class="fas fa-fw fa-table"></i>

                  <span> Help Center</span></a>

                </li>

                @endif
                @if(Auth::user()->can('tags'))

                <li class="nav-item">

                  <a class="nav-link" href="{{route('admin.tags')}}">

                    <i class="fas fa-fw fa-table"></i>

                    <span> Tags</span></a>

                  </li>
                  @endif
                  @if(Auth::user()->can('transaction'))


                  <li class="nav-item">

                    <a class="nav-link" href="{{route('admin.transaction')}}">

                      <i class="fas fa-fw fa-table"></i>

                      <span> Transaction</span></a>

                    </li>

                    @endif
                    @if(Auth::user()->can('postalcode-management')||Auth::user()->can('postalcode-management-add')||Auth::user()->can('postalcode-management-edit')||Auth::user()->can('postalcode-management-view')||Auth::user()->can('postalcode-management-delete'))

                    <li class="nav-item">

                      <a class="nav-link" href="{{route('admin.postal')}}">

                        <i class="fas fa-fw fa-table"></i>

                        <span> Postalcode Management</span></a>

                      </li>
                      @endif
                      @if(Auth::user()->can('collections')||Auth::user()->can('collections-add')||Auth::user()->can('collections-edit')||Auth::user()->can('collections-view')||Auth::user()->can('collections-delete'))
                      <li class="nav-item">

                        <a class="nav-link" href="{{route('admin.manage.collection')}}">

                          <i class="fas fa-fw fa-table"></i>

                          <span>Collections</span></a>

                        </li>
                        @endif
                        @if(Auth::user()->can('menu-management'))
                        <li class="nav-item">

                          <a class="nav-link" href="{{route('admin.manage.menu')}}">

                            <i class="fas fa-fw fa-table"></i>

                            <span>Menu Management</span></a>

                          </li>
                          @endif
                          @if(Auth::user()->can('home-blog-list') || Auth::user()->can('post-list') || Auth::user()->can('blog-category-list') )
                          

                          

                          <li class="nav-item">

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseTwo">

                              <i class="fas fa-fw fa-cog"></i>

                              <span>Blog Management</span>

                            </a>

                            <div id="collapseBlog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                              <div class="bg-white py-2 collapse-inner rounded">

                                @if(Auth::user()->can('home-blog-list'))
                                <a class="collapse-item" href="{{route('admin.bloglisthome')}}">Home Blog List</a>
                                @endif
                                @if(Auth::user()->can('post-list'))
                                <a class="collapse-item" href="{{route('admin.blog')}}">Post List</a>
                                @endif
                                @if(Auth::user()->can('blog-category-list') )
                                <a class="collapse-item" href="{{route('admin.blogcategory')}}">Category List</a>
                                @endif


                                

                              </div>

                            </div>

                          </li>
                          @endif
                          @if(Auth::user()->can('reviews'))
                          <li class="nav-item">

                            <a class="nav-link" href="{{route('admin.reviews')}}">

                              <i class="fas fa-fw fa-table"></i>

                              <span>Reviews</span></a>

                            </li>
                            @endif


                            <!-- Divider -->

                            <hr class="sidebar-divider d-none d-md-block">



      <!-- Sidebar Toggler (Sidebar)

      <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle"></button>

      </div>

    -->

  </ul>

