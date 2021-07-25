
<div class="list-group">
 
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandbeautycategories')) ? 'active' : '' }}" href="{{route('admin.brandbeautycategories')}}">Top Brands</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandbeautynoteworth')) ? 'active' : '' }}" href="{{route('admin.brandbeautynoteworth')}}">Note worthy Brand</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandbeautycate-stoperinglee')) ? 'active' : '' }}" href="{{route('brandbeautycate.stoperinglee')}}">Show Stoper Single</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/admin.brandbeautystopers')) ? 'active' : '' }}" href="{{route('admin.brandbeautystopers')}}">Show Stopers</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandbeautycate-sponsor')) ? 'active' : '' }}" href="{{route('brandbeautycate.sponsor')}}">Sponsor Product</a>
  <a class="list-group-item list-group-item-action {{ (request()->is('admin/brandbeautyrecommend')) ? 'active' : '' }}" href="{{route('admin.brandbeautyrecommend')}}">TOT Recommends </a>
 
</div>
