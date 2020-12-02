@extends('app')

@section('content')
    <header>
        <div class="page-toggle">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <h1><a href="{{ url('/') }}">qops.xyz</a></h1>
        <nav class="page-navbar">
            <a href="{{ url('hit') }}">누적 통계 조회</a>
            <a href="mailto:yunsol267@gmail.com">이메일 문의</a>
            <a href="{{ url('terms') }}">이용약관 및 개인정보 처리방침</a>
        </nav>
    </header>

    <div class="qops">
        <section class="qops-hit">
            <div class="container">
                <h1>누적 통계 조회</h1>
                <h2>단축된 URL의 조회수를 아래 입력란에 단축 코드를 입력하여 간편하게 조회할 수 있습니다.</h2>

                <!-- error url -->
                @if (Session::has('error'))
                    <div class="qops-error">
                        <div class="container">
                            <p><i class="fas fa-times"></i>{{ Session::get('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- success url -->
                @if (Session::has('success'))
                    <div class="qops-success">
                        <div class="container">
                            <p><i class="far fa-check-circle"></i>{{ Session::get('success') }}회 조회됨</p>
                        </div>
                    </div>
                @endif 
                
                <form method="POST" autocomplete="off" id="qops-hit" action="{{ route('shorten.link.hit.post') }}">
                    @csrf
                    <input type="text" name="shorten_code" class="qops-input" placeholder="단축 코드를 입력하세요."></input>
                    <a onclick="document.getElementById('qops-hit').submit();">조회하기 <i class="fas fa-angle-right"></i></a>
                </form>
                
            </div>
        </section>
    </div>
@endsection