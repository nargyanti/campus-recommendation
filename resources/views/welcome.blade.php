@extends('layouts.app')
@section('content')
    <!--banner-->
    <section class="score container">
        <div class="column-text-heading">
            <h1 class="score-heading fw-bold">
            Welcome to Score
            </h1>
            <p class="text-p text-dark">
            Lets find a university recommendations based on your entrance exam scores
            </p>
            <button href="#about" class="btn-primary">Lets Explore</button>
        </div>
        <div class="column-illustration">
            <img class="img1" src="{{ asset("assets/img/1.png") }}" alt="" style="height: 500px">
        </div>
    </section>

    <!--steps-->
    <section class="steps score-dark p-5">
        <div class="get-to-know container mb-5">
            <h1 class="text-light my-3" id="about">Get to know Score</h1>
            <p>A prospective student who has done UTBK test wants to study Informatics Engineering in Java,</p>
            <p>The prospective student wants to get a recommendation for the most suitable campus based on his grades.</p>  
        </div>        
        <div class="step-by row justify-content-center text-center">            
            <h2 class="text-light text-center my-3">Find out how to find your recommendations</h2>
            <div class="text-step-by col-5">
                <img src="{{ asset("assets/img/s3.svg") }}" alt="" style="height: 200px">
                <h3 class="text-light">Log in or Register</h3>
                <p>Make your own account to start with us!</p>
            </div>                                
            <div class="text-step-by col-5 text-center">  
                <img src="{{ asset("assets/img/s2.svg") }}" alt="" style="height: 200px">
                <h3 class="text-light">Input your score</h3>
                <p>Input your score and see the recomendations</p>
            </div>            
        </div>
    </section>

    <!--steps-->
    <section class="footer">
        <div class="footer-primary">
            <h3>Made By :</h3>
            <p>Aisya Chalvina</p>
            <p>Nabilah Argyanti</p>
        </div>
    </section>
@endsection


