<div id="contact" class="container">
<div class="row">
    <h2>Contact Us</h2>
        <div class="col-sm-6 col-md-4 map-container">
            <div id="map"></div>
        </div>

        <div class="col-sm-6 col-md-8">
            <form method="post" action="">
                {{ csrf_field() }}
                <div class="form-group">
                    @if(Auth::check())
                    <input class="form-control" type="Hidden" name="full_name" placeholder="Full Name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                    <span class="form-control">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    @else
                    <input class="form-control" type="text" name="full_name" placeholder="Full Name" required>
                    @endif
                </div>
                <div class="form-group">
                    @if(Auth::check())
                    <input class="form-control" type="Hidden" name="address" placeholder="Full Name" value="{{ Auth::user()->address }}">
                    <span class="form-control">{{ Auth::user()->address }}</span>
                    @else
                    <input class="form-control" type="text" name="address" placeholder="Address" required>
                    @endif
                </div>
                <div class="form-group">
                    @if(Auth::check())
                    <input class="form-control" type="Hidden" name="email" value="{{ Auth::user()->email }}">
                    <span class="form-control">{{ Auth::user()->email }}</span>
                    @else
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                    @endif
                </div>
                <div class="form-group">
                    <textarea class="form-control"  name="body" cols="30" rows="10" placeholder="Please write your enquiery..." required></textarea>
                </div>
               <div class="form-group">
                     <button type="submit" class="btn btn-default btn-primary">Send</button>
               </div>

            </form>
        </div>

    </div>
</div>
</div>
