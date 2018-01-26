<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		table.inv,  th.inv,  td.inv {
		    border: 1px solid black;
		    border-collapse: collapse;
		    padding: 5px;
		}

		table.notes,  th,  td {
		    padding: 5px;
		}
	</style>
</head>
<body>
	<p>Rekap Piutang PT.PELINDO atas kegiatan</p>	
	<p>Jasa Recooling &amp; Monitoring Tahun {{ date('Y') }}</p>	
	<p>Diluar tagihan Long Stay (lancar) *</p>

	<table width="100%" class="inv">
		<thead>
			<tr>
				<th width='5%' class="inv">No</th>
				<th width='10%' class="inv">Tgl. Invoice</th>
				<th width='15%' class="inv">No. Invoice</th>
				<th width='15%' class="inv" >Jml Tagihan</th>
				<th width='15%' class="inv" >PPh 2%</th>
				<th width='15%' class="inv" >Yang Akan Diterima</th>
				<th width='15%' class="inv">Tgl Invoice Kirim/Masuk TO3</th>
				<th width='10%' class="inv">Lama Hari</th>
			</tr>
		</thead>
		<tbody>
			@php
			$totalBeforeTax = 0;
			$totalPPh = 0;
			$totalAfterTax = 0;
			@endphp
			@foreach ( $getDones as $key => $done )
				<tr>
					<td class="inv">{{ $key + 1 }}</td>
					<td class="inv">{{ $done->date }}</td>
					<td class="inv">{{ $done->invoice_no }}</td>
					<td class="inv" align="right">Rp. {{ number_format($total[$key],0,',','.') }}</td>
					<td class="inv" align="right">Rp. {{ number_format(($total[$key] * 2) / 100,0,',','.') }}</td>
					<td class="inv" align="right">Rp. {{ number_format($total[$key] - (($total[$key] * 2) / 100),0,',','.') }}</td>
					<td class="inv">{{ $done->date }}</td>
					<td class="inv"></td>
				</tr>
				@php
				$totalBeforeTax += $total[$key];
				$totalPPh += ($total[$key] * 2) / 100;
				$totalAfterTax += $total[$key] - (($total[$key] * 2) / 100);
				@endphp
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3" class="inv">Total</th>
				<th class="inv" align="right">Rp. {{ number_format($totalBeforeTax,0,',','.') }}</th>
				<th class="inv" align="right">Rp. {{ number_format($totalPPh,0,',','.') }}</th>
				<th class="inv" align="right">Rp. {{ number_format($totalAfterTax,0,',','.') }}</th>
				<th colspan="2" class="inv"></th>
			</tr>
		</tfoot>
	</table>
	<p><b>Note:</b></p>
	<p>&nbsp; &nbsp; &nbsp; * Untuk penerimaan sudah dikurangi dengan :</p>
	<p>&nbsp; &nbsp; &nbsp; Jumlah tagihan Invoice - PPH 2%</p>
	<p><b>Note:</b></p>
	<table width="100%" class="notes">
		<tr>
			<td>1</td>
			<td>Aktif - masih di lapangan (berjalan)</td>
			<td align="right">Rp</td>
			<td align="right">{{ number_format($totalActive, 0,',','.') }}</td>
			<!-- <td>0/6 Box</td>
			<td>Tgl. s/d jam WIB</td> -->
		</tr>		
		<tr>
			<td>2</td>
			<td>Aktif - belum dibuat invoice (out)</td>
			<td align="right">Rp</td>
			<td align="right">{{ number_format($totalInactive, 0,',','.') }}</td>
			<!-- <td>0/6 Box</td>
			<td>Tgl. s/d jam WIB</td> -->
		</tr>		
		<tr>
			<td colspan="2"><b>Total</td>
			<td align="right"><b>Rp</td>
			<td align="right"><b>{{ number_format($totalActive + $totalInactive, 0,',','.') }}</td>
			<td colspan="2">&nbsp;</td>
		</tr>		
		<tr>
			<td>3</td>
			<td>Proses TTD &amp; Faktur Pajak</td>
			<td align="right">Rp</td>
			<td align="right">{{ number_format($totalTax, 0,',','.') }}</td>
			<!-- <td>0/6 Box</td>
			<td>Tgl. s/d jam WIB</td> -->
		</tr>	
		<!-- <tr>
			<td colspan="2"></td>
			<td align="right">Rp</td>
			<td align="right">1000000</td>
			<td>0/6 Box</td>
			<td>Tgl. s/d jam WIB</td>
		</tr> -->	
		<tr>
			<td colspan="2"><b>Total</td>
			<td align="right"><b>Rp</td>
			<td align="right"><b>{{ number_format($totalTax, 0,',','.') }}</td>
			<td colspan="2">&nbsp;</td>
		</tr>			
		<tr>
			<td>4</td>
			<td>Double Check Internal</td>
			<td align="right">Rp</td>
			<td align="right">{{ number_format($totalChecking, 0,',','.') }}</td>
			<!-- <td>0/6 Box</td>
			<td>Tgl. s/d jam WIB</td> -->
		</tr>		
		<tr>
			<td colspan="2"><b>Total</td>
			<td align="right"><b>Rp</td>
			<td align="right"><b>{{ number_format($totalChecking, 0,',','.') }}</td>
			<td colspan="2">&nbsp;</td>
		</tr>			
		<tr>
			<td colspan="2"><b>Grand Total</td>
			<td align="right"><b>Rp</td>
			<td align="right"><b>{{ number_format(($totalActive + $totalInactive) + ($totalChecking) + ($totalTax) , 0,',','.') }}</td>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
	<!-- <p><b>Keterangan</b></p>
	<p>- Pada Tgl </p> -->

	<br>
	<p>Jakarta, {{ date('d M Y') }}</p>
	<br>
	<br>
	<p>Makki Mahadian</p>
</body>
</html>