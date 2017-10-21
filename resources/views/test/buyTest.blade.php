@extends('base')

@section('content')
<div class='container mt5'>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h1 class="textCenter">GateStack Buy Test</h1>
            </div>
            <form id="createOrderForm" action="{{route('createOrder')}}" method="post">
                    {{ csrf_field() }}
                    <div class='form-group'>
                        <label for="email">Email address:</label>
                        <input required type="email" class="form-control" name="email">
                    </div>
                    
                    <div class='form-group'>
                        <label for="fName">First Name:</label>
                        <input required type="text" pattern="[a-zA-Z]+" class="form-control" name="firstName" id="fName">
                    </div>
                    
                    <div class='form-group'>
                        <label for="lName">Last Name:</label>
                        <input required type="text" pattern="[a-zA-Z]+" class="form-control" name="lastName" id="lName">
                    </div>
                    
                    <div class='form-group'>
                        <label for="mobileNumber">Mobile Number:</label>
                        <input required maxlength="10" pattern="[789][0-9]{9}" type="text" class="form-control" name="mobileNumber" id="mobileNumber">
                    </div>
                    
                    <div class='form-inline'>
                        <label for="amount">Amount:</label>
                        <input required type="text" readonly="readonly" class="form-control" name="amount" id="amount" value="500">
                    </div>
                    
                    <button type="submit" class="btn btn-default mt2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection