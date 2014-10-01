@extends('layouts.front')

@section('content')
      <div class="inner cover">
        <h1 class="cover-heading">Loyalty programs</h1>
        <p class="lead"> are structured marketing efforts that reward, and therefore encourage, loyal buying behavior – behavior which is potentially beneficial to the firm.</p>
        <p class="lead">
          <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->color(81,175,255)->backgroundColor(51,51,51)->generate('QRLoyalty')); }} ">
        </p>
      </div>
@stop