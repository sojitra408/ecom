
<div class="list-group">
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/sliders')) ? 'active' : '' }}" href="{{route('beauty.banner')}}">
   Banner
  </a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-single')) ? 'active' : '' }}" href="{{route('beauty.single')}}">Single Product</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-brands-of-day')) ? 'active' : '' }}" href="{{route('beauty.brand_ofday')}}">Brands of the day</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-head-turner')) ? 'active' : '' }}" href="{{route('beauty.head_turner')}}">Head Turners</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-sponserd')) ? 'active' : '' }}" href="{{route('beauty.sponserd')}}">Sponsored</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-top-sell')) ? 'active' : '' }}" href="{{route('beauty.top_sell')}}">Top selling Category</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-best-deal')) ? 'active' : '' }}" href="{{route('beauty.best_deal')}}">Best Deals</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-tot-recommend')) ? 'active' : '' }}" href="{{route('beauty.tot_recommend')}}">TOT Recommends </a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-besties')) ? 'active' : '' }}" href="{{route('beauty.besties')}}">Besties</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-trending')) ? 'active' : '' }}" href="{{route('beauty.trending')}}">Trending Products</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-dues')) ? 'active' : '' }}" href="{{route('beauty.dues')}}">Dues</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-misses')) ? 'active' : '' }}" href="{{route('beauty.misses')}}">For Misses</a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-kids')) ? 'active' : '' }}" href="{{route('beauty.kids')}}">For Kids</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-best_deals_in_town')) ? 'active' : '' }}" href="{{route('beauty.best_deals_in_town.index')}}">Best Deals (8 Categories)</a>
  
<a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-best_deals_in_town_two')) ? 'active' : '' }}" href="{{route('beauty.best_deals_in_town_two.index')}}">Best Deals (3 Categories)</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-beauty_head_turners_for_dudes')) ? 'active' : '' }}" href="{{route('beauty.beauty_head_turners_for_dudes.edit')}}">Head turners for Dudes</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-beauty_head_turners_for_babes')) ? 'active' : '' }}" href="{{route('beauty.beauty_head_turners_for_babes.edit')}}">Head turners for Babes</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-beauty_head_turners_for_little_grown_ups')) ? 'active' : '' }}" href="{{route('beauty.beauty_head_turners_for_little_grown_ups.edit')}}">Head turners for Little Grown-ups</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-beauty_head_turners_for_stoppers_in_city')) ? 'active' : '' }}" href="{{route('beauty.beauty_head_turners_for_stoppers_in_city.edit')}}">Show Stoppers in city</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/beauty-collections')) ? 'active' : '' }}" href="{{route('beauty.collections.edit')}}">Collections </a>
  
</div>
