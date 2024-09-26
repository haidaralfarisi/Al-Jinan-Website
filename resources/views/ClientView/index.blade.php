@extends('ClientView.Templates.master_index')

@section('content')
    <div id="home" class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Gandul, <em>Cinere</em></span>
                    <h2>{{ $tpu->nama_tpu }}<br>Pemakaman Strategis</h2>
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">
                    <span class="category">Gandul, <em>Cinere</em></span>
                    <h2>{{ $tpu->nama_tpu }}<br>Pemakaman Strategis</h2>
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">
                    <span class="category">Gandul, <em>Cinere</em></span>
                    <h2>{{ $tpu->nama_tpu }}<br>Pemakaman Strategis</h2>
                </div>
            </div>
        </div>
    </div>

    <div id="tpu" class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="{{ asset('TemplateClient/assets/images/content.jpg') }}" alt="">
                        <a href="property-details.html"><img
                                src="{{ asset('TemplateClient/assets/images/featured-icon.png') }}" alt=""
                                style="max-width: 60px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>| Featured</h6>
                        <h2>Lahan Luas Dan Strategis</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dapatkan <strong>Blok pemakaman terbaik</strong> dipemakaman Al Jinan. Memudahkan anda dalam melakukan permohonan pemakaman.</div>
                            </div>
                        </div>
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How does this work ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod
                                    tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Why is Villa Agency the best ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod
                                    tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="{{ asset('TemplateClient/assets/images/info-icon-01.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $tpu->luas_wilayah }}</h4>
                            </li>
                            <li>
                                <img src="{{ asset('TemplateClient/assets/images/info-icon-03.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $tpu->alamat }}</h4>
                            </li>
                            <li>
                                <img src="{{ asset('TemplateClient/assets/images/info-icon-04.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $user->fullname }}</h4>
                                {{-- <h4>{{ $user->fullname }}<br><span>24/7 Under Control</span></h4> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="{{ asset('TemplateClient/assets/images/video-frame.jpg') }}" alt="">
            <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Buildings<br>Finished Now</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Years<br>Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Awwards<br>Won 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

    {{-- <div id="blok_makam" class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Best Deal</h6>
                        <h2>Memiliki blok kualitas baik</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                            data-bs-target="#appartment" type="button" role="tab"
                                            aria-controls="appartment" aria-selected="true">Blok A</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="villa-tab" data-bs-toggle="tab"
                                            data-bs-target="#villa" type="button" role="tab" aria-controls="villa"
                                            aria-selected="false">Blok B</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab"
                                            data-bs-target="#penthouse" type="button" role="tab"
                                            aria-controls="penthouse" aria-selected="false">Blok C</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="appartment" role="tabpanel"
                                    aria-labelledby="appartment-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>185 m2</span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>4</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('TemplateClient/assets/images/deal-01.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Property</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor
                                                pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                                                <br><br>When you need free CSS templates, you can simply type TemplateMo in
                                                any search engine website. In addition, you can type TemplateMo Portfolio,
                                                TemplateMo One Page Layouts, etc.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('login') }}"><i class="fa fa-calendar"></i> Daftar Di
                                                    sini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>250 m2</span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>5</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('TemplateClient/assets/images/deal-02.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Detail Info About Villa</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor
                                                pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                                                <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents
                                                typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger
                                                poutine next level humblebrag swag franzen.</p>
                                            <div class="icon-button">
                                                <a href="{{ route('login') }}"><i class="fa fa-calendar"></i> Booking
                                                    disini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="penthouse" role="tabpanel"
                                    aria-labelledby="penthouse-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>320 m2</span></li>
                                                    <li>Floor number <span>34th</span></li>
                                                    <li>Number of rooms <span>6</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('TemplateClient/assets/images/deal-03.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Penthouse</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor
                                                pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                                                <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents
                                                typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger
                                                poutine next level humblebrag swag franzen.</p>
                                            <div class="icon-button">
                                                <a href="{{ route('login') }}"><i class="fa fa-calendar"></i> Booking
                                                    Disini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="blok_makam" class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Best Deal</h6>
                        <h2>Memiliki blok kualitas baik</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($blokMakam as $index => $blok)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="blok-{{ $index }}-tab" data-bs-toggle="tab"
                                                data-bs-target="#blok-{{ $index }}" type="button" role="tab"
                                                aria-controls="blok-{{ $index }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $blok->nama_blok }}</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                @foreach ($blokMakam as $index => $blok)
                                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="blok-{{ $index }}" role="tabpanel"
                                        aria-labelledby="blok-{{ $index }}-tab">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="info-table">
                                                    <ul>
                                                        <li>Nama Blok <span>{{ $blok->nama_blok }}</span></li>
                                                        <li>TPU <span>{{ $blok->tpus->nama_tpu }}</span></li>
                                                        <li>Total Space <span>{{ $blok->luas_blok }}</span></li>
                                                        <li>Available Slots <span>{{ $blok->kapasitas }}</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                @if($blok ->foto)
                                                <img src="{{ asset('storage/' . $blok->foto) }}" alt="Foto Blok Makam">
                                            @else
                                                <img src="{{ asset('TemplateClient/assets/images/deal-01.jpg') }}" alt="Default Image">
                                            @endif                                            </div>
                                            <div class="col-lg-3">
                                                <h4>Extra Info About {{ $blok->nama_blok }}</h4>
                                                <p>{{ $blok->deskripsi }}</p>
                                                <div class="icon-button">
                                                    <a href="{{ route('login') }}"><i class="fa fa-calendar"></i> Daftar Disini</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{-- <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Properties</h6>
            <h2>We Provide The Best Property You Like</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{ asset('TemplateClient/assets/images/property-01.jpg') }}" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$2.264.000</h6>
            <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
            <ul>
              <li>Bedrooms: <span>8</span></li>
              <li>Bathrooms: <span>8</span></li>
              <li>Area: <span>545m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>6 spots</span></li>
            </ul>
            <div class="main-button">
                <a href="property-details.html">Booking Disini</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{ asset('TemplateClient/assets/images/property-02.jpg') }}" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$1.180.000</h6>
            <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a></h4>
            <ul>
              <li>Bedrooms: <span>6</span></li>
              <li>Bathrooms: <span>5</span></li>
              <li>Area: <span>450m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>8 spots</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Booking Disini</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{ asset('TemplateClient/assets/images/property-03.jpg') }}" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$1.460.000</h6>
            <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a></h4>
            <ul>
              <li>Bedrooms: <span>5</span></li>
              <li>Bathrooms: <span>4</span></li>
              <li>Area: <span>225m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>10 spots</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Booking Disini</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{ asset('TemplateClient/assets/images/property-04.jpg') }}" alt=""></a>
            <span class="category">Blok A</span>
            <h6>$584.500</h6>
            <h4><a href="property-details.html">12 New Street Miami, OR 12650</a></h4>
            <ul>
              <li>Bedrooms: <span>4</span></li>
              <li>Bathrooms: <span>3</span></li>
              <li>Area: <span>125m2</span></li>
              <li>Floor: <span>25th</span></li>
              <li>Parking: <span>2 cars</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Booking Disini</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{ asset('TemplateClient/assets/images/property-05.jpg') }}" alt=""></a>
            <span class="category">Blok B</span>
            <h6>$925.600</h6>
            <h4><a href="property-details.html">34 Beach Street Miami, OR 42680</a></h4>
            <ul>
              <li>Bedrooms: <span>4</span></li>
              <li>Bathrooms: <span>4</span></li>
              <li>Area: <span>180m2</span></li>
              <li>Floor: <span>38th</span></li>
              <li>Parking: <span>2 cars</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Booking Disini</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{ asset('TemplateClient/assets/images/property-06.jpg') }}" alt=""></a>
            <span class="category">Blok C</span>
            <h6>$450.000</h6>
            <h4><a href="property-details.html">22 New Street Portland, OR 16540</a></h4>
            <ul>
              <li>Bedrooms: <span>3</span></li>
              <li>Bathrooms: <span>2</span></li>
              <li>Area: <span>165m2</span></li>
              <li>Floor: <span>26th</span></li>
              <li>Parking: <span>3 cars</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Booking Disini</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

    <div id="contact_us" class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Contact Us</h6>
                        <h2>Hubungi Pengelola Kami</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.83628633277115!2d106.79364586433458!3d-6.344735220979388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eef4efbb3085%3A0xf0bd50f22c601507!2sJl.%20H.%20Mendik%2C%20Gandul%2C%20Kec.%20Cinere%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016514!5e0!3m2!1sid!2sid!4v1720118632537!5m2!1sid!2sid"
                            width="100%" height="500" style="border:0;" frameborder="0" allowfullscreen=""
                            loading="lazy"
                            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                            allowfullscreen=""></iframe>

                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item phone">
                                <img src="{{ asset('TemplateClient/assets/images/phone-icon.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h7><b>+625893439633</b><br><span>Phone Number</span></h7>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item email">
                                <img src="{{ asset('TemplateClient/assets/images/email-icon.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h7><b>{{ $user->email }}</b><br><span>Business Email</span></h7>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-5">
                    <form id="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name">Full Name</label>
                                    <input type="name" name="name" id="name" placeholder="Your Name..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your E-mail..." required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" placeholder="Subject..."
                                        autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
