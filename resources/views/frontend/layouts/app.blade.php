<!DOCTYPE html>
<html lang="en">

<head>

    <!----------Meta Information---------->
    @include('frontend.partials.meta')

    <!-----------Stylesheets------------>
    @include('frontend.partials.css')

</head>
        @yield('course.scripts')
<body>



        @include('frontend.partials.header')
        


        @yield('page.content')

        @include('frontend.partials.footer')

        <!--bootstrap modals-->
        @include('frontend.component.modal')   

    <!--javascript-->
    @include('frontend.partials.js')

    @yield('page.scripts')
    @yield('component.scripts')

    @yield('common_form.scripts')
    



</body>

</html>