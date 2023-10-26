@extends('layouts.template')


@section('title', 'About')

@section('content')
    <div class="mt-4 p-5 bg-secondary text-white rounded">
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>
        {!! $button !!}
    </div>


    @php($second = now()->second)

    @if ($second % 2 == 0)
        <div class="alert alert-primary mt-2" role="alert">
            Subscribe to our newsletter!
        </div>
    @else
        <div class="alert alert-warning mt-2" role="alert">
            Subscribe to our newsletter now!
        </div>
    @endif

    @php($day = now()->dayOfWeek)

    @switch($day)
        @case(1)
            <div class="alert alert-success mt-2" role="alert">
                Member discount 30% for today!
            </div>
        @break

        @case(2)
            <div class="alert alert-success mt-2" role="alert">
                Member discount 60% for today!
            </div>
        @break

        @default
            <div class="alert alert-success mt-2" role="alert">
                Member discount 10% for today!
            </div>
    @endswitch


    <br><br><br><br><br>
    <h1>Meet the Creator</h1>
    <div class="row my-4">
        <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="card my-2">
                <img src="https://media.licdn.com/dms/image/D5603AQHkO83SU-RfRA/profile-displayphoto-shrink_800_800/0/1692174051552?e=1703721600&v=beta&t=SZlmbynV3WCiphyATBAdDQnhbToA9ouEMSRZQhZ7cmo"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Edwin</h5>
                    <p class="card-text">Writer </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <p class="card-text mb-0">Hello World, my name is Edwin, good to see you on the umpteenth website that I
                created. I'm 22 years old now and I live in Bandung, Work at church and currently pursuing undergraduate
                education at STMIK LIKMI. My dream is to be a teacher and also be a Fullstack Developer. <mark>[ I feel that
                    in
                    the world of programming there is no need to learn half-heartedly, therefore it is better to learn
                    everything, front and back ]</mark> . Jerome Polin makes Math fun, so I decided to makes code is fun.
                Okay, the detailed explanation is, I'm a teacher, I'm a student, I'm a church staff member, <strong>I'm an
                    Aspiring
                    Fullstack Developer</strong></p>
        </div>
    </div>
    <h1>Mentor</h1>
    <div class="row my-4">
        <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="card my-2">
                <img src="https://media.licdn.com/dms/image/C5103AQEQWA6zXpBZlQ/profile-displayphoto-shrink_800_800/0/1519917535621?e=1703721600&v=beta&t=3la7rhB5-Tkzz8UOgSaHJLjyRz5px8FoO3HDEWZA2qM"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Marvin Jeremy </h5>
                    <p class="card-text">AI Engineer at Prosa.ai</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="card my-2">
                <img src="https://media.licdn.com/dms/image/D5603AQH-_ai9JCET2A/profile-displayphoto-shrink_800_800/0/1688116347610?e=1703721600&v=beta&t=9nBFTVgJr7GD0BL3LQILpF7m5acBpBTwV-V1h8mCNy4"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Handy Kusuma</h5>
                    <p class="card-text">Frontend Developer</p>
                </div>
            </div>
        </div>
    </div>


    <br><br><br><br><br><br><br><br>
    <h1 data-aos="fade-up">Our Sponsors</h1>
    <div class="row text-center my-4" data-aos="fade-up">
        @foreach ($sponsors as $sponsor)
            <div class="col-lg-2 col-md-4 col-sm-4">
                <img src="{{ $sponsor['image'] }}" class="rounded-circle" width="100px" height="100px">
                <h3>{{ $sponsor['name'] }}</h3>
                <p>
                    <a class="btn btn-secondary" href="{{ $sponsor['link'] }}">View Website</a>
                </p>
            </div>
        @endforeach
    </div>
    <br><br><br><br><br><br><br><br>
    <h1>FAQs</h1>
    <div class="accordion my-4" id="accordionContoh" data-aos="fade-up">
        @forelse ($faqs as $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $loop->index }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true"
                        data-bs-target="#collapse{{ $loop->index }}" aria-controls="collapse{{ $loop->index }}">
                        {{ $faq['question'] }}
                    </button>
                </h2>
                <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse"
                    aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionContoh">
                    <div class="accordion-body">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No FAQs found.
            </div>
        @endforelse

    @endsection
