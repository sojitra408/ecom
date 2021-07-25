<table class="table table-bordered" id="meadia_list11" width="100%" cellspacing="0">
<thead>
<tr>

<th><input   type="checkbox"></th>
<th>Thumbnail</th>
<th>Image</th><th>Image</th>
</tr>
</thead>
 <tbody><?php $allimages=allimages(); ?>
@if(!$allimages->isEmpty())
	<?php $i=1; ?>
@foreach($allimages as $allImg )
<tr>

<td> <input value="{{$allImg->url}}" class="banner" name="banner[]" type="checkbox"></td>

<td><img style="margin-left: 20px;" src="{{$allImg->url}}" height="100" width="100" /></td>
<!--<td>{{$allImg->filename}}</td>-->
<td> <input value="{{$allImg->url}}" class="thumbnail" name="thumbnail[]" type="radio"></td>
<td>

<button type="button" class="btn btn-default select-media"  id="{{$allImg->url}}" data-filename="{{$allImg->url}}" data-type="image" data-icon="fa-picture-o" data-toggle="tooltip" title="" data-original-title="Select this file">

   
</button>


</td>

</tr>
<?php $i++; ?>
@endforeach
@endif 
 </tbody>
<tfoot>
<tr>
<th>#</th>
<th>URL</th>
<th>Action</th>
</tr>
</tfoot>
<tbody>
</tbody>
</table>
<script>
$(document).ready(function() {
$('.select-media').click(function(){
	alert($(this).attr('id');
	//alert($(this).find('imgpath').val();
	//$('#banner').val($(this).data-path());
});	
	
});
</script>
<style>
.btn {
    font-size: 15px;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    transition: 200ms ease-in-out;
}
.btn-default {
    background: #f1f1f1;
    outline: 0;
    border-color: #dddddd;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
</style>