<div class="commentBox row">
    <div class="col-md-12">
        <!--COMMENT SECTION-->
        <ul class="list-group">
            @foreach($comments as $comment)
            <li class="list-group-item comments">
                <span class="username">
                    {{ $comment->user->first_name }}
                    {{ $comment->user->last_name }}
                </span>
                <span class="rating">
                    @for($i = 0; $i < $comment->rating; $i++) 
                        <i class="fa fa-star"></i>
                    @endfor
                    @for($i = 0; $i < ( 5 - $comment->rating ); $i++) 
                        <i class="fa fa-star-o"></i>
                    @endfor
                </span>
                <span class="body">
                    {{ $comment->body }} 
                </span>
                <span class="time hidden-xs">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
                @if(Auth::check() && $comment->user->id == Auth::user()->id)
                <span class="delete">
                  <a href="/comment/{{ $comment->id }}/remove" type="submit" class="btn btn-default btn-danger"><i class="fa fa-times"></i></a>
                </span>
                @endif
            </li>
            @endforeach
        </ul>
        <!--END COMMENT SECTION-->
        <!--CREATE COMMENT SECTION-->
        @if(Auth::check())
            <form method="post" action="/product/{{ $product->id }}/comment">
                {{ csrf_field() }}
                    <input class="form-control" type="hidden" name="product_id" value="{{ $product->id }}">
                    <input class="form-control" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <textarea name="body" cols="30" rows="3" class="form-control" placeholder="Please leave your comment..." maxlength="300" required></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="rating">Rating : </label>
                    <select class="form-control"  name="rating">
                        <option value="5" selected>Very Satisfied</option>
                        <option value="4">Satisfied</option>
                        <option value="3">Good</option>
                        <option value="2">Not Bad</option>
                        <option value="1">Not Satisfied</option>
                    </select>
                </div>
                <div class="form-group">
                        @include('layouts.errors')
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-default btn-primary">Comment</button>
                </div>
            </form>
        @else
            <div class="alert pleaselogin"><a href="/login">Please login to leave a review</a></div>
        @endif
    </div>
    <!--END CREATE COMMENT SECTION-->
</div>

