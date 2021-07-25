
<div class="list-group">
 
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfashioncategories')) ? 'active' : '' }}" href="{{route('admin.brandfashioncategories')}}">Top Brands</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfashionnoteworth')) ? 'active' : '' }}" href="{{route('admin.brandfashionnoteworth')}}">Note worthy Brand</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfashioncate-stoperinglee')) ? 'active' : '' }}" href="{{route('brandfashioncate.stoperinglee')}}">Show Stoper Single</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfashionstopers')) ? 'active' : '' }}" href="{{route('admin.brandfashionstopers')}}">Show Stopers</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfashioncate-sponsor')) ? 'active' : '' }}" href="{{route('brandfashioncate.sponsor')}}">Sponsor Product</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfashionrecommend')) ? 'active' : '' }}" href="{{route('admin.brandfashionrecommend')}}">TOT Recommends </a>
 
</div>
