<!-- <ul> -->
@php
$i = 0
@endphp

@foreach($childs as $key=>$child)
<div id="collapse-<?php echo("$menu->id")?>" class="collapse show" data-parent="#accordion" aria-labelledby="heading-<?php echo("$menu->id")?>">
   <div class="card-body">
      <div class="row">
         <div class="col-md-11">
            <div id="accordion-<?php echo("$menu->id")?>">
               <div class="card">
                  <div class="card-header" id="heading-<?php echo("$menu->id")?>-<?php echo("$child->parent_id")?>">
                     <h5 class="mb-0">

                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-<?php echo("$menu->id")?>-<?php echo("$child->parent_id")?>" aria-expanded="false" aria-controls="collapse-<?php echo("$menu->id")?>-<?php echo("$child->parent_id")?>">
                        {{ $child->name }}
                        </a>
                        @if(Auth::user()->can('menu-management'))
                        <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#exampleModal-{{$child->id}}"><span class="fa fa-edit"></span></a>
                        
                        <form action="{{route('manage-menu.delete',$child->id)}}" method="POST"
                           style="display: inline"
                           onsubmit="return confirm('Are you sure?');">
                           <input type="hidden" name="_method" value="DELETE">
                           {{ csrf_field() }}
                           <button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                        </form>
                        @endif
                     </h5>
                  </div>
                  @if(count($child->childs))
                  @include('admin.manage-menu.manageChild',['childs' => $child->childs])
				@else
					@if($child->parent_id==1 || $child->parent_id==2 || $child->parent_id==3)
					 <div class="col-md-1">
                  @if(Auth::user()->can('menu-managementt'))
            <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#addModal-{{$child->id}}"><span class="fa fa-plus"></span></a>
            @endif
         </div>
                  @endif
                  @endif
               </div>
            </div>
         </div>
         <!-- @if ($loop->last)
         // This is the last iteration.
         {{ $child->name }}
         @else
         <div class="col-md-1">
            <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#addModal-{{$menu->id}}"><span class="fa fa-plus"></span></a>
         </div>
         @endif -->
         <!-- <input type="text" name="" value="{{$child->name}}-{{$child->parent_id}}"> -->
         @if($key==$i)
         <div class="col-md-1">
            @if(Auth::user()->can('menu-management'))
            <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#addModal-{{$child->parent_id}}"><span class="fa fa-plus"></span></a>
            @endif
         </div>
		 
         @endif
         
      </div>
   </div>
</div>



<div class="modal fade" id="exampleModal-{{$child->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content" style="height: 92%;">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form role="form" action="{{ route('menu.edit',$child->id) }}" method="post" enctype= multipart/form-data>
               {{ csrf_field() }}
              
               <div class="row">
                  <div class="col-lg-offset-3 col-lg-12">
                     <div class="form-group">
                        <label for="address">Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required="" value="{{$child->name}}">
                     </div>
                     
                  </div>
               </div>
               <div class="col-lg-offset-3 col-lg-12">
                  <div class="form-group">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
        
      </div>
   </div>
</div>


<div class="modal fade" id="addModal-{{$child->parent_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content" style="height: 92%;">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form role="form" action="{{ route('menu.sub.save') }}" method="post" enctype= multipart/form-data>
               {{ csrf_field() }}
               <input type="hidden" name="mainmenu" value="{{$child->parent_id}}">
               <div class="row">
                  <div class="col-lg-offset-3 col-lg-12">
                     <div class="form-group">
                        <label for="address">Sub Menu Name</label>
                        <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" required="" value="{{old('name')}}">
                     </div>
                    <div class="form-group"><label for="id" class="col-md-3 control-label text-left">Category</label><div class="">
						
                                              <select name="select_category" id="select_category" class="form-control form-control-sm"  required="" >

                                                <option value="">--- Select Category ---</option>
						<?php $subcates=getCateByParentMenuId($child->parent_id); ?>
                                               
                                        @foreach ($subcates as $key1 => $value1)
                                        <option value="{{$value1->id}}">{{ $value1->name }}</option>
                                        
                                                @endforeach
                                              </select>

                                            </div>

                                        </div>
                       
                     
                  </div>
               </div>
               <div class="col-lg-offset-3 col-lg-12">
                  <div class="form-group">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
       
      </div>
   </div>
</div>

 @if(count($child->childs)==0)
<div class="modal fade" id="addModal-{{$child->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content" style="height: 92%;">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form role="form" action="{{ route('menu.sub.save') }}" method="post" enctype= multipart/form-data>
               {{ csrf_field() }}
               <input type="hidden" name="mainmenu" value="{{$child->id}}">
               <div class="row">
                  <div class="col-lg-offset-3 col-lg-12">
                     <div class="form-group">
                        <label for="address">Sub Menu Name</label>
                        <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" required="" value="{{old('name')}}">
                     </div>
                    <div class="form-group"><label for="id" class="col-md-3 control-label text-left">Category</label><div class="">
						
                                              <select name="select_category" id="select_category" class="form-control form-control-sm"  required="" >

                                                <option value="">--- Select Category ---</option>
						<?php $subcates=getCateByParentMenuId($child->id); ?>
                                               
                                        @foreach ($subcates as $key1 => $value1)
                                        <option value="{{$value1->id}}">{{ $value1->name }}</option>
                                        
                                                @endforeach
                                              </select>

                                            </div>

                                        </div>
                       
                     
                  </div>
               </div>
               <div class="col-lg-offset-3 col-lg-12">
                  <div class="form-group">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
       
      </div>
   </div>
</div>

@endif
@endforeach
<!-- </ul> -->


