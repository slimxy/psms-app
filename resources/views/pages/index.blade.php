@extends('layouts.app2')
@section('content')

<div class="body bg-primary mb-5 text-light">
<div id="home" class="home pt-5 mt-5" style="background:#D8E3E8; background-repeat:no-repeat; background-size:cover;  height:1000px; ">
    <div class="heroes d-flex justify-content-between ">
    <div class="homeText p-5 my-5 ">
        <div class="maintext">
                <div class="myContainer">
                <div class="txt">
                    <h1  id="headText" class="head-text text-danger fst-italic " style="font-size:64px">
                    Your
                    </h1>
                </div>
                

                            <div class="motto">
                                <span style="color:blue; font-size:38px; font-family:cursive"> </span>
                                <span style="color:blue; font-size:38px; font-family:cursive">Number One</span>
                                <span style="color:blue; font-size:38px; font-family:cursive">Tested</span>
                                <span style="color:blue; font-size:38px; font-family:cursive">Reliable</span>
                                <span style="color:blue; font-size:38px; font-family:cursive">and Guaranteed</span>
                                <span style="color:blue; font-size:38px; font-family:cursive">Number One</span>

                              
                            </div>
                </div>

        </div>
        <div class="txt2"> <h1 class="head-text text-danger fst-italic m-4  " style="font-size:64px">Petroleum Station.</h1>
        <p class=" slogan fst-italic text-bg-primary text-light col-5 text-center p-3 w-50  mx-5 rounded-5">Tested, Reliable and Guaranteed</p>
</div>
    </div>
        <div class="bg">
        <img src="{{asset('img/psms1.png')}}" alt="" width="144%" height="80%" class="bgimg">
        <img src="{{asset('img/psms8.jpeg')}}" alt="" width="109%" height="40%" class="bgimg">
        <img src="{{asset('img/psms7.jpeg')}}" alt="" width="112%" height="80%" class="bgimg">
        <img src="{{asset('img/petrol2.jpeg')}}" alt="" width="264%" height="80%" class="bgimg">
        <img src="{{asset('img/pms4.jpeg')}}" alt="" width="130%" height="40%" class="bgimg">
        <img src="{{asset('img/pms2.jpeg')}}" alt="" width="130%" height="40%" class="bgimg">
        
    </div>
    </div>
    <div class="myinfo  ">
        <p class=" p-2" > Over <span>**</span> Years <br> of Operation</p>
    </div>

</div>

<!-- ABOUT -->

<div id="about" class=" about text-light bg-primary py-2">
<div class="info m-5 ">
  <h1 id="heading">About</h1>
</div>
  <div class="acontainer d-flex justify-content-between">
  <div class="atext  mt-5 fs-3 ">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Ut, quod illum optio officia, doloribus incidunt eum ducimus,
        itaque nam nostrum, corruptctus illo quas nisi aut.
  </div>
  <div class="pic">
  <img src="{{asset('img/psms7.jpeg')}}" alt="webdev" height="320px" width="520px">
  </div>
  </div>

</div>
<hr style="border:2px solid crimson; box-shadow: 4px 4px 12px 5px rgb(255, 8, 4);" class="my-3">

<!-- SERVICE -->

<div id="service" class="service  bg-primary">
<div class="serve d-flex   justify-content-between ">
<div class="info m-5 "><h1 id="heading">Service</h1></div>
<div class="pic m-5">
  <img src="{{asset('img/pms4.jpeg')}}" alt="service" height="350px" width="550px" >
  </div>
</div>

  <div class="serviceGrid my-5  gap-5 justify-content-around ">
  <div class="serviceInfo p-3 center text-light bg-black  ">
  <img src="{{asset('img/petr.jpeg')}}" alt="service" >
<div class="sTxt">
  <h2 class="text-center">Oil & Gas</h2>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing <br>
        elit. Facilis porro explicabo deserunt vitae cum  <br>
        deserunt vitae cum reiciendis quidem vero
        laborum, nisi nihil?</p></div>
  
</div>
  <div class="serviceInfo p-3 center bg-light text-dark ">
          <img src="{{asset('img/petrol.jpeg')}}" alt=" service">
    <div class="sTxt">
    <h2 class="text-center">Fuel Outlets</h2>
    <p>Lorem ipsum dolor sit, amet consectetur
      adipisicing elit. Facilis porro explicabo
        deserunt vitae cum reiciendis quidem vero
        deserunt vitae cum reiciendis quidem vero
        deserunt vitae cum reiciendis quidem vero
        laborum, nisi nihil?</p>
