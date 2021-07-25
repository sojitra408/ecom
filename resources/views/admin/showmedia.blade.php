<table class="table table-bordered" id="meadia_list11" width="100%" cellspacing="0">
<thead>
<tr>
<th>#</th>
<th>Banner</th>
<th>Thumbnail</th>
<th>Image</th>
</tr>
</thead>
 <tbody><?php $allimages=allimages(); ?>
@if(!$allimages->isEmpty())
	<?php $i=1; ?>
@foreach($allimages as $allImg )
<tr>
<td>{{$i}}</td>
<td> <input value="{{$allImg->url}}" class="banner" name="banner[]" type="radio"></td>
<td> <input value="{{$allImg->url}}" class="thumbnail" name="thumbnail[]" type="radio"></td>
<td><img style="margin-left: 20px;" src="{{$allImg->url}}" height="100" width="100" /></td>

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