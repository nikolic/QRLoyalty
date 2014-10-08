@extends('layouts.front')

@section('content')
      <div class="inner cover">
        <h1 class="cover-heading">Programi lojalnosti</h1>
        <p class="lead"> prošli su dug put od papirića na koje su se udarali pečati nakon svake kupovine, preko discount kartica koje su služile za ostvarivanje unapred određenih popusta, da bi se danas zahvaljujući razvoju tehnologije došlo do znatno naprednijih rešenja koja nude mnogo više kako kompaniji koja program organizuje tako i njihovim potrošačima.</p>
        <p class="lead">
          <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->color(81,175,255)->backgroundColor(51,51,51)->generate('QRLoyalty')); }} ">
        </p>
      </div>
@stop