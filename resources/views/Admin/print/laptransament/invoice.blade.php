<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')

        @include('includes.stylesAdmin')

        <style>
           	@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
        </style>

        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
    <body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{ asset('image/animalia.png') }}" alt="Company logo" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Invoice #: {{ $transaksi->id }}<br />
									Tanggal : {{ $transaksi->created_at->format('d-m-Y') }}<br />
                                    Jenis   : {{ $transaksi->jenis }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Animalia, Inc.<br />
									Jl. Keputih Perintis 1<br />
									Surabaya, Jawa Timur
								</td>

								<td>
									{{ $transaksi->user->pelanggan->nama }}<br />
									{{ $transaksi->user->pelanggan->username }}<br />
									{{ $transaksi->alamat }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Tipe Pembayaran</td>
				</tr>

				<tr class="details">
					<td>{{ $bayar->metodbayar->nama_metode }}</td>
				</tr>

                <tr class="heading">
					<td>Pilihan layanan</td>
                    <td>Biaya Ongkir</td>
				</tr>
				@foreach ($detil as $d) 
				<tr class="details">
					<td>{{ $d->layanan->nama_layanan }}</td>

                    <td>@currency($d->layanan->biaya)</td>
				</tr>
				@endforeach

				<tr class="heading">
					<td>Item</td>
					<td>Harga</td>
				</tr>
                @foreach ($detil as $d)   
                <tr class="item">
                    <td>{{ $d->jasa->nama_jasa }}</td>
                    <td>@currency($d->jasa->harga)</td>
                </tr>
                @endforeach
                <tr class="total">
					<td></td>

					<td>Total: @currency($transaksi->total_harga)</td>
				</tr>
				<tr class="total">
					<td></td>
					<td>Subtotal @currency($transaksi->subtotal)</td>
				</tr>
			</table>
		</div>

        @include('includes.scriptAdmin')

        <script>
            $(document).ready(function(){
                window.print();
            });
        </script>

    </body>
</html>