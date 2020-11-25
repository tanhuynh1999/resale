
@foreach($danhmuc as $key => $danhmuc)
<option data-tokens="Mobiles" value="{{$danhmuc->madm}}">{{$danhmuc->danhmuc}}</option>
@endforeach