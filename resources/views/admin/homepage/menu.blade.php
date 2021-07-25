
<div class="list-group">
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/sliders')) ? 'active' : '' }}" href="{{route('sliders.index')}}">
   <span class="small">Homepage Banner text (not active)</span>
  </a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/single/edit')) ? 'active' : '' }}" href="{{route('home.single')}}">Big Brand Slider</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-brands-square')) ? 'active' : '' }}" href="{{route('home.brand_square')}}">Brands Square</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-brands-of-day')) ? 'active' : '' }}" href="{{route('home.brand_ofday')}}">Brands of the day</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-head-turner')) ? 'active' : '' }}" href="{{route('home.head_turner')}}">Head Turners</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-sponserd')) ? 'active' : '' }}" href="{{route('home.sponserd')}}">Sponsored (2 Products)</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-top-sell')) ? 'active' : '' }}" href="{{route('home.top_sell')}}">Top selling Category</a>
  <!--<a class="list-group-item list-group-item-action {{ (request()->is('admin/home-best-deal')) ? 'active' : '' }}" href="{{route('home.best_deal')}}">Best Deals </a>-->
<a class="list-group-item list-group-item-action {{ (request()->is('admin/home-best_deals_in_town')) ? 'active' : '' }}" href="{{route('home.best_deals_in_town.index')}}">Best Deals (8 Categories)</a>
<a class="list-group-item list-group-item-action {{ (request()->is('admin/home-best_deals_in_town_two')) ? 'active' : '' }}" href="{{route('home.best_deals_in_town_two.index')}}">Best Deals (3 Categories)</a>
    <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-best-product-deal')) ? 'active' : '' }}" href="{{route('home.best_product_deal')}}">Best Deals (Products)</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-tot-recommend')) ? 'active' : '' }}" href="{{route('home.tot_recommend')}}">TOT Recommendations </a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-collections')) ? 'active' : '' }}" href="{{route('home.collections.edit')}}">Collections </a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-index')) ? 'active' : '' }}" href="{{route('home.other.index')}}"><span class="small">Other (not active) </span></a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-other-text')) ? 'active' : '' }}" href="{{route('home.other-text.index')}}"><span class="small">Other Text (not active)</span> </a>
   <a class="list-group-item list-group-item-action {{ (request()->is('admin/home-other-text-setting')) ? 'active' : '' }}" href="{{route('home.other-text-setting.index')}}"><span class="small">Other Text Setting (not active)</span> </a>
   
 
</div>
