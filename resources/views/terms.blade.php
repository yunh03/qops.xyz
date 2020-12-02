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

    <div class="qops-term">
        <div class="container">
            <h1>이용약관 및<br />개인정보 처리방침</h1>
            <h2>1. 등록 금지 분야</h2>
            <ul>
                <li>음란성 사이트</li>
                <li>피싱 및 스미싱 URL</li>
                <li>불법 광고 사이트</li>
                <li>불법 도박 사이트 및 청소년 유해 사이트</li>
                <li>대한민국 법에 위반되거나 그러한 내용과 관련된 사이트 전체</li>
            </ul>
            <br />
            <h2>2. 삭제의 권한</h2>
            <ul>
                <li>우리는 [1. 등록 금지 분야]에서 정의한 내용에 위배되는 정보를 삭제할 권리가 있습니다.</li>
                <li>우리는 [1. 등록 금지 분야] 외에도 약관 위반 신고 및 관련 기관 요청에 의하여 삭제할 권리가 있습니다.</li>
            </ul>
            <br />
            <h2>3. 수집 정보</h2>
            <ul>
                <li>사용자의 IP 주소</li>
                <li>사용자가 입력한 인터넷 프로토콜 주소</li>
            </ul>
            <br />
            <h2>시행일</h2>
            <ul>
                <li>작성: 2020년 5월 7일</li>
                <li>업데이트: 2020년 5월 7일</li>
            </ul>
        </div>
    </div>
@endsection