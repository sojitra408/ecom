
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
		$('#beautytop_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
        
        $('#foodtop_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('foodtopSellCategory') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'foodtopSellCategory'}
 
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
        
        $('#food_sell_top_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('food_sell_top_sell_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'food_sell_top_sell_table'}
 
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
        
        $('#top_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('hometop_sell_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'hometop_sell_table'}
 
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
        
        $('#fashiontop_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('fashiontop_sell_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashiontop_sell_table'}
 
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
        
        $('#beautybesttop_sell_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('beautybesttop_sell_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautybesttop_sell_table'}
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
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
        
        $('#food_food_turner_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('food_turner_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'food_turner_table'}
 
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
        
        $('#food_Recommendsturner_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('food_Recommendsturner_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'food_Recommendsturner_table'}
 
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
        
        $('#beautyturner_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('beautyturner_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautyturner_table'}
 
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
        
        $('#fashionRecommends_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('fashionRecommends_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionRecommends_table'}
 
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
        
        $('#foodRecommends_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('foodRecommends_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'foodRecommends_table'}
 
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
        
         $('#beautyRecommends_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('beautyRecommends_table') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautyRecommends_table'}
 
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
		
		$('#sponsor_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('sponsorProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'sponsorProducts'}
 
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
        
        $('#fashionsponsor_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('fashionsponsorProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'sponsorProducts'}
 
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
        
        $('#beautyponsor_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('beautysponsorProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'sponsorProducts'}
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
		
		 $('#fashioncategorytopbrand_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListCategory') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListCategory'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#fashioncategorynoteworth_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListnoteworthFashion') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListnoteworthFashion'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#fashioncategoryrecommend_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListrecomendFashion') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListrecomendFashion'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#fashioncategorystopers_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListstopersFashion') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListstopersFashion'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		 $('#beautycategorytopbrand_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListCategoryBeauty') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListCategoryBeauty'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#beautycategorynoteworth_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListnoteworthBeauty') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListnoteworthBeauty'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#beautycategoryrecommend_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListrecomendBeauty') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListrecomendBeauty'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#beautycategorystopers_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListstopersBeauty') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListstopersBeauty'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		
		 $('#foodcategorytopbrand_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListCategoryFood') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListCategoryFood'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#foodcategorynoteworth_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListnoteworthFood') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListnoteworthFood'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#foodcategoryrecommend_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListrecomendFood') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListrecomendFood'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		 $('#foodcategorystopers_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandListstopersFood') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandListstopersFood'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" }
                

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
        
           $('#brand_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
             "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" },
                { "data": "brand_id" },
				{ "data": "seller_name" },
				{ "data": "fssai_licence_number" },
                { "data": "brand_usp" },
				{ "data": "live" },
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
        ///collection
        
           $('#collection_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('collectionList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'collectionList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "name" },
				{ "data": "collection_type" },
                { "data": "status" },
                { "data": "expiry_date" },
                { "data": "action" }

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		
		 $('#blogcategory_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('blogListCategory') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'blogListCategory'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "category_name" },
				 
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
        
        
         $('#postal_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('postalList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'postaleList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "postalcode" },
                { "data": "status" },
                { "data": "postcode_type" },
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
            
            "ordering": true,
             
             "order": [0, 'desc'],
            
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
		
		$('#menubanner').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('menubanner') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'menubanner'}
 
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
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
		
		
			$('#meadia_list23').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
            
            "ajax":{
 
                     "url": "{{ route('meadiaList23') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaList23'}
 
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
		
		  $('#menuicontbl').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('menuicon') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'menuicon'}
 
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
		
		
		$('#rightmedia_brand').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('meadiaListBrandRight') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaListBrandRight'}
 
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
		
		$('#category_media').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
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
		
		$('#rightcategory_media').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('category-media-right') }}",
 
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
        
         $('#blog_list').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('blogList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'blogList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "blog_title" },
                { "data": "featured_image" },
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
		
		$('#homeproduct_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('homeproductProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'homeproductProducts'}
 
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
		
		$('#homemedia_brand').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('meadiaListBrandHome') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaListBrandHome'}
 
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
		
		$('#brandoftheday').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandOfTheDay') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandOfTheDay'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" },
				{ "data": "seller_name" }

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
        
        $('#brandSquare').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandSquare') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'brandSquare'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" },
				{ "data": "seller_name" }

              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#totrecommend_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('totrecommendProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'totrecommendProducts'}
 
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
		
		$('#bestdealproducts_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			
 
            "ajax":{
 
                     "url": "{{ route('bestdealproducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'bestdealproducts'}
 
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
        
        
		
		$('#homebestdeal_category').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('homeBestDealCategory') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'homeBestDealCategory'}
 
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
		
		$('#fashionproduct_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
			 
			 "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('fashionproductProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionproductProducts'}
 
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
        
        $('#foodslider_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
			 
			 "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('foodsliderproduct') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'foodsliderproduct'}
 
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
		
		$('#beautyproduct_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
			 
			 "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('beautyproductProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautyproductProducts'}
 
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
        
        
        	$('#collection_product_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('collectionProductList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",cid:$("#collection_id").val(),$route:'collectionProductList'}
 
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
        	$('#collection_tag_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('collection.tag.list') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",cid:$("#collection_id").val(),$route:'collection.tag.list'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "name" },
                
                
 
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
		
		
		
		$('#fashionbesties_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('fashionbestiesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionbestiesProducts'}
 
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
		
		$('#fashiondues_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('fashionduesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionduesProducts'}
 
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
		
		$('#fashionkids_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('fashionKidsProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionKidsProducts'}
 
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
		
		$('#fashionmisses_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('fashionMissesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionMissesProducts'}
 
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
		
		$('#fashiontrending_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
			 
 
            "ajax":{
 
                     "url": "{{ route('fashionTrendingProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'fashionTrendingProducts'}
 
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
		
		
		$('#brand_gallery').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brandGallery') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'brandGallery'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
                 { "data": "folder" },
               
                { "data": "img" }
                
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#collection_gallery').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('collectionGallery') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#collection_id').val(),route:'collectionGallery'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
                { "data": "image_name" },
                 { "data": "folder" },
               
                { "data": "img" }
                
                
              
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
		
		$('#blogimage1').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('meadiaListblogimage1') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaListblogimage1'}
 
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
		
		$('#blogimage2').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('meadiaListblogimage2') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaListblogimage2'}
 
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
		
		$('#blogimage3').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('meadiaListblogimage3') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",brand_id:$('#brand_id').val(),route:'meadiaListblogimage3'}
 
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
        
        $('#brand_tag_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('brand.tag.list') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",cid:$("#collection_id").val(),$route:'collection.tag.list'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "name" },
                
                
 
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
        
        $('#blog_tag_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('blog.tag.list') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",cid:$("#collection_id").val(),$route:'collection.tag.list'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "name" },
                
                
 
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
		
		
		 $('#product_tag_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
            "ordering": true,
             
             "order": [0, 'desc'],
            "ajax":{
 
                     "url": "{{ route('product.tag.list') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",cid:$("#product_id").val(),route:'product.tag.list'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "name" },
                
                
 
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
        
        
        
        
        
        
        
        
        
        $('#beautybesties_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
       "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('beautybestiesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautybestiesProducts'}
 
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
		
		
      $('#beautytrending_table').DataTable({
       
                  "processing": true,
       
                  "serverSide": true,
             
       "ordering": true,
             
             "order": [0, 'desc'],
                  "ajax":{
       
                           "url": "{{ route('beautyTrendingProducts') }}",
       
                           "dataType": "json",
       
                           "type": "POST",
       
                           "data":{ _token: "{{csrf_token()}}",route:'beautyTrendingProducts'}
       
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


      $('#beautydues_table').DataTable({
       
                  "processing": true,
       
                  "serverSide": true,
             "ordering": true,
             
             "order": [0, 'desc'],
       
                  "ajax":{
       
                           "url": "{{ route('beautyduesProducts') }}",
       
                           "dataType": "json",
       
                           "type": "POST",
       
                           "data":{ _token: "{{csrf_token()}}",route:'beautyduesProducts'}
       
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




      $('#beautykids_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
       "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('beautyKidsProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautyKidsProducts'}
 
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
    
    $('#beautymisses_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
       "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('beautyMissesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'beautyMissesProducts'}
 
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






    $('#foodbesties_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
       "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('foodbestiesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'foodbestiesProducts'}
 
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
        
        
    
    
      $('#foodtrending_table').DataTable({
       
                  "processing": true,
       
                  "serverSide": true,
             "ordering": true,
             
             "order": [0, 'desc'],
       
                  "ajax":{
       
                           "url": "{{ route('foodTrendingProducts') }}",
       
                           "dataType": "json",
       
                           "type": "POST",
       
                           "data":{ _token: "{{csrf_token()}}",route:'foodTrendingProducts'}
       
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


      $('#fooddues_table').DataTable({
       
                  "processing": true,
       
                  "serverSide": true,
             "ordering": true,
             
             "order": [0, 'desc'],
       
                  "ajax":{
       
                           "url": "{{ route('foodduesProducts') }}",
       
                           "dataType": "json",
       
                           "type": "POST",
       
                           "data":{ _token: "{{csrf_token()}}",route:'foodduesProducts'}
       
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




      $('#foodkids_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
        "ordering": true,
             
             "order": [0, 'desc'],
 
            "ajax":{
 
                     "url": "{{ route('foodKidsProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'foodKidsProducts'}
 
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
    
    $('#foodmisses_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
       
            "ordering": true,
             
             "order": [0, 'desc'],
            "ajax":{
 
                     "url": "{{ route('foodMissesProducts') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'foodMissesProducts'}
 
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