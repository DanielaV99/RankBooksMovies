@props(['rank' => 0,])
@foreach(range(1, 10) as $i)
    <x-star :selected="$i<=$rank"></x-star>
@endforeach
