<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table.head {
		    border-collapse: collapse;
		}

		table.head, .head th, .head td {
		    width: 250px;
		    height: 50px;
		}

		table.footer {
		    border-collapse: collapse;

		}

		table.footer, .footer th, .footer td {
		    border: 1px solid black;
		    width: 300px;
		    padding: 15px;
		}
	</style>
</head>
<body>
	<h4 align="center">BON PEMAKAIAN SOLAR</h4>
	<br>
	<table class="head">
		<tr>
			<td>Lapangan</td>
			
			<td>: {{ $data->field_name }}</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			
			<td>: {{ date('d/m/Y', strtotime($data->date)) }}</td>
		</tr>
		<tr>
			<td>Nama Unit</td>
			
			<td>: {{ $data->generator_name }}</td>
		</tr>
		<tr>
			<td>Jumlah Pemakaian</td>
			
			<td>: {{ $data->usage }} Liter</td>
		</tr>
	</table>
	<br>
	<br>
	<table class="footer" align="center">
		<tr>
			<td colspan="2" align="center">Tanda Tangan</td>
		</tr>
		<tr>
			<td>Petugas Lapangan</td>
			<td>{{ $data->field_operator }}</td>
		</tr>
		<tr>
			<td>Operator Unit</td>
			<td>{{ $data->unit_operator }}</td>
		</tr>
	</table>
</body>
</html>