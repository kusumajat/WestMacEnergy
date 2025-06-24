@extends('layouts.template')

@section('title', 'Home')

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
                        <p>For decades, the West Macedonia Lignite Centre (WMLC) has been the heart of Greek energy.
                            Operated by PPC S.A., our mines have reliably fueled the nation's progress as one of Europe's
                            largest lignite producers.</p>
                        <p>Now, as the world embraces cleaner energy, we are leading Greece's Just Transition. We leverage
                            our deep expertise to transform our legacy, revitalizing the land and developing new
                            opportunities in renewable energy for a sustainable future.</p>
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
            <div class="row align-items-center model-text-section">

                <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">3D Visualization</span>
                    <h2 class="colorlib-heading">A 3D Journey Through the Ptolemais</h2>
                    <p>
                        Discover the transformation of West Macedonia through our interactive 3D visualization.
                        This model showcases proposed developments, environmental restoration efforts, and the integration
                        of renewable energy infrastructure in the former lignite mining area of Ptolemais.
                    </p>
                    <p>
                        Explore this immersive model to understand how the region is transitioning toward a greener and more
                        sustainable future.
                    </p>
                </div>

                <div class="col-md-7 animate-box" data-animate-effect="fadeInRight">
                    <div id="viewer-container">
                        <babylon-viewer source="/assets/model3d.glb"
                        autoplay camera-auto-rotate camera-target="0 1 0"
                        reframe style="width: 100%; height: 100%;">
                        </babylon-viewer>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/mine4.png);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="colorlib-narrow-content">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-3 text-center animate-box">

                    <span class="colorlib-counter js-counter" data-from="0" data-to="25" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Energy Sources Plants</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter js-counter" data-from="0" data-to="5442" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Employees</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter js-counter" data-from="0" data-to="138" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Social Product</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter js-counter" data-from="0" data-to="63" data-speed="5000"
                        data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Turnover</span>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-work">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">West Macedonia Lignite Centre</span>
                    <h2 class="colorlib-heading animate-box">A Legacy of National Significance</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/industry.png);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Pillar of National Energy Security</a></h3>
                                <span>For over 60 years, the WMLC has been the unwavering foundation of Greece's energy independence, reliably powering its industries, cities, and homes.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/mine5.png);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Unmatched Operational Scale</a></h3>
                                <span>Operating across a vast 160 square kilometer network of mines, it stands as the largest and most complex lignite operation in Greece, a testament to its significant capabilities.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/mine6.png);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Technological & Production Might</a></h3>
                                <span>Leveraging giant bucket-wheel excavators and advanced logistics, the Centre achieved a world-class peak production of 55.8 million tonnes per year.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/image.png);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Integrated Energy Value Chain</a></h3>
                                <span>A highly efficient, self-contained system where lignite is extracted and directly supplied to dedicated power plants like Agios Dimitrios and Ptolemaida, minimizing waste and maximizing output.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/image2.png);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">Pioneering a Responsible Future</a></h3>
                                <span>Demonstrating true industry leadership by moving beyond its legacy, proactively spearheading a Just Transition plan to transform its land and community toward a sustainable, green energy economy.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="project" style="background-image: url(images/man.png);">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="work.html">A Legacy of Human Expertise</a></h3>
                                <span>Decades of operational excellence are built upon the accumulated knowledge and dedication of its highly skilled workforce, comprising thousands of engineers, technicians, and specialists.</span>
                            </div>
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
                    <p class="colorlib-lead">We are leading a monumental transition and are always open to new partners, ideas, and talent. If you are interested in our projects or want to be part of our sustainable future, we would love to hear from you.</p>
                    <p><a href="https://www.linkedin.com/in/risma-kusumajati/" target="_blank" class="btn btn-primary btn-learn">Contact me!</a></p>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
