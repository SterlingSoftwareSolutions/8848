@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>
<body class="md:overflow-x-hidden">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Ysabeau+Infant:wght@1;100;200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />

    <!--PLUGIN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <style>
        
        /***************************
            CUSTOM SCROLL BAR
        ****************************/
        *, html{
            scroll-behavior: smooth;
        }

        *, *:after, *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        :root{
            --white:#FFF;
            --black:#232323;
            --lite:rgba(255,255,255,0.6);
            --gray:rgba(1,1,1,0.6);
            --dark:#3c3d3c;
            --primary:linear-gradient(145deg,#ff2f09,#c24a4e);
            --primary_dark:#970104;
            --primary_lite:#c24a4e;
            --secondary:#000a17;
            --default_font:'Roboto', sans-serif;
            --title_font:'Outfit', sans-serif;
        }

        ::-webkit-scrollbar {
            height: 12px;
            width: 8px;
            background: var(--dark);
        }

        ::-webkit-scrollbar-thumb {
            background: gray;
            -webkit-box-shadow: 0px 1px 2px var(--dark);
        }

        ::-webkit-scrollbar-corner {
            background: var(--dark);
        }



        /***************************
                    DEFAULT
        ****************************/
        body{
            margin:0;
            padding: 0;
            overflow-x:hidden !important;
            font-family: var(--default_font);
        }

        a{
            text-decoration:none !important;
            min-width: fit-content;
            width: fit-content;
            width: -webkit-fit-content;
            width: -moz-fit-content;
        }

        a, button{
            transition:0.5s;
        }

        em{
            font-style:normal;
            color:var(--primary_lite);
        }

        a, p, .btn{
            font-size:15px;
        }

        p{
            line-height:1.9em;
            color:var(--lite);
        }

        a, button, input, textarea, select{
            outline:none !important;
        }

        fieldset{
            border:0;
        }

        h1, h2, h3, h4, h5, h6{
            margin:0;
        }

        .title, .sub_title{
            font-family:var(--title_font);
            font-weight:400;
            margin:0;
        }

        .flex, .fixed_flex{
            display:flex;
        }

        .flex_content{
            width:100%;
            position:relative;
        }

        .padding_1x{
            padding:1rem;
        }

        .padding_2x{
            padding:2rem;
        }

        .padding_3x{
            padding:3rem;
        }

        .padding_4x{
            padding:4rem;
        }

        .big{
            font-size:3.5em;
        }

        .medium{
            font-size:2em;
        }

        .small{
            font-size:1.3em;
        }

        .btn{
            padding:1rem;
            border-radius:5px;
            color:var(--white);
            position:relative;
            border:0;
            text-align:center;
            
        }

        .btn_3{
            display:block;
            background-color:0;
            color:var(--white);
            position:relative;
            font-family:var(--default_font);
            font-weight:400;
            text-transform:uppercase;
        }

        .btn_3:before{
            content:"";
            border-radius:50%;
            background-color:rgba(255,255,255,0.2);
            position:absolute;
            left:0;
            top:50%;
            width:40px;
            height:40px;
            transition:0.5s;
            transform:translate(0%, -50%);
        }

        .btn_3:after{
            content:"\f178";
            font-family:"FontAwesome";
            margin-left:5px;
        }

        .btn_3:hover:before{
            border-radius:40px;
            width:100%;
        }

        @media (max-width:920px){
            .flex{
                flex-wrap:wrap;
            }
            
            .padding_1x, .padding_2x, .padding_3x, .padding_4x{
                padding:1rem;
            }
            
            .big{
                font-size:1.8em;
            }
            
            .medium{
                font-size:1.3em;
            }
            
            .small{
                font-size:1.1em;
            }
            
            .btn{
                padding:0.5rem 1rem;
            }
            
            a, p, .btn{
                font-size:12px;
            }
        }

        .slider {
            position: relative;
            width: 100%;
            height: 85vh;
            padding:0;
            margin:0;
        }

        ul{
            padding:0;
            margin:0;
        }

        .slider .title{
            font-size: 60px;
            font-weight:600;
            color: #166eb6;
        }

        .slider li {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            transition: clip .7s ease-in-out, z-index 0s .7s;
            clip: rect(0, 100vw, 100vh, 100vw);
            display:flex;
            align-items:center;
            justify-content:left;
        }

        .slider li:nth-child(1){
            background:linear-gradient(to right, rgba(1,1,1,1) 10%, rgba(1,1,1,0.8) 51%, rgba(1,1,1,0.2) 100%), url('{{ asset('images/lemon.jpg') }}');
            background-size: cover;
            background-position:top left;
        }

        .slider li:nth-child(2){
            background:linear-gradient(to right, rgba(1,1,1,1) 10%, rgba(1,1,1,0.8) 51%, rgba(1,1,1,0.2) 100%), url("https://i.postimg.cc/gchVRX3K/slider-2.jpg");
            background-size: cover;
            background-position:top left;
        }

        .slider li:nth-child(3){
            background:linear-gradient(to right, rgba(1,1,1,1) 10%, rgba(1,1,1,0.8) 51%, rgba(1,1,1,0.2) 100%), url("https://i.postimg.cc/gchVRX3K/slider-2.jpg");
            background-size: cover;
            background-position:top left;
        }

        .slider article{
            width:60%;
            margin-top:4rem;
            color: #fff;
            z-index:11;
        }

        .slider h3 + p {
            display: inline-block;
            color: var(--lite);
            font-weight:300;
        }

        .slider h3, .slider h3 + p, .slider p + .btn, li:after{
            opacity: 0;
            transition: opacity .7s 0s, transform .5s .2s;
            transform: translate3d(0, 50%, 0);
        }

        li.current h3, li.current h3 + p, li.current p + .btn, li.current:after {
            opacity: 1;
            transition-delay: 1s;
            transform: translate3d(0, 0, 0);
        }

        .slider li:before{
            transition: 0.5s;
            top:-250px !important;
        }

        li.current:before{
            transition-delay: 1s;
            transform: rotate(-90deg);
            top:-20px !important;
        }

        li.current {
            z-index: 1;
            clip: rect(0, 100vw, 100vh, 0);
        }

        li.prev {
            clip: rect(0, 0, 100vh, 0);
        }

        .slider aside {
        position: absolute;
            bottom: 15rem;
            left: 2rem;
            text-align: center;
            z-index: 10;
        }

        .slider aside a {
            display: inline-block;
            width: 8px;
            height: 8px;
            min-width: 8px;
            min-height: 8px;
            background-color: var(--white);
            margin: 0 0.2rem;
            transition: transform .3s;
        }

        .slider em{
            background: var(--primary);
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
        }

        a.current_dot {
            transform: scale(1.4);
            background:var(--primary) !important;
        }

        @media screen and (max-width: 920px) {
            header{
                height:70vh;
                position:relative;
            }
            
            .cs-down{
                display:none;
            }

            .slider{
                height:70vh;
            }
            
            .slider article{
                width:100%;
                margin-top:2rem;
            }
            
            .slider li:nth-child(2){
                background-position:top center;
            }
            
            .slider li:nth-child(3){
                background-position:top center;
            }
            
        }
        .categoty-angle {
            transform: skew(-10deg);
        }

        .category-parallelogram img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .row {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
        }
        .category-item {
            background-size: cover;
            background-position: center;
            transition: background-image 0.3s;
        }

        .category-item:hover {
            background-image: none; /* Remove the background image on hover if not needed */
        }

    </style>

    <!--HEADER-->
    <header class="-mt-6 bg-red md:-mt-4">
        <!-- Image Slider -->
        <div class="w-full">
            <section class="slider">
                <ul>
                    <li>
                        <article class="center-y padding_2x">
                            <h3 class="big title">Clean, Protect, Pack</h3>
                            <p class="text-2xl font-bold">Explore Our Range Of Cleaning & Packing Solutions </p>	
                            <a href="#about" class="btn btn_3">Click here to view Our Range</a>
                        </article>
                    </li>
                    <li>
                        <article class="center-y padding_2x">
                            <h3 class="big title">Clean, Protect, Pack</h3>
                            <p class="text-2xl font-bold">Explore Our Range Of Cleaning & Packing Solutions </p>	
                            <a href="#about" class="btn btn_3">lick here to view Our Range</a>
                        </article>
                    </li>
                <li>
                        <article class="center-y padding_2x">
                            <h3 class="big title">Clean, Protect, Pack</h3>
                            <p class="text-2xl font-bold">Explore Our Range Of Cleaning & Packing Solutions </p>	
                            <a href="#about" class="btn btn_3">lick here to view Our Range</a>
                        </article>
                    </li>
                    <aside>
                        <a href="#"></a>
                        <a href="#"></a>
                    <a href="#"></a>
                    </aside>
                </ul>
            </section>
        </div>
        <!-- Category Section -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 w-full">
            <div class="flex flex-row py-10 h-full">
                <!-- Mug Image -->
                <div class="md:w-2/12 flex items-center">
                    <img src="{{ asset('images/location.png') }}" alt="Image Description" class="w-2/12 sm:w-8/12 transform rotate-45" />
                </div>
                <!-- Text -->
                <div class="md:w-3/12 flex flex-col items-center justify-center">
                    <div class="ml-5">
                        <H1 class="text-white text-4xl mb-5">We Are 8848 Suppliers</H1>
                        <p class="text-white mb-5">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Et Leo Tincidunt, Placerat Ex In, Feugiat Urna. Integer Dictum Tellus Vitae Turpis Consequa</p>
                        <div class="flex items-center justify-center md:items-start md:justify-start">
                        <button type="button" class="text-blue-600 bg-white font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2 uppercase flex md:justify-center md:items-center">shop now</button>
                        </div>
                        
                    </div>
                    
                </div>
                <!-- Categories -->
                <div class="md:w-6/12 fex fex-col md:-mt-10 mr-3">
                    <div class="flex flex-row mb-10 gap-10 md:ml-20 items-center justify-center">
                        <!-- Row 1 -->
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="1" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/email.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 1</span>
                        </div>
                        <div class="bg-white md:h-36 md:w-1/4 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="2" data-bg-image="images/image.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/location.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 2</span>
                        </div>
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="1" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/email.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 3</span>
                        </div>
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="2" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/location.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 4</span>
                        </div>
                    </div>

                    <div class="flex flex-row mb-10 gap-10 md:ml-11 md:mr-9 items-center justify-center">
                        <!-- Row 2 -->
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="1" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/email.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 5</span>
                        </div>
                        <div class="bg-white md:h-36 md:w-1/4 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="2" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/location.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 6</span>
                        </div>
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="1" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/email.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 7</span>
                        </div>
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="2" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/location.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 8</span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-10 md:ml-4 md:mr-16 -mb-10 items-center justify-center">
                        <!-- Row 3 -->
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="1" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/email.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 9</span>
                        </div>
                        <div class="bg-white md:h-36 md:w-1/4 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="2" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/location.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 10</span>
                        </div>
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="1" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/email.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 11</span>
                        </div>
                        <div class="bg-white md:w-1/4 md:h-36 p-5 flex items-center justify-center flex-col categoty-angle relative group category-item" data-category="2" data-bg-image="images/su-san-lee-g3PyXO4A0yc-unsplash.jpg">
                            <img class="h-36 mb-2 opacity-70 transition-opacity duration-300 ease-in-out" src="{{ asset('images/logo.png') }}" data-image="images/location.png">
                            <span class="text-blue-700 group-hover:text-white opacity-70 hover:opacity-100 transition-opacity duration-300 ease-in-out">Category 12</span>
                    </div>
                </div>
                <div class="w-/12">

                </div>
            </div>  
        </div>
        <!-- End Section -->
        <div class="w-full bg-white flex flex-row py-20">
            <div class="w-2/12"></div>
            <div class="bg-white w-8/12">
                <!-- Text -->
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-blue-500 text-2xl my-5 tracking-wide">Secure And Organize</h1>
                        <h1 class="text-blue-500 font-bold text-3xl my-5 tracking-wide">Explore Our Range Of Reliable And Innovative Solutions</h1>
                        <h1 class="text-gray-600 my-5 font-light text-xl tracking-wider">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Et Leo Tincidunt, Placerat Ex In, Feugiat Urna. Integer Dictum Tellus Vitae Turpis Consequat,</h1>
                    </div>
                </div>  
                <!-- Icons -->
                <div class="bg-blue-500 py-4">
                    <div class="flex flex-row md:divide-x divide-zinc-100 ">
                        <div class="md:w-1/3 mx-5 flex flex-col items-center">
                            <!-- Icon -->
                            <div class="w-1/3">
                                <img class="mb-2" src="{{ asset('images/email.png') }}">
                            </div>
                            <!-- Text -->
                            <div>
                                <h1 class="text-white text-2xl">Quick Delivery</h1>
                            </div>
                        </div>
                        <div class="md:w-1/3 mx-5 flex flex-col items-center">
                            <!-- Icon -->
                            <div class="w-1/3">
                                <img class="mb-2" src="{{ asset('images/email.png') }}">
                            </div>
                            <!-- Text -->
                            <div>
                                <h1 class="text-white text-2xl">Secure Payment</h1>
                            </div>
                        </div>
                        <div class="md:w-1/3 mx-5 flex flex-col items-center">
                            <!-- Icon -->
                            <div class="w-1/3">
                                <img class="mb-2" src="{{ asset('images/email.png') }}">
                            </div>
                            <!-- Text -->
                            <div>
                                <h1 class="text-white text-2xl">Best Quality</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-2/12"></div>
        </div>
        
    </header>
    
</body>
<script>
    {
  class SliderClip {
    constructor(el) {
      this.el = el;
      this.Slides = Array.from(this.el.querySelectorAll('li'));
      this.Nav = Array.from(this.el.querySelectorAll('aside a'));
      this.totalSlides = this.Slides.length;
      this.current = 0;
      this.autoPlay = true; //true or false
      this.timeTrans = 4000; //transition time in milliseconds
      this.IndexElements = [];

      for (let i = 0; i < this.totalSlides; i++) {
        this.IndexElements.push(i);
      }

      this.setCurret();
      this.initEvents();
    }
    setCurret() {
      this.Slides[this.current].classList.add('current');
      this.Nav[this.current].classList.add('current_dot');
    }
    initEvents() {
      const self = this;

      this.Nav.forEach(dot => {
        dot.addEventListener('click', ele => {
          ele.preventDefault();
          this.changeSlide(this.Nav.indexOf(dot));
        });
      });

      this.el.addEventListener('mouseenter', () => self.autoPlay = false);
      this.el.addEventListener('mouseleave', () => self.autoPlay = true);

      setInterval(function () {
        if (self.autoPlay) {
          self.current = self.current < self.Slides.length - 1 ? self.current + 1 : 0;
          self.changeSlide(self.current);
        }
      }, this.timeTrans);

    }
    changeSlide(index) {

      this.Nav.forEach(allDot => allDot.classList.remove('current_dot'));

      this.Slides.forEach(allSlides => allSlides.classList.remove('prev', 'current'));

      const getAllPrev = value => value < index;

      const prevElements = this.IndexElements.filter(getAllPrev);

      prevElements.forEach(indexPrevEle => this.Slides[indexPrevEle].classList.add('prev'));

      this.Slides[index].classList.add('current');
      this.Nav[index].classList.add('current_dot');
    }}


  const slider = new SliderClip(document.querySelector('.slider'));
}

// Change Bchround color and image of categories
// Add an event listener to each category item
document.querySelectorAll('.category-item').forEach((categoryItem) => {
    const categoryImage = categoryItem.querySelector('img');
    const categoryText = categoryItem.querySelector('span');
    const dataCategory = categoryItem.getAttribute('data-category');
    const bgImage = categoryItem.getAttribute('data-bg-image');

    categoryItem.addEventListener('mouseenter', () => {
        // Change background image, text color, and image source on hover
        categoryItem.style.backgroundImage = `url(${bgImage})`;
        categoryItem.style.backgroundColor = 'transparent';
        categoryImage.src = categoryImage.getAttribute('data-image');
        categoryText.style.color = 'white';
    });

    categoryItem.addEventListener('mouseleave', () => {
        // Revert background image, background color, image source, and text color on mouseout
        categoryItem.style.backgroundImage = 'none'; // Revert background image
        categoryItem.style.backgroundColor = 'white';
        categoryImage.src = '{{ asset('images/logo.png') }}'; // Replace with your default image
        categoryText.style.color = 'blue';
    });
});


</script>
</html>
@endsection