
<div class="list-group">
 
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfoodcategories')) ? 'active' : '' }}" href="{{route('admin.brandfoodcategories')}}">Top Brands</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfoodnoteworth')) ? 'active' : '' }}" href="{{route('admin.brandfoodnoteworth')}}">Note worthy Brand</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfoodcate-stoperinglee')) ? 'active' : '' }}" href="{{route('brandfoodcate.stoperinglee')}}">Show Stoper Single</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfoodstopers')) ? 'active' : '' }}" href="{{route('admin.brandfoodstopers')}}">Show Stopers</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfoodcate-sponsor')) ? 'active' : '' }}" href="{{route('brandfoodcate.sponsor')}}">Sponsor Product</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandfoodrecommend')) ? 'active' : '' }}" href="{{route('admin.brandfoodrecommend')}}">TOT Recommends </a>
 
</div>
