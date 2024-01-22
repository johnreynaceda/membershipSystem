<div class="h-20 w-20 ml-3 mt-1 mb-1">
    {{-- <a href="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $getRecord()->identification_code }}" target="_blank">
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $getRecord()->identification_code }}"
         alt="QRCODE :{{ $getRecord()->identification_code }}">
    </a> --}}
    {!! QrCode::size(80)->generate($getRecord()->identification_code) !!}
</div>
