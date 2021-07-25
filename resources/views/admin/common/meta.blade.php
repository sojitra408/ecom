<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel |  {{ $pageTitle }}</title>

 
  
  <link href="{!! asset('public/admin/vendor/fontawesome-free/css/all.min.css')!!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{!! asset('public/admin/css/sb-admin-2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
 <!-- Custom styles for this page -->
  <link href="{!! asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.css')!!}" rel="stylesheet">
  
  
    <script type="text/javascript">
      window.csrf_token = "{{ csrf_token() }}"
    </script>

  <!-- Ionicons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css" />
<style>
    .tree {
    min-height:20px;
   
    margin-bottom:20px;
  
}
.tree li {
    list-style-type:none;
    margin:0;
    padding:5px 5px 0 5px;
    position:relative;
    font-size:11px;
}
.tree li::before, .tree li::after {
    content:'';
    left:-20px;
    position:absolute;
    right:auto
}
.tree li::before {
    border-left:1px solid #999;
    bottom:50px;
    height:100%;
    top:0;
    width:1px
}
.tree li::after {
    border-top:1px solid #999;
    height:20px;
    top:25px;
    width:25px
}
.tree li span {
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border:1px solid #999;
    border-radius:5px;
    display:inline-block;
    padding:3px 8px;
    text-decoration:none
}
.tree li.parent_li>span {
    cursor:pointer
}
.tree>ul>li::before, .tree>ul>li::after {
    border:0
}
.tree li:last-child::before {
    height:30px
}
.tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
    background:#eee;
    border:1px solid #94a0b4;
    color:#000
}
    
</style>
  
</head>