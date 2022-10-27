<div class="ratings-container">
    <div class="ratings-full">
        @if ($reviews->avg('rating') == 0)
            <span class="ratings" style="width: 0%;"></span>
            <span class="tooltiptext tooltip-top"></span>
        @elseif ($reviews->avg('rating') == 1 || $reviews->avg('rating') < 2)
            <span class="ratings" style="width: 20%;"></span>
            <span class="tooltiptext tooltip-top"></span>
        @elseif($reviews->avg('rating') == 2 || $reviews->avg('rating') < 3)
            <span class="ratings" style="width: 40%;"></span>
            <span class="tooltiptext tooltip-top"></span>
        @elseif($reviews->avg('rating') == 3 || $reviews->avg('rating') < 4)
            <span class="ratings" style="width: 60%;"></span>
            <span class="tooltiptext tooltip-top"></span>
        @elseif($reviews->avg('rating') == 4 || $reviews->avg('rating') < 5)
            <span class="ratings" style="width: 80%;"></span>
            <span class="tooltiptext tooltip-top"></span>
        @elseif($reviews->avg('rating') == 5 || $reviews->avg('rating') < 5)
            <span class="ratings" style="width: 100%;"></span>
            <span class="tooltiptext tooltip-top"></span>
        @endif
    </div>
    <a href="#" class="rating-reviews">({{$reviews->count()}} Reviews)</a>
</div>