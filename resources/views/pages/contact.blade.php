@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('asset_fo/images/hero_bg_2.jpg') }});"
        data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-primary text-center" role="alert">{{ session('success') }}</div>
            @endif

            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">
                    <form action="{{ route('contact') }}" method="POST" class="p-5 bg-white border" id="contactUSForm">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Full Name</label>
                                <input type="text" id="fullname" class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                    placeholder="Full Name" value="{{ old('full_name') }}" autocomplete="name" required />
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email Address" value="{{ old('email') }}" autocomplete="email" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="subject">Subject</label>
                                <input type="text" id="subject" class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    placeholder="Enter Subject" value="{{ old('subject') }}" autocomplete="off" required />
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Say hello to us">{{ old('message') }}</textarea>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="captcha_question">{{ $captcha['question'] }}</label>
                                <input type="text" name="captcha_answer" id="captcha_answer" class="form-control" required>
                                <input type="hidden" name="captcha_key" value="{{ $captcha['key'] }}">

                                <div class="invalid-feedback"  id="captcha_ans_wrong"></div>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function () {
                        $('#contactUSForm').submit(function (e) {
                            e.preventDefault();
                            let ans = parseInt($('#captcha_answer').val());
                            let ding_ding = parseInt('{{ $captcha['fake'] }}');

                            if (ans != ding_ding) {
                                $("#captcha_answer").addClass('is-invalid');
                                $("#captcha_ans_wrong").css('display', 'block');
                                $("#captcha_ans_wrong").focus();
                                $("#captcha_ans_wrong").text('Wrong answer!');
                                return false;
                            } else {
                                this.submit();
                            }
                        });
                    });
                </script>
                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">+91 73053 40714</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">jshakir005@gmail.com</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Our Agents</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur
                            labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima
                            quibusdam, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('asset_fo/images/person_1.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere
                                blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae
                                minus obcaecati provident beatae!</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('asset_fo/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cumque vitae voluptates
                                culpa earum similique corrupti itaque veniam doloribus amet perspiciatis recusandae sequi
                                nihil tenetur ad, modi quos id magni!</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('asset_fo/images/person_3.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">
                            <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illo iusto, inventore, iure
                                dolorum officiis modi repellat nobis, praesentium perspiciatis, explicabo. Atque cupiditate,
                                voluptates pariatur odit officia libero veniam quo.</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
