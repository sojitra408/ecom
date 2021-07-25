
<div class="list-group">
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-banner')) ? 'active' : '' }}" href="{{route('food.banner')}}">
   Banner
  </a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-single-slider')) ? 'active' : '' }}" href="{{route('food.single.slider')}}">Big Products Slider</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-single')) ? 'active' : '' }}" href="{{route('food.single')}}">Single Product</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-brands-of-day')) ? 'active' : '' }}" href="{{route('food.brand_ofday')}}">Brands of the day</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-head-turner')) ? 'active' : '' }}" href="{{route('food.head_turner')}}">Head Turners</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-sponserd')) ? 'active' : '' }}" href="{{route('food.sponserd')}}">Sponsored</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-top-sell')) ? 'active' : '' }}" href="{{route('food.top_sell')}}">Top selling Category</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-best-deal')) ? 'active' : '' }}" href="{{route('food.best_deal')}}">Best Deals</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-tot-recommend')) ? 'active' : '' }}" href="{{route('food.tot_recommend')}}">TOT Recommends </a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-besties')) ? 'active' : '' }}" href="{{route('food.besties')}}">Besties</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-trending')) ? 'active' : '' }}" href="{{route('food.trending')}}">Trending Products</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-dues')) ? 'active' : '' }}" href="{{route('food.dues')}}">Dues</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-misses')) ? 'active' : '' }}" href="{{route('food.misses')}}">For Misses</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-kids')) ? 'active' : '' }}" href="{{route('food.kids')}}">For Kids</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-best_deals_in_town')) ? 'active' : '' }}" href="{{route('food.best_deals_in_town.index')}}">Best Deals (8 Categories)</a>
  
<a class="list-group-item list-group-item-action {{ (request()->is('admin/food-best_deals_in_town_two')) ? 'active' : '' }}" href="{{route('food.best_deals_in_town_two.index')}}">Best Deals (3 Categories)</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/food-food_head_turners_for_dudes')) ? 'active' : '' }}" href="{{route('food.food_head_turners_for_dudes.edit')}}">Head turners for Dudes</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/food-food_head_turners_for_babes')) ? 'active' : '' }}" href="{{route('food.food_head_turners_for_babes.edit')}}">Head turners for Babes</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/food-food_head_turners_for_little_grown_ups')) ? 'active' : '' }}" href="{{route('food.food_head_turners_for_little_grown_ups.edit')}}">Head turners for Little Grown-ups</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/food-food_head_turners_for_stoppers_in_city')) ? 'active' : '' }}" href="{{route('food.food_head_turners_for_stoppers_in_city.edit')}}">Show Stoppers in city</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/food-collections')) ? 'active' : '' }}" href="{{route('food.collections.edit')}}">Collections </a>
  
</div>
