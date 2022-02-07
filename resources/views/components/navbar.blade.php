<nav class="bg-blue-500 text-white">
    <div class="container mx-auto py-5">
        <div class="flex justify-between">
            <div class="px-2">
                <a href="{{ route('home') }}"><img src="{{asset('./img/logo.png')}}" width="125" alt="logo" />
                </a>
            </div>
            <div class="relative">
                @auth
                <button id="nav-drop-dawn-btn">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="h-10 w-10 rounded-full object-cover">
                </button>
                <div class="bg-white rounded z-50 text-black px-5 absolute bottom-[-160px] left-0 w-48 hidden" id="nav-drop-dawn">
                    <ul class="text-center">
                        <li class="py-3 border-b">
                            <a href="
                            @if(Auth::guard('doctor')->check()) {{ route('doctor.profile') }}
                            @else {{ route('profile.show') }}
                            @endif" class="flex items-center">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="h-10 w-10 rounded-full object-cover">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="py-3 border-b">
                            <a href="{{ route('dashboard') }}">لوحه التحكم</a>
                        </li>
                        <li class="py-3 border-b">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">تسجيل الخروج</a>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
                @guest
                <ul class="flex">
                    <li class="px-3">
                        <a href="{{route('user.login')}}" class="btn-main">تسجيل دخول</a>
                    </li>
                    <li class="px-3">
                        <a href="{{route('user.register')}}" class="btn-second">عمل حساب جديد</a>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </div>
</nav>
@if(Auth::guard('doctor')->check())
<div class="bg-blue-600 w-full">
    <div class="container mx-auto">
        <ul class="flex justify-around py-5 text-xl text-white">
            <li><a href="#">التقيمات</a></li>
            <li><a href="{{route('clinc.index')}}">العيادات</a></li>
            <li><a href="{{route('schedule.index')}}">المواعيد</a></li>
        </ul>
    </div>
</div>
@endif