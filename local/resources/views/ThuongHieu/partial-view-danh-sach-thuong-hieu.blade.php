<?php
    
    use Illuminate\Support\Facades\DB;
?>

<ul class="list-group">
    @foreach($thuonghieu as $key => $thuonghieu)
        <?php
            $count = DB::table('tblsanpham')->whereIn('mathuonghieu', [$thuonghieu->mathuonghieu])->count();
        ?>
        <a href="./tim-kiem-theo-thuong-hieu-{{$thuonghieu->mathuonghieu}}">
            <li class="list-group-item">{{$thuonghieu->thuonghieu}} ({{$count}})</li>
        </a>
    @endforeach                     
</ul>
