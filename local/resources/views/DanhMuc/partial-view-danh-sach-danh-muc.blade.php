<?php
    
    use Illuminate\Support\Facades\DB;
?>
<ul class="all-cat-list">
    @foreach($danhmuc as $key => $danhmuc)
    <?php
        $count = DB::table('tblsanpham')->whereIn('madm', [$danhmuc->madm])->count();
    ?>
    <li><a href="/resale/tim-kiem-theo-danh-muc-{{$danhmuc->madm}}">{{$danhmuc->danhmuc}} <span class="num-of-ads">({{$count}})</span></a></li>
    @endforeach
</ul>   