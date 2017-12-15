<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		table,  th,  td {
		    border: 1px solid black;
		    border-collapse: collapse;
		    padding: 5px;
		}
	</style>
</head>
<body>
	<h4 align="center">LAPORAN HARIAN KEGIATAN DAN PRODUKTIFITAS ALAT</h4>
	<h4 align="center">LAP. {{ $field->field_no }} ({{ $field->name }})</h4>
	<br>
	
	<p>S/D Tanggal: {{ date('d/m/Y h:i:s') }}</p>
	<p>STOCK CONTAINER REFEER DI LAPANGAN {{ $field->field_no }} ({{ $field->name }})</p>

	<table width="100%">
		<thead>
			<tr>
				<th width='5%'>No</th>
				<th width='10%'>Container</th>
				<th width='5%'>Ukuran</th>
				<th width='10%'>Plug IN</th>
				<th width='5%'>Shift</th>
				<th width='10%'>Export / Import</th>
				<th width='5%'>Set Point</th>
				<th width='15%'>Kapal</th>
				<th width='10%'>Recooling</th>
				<th width='10%'>Monitoring</th>
				<th width='15%'>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $data as $key => $value )
				<tr>
					<td align="center">{{ $key + 1 }}</td>
					<td align="center">{{ $value->container_no }}</td>
					<td align="center">{{ $value->size }}</td>
					<td align="left">{{ date('d/m/Y', strtotime($value->date_in)) }} {{ $value->time_in }}</td>
					<td align="center">{{ $value->total_shift }}</td>
					<td align="center">{{ $value->delivery_type }}</td>
					<td align="center">{{ $value->set_point }}</td>
					<td align="center">{{ $value->ship_name }}</td>
					<td align="right">Rp. {{ number_format($value->recooling_price,0,',','.') }}</td>
					<td align="right">Rp. {{ number_format($value->monitoring_price,0,',','.') }}</td>
					<td align="right">Rp. {{ number_format(($value->total_shift * $value->recooling_price) + ($value->total_shift * $value->monitoring_price),0,',','.') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>