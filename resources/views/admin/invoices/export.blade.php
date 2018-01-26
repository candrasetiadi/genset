<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table.head {
		    border-collapse: collapse;
		}

		table.head, .head th, .head td {
			vertical-align: top;
		    height: 50px;
		    padding: 10px;
		}

		table.footer {
		    border-collapse: collapse;

		}

		table.footer, .footer th, .footer td {
		    border: 1px solid black;
		    /*width: 300px;*/
		    padding: 15px;
		}

		table.ba {
		    border-collapse: collapse;

		}

		table.ba, .ba th, .ba td {
		    border: 1px solid black;
		    /*width: 300px;*/
		    padding: 15px;
		}
	</style>
</head>
<body>
	<h4 align="center">INVOICE</h4>
	<br>
	<h6 align="right">{{ $data->invoice_no }}</h6>
	<table class="head">
		<tr>
			<td style="border: 1px solid black; width: 45%;">
				Kepada: <br>
				{{ $data->customer_name }} <br>
				{{ $data->address }}
			</td>
			<td style="width: 10%;">&nbsp;</td>
			<td style="border: 1px solid black; width: 45%;">
				Pembayaran di transfer: <br>
				PT. Transporindo Lima Perkasa <br>
				Bank BNI <br>
				Cabang Tg.Priok - Jakarta Utara <br>
				A/C 0273993507
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table class="footer" width="100%">
		<tr>
			<td>No</td>
			<td>Keterangan</td>
			<td>Shift</td>
			<td>Recooling</td>
			<td>Monitoring</td>
			<td>Jumlah</td>
		</tr>
		<?php 
		
		$subtotal = 0;

		if (!empty(array_filter($dataRM->toArray()))) {

			if (count($dataRM) == 1) {
				$sizeContainer = $dataRM[0]->total_cont .'x'. $dataRM[0]->size ;
			} else {
				$sizeContainer = $dataRM[0]->total_cont .'x'. $dataRM[0]->size .'" Dan '. $dataRM[1]->total_cont .'x'. $dataRM[1]->size.'"' ;
			}

		} else {
			$sizeContainer = '';
		}

		?>
		@foreach ($dataRM as $key=>$val)
			<?php $total = 0; ?>
			{{ $total = ($val->total_shift * $val->monitoring_price) + ($val->total_shift * $val->recooling_price) }}
			
			<tr>
				<td>{{ $key+1 }}</td>
				<td>
					Tagihan Kegiatan Reefer Container Party {{ $val->total_cont }} x {{ $val->size }}"<br>
					(Periode Kegiatan {{ date('d M Y', strtotime($val->date_in)) }} s/d {{ date('d M Y', strtotime($val->date_out)) }})
				</td>
				<td>{{ $val->total_shift }}</td>
				<td align="right">Rp. {{ number_format($val->recooling_price,0,',','.') }}</td>
				<td align="right">Rp. {{ number_format($val->monitoring_price,0,',','.') }}</td>
				<td align="right">Rp. {{ number_format($total,0,',','.') }}</td>
			</tr>
			{{ $subtotal += $total }}
		@endforeach
		<tr>
			<td colspan="5" align="center">
				Total
			</td>
			<td align="right">
				Rp. {{ number_format($subtotal,0,',','.') }}
			</td>
		</tr>
		<tr>
			<td colspan="5" align="center">
				PPN 10%
			</td>
			<td align="right">
				<?php $ppn = 0; ?>
				Rp. {{ number_format($ppn = $subtotal * 10 / 100,0,',','.') }}
			</td>
		</tr>
		<tr>
			<td colspan="5" align="center">
				Grand Total
			</td>
			<td align="right">
				Rp. {{ number_format($subtotal + $ppn,0,',','.') }}
			</td>
		</tr>
		<tr>
			<td colspan="6">{{ strtoupper($text) }} RUPIAH</td>
		</tr>
	</table>
	<br>
	<p align="right">Jakarta, {{ date('d M Y') }}</p>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right" style="text-decoration: underline;"><b>Ari Awaluddin Harahap, SE</b></p>
	<p align="right">Direktur Keuangan</p>
	<br>
	<br>
	<br>
	<br>
	<br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	Jakarta, {{ date('d M Y') }} <br><br>
	Nomor &nbsp; &nbsp; : {{ $data->invoice_no }}
	<p>Kepada Yth,</p> 
	<p><b> {{ $data->customer_name }} <br>
	PBM Operasi Terminal III <br>
	Cabang Tj. Priok<br>
	Jakarta Utara</b> </p>

	<p><b>Up. Bapak Wahyu Hardiyanto - General Manager</b></p>
	<table width="100%">
		<tr>
			<td width="25%" style="vertical-align: top;">Perihal</td>
			<td width="5%" align="right" style="vertical-align: top;">:</td>
			<td width="70%" style="vertical-align: top;">Penyampaian Invoice Kegiatan Plugging Refeer Container Party {{ $sizeContainer }} </td>
		</tr>
	</table>

	<p>Dengan hormat,</p>
	<p>Bersama ini kami sampaikan invoice kegiatan plugging refeer container, sesuai dengan permohonan yang diajukan pihak PELINDO II dan sesuai berita acara No. 017 /Alat Genset / TLP / III / 2015 :</p>

	<table width="100%">
		<tr>
			<td width="25%" style="vertical-align: top;">Nomor Invoice </td>
			<td width="5%" align="right" style="vertical-align: top;">:</td>
			<td width="70%" style="vertical-align: top;">{{ $data->invoice_no }}</td>
		</tr>
		<tr>
			<td width="25%" style="vertical-align: top;">Nomor Faktur Pajak</td>
			<td width="5%" align="right" style="vertical-align: top;">:</td>
			<td width="70%" style="vertical-align: top;"></td>
		</tr>
		<tr>
			<td width="25%" style="vertical-align: top;">Tanggal</td>
			<td width="5%" align="right" style="vertical-align: top;">:</td>
			<td width="70%" style="vertical-align: top;">{{ date('d M Y', strtotime($data->date)) }}</td>
		</tr>
		<tr>
			<td width="25%" style="vertical-align: top;">Nilai Invoice</td>
			<td width="5%" align="right" style="vertical-align: top;">:</td>
			<td width="70%" style="vertical-align: top;">Rp. {{ number_format($subtotal + $ppn,0, ',','.') }},- <br>({{ strtoupper($text) }} RUPIAH)</td>
		</tr>
	</table>

	<p>Pembayaran mohon ditransfer ke rekening:</p>
	<p>PT. Transporindo Lima Perkasa <br>
		Bank BNI Cabang Tg.Priok - Jakarta Utara <br>
		A/C 0273993507</p>

	<p>Demikianlah hal ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih.</p>
	<p>Hormat kami,</p>
	<p><b>PT. Transporindo Lima Perkasa</b></p>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	&nbsp; <br>
	<p><b><u>Ari Awaluddin Harahap</u></b></p>
	<p>Direktur Keuangan</p>

	&nbsp; <br>
	
	<p><center>No. 017/Alat-Genset/TLP/III/2017</center></p>
	<p><center><b>TENTANG</b></center></p>
	<p><center><b>PEMAKAIAN ALAT GENSET DAN PENUNJANGNYA UNTUK KEGIATAN REFEER</b></center></p>
	<p><center><b>CONTAINER DI LAPANGAN 305 (PT.TSJ) TERMINAL III PELABUHAN TANJUNG PRIOK</b></center></p>

	<p>Pada hari ini,</p>
	<p>yang bertanda tangan dibawah ini:</p>
	<table width="100%">
		<tr>
			<td rowspan="3" width="5%" style="vertical-align: top">1.</td>
			<td width="20%">Nama</td>
			<td width="5%" align="right">:</td>
			<td width="70%">ARI AWALUDDIN HARAHAP</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td align="right">:</td>
			<td>Direktur Keuangan PT. Transporindo Lima Perkasa</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td align="right">:</td>
			<td>Jl. Enggano No.94 A, Tanjung Priok</td>
		</tr>
	</table>

	<p>Dalam hal ini bertindak untuk dan atas nama PT. Transindo Lima Perkasa, untuk selanjutnya disebut <b>PIHAK PERTAMA</b></p>

	<table width="100%">
		<tr>
			<td rowspan="3" width="5%" style="vertical-align: top">1.</td>
			<td width="20%">Nama</td>
			<td width="5%" align="right">:</td>
			<td width="70%">WAHYU HARDIYANTO</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td align="right">:</td>
			<td>General Manager Operasi Terminal III</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td align="right">:</td>
			<td>Jl. Raya Pelabuhan No. 9</td>
		</tr>
	</table>
	<p>Dalam hal ini bertindak untuk dan atas nama PT. Pelabuhan Tanjung Priok, untuk selanjutnya disebut <b>PIHAK KEDUA</b></p>

	<p>Bahwa <b>PIHAK KEDUA</b> telah menerima dan menggunakan alat genset serta penunjang alat milik <b>PIHAK PERTAMA</b>, dimana penggunaan genset dan penunjang tersebut untuk pelayanan refeer container dengan rincian sebagai berikut:</p>

	<table width="100%" class="ba">
		<thead>
			<tr>
				<th width="5%">NO.</th>
				<th width="13%">NO.CONTAINER</th>
				<th width="5%">UK</th>
				<th width="15%">NAMA KAPAL/VOY</th>
				<th width="5%">SHIFT</th>
				<th width="17%">RECOOLING</th>
				<th width="20%">MONITORING</th>
				<th width="20%">JUMLAH</th>
			</tr>
		</thead>
		<tbody>
			@php 
				$subtotal = 0;
				$ppn = 0;
				$grandtotal = 0;
			@endphp
			@foreach ( $dataRent as $key => $value )
				
				@php 
					$subtotal += ($value->total_shift * $value->recooling_price) + ($value->total_shift * $value->monitoring_price); 
				@endphp
				<tr>
					<td align="center">{{ $key + 1 }}</td>
					<td align="center">{{ $value->container_no }}</td>
					<td align="center">{{ $value->size }}</td>
					<td align="center">{{ $value->ship_name }}</td>
					<td align="center">{{ $value->total_shift }}</td>
					<td align="right">Rp. {{ number_format($value->recooling_price,0,',','.') }}</td>
					<td align="right">Rp. {{ number_format($value->monitoring_price,0,',','.') }}</td>
					<td align="right">Rp. {{ number_format(($value->total_shift * $value->recooling_price) + ($value->total_shift * $value->monitoring_price),0,',','.') }}</td>
				</tr>
			@endforeach

			@php 
				$ppn = $subtotal * 10 / 100;
				$grandtotal = $subtotal + $ppn;
			@endphp
		</tbody>
		<tfoot>
			<tr>
				<th colspan="7">JUMLAH</th>
				<th align="right">Rp. {{ number_format($subtotal, 0,',','.') }} </th>
			</tr>
			<tr>
				<th colspan="7">PPN 10%</th>
				<th align="right">Rp. {{ number_format($ppn, 0,',','.') }} </th>
			</tr>
			<tr>
				<th colspan="7">TOTAL</th>
				<th align="right">Rp. {{ number_format($grandtotal, 0,',','.') }} </th>
			</tr>
		</tfoot>

	</table>

	<p>Pengoperasian alat genset dan monitoring refeer container di lokasi dimulai hari . (data pengoperasian alat dan monitoring terlampir)</p>
	<p>Demikian berita acara ini dibuat ditandatangani di Jakarta pada hari dan tanggal tersebut diatas. </p>

	<table width="100%">
		<tr>
			<td width="30%" height="200px" align="center"><b>PIHAK PERTAMA</b></td>
			<td width="50%" height="200px" align="center"><b>&nbsp;</b></td>
			<td width="30%" height="200px" align="center"><b>PIHAK KEDUA</b></td>
		</tr>
		<tr>
			<td height="200px"  align="center"><b><u>ARI AWALUDDIN HARAHAP</u></b></td>
			<td height="200px"  align="center"><b>&nbsp;</b></td>
			<td height="200px"  align="center"><b><u>WAHYU HARDIYANTO</u></b></td>
		</tr>
	</table>
</body>
</html>