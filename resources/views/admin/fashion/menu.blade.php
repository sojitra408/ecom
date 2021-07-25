
<div class="list-group">
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-banner')) ? 'active' : '' }}" href="{{route('fashion.banner')}}">
   Banner <span class="small">(not active)</span>
  </a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-single')) ? 'active' : '' }}" href="{{route('fashion.single')}}">Big Products Slider</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-besties')) ? 'active' : '' }}" href="{{route('fashion.besties')}}">Your Besties Products</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-trending')) ? 'active' : '' }}" href="{{route('fashion.trending')}}">Head Turners of Fashion City</a>
   <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-best-deal')) ? 'active' : '' }}" href="{{route('fashion.best_deal')}}">Best Deal in town </a>
 
    <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-brands-of-day')) ? 'active' : '' }}" href="{{route('fashion.brand_ofday')}}">Brands of the day <span class="small">(1 Brand)</span></a>

  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-sponserd')) ? 'active' : '' }}" href="{{route('fashion.sponserd')}}">Sponsored</a>
   <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-dues')) ? 'active' : '' }}" href="{{route('fashion.dues')}}">Dudes (Products)</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-misses')) ? 'active' : '' }}" href="{{route('fashion.misses')}}">For Misses  (Products)</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-kids')) ? 'active' : '' }}" href="{{route('fashion.kids')}}">For Kids  (Products)</a> 
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-tot-recommend')) ? 'active' : '' }}" href="{{route('fashion.tot_recommend')}}">TOT Recommends </a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-best_deals_in_town')) ? 'active' : '' }}" href="{{route('fashion.best_deals_in_town.index')}}">Best Deals (8 Categories)</a>
  
<a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-best_deals_in_town_two')) ? 'active' : '' }}" href="{{route('fashion.best_deals_in_town_two.index')}}">Best Deals (3 Categories)</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-fashion_head_turners_for_dudes')) ? 'active' : '' }}" href="{{route('fashion.fashion_head_turners_for_dudes.edit')}}">Head turners for Dudes</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-fashion_head_turners_for_babes')) ? 'active' : '' }}" href="{{route('fashion.fashion_head_turners_for_babes.edit')}}">Head turners for Babes</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-fashion_head_turners_for_little_grown_ups')) ? 'active' : '' }}" href="{{route('fashion.fashion_head_turners_for_little_grown_ups.edit')}}">Head turners for Little Grown-ups</a>

<a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-fashion_head_turners_for_stoppers_in_city')) ? 'active' : '' }}" href="{{route('fashion.fashion_head_turners_for_stoppers_in_city.edit')}}">Show Stoppers in city</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/fashion-collections')) ? 'active' : '' }}" href="{{route('fashion.collections.edit')}}">Collections </a>
  
</div>
