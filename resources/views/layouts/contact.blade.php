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
                    <input class="form-control" type="text" name="full_name" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <textarea class="form-control"  name="body" cols="30" rows="10" placeholder="Please write your enquiery..."></textarea>
                </div>
               <div class="form-group">
                     <button type="submit" class="btn btn-default btn-primary">Send</button>
               </div>

            </form>
        </div>

    </div>
</div>
</div>
