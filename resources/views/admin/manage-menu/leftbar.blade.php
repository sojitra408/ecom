
<div class="list-group">
  
  <a class="list-group-item list-group-item-action {{ (request()->is('manage-menu')) ? 'active' : '' }}" href="{{route('admin.manage.menu')}}">Categories</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('category-order')) ? 'active' : '' }}" href="{{route('category.order')}}">Category Order</a>
  
  <a class="list-group-item list-group-item-action {{ (request()->is('manage-brand-menu')) ? 'active' : '' }}" href="{{route('admin.manage.brand.menu')}}">Brands</a>
  
  <a class="list-group-item list-group-item-action" href="">Collection</a>
  
  <a class="list-group-item list-group-item-action" href="">TOT Corner</a>
   
 
</div>
