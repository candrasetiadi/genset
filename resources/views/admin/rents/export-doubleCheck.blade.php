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
<p><center>{{ $dataRent[0]->rent_no }}</center></p>
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