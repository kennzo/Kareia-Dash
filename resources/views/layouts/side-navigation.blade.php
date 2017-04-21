<!-- Scripts -->
<script src="{{ asset('js/side-navigation.js') }}"></script>

<!-- Styles -->
<link href="{{ asset('css/side-navigation.css') }}" rel="stylesheet">


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ url('/home') }}">Home</a>
    <a href="{{ url('/properties') }}">Properties</a>
    <a href="#">Calculators</a>
    <a href="#">Settings</a>
    <a href="#">Profile</a>
    <a
        href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            Logout
    </a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">(Side Navigation)</span>

