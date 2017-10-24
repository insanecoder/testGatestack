<html>
<head>
    <meta name="robots" content="noindex, nofollow" />
	<link href="/css/admin.css" rel="stylesheet" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
	<body>
		
<h2>Post Test Series</h2>

<form id="blogAdmin" method="post" action="{!! route('saveTestSeries') !!}" style="border:1px solid #ccc">
    {{ csrf_field() }}
    @if ($seriesObj)
         <input type="hidden" name="seriesID" value="{!! $seriesObj->id !!}"> 
      @endif
  <div class="container">
    
    <label><b>Price</b></label>
    <input type="text" name="testSeries[amount]" 
    @if (isset($seriesObj))
        value="{!! $seriesObj->amount !!}"
    @endif
    required>
     <span class="testGrp">
        <label><b>Tests</b></label>
    @if (isset($seriesObj))
        @foreach($seriesObj->tests as $t)
           
                <input type="text" class="testList"  name="test[][date]" value="{!! $t->date !!}" required><span class="newTestBtn"><a href="javascript:void(0)">Add Test</a></span>
        @endforeach
    @else
            <input type="text" class="testList"  name="test[][date]" required><span class="newTestBtn"><a href="javascript:void(0)">Add Test</a></span>
    @endif
    </span>
    </div>
    <div class="clearfix">
      <button type="submit" class="signupbtn">Submit</button>
    </div>
</form>
	</body>

	<script type="text/javascript">
        $(document).ready(function(){
            $('.testGrp').delegate('.newTestBtn','click',function(){
            var tempEle= "<input type='text' class='testList'  name='test[][date]' required><span class='newTestBtn'><a href='javascript:void(0)'>Add Test</a></span>";
            var tempEleObj= $(tempEle);
            $('.testGrp').append(tempEleObj);
            $( ".testList" ).datepicker();
        });
        $( ".testList" ).datepicker();
        });
        
	</script>

</html>