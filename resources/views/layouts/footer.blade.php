<div id="footer" class="footer">
    <div class="container">
        <div class="row">
            <ul class="col-md-3">
                <h4>Contact Info</h4>
                <li>Support and General Enquiries</li>
                <li><a href="tel:0211543033">021 154 3033</a></li>
                <br>
                <li>Delivery Enquiries</li>
                <li><a href="tel:0272460125">027 246 0125</a></li>
                <br>
                <li>Email</li>
                <li><a href="mailto:dasanholding@gmail.com">dasanholding@gmail.com</a></li>
                <br>
                <li>Address</li>
                <li>185 Waihoehoe Road<br>Drury Auckland 2577</li>
            </ul>
            <ul class="col-md-3">
                <h4>Sitemaps</h4>
                <li><a href="">Home</a></li>
                @foreach($navCat as $category)
                    <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
            <ul class="col-md-3">
                <h4>Policies</h4>
                <li><a href="/delivery">Delivery Returns</a></li>
                <li><a href="/privacyandpolicy">Privacy and Policy</a></li>
                <li><a href="/termsofservice">Terms of Service</a></li>
            </ul>
            <ul class="col-md-3">
                <h4>My Account</h4>
                @if(Auth::check())
                    @if(Auth::user()->isAdmin == 1)
                    <li><a href="/cms">Manage</a></li>
                    @endif
                    <li><a href="">{{ Auth::user()->first_name }}</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                @endif

            </ul>
        </div>
        <div class="copyrights">
            <span>coprights©reserved. Dasan Holdings Ltd. created by Chris Kang</span>
        </div>
    </div>
</div>
