<div class="trend-ads">
    <h2>Trending Ads</h2>
    <ul id="flexiselDemo3">
        <li>
            @foreach($spmoinhat0 as $key => $spmoinhat0)
            <div class="col-md-3 biseller-column">
                <a href="./chi-tiet-san-pham-{{$spmoinhat0->masp}}">
                    <img src="contents/images/{{$spmoinhat0->anhminhhoa}}" />
                    <span class="price">&#36; {{$spmoinhat0->giaban}}</span>
                </a>
                <div class="ad-info">
                    <h5>{{$spmoinhat0->tensp}} - {{$spmoinhat0->madinhdanh}}</h5>
                    <span>1 hour ago</span>
                </div>
            </div>
            @endforeach
        </li>
        <li>
            @foreach($spmoinhat1 as $key => $spmoinhat1)
            <div class="col-md-3 biseller-column">
                <a href="./chi-tiet-san-pham-{{$spmoinhat1->masp}}">
                    <img src="contents/images/{{$spmoinhat1->anhminhhoa}}" />
                    <span class="price">&#36; {{$spmoinhat1->giaban}}</span>
                </a>
                <div class="ad-info">
                    <h5>{{$spmoinhat1->tensp}} - {{$spmoinhat1->madinhdanh}}</h5>
                    <span>1 hour ago</span>
                </div>
            </div>
            @endforeach
        </li>
        <li>
            @foreach($spmoinhat2 as $key => $spmoinhat2)
            <div class="col-md-3 biseller-column">
                <a href="./chi-tiet-san-pham-{{$spmoinhat2->masp}}">
                    <img src="contents/images/{{$spmoinhat2->anhminhhoa}}" />
                    <span class="price">&#36; {{$spmoinhat2->giaban}}</span>
                </a>
                <div class="ad-info">
                    <h5>{{$spmoinhat2->tensp}} - {{$spmoinhat2->madinhdanh}}</h5>
                    <span>1 hour ago</span>
                </div>
            </div>
            @endforeach
        </li>
    </ul>
    <script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo3").flexisel({
            visibleItems: 1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 5000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 1
                }
            }
        });

    });
    </script>
    <script type="text/javascript" src="contents/js/jquery.flexisel.js"></script>
</div>