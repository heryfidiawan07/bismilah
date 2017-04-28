
	<table class="table table-bordered">
		<tr>
			<td><p>Nama marketing</p></td><td><p class="animated bounceInRight">{{$bayar->marketing->name}}</p></td>
		</tr>
		<tr>
			<td><p>Bukti Pembayaran</p></td><td><p class="animated bounceInRight"><img src="{{asset('/resi/'.$bayar->img )}}" width="200" class="img-responsive"></p></td>
		</tr>
		<tr>
			<td><p>Pengirim</p></td><td><p class="animated bounceInRight">{{$bayar->pengirim}}</p></td>
		</tr>
		<tr>
			<td><p>Bank</p></td><td><p class="animated bounceInRight">{{$bayar->bank}}</p></td>
		</tr>
	</table>
