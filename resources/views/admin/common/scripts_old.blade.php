
<script src="{!! asset('public/admin/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('public/admin/js/sb-admin-2.min.js') !!}"></script>

  <!-- Page level plugins -->
  <script src="{!! asset('public/admin/vendor/chart.js/Chart.min.js') !!}"></script>

  <!-- Page level custom scripts -->
  <script src="{!! asset('public/admin/js/demo/chart-area-demo.js') !!}"></script>
  <script src="{!! asset('public/admin/js/demo/chart-pie-demo.js') !!}"></script>
  <!-- Page level plugins -->
  <script src="{!! asset('public/admin/vendor/datatables/jquery.dataTables.min.js') !!}"></script>
  <script src="{!! asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.js') !!}"></script>

  <!-- Page level custom scripts -->
  <script src="{!! asset('public/admin/js/demo/datatables-demo.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

<script>
 jQuery('#dob').datepicker({
	autoclose: true,
	todayHighlight: true,
	format:'yyyy/mm/dd',
	
});
      $(document).ready(function(){
 
        // Data table for serverside
		$('#top_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('topSellCategory') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'topSellCategory'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "name" },
                
                
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
				
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		//var tur_table = $('#turner_table').DataTable();
/*let table=$('#turner_table').DataTable();
let arr= [];
let checkedvalues = table.$('input:checked').each(function () {
arr.push($(this).attr('id'))
});
console.log(arr);
arr=arr.toString();*/

		$('#turner_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
			
 
            "ajax":{
 
                     "url": "{{ route('turnerProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'turnerProducts'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "product_name" },
                { "data": "model_name" },
				{ "data": "price" },
                
 
            ],
			'columnDefs': [
			  {
				 'targets': 0,
				 'checkboxes': {
					'selectRow': true
				 },
				
			  }
		   ],
			 'select': {
				  'style': 'multi'
			   },
		 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
				
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		
       $('#mainproduct_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('dataList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'dataList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "tsin" },
                { "data": "sku" },
                { "data": "product_name" },
                { "data": "brand_name" },
				{ "data": "img" },
				{ "data": "price" },
                { "data": "status" },
                
 
                { "data": "action" }
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
        
        ///BRand
        
           $('#brand_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('brandList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" },
				{ "data": "seller_name" },
                { "data": "status" },
                { "data": "created_at" },
                { "data": "action" }

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		   $('#attributes_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('attributeList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'attributeList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "attributes_name" },
                { "data": "status" },
                { "data": "created_at" },
                { "data": "action" }

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#media_slider').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('mediaSlider') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'mediaSlider'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
                { "data": "url" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		$('#rightmedia_slider').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('mediaRightSlider') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'mediaRightSlider'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
                { "data": "url" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		$('#meadia_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('meadiaList','slider') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'meadiaList/slider'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
				{ "data": "folder" },
                { "data": "img" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#categorymeadia_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('meadiaList','category') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'meadiaList/category'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
				{ "data": "folder" },
                { "data": "img" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#generalmeadia_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('meadiaList','general') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'meadiaList/general'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
				{ "data": "folder" },
                { "data": "img" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#meadia_list2').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('meadiaList2') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaList2'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
                { "data": "folder" },
               
                { "data": "img" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		$('#category_media').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('category-media') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'category-media'}
 
                   },
 
            "columns": [
 
               { "data": "id" },
                { "data": "image_name" },
               
                { "data": "img" },
                { "data": "action" }
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
});
</script>
<script>$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});</script>