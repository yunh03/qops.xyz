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
    <!-- center -->
    <div class="qops">

        <!-- header -->
        <section class="qops-header">
            <h1>qops.xyz</h1>
            <p>쉽고 빠르게 단축 URL 만들기</p>
        </section>

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
                    <p><i class="far fa-check-circle"></i> <a href="javascript:copyToClipboard('#qops-url-copy');"><span id="qops-url-copy">https://qops.xyz/{{ Session::get('success') }}</span><i class="fas fa-share-square"></i></p></a>
                </div>
            </div>
        @endif

        <!-- generate short url -->
        <section class="qops-url">
            <form method="POST" autocomplete="off" id="qops-url" action="{{ route('generate.shorten.link.post') }}">
                @csrf
                <input type="text" name="link" class="qops-input" placeholder="긴 URL을 입력하세요." onChange="this.value=getRightURL(this.value)">
                <a onclick="document.getElementById('qops-url').submit();">URL 단축하기 <i class="fas fa-angle-right"></i></a>
            </form>
        </section>
    </div>
@endsection