@extends('layout')
@section('title')
    setting
@endsection
@section('content')



<div class="container">
    <form action="#!" method="POST">
      <div class="row">
      <h6>google forms</h6>
        <div class="col-25">
          <label for="fname">First Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="firstname" placeholder="Your name..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Last Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Country</label>
        </div>
        <div class="col-75">
            <div class="autocomplete" style="width:300px;">
                <input id="myInput" type="text" name="myCountry" placeholder="Country">
              </div>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="subject">Comments and Suggestion</label>
        </div>
        <div class="col-75">
          <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        </div>
      </div>
      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>

  <script>
    autocomplete(document.getElementById("myInput"), countries);
    </script>
@endsection