</div>
  </div>
  
    </div>
  <div class=" serviceGrid my-5 gap-5 justify-content-around ">
  <div class="serviceInfo p-3 center  bg-success">
  <img src="{{asset('img/cars8.jpeg')}}" alt="service">
<div class="sTxt">
<h2 class="text-center">Maintainance </h2>
    <p>Lorem ipsum dolor sit, amet consectetur
      adipisicing elit. Facilis porro explicabo
        deserunt vitae cum reiciendis quidem vero
        deserunt vitae cum reiciendis quidem vero
        deserunt vitae cum reiciendis quidem vero
        laborum, nisi nihil?</p>
</div>
</div>
  <div class="serviceInfo p-3 center shadow  bg-info">
  <img src="{{asset('img/phone4.jpeg')}}" alt="service">
  <div class="sTxt">
  <h2 class="text-center">Security</h2>
    <p>Lorem ipsum dolor sit, amet consectetur
      adipisicing elit. Facilis porro explicabo
        deserunt vitae cum reiciendis quidem vero
        deserunt vitae cum reiciendis quidem vero
        deserunt vitae cum reiciendis quidem vero
        laborum, nisi nihil?</p>
</div>
</div>
  
  
  </div>
  <div class="serviceGrid my-5 d-flex  gap-5 justify-content-around ">
  <div class="serviceInfo p-3 text-center bg-primary ">
Reliable Transpotation  </div>
  <div class="serviceInfo p-3 text-center   bg-dark">
      Lorem ipsum dolor isquam .
  </div>
  
  
  </div>
  <div class=" my-5 d-flex  gap-5 justify-content-around ">
  <div class="serviceInfo p-3  text-center  bg-danger">
      Lorem ipsum dolor isquam .
  </div>
  <div class="serviceInfo p-3 center  bg-secondary">
      Lorem ipsum dolor isquam .
  </div>
    
  </div>

</div>
<hr style="border:2px solid crimson; box-shadow: 4px 4px 12px 5px rgb(255, 8, 4);" class="">

<!-- Contact -->

<div id="contact" class=" contact bg-primary  py-3">
  
<div class="contct d-flex justify-content-between">
  <div class="pic m-5">
  <img src="{{asset('img/contact-image.svg')}}" alt="contact" height="325px"  width="325px">
  </div>
  <div class="info m-5 ">
      <h1 class="heading" id="heading">Contact</h1>
  </div>
  </div>

<div class="contantInfo justify-content-center d-flex">
  <div class="textContainer col-5 d-grid justify-content-center  bg-light text-dark p-5 rounded-3 shadow mx-5">
      <div class="tel ">
          <h1 class=" text-primary">Telephone: </h1>
          <div class="tel d-flex ">
          <i class="fas fa-phone text-primary fs-1 mx-5"></i>  <p class="text-center fs-4"> +234-567-890-88</p>
          </div>
      </div>
      <div class="mail">
          <h1 class=" text-primary">Email: </h1>
          <div class="mailData d-flex">
          <i class="fas fa-envelope text-primary fs-1 mx-5"></i> <p class="text-center fs-4"> psmsMail@mail.com</p>
          </div>
      </div>
      <div class="socials">
      <h1 class=" text-primary">Socials: </h1>
                <div class="handles d-flex justify-content-between">
                    
                    <i class="fa fa-facebook text-primary fs-1 mx-1"></i>
                    <i class="fa fa-twitter text-primary fs-1 mx-1"></i>
                    <i class="fa fa-instagram text-primary fs-1 mx-1"></i>
                    <i class="fa fa-youtube text-primary fs-1 mx-1"></i>
                </div>
            </div>
      <div class="address ">
          <h1 class="text-primary ">Address:</h1>
          <h3>Head Office</h3>
          <p class="text-center fs-4">No.2 Wuse phase2 Abuja</p>
          <h3>State branches</h3>
          <p class="text-justify fs-5"> No: 23 Bauchi road, Beside University Staff quaters, Jos.</p>
          <p class="text-justify fs-5"> No: 53 Yandoya, Beside Railway quaters, Jos.</p>
          <p class="text-justify fs-5 "> No: 23 Terminus Market, Opposite First Bank,Jos.</p>
      </div>
  </div>

</div>
</div>

</div>



<script>
        var myIndex = 0;
        carousel();
        
        function carousel() {
          var i;
          var x = document.getElementsByClassName("bgimg");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}
          x[myIndex-1].style.display = "block";
                    setTimeout(carousel, 8000); // Change image every 8 seconds
        }

            </script>





@endsection


