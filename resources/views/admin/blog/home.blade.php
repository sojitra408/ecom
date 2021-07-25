@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Home Blog List</h1>
         
	@include('includes.messages') 
          <!-- DataTales Example -->
          
<div>
   <div> Featured Blog 1 : Select Option</div>
   <form action="{{ route('save.bloglisthome') }}" method='POST'>
       <select name='feature1' class="form-control w-50 p-1">
           @foreach($blogs as $blog)
            <option 
            value={{ $blog->id }} 
                {{ ($featuredBlogId1 === $blog->id) ? 'selected' : '' }}
            >
                {{ $blog->blog_title }}
            </option>
           @endforeach
       </select>
        
        <div class="mt-2"></div>
        <div> Featured Blog 2 : Select Option</div>
       <select name='feature2' class="form-control w-50 p-1">
           @foreach($blogs as $blog)
            <option 
            value={{ $blog->id }} 
                {{ ($featuredBlogId2 === $blog->id) ? 'selected' : '' }}
            >
            {{ $blog->blog_title }}
            </option>
           @endforeach
       </select>
       @if(Auth::user()->can('home-blog-list'))
        <button class="btn btn-primary btn-sm mt-3">Save Changes</button>
        @endif
        @csrf
    </form>
</div>
        </div>
@endsection
<script>
    
    function deletepostal(id)
    {
        
        if(confirm('Are you sure to delete?'))
        {
            window.location=id
            
        }
    }
</script>