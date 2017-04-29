@extends('layouts.app')
@section('include_js_files')
<script type="text/javascript" src="{{ asset('js/jquery_wizard.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script_wizard.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/smart_wizard.css') }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @foreach($notices as $notice)
                      <div id="right">     
                        <div class="singlerow">
                            <MARQUEE style="font-size:50px;" WIDTH=100% BEHAVIOR=SCROLL scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
                              <font color="#FF0000">{!!$notice->body!!}</font> 
                            </MARQUEE>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class='resp_code'>
    <center><b>Cuet Tablig Organization</b></center><br><br>
    <nav>
        <div class='head_div ulmain'>
            <ul class='tabs'>
                <li><a href="#" onclick='show1()' class='first' id='1'>
                <span class="stepDesc">
                   BB Hall
                   <p style='font-size:11px;'>Hasan</p>
                  
                </span>
            </a></li>
                <li><a href="#" onclick='show2()' class='second' id='2'>
                <span class="stepDesc">
                   South Hall
                       <p style='font-size:11px;'>Rafiq</p>
                 
                </span>
            </a></li>
                <li><a href="#" onclick='show3()' class='third' id='3'>
                <span class="stepDesc">
                   North Hall
                       <p style='font-size:11px;'>Rifat</p>
                 
                </span>                   
             </a></li>
                <li><a href="#" onclick='show4()' class='fourth' id='4'>
                <span class="stepDesc">
                   Dr. QK Hall
                       <p style='font-size:11px;'>Tarek</p>
                
                </span>                   
            </a></li>
            </ul>
        </div>
    </nav>   

    <div class='content_div'>
        <div id="step-1">
          <input type='hidden' class='num' value='1'>
          
            <h3 class="StepTitle">Step 1 Content</h3>              
                    <p>Hiox Softwares Pvt Ltd., is a leading web service provider & content management company in India which focuses on providing cost effective and easy online web & content management product
                                and services like web hosting, domain registration etc.,
                    </p>                        
        </div>
        <div id="step-2">             
            <h3 class="StepTitle">Step 2 Content</h3>
             <input type='hidden' class='num' value='2'>
                        <p>HIOX India, one of the leading hosting and domain name providers in India,
                            provides quality domain and hosting services at cheaper rates in the market.</p>
        </div>                      
        <div id="step-3">
            <h3 class="StepTitle">Step 3 Content</h3>                  
                        <p>Loginbuilder.com provides single login service for multiple sites owned by an enterprise.
                        Users can utilize this online service for user authentication of group of websites.</p>                               
        </div>
        <div id="step-4">
            <h3 class="StepTitle">Step 4 Content</h3>                 
                        <p>Tinybrainy.com is an entertainment and fun filled site purely developed for the game lovers.
                        Numerous games are available here, which will definitely proffer fun while you play them. </p>             
        </div>           
    </div>
        
    <div class="actionBar">
        <a href="https://www.hscripts.com" id="dum" style="font-size: 10px;color: #dadada;text-decoration:none;color: #dadada;">&copy;h</a>
        <a class="buttonFinish buttonDisabled pt-trigger_finish">Finish</a>
        <a class="buttonNext pt-trigger pt-trigger_next">Next</a>
        <a class="buttonPrevious pt-trigger pt-trigger_prev buttonDisabled">Previous</a>
    </div>      
</div>
@endsection
