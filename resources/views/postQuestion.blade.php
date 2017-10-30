<html>
<head>
    <meta name="robots" content="noindex, nofollow" />
	<link href="/css/admin.css" rel="stylesheet" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript">
        function toggleOptionSection(displayStr){
            if(displayStr)
                $('#optionSection').css("display", "block");
            else
                $('#optionSection').css("display", "none");
        }
        
    </script>
</head>
	<body>
		
<h2>Post Question</h2>

<form id="blogAdmin" method="post" action="{!! route('submitQuestion') !!}" style="border:1px solid #ccc">
    {{ csrf_field() }}
    @if($questionObj)
        <input type='hidden' name='questionID' value="{{$questionObj['id']}}">
    @endif
  <div class="container">
    
    <label><b>Question</b></label>
    <input type="text" name="question[questionStr]" 
        @if($questionObj)value="{{$questionObj['questionStr']}}" @endif
    required>
    <br><br><label><b>isMultipleChoice</b></label>
    <input type="radio" name="question[isMultipleChoice]" value="1" onclick="toggleOptionSection(true)" 
           @if($questionObj && $questionObj['isMultipleChoice'] ) checked='checked' @endif/>Yes
    <input type="radio" name="question[isMultipleChoice]" value="0" onclick="toggleOptionSection(false)"
    @if($questionObj && !$questionObj['isMultipleChoice'] ) checked='checked' @endif
     />No<br/>

    <div id="optionSection">
        <label><b>Option A</b></label>
        <input type="text" name="question[optionA]" 
               @if($questionObj) value="{{$questionObj['optionA']}}" @endif
               required>

        <label><b>Option B</b></label>
        <input type="text" name="question[optionB]" 
               @if($questionObj) value="{{$questionObj['optionB']}}" @endif
            required>

        <label><b>Option C</b></label>
        <input type="text" name="question[optionC]" 
               @if($questionObj) value="{{$questionObj['optionC']}}" @endif
               required>

        <label><b>Option D</b></label>
        <input type="text" name="question[optionD]" 
               @if($questionObj) value="{{$questionObj['optionD']}}" @endif
               required>
    </div>

    <label><b>Question Score</b></label>
    <input type="text" name="question[score]" 
           @if($questionObj) value="{{$questionObj['score']}}" @endif
           required>

     <label><b>Question Explanation</b></label>
    <input type="text" name="question[explainationStr]" 
           @if($questionObj) value="{{$questionObj['explainationStr']}}" @endif
           required>

     <label><b>Correct Answer</b></label>
    <input type="text" name="question[correctAnswer]" 
           @if($questionObj) value="{{$questionObj['correctAnswer']}}" @endif
           required>

    <label><b>Image Path</b></label>
    <input type="text" name="question[imgPath]" 
           @if($questionObj) value="{{$questionObj['imgPath']}}" @endif
           >

     <br><br><label><b>Test ID: </b></label>
    <select name="question[testID]" required>
        @foreach ($tests as $t)
            <option value="{{$t->id}}"
            @if($questionObj && $questionObj['testID']== $t->id ) selected @endif
                    >{{$t->id}}</option>
        @endforeach
    </select> <br><br>

    <br><br><label><b>Section:</b></label>
    <input type="radio" name="question[section]" value="Aptitude" 
           @if($questionObj && $questionObj['section']== 'Aptitude' ) checked="checked" @endif
           />Aptitude
    <input type="radio" name="question[section]" value="Core"
        @if($questionObj && $questionObj['section']== 'Core' ) checked="checked" @endif
        />Core<br/>
    

    </div>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Submit</button>
    </div>
</form>
	</body>

    

</html>