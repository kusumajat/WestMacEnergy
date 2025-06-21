@extends('layouts.template')

@section('title', 'Home') {{-- Menetapkan judul khusus untuk halaman ini --}}

@section('content')
    <section class="hero" style="background-image: url('images/mine1.png');">
        <div class="overlay">
            <div class="hero-content">
                <h1 class="headline">WestMacEnergy</h1>
            </div>
        </div>
    </section>
    <section class="tagline">
        <div class="container-fluid">
            <h2>West Macedonia Lignite Centre</h2>
        </div>
    </section>

    <div class="colorlib-about">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-img animate-box" data-animate-effect="fadeInLeft"
                        style="background-image: url(images/mine2.png);">
                    </div>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="about-desc">
                        <span class="heading-meta">Welcome</span>
                        <h2 class="colorlib-heading">Who we are</h2>
                        <p>For decades, the West Macedonia Lignite Centre (WMLC) has been the heart of Greek energy. Operated by PPC S.A., our mines have reliably fueled the nation's progress as one of Europe's largest lignite producers.</p>
                        <p>Now, as the world embraces cleaner energy, we are leading Greece's Just Transition. We leverage our deep expertise to transform our legacy, revitalizing the land and developing new opportunities in renewable energy for a sustainable future.</p>
                    </div>
                    <div class="row padding">
                        <div class="col-md-4 no-gutters animate-box" data-animate-effect="fadeInLeft">
                            <a href="#" class="steps active">
                                <p class="icon"><span><i class="icon-check"></i></span></p>
                                <h3>Respecting <br>Our Earth</h3>
                            </a>
                        </div>
                        <div class="col-md-4 no-gutters animate-box" data-animate-effect="fadeInLeft">
                            <a href="#" class="steps">
                                <p class="icon"><span><i class="icon-check"></i></span></p>
                                <h3>Future <br>Focused</h3>
                            </a>
                        </div>
                        <div class="col-md-4 no-gutters animate-box" data-animate-effect="fadeInLeft">
                            <a href="#" class="steps">
                                <p class="icon"><span><i class="icon-check"></i></span></p>
                                <h3>Innovating <br>Forward</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-services">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">What I do?</span>
                    <h2 class="colorlib-heading">Here are some of my expertise</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="flaticon-worker"></i>
                                </div>
                                <div class="colorlib-text">
                                    <h3>General Conctructing</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia
                                        and Consonantia, there live the blind texts. </p>
                                </div>
                            </div>

                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="flaticon-sketch"></i>
                                </div>
                                <div class="colorlib-text">
                                    <h3>Pre-Contruction Design</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia
                                        and Consonantia, there live the blind texts. </p>
                                </div>
                            </div>

                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="flaticon-engineering"></i>
                                </div>
                                <div class="colorlib-text">
                                    <h3>Building &amp; Modeling</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia
                                        and Consonantia, there live the blind texts. </p>
                                </div>
                            </div>

                            <div class="colorlib-feature animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="flaticon-crane"></i>
                                </div>
                                <div class="colorlib-text">
                                    <h3>Construction Management</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia
                                        and Consonantia, there live the blind texts. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="services.html" class="services-wrap animate-box" data-animate-effect="fadeInRight">
                                <div class="services-img" style="background-image: url(images/services-1.jpg)">
                                </div>
                                <div class="desc">
                                    <h3>Design &amp; Build</h3>
                                </div>
                            </a>
                            <a href="services.html" class="services-wrap animate-box" data-animate-effect="fadeInRight">
                                <div class="services-img" style="background-image: url(images/services-2.jpg)">
                                </div>
                                <div class="desc">
                                    <h3>House Remodeling</h3>
                                </div>
                            </a>
                            <a href="services.html" class="services-wrap animate-box" data-animate-effect="fadeInRight">
                                <div class="services-img" style="background-image: url(images/services-3.jpg)">
                                </div>
                                <div class="desc">
                                    <h3>Construction Management</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 move-bottom">
                            <a href="services.html" class="services-wrap animate-box" data-animate-effect="fadeInRight">
                                <div class="services-img" style="background-image: url(images/services-4.jpg)">
                                </div>
                                <div class="desc">
                                    <h3>Painting &amp; Tiling</h3>
                                </div>
                            </a>
                            <a href="services.html" class="services-wrap animate-box" data-animate-effect="fadeInRight">
                                <div class="services-img" style="background-image: url(images/services-5.jpg)">
                                </div>
                                <div class="desc">
                                    <h3>Kitchen Remodeling</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/cover_bg_1.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="colorlib-narrow-content">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-3 text-center animate-box">
                    <span class="icon"><i class="flaticon-skyline"></i></span>
                    <span class="colorlib-counter js-counter" data-from="0" data-to="1539" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Projects</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="icon"><i class="flaticon-engineer"></i></span>
                    <span class="colorlib-counter js-counter" data-from="0" data-to="3653" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Employees</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="icon"><i class="flaticon-architect-with-helmet"></i></span>
                    <span class="colorlib-counter js-counter" data-from="0" data-to="5987" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Constructor</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="icon"><i class="flaticon-worker"></i></span>
                    <span class="colorlib-counter js-counter" data-from="0" data-to="3999" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Partners</span>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-work">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">My Work</span>
                    <h2 class="colorlib-heading animate-box">Recent Work</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/img-1.jpg);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Work 01</a></h3>
                                <span>Building</span>
                                <p class="icon">
                                    <span><a href="#"><i class="icon-share3"></i></a></span>
                                    <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                    <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/img-2.jpg);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Work 02</a></h3>
                                <span>House, Apartment</span>
                                <p class="icon">
                                    <span><a href="#"><i class="icon-share3"></i></a></span>
                                    <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                    <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/img-3.jpg);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Work 03</a></h3>
                                <span>Dining Room</span>
                                <p class="icon">
                                    <span><a href="#"><i class="icon-share3"></i></a></span>
                                    <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                    <span><a href="#"><i class="icon-hea rt"></i> 49</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/img-4.jpg);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Work 04</a></h3>
                                <span>House, Building</span>
                                <p class="icon">
                                    <span><a href="#"><i class="icon-share3"></i></a></span>
                                    <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                    <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/img-5.jpg);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Work 05</a></h3>
                                <span>Condo, Pad</span>
                                <p class="icon">
                                    <span><a href="#"><i class="icon-share3"></i></a></span>
                                    <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                    <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/img-6.jpg);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Work 06</a></h3>
                                <span>Table, Chairs</span>
                                <p class="icon">
                                    <span><a href="#"><i class="icon-share3"></i></a></span>
                                    <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                    <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-blog">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">Read</span>
                    <h2 class="colorlib-heading">Recent Blog</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="blog.html" class="blog-img"><img src="images/blog-1.jpg" class="img-responsive"
                                alt="HTML5 Bootstrap Template by colorlib.com"></a>
                        <div class="desc">
                            <span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i
                                        class="icon-bubble3"></i> 4</small></span>
                            <h3><a href="blog.html">Renovating National Gallery</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                large language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="blog.html" class="blog-img"><img src="images/blog-2.jpg" class="img-responsive"
                                alt="HTML5 Bootstrap Template by colorlib.com"></a>
                        <div class="desc">
                            <span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i
                                        class="icon-bubble3"></i> 4</small></span>
                            <h3><a href="blog.html">Wordpress for a Beginner</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                large language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="blog.html" class="blog-img"><img src="images/blog-3.jpg" class="img-responsive"
                                alt="HTML5 Bootstrap Template by colorlib.com"></a>
                        <div class="desc">
                            <span><small>April 14, 2018 </small> | <small> Inspiration </small> | <small> <i
                                        class="icon-bubble3"></i> 4</small></span>
                            <h3><a href="blog.html">Make website from scratch</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                large language ocean.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="get-in-touch" class="colorlib-bg-color">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <h2>Get in Touch!</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <p class="colorlib-lead">Separated they live in Bookmarksgrove right at the coast of the
                        Semantics, a large language ocean.</p>
                    <p><a href="#" class="btn btn-primary btn-learn">Contact me!</a></p>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
